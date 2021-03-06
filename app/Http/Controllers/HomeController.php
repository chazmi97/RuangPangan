<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')->get();
        $campaign = DB::table('campaigns')->where('status', '=', 0)->get();
        if(Auth::user()->admin == 0){
            return view('home', compact('users'));
        } else{
            return view('adminhome', compact('users', 'campaign'));
        }
    }
}
