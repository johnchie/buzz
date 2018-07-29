<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;
use Auth;
use Hash;
use Validator;

use App\User;
use App\Booking;
use App\Faq;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getFaq()
    {
        $faq = Faq::All();
        
        $response['status'] = true;
        $response['message'] = 'Successfully get faq list.';
        $response['faq_data'] = $faq;
        
        return response()->json($response);
    }
}
