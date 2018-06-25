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
        $allUsers = DB::table('profiles')
        ->leftJoin('users', 'users.id','=','profiles.user_id')
        ->where('users.id','!=',$uid)->get();

        return view('profile.findFriends',compact('allUsers'));
    }

    public function sendRequest($id){
       // echo $id;
        Auth::user()->addFriend($id);
        return back();
        // DB::table('friendships')->insert([
        //     'requester' => ,
        //     'user_requested' => ,
        //     'status' =>,
        //     'created_at' =>,
        //     'updated_at' =>
        // ]);
    }

    public function requests(){
      $uid = Auth::user()->id;

      $FriendRequests = DB::table('friendships')
          ->rightJoin('users', 'users.id', '=', 'friendships.requester')
          ->where('status', '=', Null)
          ->where('friendships.user_requested', '=', $uid) ->get();


      return view('profile.requests', compact('FriendRequests'));

    }


    public function accept($name,$id)
    {
        // echo $id;
        // die();
        //
      $uid = Auth::user()->id;
      $checkRequest = friendships::where('requester', $id)
        ->where('user_requested', $uid)
        ->first();

      if ($checkRequest) {
        //echo "asem";

        $updateFriendship =  DB::table('friendships')
          ->where('user_requested', $uid)
          ->where('requester', $id)
          ->update(['status' => 1]);

          $notifcations = new notifcations;
          $notifcations -> note = 'permintaanTeman';
          $notifcations -> user_hero = $id; //yang accept my request
          $notifcations -> user_logged = Auth::user()->id; //saya
          $notifcations -> status = '1'; // unread notifcation
          $notifcations -> save();


           if($notifcations){
               return back()->with('msg', 'Sekarang telah Berteman dengan.'. $name);
          //
           }

        } else{
          return back()->with('msg', 'Sekarang telah Berteman dengan user ini.');
          //
          // echo "pait";
        }

    }


    public function friends(){
     $uid = Auth::user()->id;

      $friends1 = DB::table('friendships') //yang request
        ->leftJoin('users', 'users.id', 'friendships.user_requested') //ini yang tidak login tetapi send request
        ->where('status', 1)
        ->where('requester', $uid) // ini yang login
        ->get();


    //    dd($friends1);


      $friends2 = DB::table('friendships')  // saya mengirim request ke user
        ->leftJoin('users', 'users.id', 'friendships.requester')
        ->where('status', 1)
        ->where('user_requested', $uid)
        ->get();

      //  dd($friends2);
      $friends = array_merge($friends1->toArray(),$friends2->toArray());
      //dd($friends);

      return view('profile.friends', compact('friends'));
    }


    public function requestRemove($id){

      DB::table('friendships')
        ->where('user_requested', Auth::user()->id)
        ->where('requester', $id)
        ->delete();

        return back()->with('msg', 'PermintaanTeman Telah dihapus.');

    }

    public function notifications(){

      $uid = Auth::user()->id;
      $notes = DB::table('notifcations')
              ->leftJoin('users', 'users.id', 'notifcations.user_logged')
              ->where('notifcations.id', $id)
              ->where('user_hero', Auth::user()->id)
              ->orderBy('notifcations.created_at', 'desc')
              ->get();
      //
      $updateNoti = DB::table('notifcations')
        ->where('notifcations.id', $id)
        ->update(['status' => 0]);
      //dd($notes);
      //
      return view('profile.notifcations', compact('notes'));
    }

}
