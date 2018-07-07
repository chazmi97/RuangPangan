<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Campaign;

class CampaignController extends Controller
{
    public function index(){
        $campaign = DB::table('campaigns')->get();
        return view('campaign.index', compact('campaign'));
    }
    public function create(){
        return view('/campaign/create');

    }

    public function store(){
        $campaign = DB::table('campaigns')->insert([
            'user_id'=>Auth::user()->id,
            'title'=>request('title'),
            'content'=>request('content'),
            'target'=>request('target'),
            'deadline'=>request('deadline'),
            'created_at'=>date("Y-m-d H:i:s"),
            'updated_at'=>date("Y-m-d H:i:s")
        ]);

        return redirect('/campaign');
    }
/*
    public function show($id){
        $campaign = DB::table('campaigns')->get();
        return view('campaign.index', compact('campaign'));
    }
*/
}
