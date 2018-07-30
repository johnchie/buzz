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
        $params = array();
        return view('contactus.aboutus', array('params' => $params));
    }
    
    /**
     * privacy page
     */
    public function privacy() {
        $params = array();
        return view('contactus.privacy', array('params' => $params));
    }
}
