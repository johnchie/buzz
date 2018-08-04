<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactusController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        
    }

    /**
     * contactus page
     */
    public function index() {
        $params = array();
        return view('contactus.index', array('params' => $params));
    }

    /**
     * about page
     */
    public function aboutus() {
        $params = \DB::table("cms")->where("page", "about")->first();
        return view('contactus.aboutus', array('params' => $params));
    }

    /**
     * privacy page
     */
    public function privacy() {
        $params = \DB::table("cms")->where("page", "policy")->first();
        return view('contactus.privacy', array('params' => $params));
    }

    /**
     * terms page
     */
    public function terms() {
        $params = \DB::table("cms")->where("page", "terms")->first();
        return view('contactus.terms', array('params' => $params));
    }
    
    /**
     * Contactus email
     */
    public function contactusEmail(Request $request) {
        //echo "<pre>";print_r($request->all());exit;
        $requestData = $request->all();
        $subject = "BuzzPng Inquiry From Contactus";
        $data['name'] = $requestData['name'];
        $data['email'] = $from = $requestData['email'];
        $data['desc'] = $requestData['message'];
        $data['phone'] = $requestData['phone'];
        $data['type'] = $requestData['type'];
        $data['userName'] = "Admin";
        $data['baseurl'] = env('APP_URL');
        $email = 'rajmehta1270@gmail.com';
        //echo "<pre>";print_r($data);exit;
        \Mail::send('contactus.mailtemplate', $data, function ($message) use($from, $email, $subject) {
            $message->from($from);
            $message->to($email);
            $message->subject($subject);
        });
        $request->session()->flash('success', 'Contact email sent successfully!');
        return redirect()->route('contactus');
    }

}
