<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index($slug){
      return view('profile.index')->with('data',Auth::user()->profile);

    }

public function uploadPhoto(Request $request){
 $file = $request->file('pic');

 $filename = $file->getClientOriginalName();

 $path = 'public/img';

 $file->move($path, $filename);
 $user_id = Auth::user()->id;

 DB::table('users')->where('id',$user_id)->update(['pic' =>$filename]);
// redirect('/profile');
// return view(profile.index);
//  dd($request->all());
return back();
}

    public function editProfileForm(){
      return view('profile.editProfile')->with('data',Auth::user()->profile);

    }

    public function updateProfile(Request $request){
      //dd($request->all());
      //
      $user_id = Auth::user()->id;

      DB::table('profiles') -> where('user_id', $user_id)->update($request->except('_token'));
      return back();

    }

    public function findFriends(){

        $uid = Auth::user()->id;
        $allUsers = DB::table('profiles')->leftJoin('users', 'users.id','=','profiles.user_id')->where('users.id','!=',$uid)->get();

        return view('profile.findFriends',compact('allUsers'));
    }

    public function sendRequest($id){
      // echo $id;
        return Auth::user()->addFriend($id);
    }


}
