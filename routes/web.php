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
    Route::get('/create-user','UserController@createUser')->name('user');
    Route::get('/edit-user/{id}','UserController@editUser')->name('user');
    Route::get('/delete-user/{id}','UserController@deleteUser')->name('user');

});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/events/all', 'HomeController@eventsAll')->name('events.all');
Route::get('/events/top', 'HomeController@eventsTop')->name('events.top');
Route::get('/event/detail/{id}', 'HomeController@eventDetail')->name('events.detail');


Route::post('/user/registration', 'UserController@registration')->name('user.registration');
Route::post('/user/login', 'UserController@login')->name('user.login');
