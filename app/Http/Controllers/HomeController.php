<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Events;

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
        $eventsarray = array();
        $events = Events::All();
        foreach($events as $event){
            $category = Category::find($event->category_id);
            $event['category_name'] = $category['name'];
            $eventsarray[] = $event;    
        }
        
                   
        return view('home.index', array('events'=>$eventsarray));
    }
    
    public function eventsAll(){
        
        $categorys = Category::All();
        
        $eventsarray = array();
        $events = Events::where('event_type', 1)->where('event_status', 1)->get();
        foreach($events as $event){
            $category = Category::find($event->category_id);
            $event['category_name'] = $category['name'];
            $eventsarray[] = $event;    
        }
        
        return view('home.events', array('events'=>$eventsarray,'categorys'=>$categorys));
    }
    
    public function eventsTop(){
        $categorys = Category::All();
        
        $eventsarray = array();
        $events = Events::getTopEvents();
        foreach($events as $event){
            $category = Category::find($event->category_id);
            $event['category_name'] = $category['name'];
            $eventsarray[] = $event;    
        }
        
        return view('home.eventsTop', array('events'=>$eventsarray,'categorys'=>$categorys));   
    }
    
    public function eventDetail($id){
        $event = Events::find($id);
        return view('home.eventDetail', array('event'=>$event));  
    }
    
    public function occations(){
        
        $categorys = Category::All();
        
        $eventsarray = array();
        $events = Events::where('event_type', 2)->where('event_status', 1)->get();
        foreach($events as $event){
            $category = Category::find($event->category_id);
            $event['category_name'] = $category['name'];
            $eventsarray[] = $event;
        }
        
        return view('home.occations', array('events'=>$eventsarray,'categorys'=>$categorys));
    }
}
