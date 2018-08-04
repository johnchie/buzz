<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VenueController extends Controller {

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
        return view('venue.index');
    }
    
    public function detail($id){
        return view('venue.detail');
    }

}
