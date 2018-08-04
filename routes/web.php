<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout','Auth\AdminLoginController@logout')->name('admin.logout');
    
    Route::get('/create-category', 'CategoryController@create')->name('category');
    Route::post('/store-category', 'CategoryController@store')->name('category');
    Route::get('/show-all-categories', 'CategoryController@showAll')->name('category');
    
    Route::get('/category-edit/{id}', 'CategoryController@edit')->name('category');
    Route::post('/update-category', 'CategoryController@update')->name('category');
    Route::get('/category-delete/{id}', 'CategoryController@delete')->name('category');
    
    
    Route::get('/create-event', 'EventsController@create')->name('event');
    Route::post('/store-event', 'EventsController@store')->name('event');
    
    Route::get('/show-all-events', 'EventsController@showAll')->name('event');
    
    Route::get('/event-edit/{id}', 'EventsController@edit')->name('event');
    Route::post('/update-event', 'EventsController@update')->name('event');
    
    Route::get('/event-delete/{id}', 'EventsController@delete')->name('event');
    
    Route::get('/my-profile','UserController@myProfile')->name('profile');
    Route::post('/update-profile', 'UserController@editProfile')->name('profile');
    
    Route::get('/show-all-users','UserController@allUsers')->name('user');
    Route::get('/show-all-advertisers','UserController@allAdvertisers')->name('user');
    Route::get('/create-user','UserController@createUser')->name('user');
    Route::get('/edit-user/{id}','UserController@editUser')->name('user');
    Route::get('/delete-user/{id}','UserController@deleteUser')->name('user');
    Route::get('/action-advertiser/{id}/{status}','UserController@actionAdvertiser')->name('action_adv_admin');

    
    Route::get('/approve-event/{id}', 'EventsController@approve')->name('approve-event');
    
    Route::get('/cms-pages', 'CmsController@index')->name('cms-pages');
    Route::post('/cms-pages', 'CmsController@update')->name('cms-pages-update');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/events/all', 'HomeController@eventsAll')->name('events.all');
Route::get('/events/top', 'HomeController@eventsTop')->name('events.top');
Route::get('/event/detail/{id}', 'HomeController@eventDetail')->name('events.detail');
Route::get('/event/favorite', 'HomeController@eventFavorite')->name('web_event.favorite');

Route::get("/event_fav/{id}",'MyaccountController@event_fav')->name("event_fav");
Route::get("/event_unfav/{id}",'MyaccountController@event_unfav')->name("event_unfav");
Route::get("/favourites",'MyaccountController@favourites')->name("favourites");
Route::get("/account",'MyaccountController@account')->name("account");
Route::post("/account",'MyaccountController@account_post')->name("account_post");
Route::get("/change-password",'MyaccountController@changepassword')->name("change-password");
Route::post("/change-password",'MyaccountController@changepassword_post')->name("change-password_post");
Route::get("/manage-categories",'MyaccountController@managecategories')->name("manage-categories");
Route::get("/deletecategory/{id}",'MyaccountController@deletecategory')->name("deletecategory");
Route::post("/manage-categories",'MyaccountController@managecategories_post')->name("manage-categories_post");

Route::post('/webuser/registration', 'WebuserController@registration')->name('user.registration');
Route::post('/webuser/login', 'WebuserController@login')->name('user.login');
Route::post('/webuser/ajaxlogin', 'WebuserController@ajaxlogin')->name('user.ajaxlogin');

Route::get('/advertiser', 'AdvertiserController@adv_list')->name('advlist');
Route::get('/contactus', 'ContactusController@index')->name('contactus');
Route::get('/aboutus', 'ContactusController@aboutus')->name('aboutus');
Route::get('/privacy', 'ContactusController@privacy')->name('privacy');
Route::get('/terms', 'ContactusController@terms')->name('terms');
Route::get('/occations', 'HomeController@occations')->name('occations');

Route::get('/search', 'EventsController@searchEventWeb')->name('search');

Route::any('/venue', 'VenueController@index')->name('venue_index');
Route::any('/venue/detail/{id}', 'VenueController@detail')->name('venue.detail');
