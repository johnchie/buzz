<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use Hash;
use Validator;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


use App\User;
use App\Booking;
use App\Faq;
use App\GuestUsers;

class UserController extends Controller
{
    
    public function login(Request $request){
        
        $response = array();
        
        
        $email = $request->email;
        $password = $request->password;
        if (Auth::attempt(array('email' => $email, 'password' => $password))){
            
            $userData = Auth::user();
            $userData['user_image'] = url('/').'/public/uploads/'.$userData['user_image'];
            
            $request->session()->put('U_ID', $userData['user_id']);
            $request->session()->put('U_NAME', trim($userData['first_name'] . " " . $userData['last_name']));
            $request->session()->put('U_EMAIL', $userData['email']);
            
            $request->session()->flash('success', 'Login successfully!');
            return redirect()->route('home');
        }else{
            $request->session()->flash('failure', 'Invalid email/password.');
            return redirect()->route('home');
        }
        
    }
    
    public function registration(Request $request){
        //$response = array();
        $firstName = $request->first_name;
        $lastName  = $request->last_name;
        $email     = $request->email;
        $password  = Hash::make($request->password);
        //$contactNumber = $request->contact_number;
        //$deviceType  = $request->device_type;
        //$deviceToken = $request->device_token;
        //$location = $request->location;
        //$latitude = $request->latitude;
        //$longitude = $request->longitude;
        
        $photoName = '';
        if(Input::hasFile('user_image'))
        {
            $photoName = time().'.'.$request->user_image->getClientOriginalExtension();
            $request->user_image->move(public_path('uploads'), $photoName);
        }
        
        $user = new User();
        $user->first_name = $firstName;
        $user->last_name = $lastName;
        $user->email = $email;
        $user->password = $password;
        //$user->contact_number = $contactNumber;
        $user->device_type = 'web';
        $user->device_token = '';
        $user->user_image = $photoName;
        //$user->location = $location;
        //$user->latitude = $latitude;
        //$user->longitude = $longitude;

        $data = array(
            'email' => $user->email,
            //'contact_number' => $user->contact_number,
        );

        $rule  =  array(
            'email' => 'unique:users',
            //'contact_number' => 'required',
        ) ;

        $validator = Validator::make($data,$rule);
        if ($validator->fails()){
            $messages = $validator->errors();
            $request->session()->flash('failure', $messages);
        }else{
            $user->save();
            if($user){
                $request->session()->flash('success', 'Signup done successfully!');
            }else{
                $request->session()->flash('failure', 'Problem in performing action, Please try again!');
            }            
        }
        
        return redirect()->route('home');
    }
    
    public function forgotPassword(Request $request){
        $response = array();
        $email  = $request->email;
        
        $userEmail = User::findEmail($email);
        if(!empty($userEmail)){
            
            $password = str_random(8);
            
            $user = User::find($userEmail->user_id);
            $user->password = Hash::make($password);
            $user->save();
            
            $response['status'] = true;
            $response['message'] = 'New Password sent to your registered email address.';
        }else{
            $response['status'] = false;
            $response['message'] = 'This email is not exit our system.';           
        }
        
        return response()->json($response);
    }
    
    public function updateProfile(Request $request){
        
        $response = array();
        $userId    = $request->user_id;
        $firstName = $request->first_name;
        $lastName  = $request->last_name;
        $email     = $request->email;
        $contactNumber = $request->contact_number;

        $location = $request->location;
        $latitude = $request->latitude;
        $longitude = $request->longitude;

        $user = User::find($userId);
        $user->first_name = $firstName;
        $user->last_name = $lastName;
        $user->email = $email;
        $user->contact_number = $contactNumber;
        $user->location = $location;
        $user->latitude = $latitude;
        $user->longitude = $longitude;

        if(Input::hasFile('user_image'))
        {
            $photoName = time().'.'.$request->user_image->getClientOriginalExtension();
            $request->user_image->move(public_path('uploads'), $photoName);
            $user->user_image = $photoName;
        }
        
        $user->save();
        if($user){
            $response['status'] = true;
            $response['message'] = 'Successfully update profile.';
            $response['user_data'] = $user;
        }else{
            $response['status'] = false;
            $response['message'] = 'Problem in update profile. Please try again later';
        }
        
        return response()->json($response);
        
    }
    
    public function changePassword(Request $request){
        $userId    = $request->user_id;
        $oldPassword = $request->old_password;
        $newPassword = $request->new_password;
        
        if (Auth::attempt(array('user_id' => $userId, 'password' => $oldPassword))){
            $user = User::find($userId);
            $user->password = Hash::make($newPassword);
            $user->save();
            
            $response['status'] = true;
            $response['message'] = 'Password update successfully.';
        }else{
            $response['status'] = false;
            $response['message'] = 'Your Old password is wrong.';            
        }
        
        return response()->json($response);
    }
    
    public function userDetails(Request $request){
        $userId = $request->user_id;
        $user = User::find($userId);
        
        $response['status'] = true;
        $response['message'] = 'User details.';
        $response['user_data'] = $user;

        return response()->json($response);
    }
    
    public function logout(Request $request){
        $userId = $request->user_id;
        
        $user = User::find($userId);
        $user->device_token = '';
        $user->save();
        
        $response['status'] = true;
        $response['message'] = 'Successfully logout.';
        
        return response()->json($response);
    }

    public function myProfile(Request $request)
    {
        $user_id = Auth::id();
        $data = User::where('user_id',$user_id)->first();
        return view('users.my-profile')->with('data',$data);
    }
    public function editProfile(Request $request)
    {
        $user_id = Auth::id();
        $this->validate($request,[
            'first_name' => 'required',
            'last_name' => 'required',
            'contact_number' => 'required',
            'location' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);
        $data = array(
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'contact_number' => $request->input('contact_number'),
            'location' => $request->input('location'),
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
        );
        if(User::where('user_id',$user_id)->update($data))
        {
            Session::flash('type', 'true');
            Session::flash('message', 'Profile Updated');
            return redirect('admin/my-profile');
        }
        else
        {
            Session::flash('type', 'false');
            Session::flash('message', 'Unable to Profile event');
            return redirect('admin/my-profile');
        }

    }
    public function allUsers()
    {
        $users = User::get();
        return view('users.show')->with('data',$users);
    }

    public function deleteUser($id)
    {
        DB::table('user_categories')->where('user_id',$id)->delete();
        if(User::where('user_id',$id)->delete())
        {
            Session::flash('type', 'true');
            Session::flash('message', 'User Deleted');
            return redirect('admin/show-all-users');
        }
        else
        {
            Session::flash('type', 'false');
            Session::flash('message', 'Unable to delete user');
            return redirect('admin/show-all-users');
        }
    }
    public function createUser()
    {
        return view('users.create');
    }
}
