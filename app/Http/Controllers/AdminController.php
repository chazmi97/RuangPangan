<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Campaign;

class AdminController extends Controller
{
    public function approve($id){
        $accept = DB::table('campaigns')
          ->where('campaigns.id', $id)
          ->update(['status' => 1]);
        
        return redirect('/home');
    }

  
    public function decline($id){
        $campaign=Campaign::find($id);
        $campaign->delete();
        
        return redirect('/home');
    }

    public function show($id){
        $campaign=Campaign::find($id);
        return view('admin.show', compact('campaign'));
    }

    
}
