<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::post('/login', 'UserController@login');
    Route::post('/registration', 'UserController@registration');
    Route::post('/forgotpassword', 'UserController@forgotPassword');
    Route::post('/updateprofile', 'UserController@updateProfile');
    Route::post('/changepassword', 'UserController@changePassword');
    Route::post('/userdetails', 'UserController@userDetails');
    Route::post('/logout', 'UserController@logout');
    
    Route::get('/faq', 'FaqController@getFaq');

    Route::post('/category-list', 'CategoryController@listCategory');
    Route::post('/set-category', 'CategoryController@setCategory');

    Route::get('/get-about-us','AppController@getAbout');
    Route::get('/get-terms-and-conditions','AppController@getTerms');
    Route::post('/contact-us','AppController@contactUs');

    Route::post('/get-top-events','EventsController@topEvents');
    Route::post('/get-upcoming-events','EventsController@getUpcomingEvents');
    Route::post('/get-popular-events','EventsController@getPopularEvents');
    Route::post('/event-detail','EventsController@getSingleEvent');
    Route::post('/event-search','EventsController@searchEvent');

});
