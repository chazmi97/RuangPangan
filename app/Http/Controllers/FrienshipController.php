<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\friendships;
use App\notifcations; 
use App\User;

class FrienshipController extends Controller
{
    public function findFriends(){
        $uid = Auth::user()->id;
        $allUsers = DB::table('profiles')
        ->leftJoin('users', 'users.id','=','profiles.user_id')
        ->where('users.id','!=',$uid)->get();

        return view('profile.findFriends',compact('allUsers'));
    }

    public function sendRequest($id){
        Auth::user()->addFriend($id);
        return back();
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
          $notifcations -> note = 'Permintaan pertemanan';
          $notifcations -> user_hero = $id; //yang accept my request
          $notifcations -> user_logged = Auth::user()->id; //saya
          $notifcations -> status = '1'; // unread notifcation
          $notifcations -> save();


           if($notifcations){
               return back()->with('msg', 'Sekarang telah Berteman dengan.'. $name);
          
           }

        } else{
          return back()->with('msg', 'Sekarang telah Berteman dengan user ini.');
          
        }

    }

    public function friends(){
     $uid = Auth::user()->id;

      $friends1 = DB::table('friendships') //yang request
        ->leftJoin('users', 'users.id', 'friendships.user_requested') //ini yang tidak login tetapi send request
        ->where('status', 1)
        ->where('requester', $uid) // ini yang login
        ->get();

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

    public function unfriend($id){
        $loggedUser = Auth::user()->id;

        DB::table('friendships')
          ->where('requester', $loggedUser)
          ->where('user_requested',$id)
          ->delete();

        return back()->with('msg','Kamu sudah tidak berteman dengan dia');
    }
}
