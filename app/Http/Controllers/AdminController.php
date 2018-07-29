<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;
use Auth;
use Hash;
use Validator;
use Session;

use App\Admin;
use App\User;
use App\Booking;
use App\Faq;
use App\GuestUsers;
use App\Notification;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = admin::All();
        return view('admin.index', array('admin'=>$admin));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $admin = new Admin();
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        $admin->password = Hash::make($request->input('password'));
        $admin->remember_token = 'sadhflks';
        $admin->role = $request->input('role');

        if($admin->save())
        {
            Session::flash('type', true);
            Session::flash('message', "New admin added, successfully!");
        }
        else
        {
            Session::flash('type', false);
            Session::flash('message', "Some problem in add admin, please try after some time!");
        }

        return redirect("/admin/admin");    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Price $price)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::find($id);
        return view('admin.edit', array('admin'=>$admin));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $admin = Admin::find($request->input('id'));
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        $admin->role = $request->input('role');

        if($admin->save())
        {
            Session::flash('type', true);
            Session::flash('message', "Admin updated, successfully!");
        }
        else
        {
            Session::flash('type', false);
            Session::flash('message', "Some problem in update admin, please try after some time!");
        }
        return redirect("/admin/admin");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Admin::find($id);
        
        if($admin->delete())
        {
            Session::flash('type', true);
            Session::flash('message', "Admin deleted, successfully!");
        }
        else
        {
            Session::flash('type', false);
            Session::flash('message', "Some problem in delete admin, please try after some time!");
        }
        return redirect("/admin/admin");
    }
}