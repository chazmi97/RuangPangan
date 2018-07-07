<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\post;
use App\User;
use App\Like;

class PostsController extends Controller
{
    public function index(){
        $posts = DB::table('posts')->get();

        return view('posts', compact('posts'));
    }

    public function read(){
        $posts = DB::table('posts')
        ->leftJoin('profiles','profiles.user_id','posts.user_id')
        ->leftJoin('users','posts.user_id','users.id')
        ->orderBy('posts.created_at','desc')->take(2)
        ->get();
        
        return view('welcome', compact('posts'));
    }

    public function addPost(Request $request){

        $content = $request->content;
        $createPost = DB::table('posts')
        ->insert(['content' =>$content, 
        'user_id'=>Auth::user()->id,
        'status'=>0,
        'created_at'=>date("Y-m-d H:i:s"),
        'updated_at'=>date("Y-m-d H:i:s")]);

        return redirect('/');
    }

/*
    // fungsi like, jangan dihapus
    public function like(){
        $likePost=DB::table('likes')->insert([
            'posts_id'=>$id,
            'user_id'=>Auth::user()->id,
            'created_at'=>date("Y-m-d H:i:s"),
            'updated_at'=>date("Y-m-d H:i:s")
        ]);

        return redirect('/');
        
    }

    public function message(){
        
    }

*/  
        /*if($createdPost){
            $posts_json = DB::table('users')
            ->leftJoin('profiles','profiles.user_id','user.id')
            ->leftJoin('posts','posts.user_id','users.id')
            ->orderBy('posts.created_at','desc')->take(2)
            ->get();
            return $posts_json;
        }

        public function post(){
            return view(post);
        }

        public function store(){
            post::create([
                'content'=>request('content')
            ]);
        }
        */

        
    
}
