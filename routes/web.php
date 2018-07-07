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





/*
Diubah, nanti diganti lagi jadi baris ke 28
Route::get('/', function () {
    $posts = DB::table('posts')
    ->leftJoin('profiles','profiles.user_id','posts.user_id')
    ->leftJoin('users','posts.user_id','users.id')
    ->orderBy('posts.created_at','desc')->take(2)
    ->get();
    return view('welcome', compact('posts'));
});
*/

Route::get('/', 'PostsController@read');

Route::post('addPost','PostsController@addPost');

Route::post('/','PostsController@addPost')->name('store');

Route::get('/test', function () {
    return Auth::user()->test();
});

Auth::routes();

  Route::group(['middleware' => 'auth'], function(){
  Route::get('/home', 'HomeController@index')->name('home');
  Route::get('/profile/{slug}','ProfileController@index');
  Route::get('/changePhoto',function(){
    return view('profile.pic');
  });
// -- PROFIL --
  Route::post('/uploadPhoto','ProfileController@uploadPhoto');

  Route::get('editProfile', 'ProfileController@editProfileForm');
  Route::post('/updateProfile','ProfileController@updateProfile');

// --PERTEMANAN
  Route::get('/findFriends', 'ProfileController@findFriends');

  Route::get('/addFriend/{id}','ProfileController@sendRequest');

  Route::get('/requests', 'ProfileController@requests');

  Route::get('/accept/{name}/{id}', 'ProfileController@accept');

  Route::get('friends', 'ProfileController@friends');

  Route::get('requestRemove/{id}', 'ProfileController@requestRemove');

  Route::get('/notifications/{id}', 'ProfileController@notifications');

  Route::get('/unfriend/{id}', function($id){
      $loggedUser = Auth::user()->id;

      DB::table('friendships')
        ->where('requester', $loggedUser)
        ->where('user_requested',$id)
        ->delete();

      return back()->with('msg','Kamu sudah tidak berteman dengan dia');
  });

  //like Post
  // Route:get('/likePost/{id}', 'PostsController@like');

});

Route::get('/campaign', 'CampaignController@index')->name('campaign.index');
Route::get('/campaign/create', 'CampaignController@create')->name('create');
Route::post('/campaign/create', 'CampaignController@store')->name('store');
//Route::get('/post/{id}', 'CampaignController@show')->name('show');

Route::get('posts','HomeController@index');
Route::get('/logout', 'Auth\LoginController@logout');
