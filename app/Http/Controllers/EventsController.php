<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use App\Category;
use App\Events;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class EventsController extends Controller {

    public function topEvents(Request $request) {
        $response = array();

        $page = 1;
        $page = $request->input('page');

        $limit = 15;
        $start_from = ($page - 1) * $limit;

        if ($count = Events::where('top_events', 1)->count()) {
            $max = $count / $limit;

            if ((int) $max == $max) {
                $max;
            } else {
                if (round($max) < $max) {
                    $max = round($max) + 1;
                } else {
                    $max;
                }
            }
        }
        $next_page = '';
        if ($max >= $page) {
            $next_page = $page + 1;
        }
        if ($max == $page) {
            $next_page = '';
        }

        $data = Events::where('top_events', 1)
                ->orderBy('id', 'ASC')
                ->skip(round($start_from))->take($limit)
                ->get();
        if (!empty($data)) {
            $response['status'] = true;
            $response['total_pages'] = $count;
            $response['current_page'] = (int) $page;
            $response['next_page'] = $next_page;
            $response['message'] = 'Top events list';
            $response['top_events_data'] = $data;
        } else {
            $response['status'] = false;
            $response['message'] = 'Top events not found';
        }
        return $response;
    }

    public function getUpcomingEvents(Request $request) {
        $response = array();
        $time = time();

        $page = 1;
        $page = $request->input('page');

        $limit = 15;
        $start_from = ($page - 1) * $limit;

        if ($count = Events::where('start_date', '>', $time)->count()) {
            $max = $count / $limit;

            if ((int) $max == $max) {
                $max;
            } else {
                if (round($max) < $max) {
                    $max = round($max) + 1;
                } else {
                    $max;
                }
            }
        }
        $next_page = '';
        if ($max >= $page) {
            $next_page = $page + 1;
        }
        if ($max == $page) {
            $next_page = '';
        }

        $data = Events::where('start_date', '>', $time)
                ->orderBy('id', 'ASC')
                ->skip(round($start_from))->take($limit)
                ->get();
        if (!empty($data)) {
            $response['status'] = true;
            $response['total_pages'] = $count;
            $response['current_page'] = (int) $page;
            $response['next_page'] = $next_page;
            $response['message'] = 'Upcoming events list';
            $response['top_events_data'] = $data;
        } else {
            $response['status'] = false;
            $response['message'] = 'Upcoming events not found';
        }
        return $response;
    }

    public function getPopularEvents(Request $request) {
        $response = array();

        $page = 1;
        $page = $request->input('page');

        $limit = 15;
        $start_from = ($page - 1) * $limit;

        if ($count = Events::where('popular', 1)->count()) {
            $max = $count / $limit;

            if ((int) $max == $max) {
                $max;
            } else {
                if (round($max) < $max) {
                    $max = round($max) + 1;
                } else {
                    $max;
                }
            }
        }
        $next_page = '';
        if ($max >= $page) {
            $next_page = $page + 1;
        }
        if ($max == $page) {
            $next_page = '';
        }


        $data = Events::where('popular', 1)
                ->orderBy('id', 'ASC')
                ->skip(round($start_from))->take($limit)
                ->get();
        if (!empty($data)) {
            $response['status'] = true;
            $response['total_pages'] = $count;
            $response['current_page'] = (int) $page;
            $response['next_page'] = $next_page;
            $response['message'] = 'Popular events list';
            $response['top_events_data'] = $data;
        } else {
            $response['status'] = false;
            $response['message'] = 'Popular events not found';
        }
        return $response;
    }

    public function getSingleEvent(Request $request) {
        $response = array();
        $id = $request->input('event_id');
        $data = Events::where('id', $id)->first();
        if (!empty($data)) {
            $response['status'] = true;
            $response['message'] = 'Event Detail';
            $response['top_events_data'] = $data;
        } else {
            $response['status'] = false;
            $response['message'] = 'Event Not Found';
        }
        return $response;
    }

    public function searchEvent(Request $request) {
        $data = array();
        $sql = 'SELECT * FROM events WHERE 1=1';
        if ($request->has('category_id')) {
            $category = $request->category_id;
            $sql.=' OR category_id =' . $category;
        } else {
            $category = '';
        }

        if ($request->has('title')) {
            $title = $request->title;
            $sql.=' OR title LIKE  "%' . $title . '%"';
        } else {
            $title = '';
        }

        if ($request->has('venue_lat')) {
            $venue_lat = $request->venue_lat;
            $sql.=' OR latitude LIKE  "%' . $venue_lat . '%"';
        } else {
            $venue_lat = '';
        }

        if ($request->has('venue_lng')) {
            $venue_lng = $request->venue_lng;
            $sql.=' OR longtitude LIKE  "%' . $venue_lng . '%"';
        } else {
            $venue_lng = '';
        }

        if ($request->has('sort_by')) {
            $sort_by = $request->sort_by;
            // $sql.=' OR longtitude LIKE  "%'.$venue_lng.'%"';
        } else {
            $sort_by = '';
        }

        if ($request->has('date_from')) {
            $date_from = $request->date_from;
            $sql.='WHERE start_date >  ' . $date_from . '';
        } else {
            $date_from = '';
        }

        if ($request->has('date_to')) {
            $date_to = $request->date_to;
            $sql.='WHERE end_date <  ' . $date_to . '';
        } else {
            $date_to = '';
        }
        $data = DB::select($sql);
        return $data;
    }

    public function create() {
        return view('event.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'title' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
            'category_id' => 'required',
            'latitude' => 'required',
            'longtitude' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'venue' => 'required',
        ]);
        if ($request->has('popular')) {
            $popular = 1;
        } else {
            $popular = 0;
        }
        if ($request->has('top_events')) {
            $top = 1;
        } else {
            $top = 0;
        }
        if (Input::hasFile('image')) {
            $mediaName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'), $mediaName);
        } else {
            $mediaName = '';
        }

        if ($request->has('occasions')) {
            $occasions = 2;
        } else {
            $occasions = 1;
        }

        $data = array(
            'title' => $request->input('title'),
            'short_description' => $request->input('short_description'),
            'description' => $request->input('description'),
            'image' => $mediaName,
            'category_id' => $request->input('category_id'),
            'latitude' => $request->input('latitude'),
            'longtitude' => $request->input('longtitude'),
            'start_date' => strtotime($request->input('start_date')),
            'end_date' => strtotime($request->input('end_date')),
            'venue' => $request->input('venue'),
            'popular' => $popular,
            'top_events' => $top,
            'organized_name' => $request->input('organized_name'),
            'address' => $request->input('address'),
            'city' => $request->input('city'),
            'state' => $request->input('state'),
            'contact_number' => $request->input('contact_number'),
            'email' => $request->input('email'),
            'website_url' => $request->input('website_url'),
            "event_type" => $occasions
        );
        if (Session::get("admintype") == "advertiser") {
            $data['event_owner'] = \Auth::user()->user_id;
            $data['event_status'] = 2;
        }

        if (Events::create($data)) {
            Session::flash('type', 'true');
            Session::flash('message', 'New Event Created');
            return redirect('admin/show-all-events');
        } else {
            Session::flash('type', 'false');
            Session::flash('message', 'Unable to create event');
            return redirect('admin/show-all-events');
        }
    }

    public function showAll() {
        if (session("admintype") == "advertiser") {
            $all_events = Events::orderBy('id', 'DESC')->where('event_owner', \Auth::user()->user_id)->get();
        } else {
            $all_events = Events::orderBy('id', 'DESC')->get();
        }
        return view('event.show')->with('data', $all_events);
    }

    public function delete($id) {
        if (Events::where('id', $id)->delete()) {
            Session::flash('type', 'true');
            Session::flash('message', 'Event Deleted');
            return redirect('admin/show-all-events');
        } else {
            Session::flash('type', 'false');
            Session::flash('message', 'Unable to delete event');
            return redirect('admin/show-all-events');
        }
    }

    public function edit($id) {
        $events = Events::where('id', $id)->first();
        return view('event.edit')->with('data', $events);
    }

    public function update(Request $request) {
        $this->validate($request, [
            'title' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'category_id' => 'required',
            'latitude' => 'required',
            'longtitude' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'venue' => 'required',
        ]);
        if ($request->has('popular')) {
            $popular = 1;
        } else {
            $popular = 0;
        }
        if ($request->has('top_events')) {
            $top = 1;
        } else {
            $top = 0;
        }
        if (Input::hasFile('image')) {
            $mediaName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'), $mediaName);
        } else {
            $mediaName = $request->input('old_image');
        }

        if ($request->has('occasions')) {
            $occasions = 2;
        } else {
            $occasions = 1;
        }

        $data = array(
            'title' => $request->input('title'),
            'short_description' => $request->input('short_description'),
            'description' => $request->input('description'),
            'image' => $mediaName,
            'category_id' => $request->input('category_id'),
            'latitude' => $request->input('latitude'),
            'longtitude' => $request->input('longtitude'),
            'start_date' => strtotime($request->input('start_date')),
            'end_date' => strtotime($request->input('end_date')),
            'venue' => $request->input('venue'),
            'popular' => $popular,
            'top_events' => $top,
            'organized_name' => $request->input('organized_name'),
            'address' => $request->input('address'),
            'city' => $request->input('city'),
            'state' => $request->input('state'),
            'contact_number' => $request->input('contact_number'),
            'email' => $request->input('email'),
            'website_url' => $request->input('website_url'),
            "event_type" => $occasions
        );
        $id = $request->input('id');
        if (Events::where('id', $id)->update($data)) {
            Session::flash('type', 'true');
            Session::flash('message', 'Event Updated');
            return redirect('admin/show-all-events');
        } else {
            Session::flash('type', 'false');
            Session::flash('message', 'Unable to updated event');
            return redirect('admin/show-all-events');
        }
    }

    public function approve($id) {
        if (session("admintype") == "admin") {
            $data = array(
                "event_status" => 1
            );
            if (Events::where('id', $id)->update($data)) {
                Session::flash('type', 'true');
                Session::flash('message', 'Event Approved Updated');
                return redirect('admin/show-all-events');
            } else {
                Session::flash('type', 'false');
                Session::flash('message', 'Unable to approve event');
                return redirect('admin/show-all-events');
            }
        }

        return redirect('admin/show-all-events');
    }

    public function searchEventWeb(Request $request) {
        $data = array();
        $sql = 'SELECT * FROM events WHERE 1=1';
        if (!empty($request->get('c'))) {
            $category = $request->c;
            $sql.=' AND category_id =' . $category;
        } else {
            $category = '';
        }

        if (!empty($request->get('q'))) {
            $title = $request->q;
            $sql.=' AND title LIKE  "%' . $title . '%"';
        } else {
            $title = '';
        }

        if (!empty($request->get('sq'))) {
            $date_from = $request->sd;
            $sql.='AND start_date >  ' . $date_from . '';
        } else {
            $date_from = '';
        }

        if (!empty($request->get('ed'))) {
            $date_to = $request->ed;
            $sql.='AND end_date <  ' . $date_to . '';
        } else {
            $date_to = '';
        }
        $data = DB::select($sql);
        
        $user_id = \Session::get('U_ID');
        foreach ($data as &$d) {
            $category = Category::find($d->category_id);
            $d->category_name = $category['name'];

            if (!empty($user_id)) {
                $is_liked = Eventslike::where('user_id', $user_id)->where('event_id', $d->id)->first();
                if (!empty($is_liked)) {
                    $d->flag = 2; //If like
                } else {
                    $d->flag = 1; //If not like
                }
            } else {
                $d->flag = 1; //if user not logged in then default like option
            }
        }

        return view("home.eventsearch", ['events' => $data]);
    }

}
