<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use Hash;
use Validator;
use Session;
use App\Admin;

class CmsController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $all_cms_data = \DB::table("cms")->get();
        $all_cms_data_array = array();
        foreach($all_cms_data as $data){
            $all_cms_data_array[$data->page] = $data->data;
        }
        //echo "<pre>";print_r($all_cms_data);exit;
        return view('cms.index', array('all_cms_data' => $all_cms_data_array));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {
        $request_array = $request->all();
        foreach($request_array['page'] as $page => $data){
            \DB::table("cms")->where("page",$page)->update(array("data" => $data));
        }
        
        return redirect("/admin/cms-pages");
    }

}
