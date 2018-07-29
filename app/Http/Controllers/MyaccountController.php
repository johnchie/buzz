<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Events;
use App\Eventslike;

class MyaccountController extends Controller {

    public $user_id;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        //$this->middleware('auth');
        $this->user_id = 4;
    }

    /**
     * get favourites event list 
     */
    public function favourites() {
        $eventsarray = array();
        $events = Events::leftJoin('event_like', 'events.id', 'event_like.event_id')
                ->where("event_like.user_id", $this->user_id)
                ->select("events.*")
                ->get();
        foreach ($events as $event) {
            $category = Category::find($event->category_id);
            $event['category_name'] = $category['name'];
            $eventsarray[] = $event;
        }
        return view('myaccount.favourites', array('events' => $eventsarray));
    }

    public function event_fav($id = '') {
        if (empty($id)) {
            return redirect()->route('/');
        }

        $event_fav = new Eventslike();
        $event_fav->event_id = $id;
        $event_fav->user_id = $this->user_id;
        $msg = "";
        if ($event_fav->save()) {
            $msg = "Event added in your favourite list";
        } else {
            $msg = "Problem in add event in your favourite list";
        }

        return redirect()->back()->with("message", $msg);
    }

    public function event_unfav($id = '') {
        if (empty($id)) {
            return redirect()->route('/');
        }

        $remove_flag = Eventslike::where("event_id", $id)
                ->where("user_id", $this->user_id)
                ->delete();
        $msg = "";
        if ($remove_flag > 0) {
            $msg = "Event removed successfully";
        } else {
            $msg = "Problem in remove event from your favourite list";
        }

        return redirect()->back()->with("message", $msg);
    }

    public function account() {
        $user_data = \App\User::where("user_id", $this->user_id)->first();

        return view('myaccount.account', array('user_data' => $user_data));
    }

    public function account_post(Request $request) {
        $user_data = \App\User::where("user_id", $this->user_id)->first();
        $user_data->first_name = $request->fname;
        $user_data->last_name = $request->lname;
        $user_data->email = $request->email;
        $user_data->contact_number = $request->number;
        $user_data->location = $request->location;

        $file = $request->file('myfile');
        if ($file) {
            $file_extenstion = $file->getClientOriginalExtension();
            if (in_array($file->getClientOriginalExtension(), array("jpg", "jpeg", "png", "gif"))) {
                $file_name = time() . "." . $file_extenstion;
                $file->move("public/uploads", $file_name);
                $user_data->user_image = $file_name;
            }
        }
        if ($user_data->save()) {
            $msg = "Profile updated successfully";
        } else {
            $msg = "Problem in update profile";
        }

        return redirect()->back()->with("message", $msg);
    }

    public function changepassword() {
        return view('myaccount.changepassword');
    }

    public function changepassword_post(Request $request) {
        $current_password = \App\User::where("user_id", $this->user_id)->first();
        if (\Hash::check($request['current_password'], $current_password->password)) {
            $obj_user = \App\User::find($this->user_id);
            $obj_user->password = \Hash::make($request['new_password']);
            $obj_user->save();

            $msg = "Password change successfully";
        } else {
            $msg = "Current password is wrong";
        }

        return redirect()->back()->with("message", $msg);
    }

    public function managecategories() {
        $user_categories = Category::leftJoin("user_categories", "user_categories.category_id", "category.id")
                ->where("user_id", $this->user_id)
                ->select("category.*")
                ->get();

        $all_category = Category::leftJoin("user_categories", function($join) {
                    return $join->on("user_categories.category_id", "category.id")
                            ->where("user_id", $this->user_id);
                })
                ->whereNull("user_id")
                ->select("category.*")
                ->get();
        return view('myaccount.managecategories', ['user_categories' => $user_categories, 'all_category' => $all_category]);
    }

    public function managecategories_post(Request $request) {
        $selected = $request['cat_select'];

        $insert_array = array();
        foreach ($selected as $sel) {
            $insert_array[] = array(
                "user_id" => $this->user_id,
                "category_id" => $sel
            );
        }

        if (\App\Usercategories::insert($insert_array)) {
            $msg = "Category added to your list";
        } else {
            $msg = "Problem in add category in your list";
        }

        return redirect()->route("manage-categories")->with("message", $msg);
    }

}
