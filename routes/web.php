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
Route::get('/tes', function(){
  $noti = DB::table('notifcations')
    ->where('user_logged', Auth::user()->id)
    ->get();
    dd($noti);
});


Route::get('/count', function(){
  $count = App\notifcations::where('status',1)
  ->where('user_hero', Auth::user()->id)
  ->count();

  echo $count;
});
*/


Route::get('/', function () {
    return view('welcome');
});


Route::get('/test', function () {
    return Auth::user()->test();
});


//
// Route::get('/findFriends', function(){
//   $uid = Auth::user()->id;
//   $allUsers = DB::table('users')->where('id','!=',$uid)->get();
//
//   foreach ($allUsers as $u) {
//     echo $u->name;
//     echo "<br>";
//   }
//
// });



Auth::routes();


Route::group(['middleware' => 'auth'], function(){
  Route::get('/home', 'HomeController@index')->name('home');
  Route::get('/profile/{slug}','ProfileController@index');
  Route::get('/changePhoto',function(){
    return view('profile.pic');
  });

  Route::post('/uploadPhoto','ProfileController@uploadPhoto');

  Route::get('editProfile', 'ProfileController@editProfileForm');
  Route::post('/updateProfile','ProfileController@updateProfile');

  Route::get('/findFriends', 'ProfileController@findFriends');

  Route::get('/addFriend/{id}','ProfileController@sendRequest');
      //

  Route::get('/requests', 'ProfileController@requests');


  Route::get('/accept/{name}/{id}', 'ProfileController@accept');

  Route::get('friends', 'ProfileController@friends');

  Route::get('requestRemove/{id}', 'ProfileController@requestRemove');

  Route::get('/notifications/{id}', 'ProfileController@notifications');

});
Route::get('/logout', 'Auth\LoginController@logout');
