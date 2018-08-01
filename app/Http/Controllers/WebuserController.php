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

class WebuserController extends Controller {

    public function login(Request $request) {

        $response = array();
        $email = $request->email;
        $password = $request->password;
        if (Auth::attempt(array('email' => $email, 'password' => $password))) {

            $userData = Auth::user();
            $userData['user_image'] = url('/') . '/public/uploads/' . $userData['user_image'];

            $request->session()->put('U_ID', $userData['user_id']);
            $request->session()->put('U_TYPE', $userData['user_type']);
            $request->session()->put('U_NAME', trim($userData['first_name'] . " " . $userData['last_name']));
            $request->session()->put('U_EMAIL', $userData['email']);

            $request->session()->flash('success', 'Login successfully!');
            return redirect()->route('home');
        } else {
            $request->session()->flash('failure', 'Invalid email/password.');
            return redirect()->route('home');
        }
    }


    public function registration(Request $request) {

        //$response = array();
        $firstName = $request->first_name;
        $lastName = $request->last_name;
        $email = $request->email;
        $password = Hash::make($request->password);
        //$contactNumber = $request->contact_number;
        //$deviceType  = $request->device_type;
        //$deviceToken = $request->device_token;
        //$location = $request->location;
        //$latitude = $request->latitude;
        //$longitude = $request->longitude;

        $photoName = '';
        if (Input::hasFile('user_image')) {
            $photoName = time() . '.' . $request->user_image->getClientOriginalExtension();
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
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'password' => $user->password,
            //'contact_number' => $user->contact_number,
        );
        
        $rule = array(
            'email' => 'unique:users',
            //'contact_number' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'password' => 'required',
        );

        $validator = Validator::make($data, $rule);
        if ($validator->fails()) {
            $messages = $validator->errors();
            if(!empty($messages)){
                $msg_arr = json_decode($messages);
                foreach($msg_arr as $msg){
                    $message_str = $msg[0];
                }
                $request->session()->flash('failure', $message_str);
            }
        }else{
            $user->save();
            if ($user) {
                $request->session()->flash('success', 'Signup done successfully!');
            } else {
                $request->session()->flash('failure', 'Problem in performing action, Please try again!');
            }
        }

        return redirect()->route('home');
    }

    public function logout(Request $request) {
        Session::flush();
        Session::forget('user');
        Auth::logout();
        $request->session()->flash('success', 'You have successfully logged out');
        return redirect()->route('home');
    }

    public function ajaxlogin(Request $request) {
        $response = array();
        $social = $request->social_id;
        $user_data = User::where("facebook_id", $social)->first();
        if ($user_data) {
            $userData = $user_data;
            $userData['user_image'] = url('/') . '/public/uploads/' . $userData['user_image'];
            $request->session()->put('U_ID', $userData['user_id']);
            $request->session()->put('U_NAME', trim($userData['first_name'] . " " . $userData['last_name']));
            $request->session()->put('U_EMAIL', $userData['email']);

            $response['success'] = true;
        } else {
            $user = new User();
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->device_type = 'web';
            $user->device_token = '';
            $user->facebook_id = $social;
            if ($user->save()) {
                $user_data = User::where("facebook_id", $social)->first();
                $userData = $user_data;
                $userData['user_image'] = "";
                $request->session()->put('U_ID', $userData['user_id']);
                $request->session()->put('U_NAME', trim($userData['first_name'] . " " . $userData['last_name']));
                $request->session()->put('U_EMAIL', $userData['email']);
                
                $response['success'] = true;
            } else {
                $response['success'] = FALSE;
            }
        }

        return response()->json($response);
    }

}
