<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller {

    public function __construct() {
        //defining our middleware for this controller
        $this->middleware('guest:admin', ['except' => ['logout']]);
    }

    //function to show admin login form
    public function showLoginForm() {
        return view('auth.admin-login');
    }

    //function to login admins
    public function login(Request $request) {
        //validate the form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        //attempt to login the admins in
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            //if successful redirect to admin dashboard
            $request->session()->put('admintype',"admin");
            return redirect()->intended(route('admin.dashboard'));
        } elseif (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'user_type' => 2], $request->remember)) {
            $request->session()->put('admintype',"advertiser");
            return redirect()->intended(route('admin.dashboard'));
        }
        //if unsuccessfull redirect back to the login for with form data
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout() {
        Auth::logout();
        \Session::flush();
        \Session::forget('user');
        return redirect('/admin');
    }

}
