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


Auth::routes();

  Route::group(['middleware' => 'auth'], function(){
    //  -- MIDDLEWARE START --
    //  -- USER ROUTE --  //
    Route::get('/home', 'HomeController@index')->name('home');

    // -- POST --
    Route::get('/', 'PostsController@read');

    Route::post('addPost','PostsController@addPost');

    Route::post('/','PostsController@addPost')->name('store');

    // Route:get('/likePost/{id}', 'PostsController@like');
    
    // -- PROFIL --
    Route::get('/profile/{slug}','ProfileController@index');

    Route::get('/changePhoto',function(){
      return view('profile.pic');
      });
  
    Route::post('/uploadPhoto','ProfileController@uploadPhoto');

    Route::get('editProfile', 'ProfileController@editProfileForm');

    Route::post('/updateProfile','ProfileController@updateProfile');

  // --PERTEMANAN --
    Route::get('/findFriends', 'FrienshipController@findFriends');

    Route::get('/addFriend/{id}','FrienshipController@sendRequest');

    Route::get('/requests', 'FrienshipController@requests');

    Route::get('/accept/{name}/{id}', 'FrienshipController@accept');

    Route::get('friends', 'FrienshipController@friends');

    Route::get('requestRemove/{id}', 'FrienshipController@requestRemove');

    Route::get('/unfriend/{id}', 'FrienshipController@unfriend');

    // -- NOTIFICATION --
    Route::get('/notifications/{id}', 'NotificationController@show');

    // -- CAMPAIGN
    Route::get('/campaign', 'CampaignController@index')->name('campaign.index');
    
    Route::get('/campaign/create', 'CampaignController@create')->name('create');
    
    Route::post('/campaign/create', 'CampaignController@store')->name('campaign.store');

    //  --ADMIN ROUTE --  //
    Route::delete('/home/{id}', 'AdminController@decline')->name('campaign.decline');
    Route::post('/home/{id}', 'AdminController@approve')->name('campaign.approve');
    Route::get('/home/{id}', 'AdminController@show')->name('admin.show');
    
    // -- MIDDLEWARE END --

});


// Route::get('/campaign/{id}', 'CampaignController@show')->name('campaign.show');



Route::get('posts','HomeController@index');
Route::get('/logout', 'Auth\LoginController@logout');
