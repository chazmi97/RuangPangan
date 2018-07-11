<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\friendships;
use App\notifcations;
use App\User;

class ProfileController extends Controller
{
    public function index($slug){
      $userData = DB::table('users')
      ->leftJoin('profiles','profiles.user_id', 'users.id')
      ->where('slug', $slug)
      ->get();

      return view('profile.index', compact('userData'))->with('data',Auth::user()->profile);

    }

    public function uploadPhoto(Request $request){
      $file = $request->file('pic');
      $filename = $file->getClientOriginalName();
      $path = 'public/img';
      $file->move($path, $filename);
      $user_id = Auth::user()->id;

      DB::table('users')->where('id',$user_id)->update(['pic' =>$filename]);
      return back();
    }

    public function editProfileForm(){
      return view('profile.editProfile')->with('data',Auth::user()->profile);

    }
/*
    public function updateProfile(Request $request){
      $user_id = Auth::user()->id;
      DB::table('profiles') -> where('user_id', $user_id)->update($request->except('_token'));
      return back();

    }
*/
}
