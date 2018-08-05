<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venues;
use App\Events;

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
        $venue_data = Venues::where("status", "1")->get();
        return view('venue.index', ["venue_data" => $venue_data]);
    }

    public function detail($id) {
        $venue_data = Venues::where("id", $id)->where("status", "1")->get();
        $venue_events = Events::where("venue_id", $id)->where("event_status", "1")->get();
        if(empty($venue_data)){
            \Session::flash('error', 'no venue found.');
            return redirect('venue');
        }
        //echo "<pre>";print_r($venue_data->toArray());die;
        return view('venue.detail', array('venue' => $venue_data[0], "events" => $venue_events));
    }

    public function adminindex() {
        $venues = Venues::all();
        return view("venue.adminindex", ["data" => $venues]);
    }

    public function admincreate() {
        return view("venue.admincreate");
    }

    public function adminstore(Request $request) {
        $request_data = $request->all();
        $venue_create = new Venues();
        $venue_create->title = $request_data['name'];
        $venue_create->location = $request_data['location'];
        $venue_create->latitude = $request_data['latitude'];
        $venue_create->longitude = $request_data['longitude'];
        $venue_create->phone_number = $request_data['phone_number'];
        $venue_create->fax_number = $request_data['fax_number'];
        $venue_create->open_hours = $request_data['open_hours'];
        $venue_create->close_hours = $request_data['close_hours'];
//        $venue_create->banner_image = $request_data['name'];
//        $venue_create->logo_image = $request_data['name'];
        $venue_create->about_us = $request_data['about_us'];

        $banner_image = $request->file('banner_image');
        if ($banner_image) {
            $banner_image_extenstion = $banner_image->getClientOriginalExtension();
            if (in_array($banner_image->getClientOriginalExtension(), array("jpg", "jpeg", "png", "gif"))) {
                $banner_image_name = time() . "1." . $banner_image_extenstion;
                $banner_image->move("public/uploads", $banner_image_name);
                $venue_create->banner_image = $banner_image_name;
            }
        }

        $logo_image = $request->file('logo_image');
        if ($logo_image) {
            $logo_image_extenstion = $logo_image->getClientOriginalExtension();
            if (in_array($logo_image->getClientOriginalExtension(), array("jpg", "jpeg", "png", "gif"))) {
                $logo_image_name = time() . "2." . $logo_image_extenstion;
                $logo_image->move("public/uploads", $logo_image_name);
                $venue_create->logo_image = $logo_image_name;
            }
        }

        if ($venue_create->save()) {
            \Session::flash('type', 'true');
            \Session::flash('message', 'New Venue Created');
        } else {
            \Session::flash('type', 'false');
            \Session::flash('message', 'Unable to create venue');
        }

        return redirect('admin/venues');
    }

    public function adminedit($id = '') {
        if (empty($id)) {
            return redirect()->back();
        }

        $venue_data = Venues::find($id);

        return view("venue.adminedit", ["venue_data" => $venue_data]);
    }

    public function adminupdate(Request $request) {
        $request_data = $request->all();
        $venue_create = Venues::find($request_data['id']);
        $venue_create->title = $request_data['name'];
        $venue_create->location = $request_data['location'];
        $venue_create->latitude = $request_data['latitude'];
        $venue_create->longitude = $request_data['longitude'];
        $venue_create->phone_number = $request_data['phone_number'];
        $venue_create->fax_number = $request_data['fax_number'];
        $venue_create->open_hours = $request_data['open_hours'];
        $venue_create->close_hours = $request_data['close_hours'];
//        $venue_create->banner_image = $request_data['name'];
//        $venue_create->logo_image = $request_data['name'];
        $venue_create->about_us = $request_data['about_us'];

        $banner_image = $request->file('banner_image');
        if ($banner_image) {
            $banner_image_extenstion = $banner_image->getClientOriginalExtension();
            if (in_array($banner_image->getClientOriginalExtension(), array("jpg", "jpeg", "png", "gif"))) {
                $banner_image_name = time() . "1." . $banner_image_extenstion;
                $banner_image->move("public/uploads", $banner_image_name);
                $venue_create->banner_image = $banner_image_name;
            }
        }

        $logo_image = $request->file('logo_image');
        if ($logo_image) {
            $logo_image_extenstion = $logo_image->getClientOriginalExtension();
            if (in_array($logo_image->getClientOriginalExtension(), array("jpg", "jpeg", "png", "gif"))) {
                $logo_image_name = time() . "2." . $logo_image_extenstion;
                $logo_image->move("public/uploads", $logo_image_name);
                $venue_create->logo_image = $logo_image_name;
            }
        }

        if ($venue_create->update()) {
            \Session::flash('type', 'true');
            \Session::flash('message', 'New Venue Created');
        } else {
            \Session::flash('type', 'false');
            \Session::flash('message', 'Unable to create venue');
        }

        return redirect('admin/venues');
    }

    public function admindelete($id) {
        Venues::where("id", $id)->delete();
        \Session::flash('type', 'true');
        \Session::flash('message', 'Venue Deleted Successfully');

        return redirect('admin/venues');
    }

}
