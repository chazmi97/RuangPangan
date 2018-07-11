<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{
    public function show($id){

        $uid = Auth::user()->id;
        $notes = DB::table('notifcations')
                ->leftJoin('users', 'users.id', 'notifcations.user_logged')
                ->where('notifcations.id', $id)
                ->where('user_hero', Auth::user()->id)
                ->orderBy('notifcations.created_at', 'desc')
                ->get();
        
        $updateNoti = DB::table('notifcations')
          ->where('notifcations.id', $id)
          ->update(['status' => 0]);
        
        return view('profile.notifcations', compact('notes'));
      }
/*
      public function campaignDelete(){

      }
*/
}
