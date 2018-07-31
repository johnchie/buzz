<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Events;
use App\Eventslike;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = \Session::get('U_ID');
        $eventsarray = array();
        $events = Events::All();
        foreach($events as $event){
            $category = Category::find($event->category_id);
            $event['category_name'] = $category['name'];
            
            if(!empty($user_id)){
                $is_liked = Eventslike::where('user_id', $user_id)->where('event_id',$event->id)->first();
                if(!empty($is_liked)){
                    $event['flag'] = 2; //If like
                }else{
                    $event['flag'] = 1; //If not like
                }
            }else{
                $event['flag'] = 1; //if user not logged in then default like option
            }
            
            $eventsarray[] = $event;    
        }
        
        return view('home.index', array('events'=>$eventsarray));
    }
    
    public function eventsAll(){
        $user_id = \Session::get('U_ID');
        $categorys = Category::All();
        
        $eventsarray = array();
        $events = Events::where('event_type', 1)->where('event_status', 1)->get();
        foreach($events as $event){
            $category = Category::find($event->category_id);
            $event['category_name'] = $category['name'];
            if(!empty($user_id)){
                $is_liked = Eventslike::where('user_id', $user_id)->where('event_id',$event->id)->first();
                if(!empty($is_liked)){
                    $event['flag'] = 2; //If like
                }else{
                    $event['flag'] = 1; //If not like
                }
            }else{
                $event['flag'] = 1; //if user not logged in then default like option
            }
            $eventsarray[] = $event;    
        }
        
        return view('home.events', array('events'=>$eventsarray,'categorys'=>$categorys));
    }
    
    public function eventsTop(){
        $user_id = \Session::get('U_ID');
        $categorys = Category::All();
        
        $eventsarray = array();
        $events = Events::getTopEvents();
        foreach($events as $event){
            $category = Category::find($event->category_id);
            $event['category_name'] = $category['name'];
            if(!empty($user_id)){
                $is_liked = Eventslike::where('user_id', $user_id)->where('event_id',$event->id)->first();
                if(!empty($is_liked)){
                    $event['flag'] = 2; //If like
                }else{
                    $event['flag'] = 1; //If not like
                }
            }else{
                $event['flag'] = 1; //if user not logged in then default like option
            }
            $eventsarray[] = $event;    
        }
        
        return view('home.eventsTop', array('events'=>$eventsarray,'categorys'=>$categorys));   
    }
    
    public function eventDetail($id){
        $user_id = \Session::get('U_ID');
        $event = Events::find($id);
        return view('home.eventDetail', array('event'=>$event));  
    }
    
    public function eventFavorite(Request $request){
        $user_id = \Session::get('U_ID');
        
        if(!empty($user_id)){
            if($request['flag'] == 1){ //favorite event
                $data = array(
                    'user_id' => $user_id,
                    'event_id' => $request['id']
                );
                $response['success'] = Eventslike::create($data);
            }else{ //unfavourite event
                $remove_flag = Eventslike::where("event_id", $request['id'])
                    ->where("user_id", $user_id)
                    ->delete();
                if ($remove_flag > 0) {
                    $response['success'] = true;
                } else {
                    $response['success'] = false;
                }
            }

            $response['mark'] = true; 
        }else{
            $response['mark'] = false;
        }
        
        return response()->json($response);
    }
    
    public function occations(){
        $user_id = \Session::get('U_ID');
        $categorys = Category::All();
        
        $eventsarray = array();
        $events = Events::where('event_type', 2)->where('event_status', 1)->get();
        foreach($events as $event){
            $category = Category::find($event->category_id);
            $event['category_name'] = $category['name'];
            if(!empty($user_id)){
                $is_liked = Eventslike::where('user_id', $user_id)->where('event_id',$event->id)->first();
                if(!empty($is_liked)){
                    $event['flag'] = 2; //If like
                }else{
                    $event['flag'] = 1; //If not like
                }
            }else{
                $event['flag'] = 1; //if user not logged in then default like option
            }
            $eventsarray[] = $event;
        }
        
        return view('home.occations', array('events'=>$eventsarray,'categorys'=>$categorys));
    }
}
