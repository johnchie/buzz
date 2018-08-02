<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdvertiserController extends Controller {

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
    public function adv_list() {
        
        if(\Session::has('U_ID') && \Session::get('U_TYPE') == 2){
            return redirect("/admin/login");
        }
        
        $plans = array(
            array("id" => 1,"name" => "Monthly", "price" => "24.95", "unit" => "mo", "color" => ""),
            array("id" => 2,"name" => "Yearly", "price" => "19.95", "unit" => "yr", "color" => "blue"),
            array("id" => 3,"name" => "Quarterly", "price" => "22.95", "unit" => "qr", "color" => "red"),
        );
        return view('advertiser.list', array('plans' => $plans));
    }

}
