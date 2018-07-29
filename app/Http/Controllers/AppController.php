<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cms;
use App\Contact;
use Illuminate\Support\Facades\DB;
use Mail;

class AppController extends Controller
{
    public function getAbout()
    {
        $response = array();
        $data = Cms::where('page','about')->first();
        if(!empty($data))
        {
            $response['status'] = true;
            $response['message'] = 'about_us_data';
            $response['about_us_data'] = $data;
        }
        else
        {
            $response['status'] = false;
            $response['message'] = 'about us data not found';
        }
        return $response;
    }
    public function getTerms()
    {
        $response = array();
        $data = Cms::where('page','terms')->first();
        if(!empty($data))
        {
            $response['status'] = true;
            $response['message'] = 'terms and conditions data';
            $response['terms_and_conditions'] = $data;
        }
        else
        {
            $response['status'] = false;
            $response['message'] = 'terms and conditions data not found';
        }
        return $response;
    }
    public function contactUs(Request $request)
    {
        $response = array();
        if ($request->has('user_id')) {
            $user_id = $request->user_id;
        } else {
            $user_id = '';
        }
        $firstname = $request->firstname;
        $lastname = $request->lastname;
        $email = $request->email;
        $message = $request->message;
        $data = array(
            'user_id' => $user_id,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'message' => $message,
        );
        if (Contact::create($data))
        {
            Mail::send('email.contact', ['data' => $data], function ($m) use ($data) {
                $m->from('info@projectdemo.org', 'BuzzPNG');
                $m->to('rahil.pelicans@gmail.com', 'Contact')->subject('Contact email');
            });
            $response['status'] = true;
            $response['message'] = 'Message sent successfully';
        }
        else
        {
            $response['status'] = false;
            $response['message'] = 'Message not sent';
        }
        return $response;
    }
}
