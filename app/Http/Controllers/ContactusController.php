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

}
