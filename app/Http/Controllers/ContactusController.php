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
     * list advertiser page
     */
    public function index() {
        $params = array();
        return view('contactus.index', array('params' => $params));
    }
}
