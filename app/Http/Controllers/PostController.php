<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class PostController extends Controller
{
    public function index()
    {
      $posts = Post::latest()->paginate(env('PER_PAGE'));

      return view('post.index', compact('posts'));

    }


    public function create()
    {
      $categories = Category::all();

      return view('post.create', compact('categories'));
    }

    public function store()
    {
      $this->validate(request(),[
        'title' => 'required',
        'content' => 'required|min:10',
      ]);

      Post::create([
        'title' => request('title'),
        'slug' => str_slug(request('title')),
        'content' => request('content'),
        'category_id' => request('category_id')
      ]);

      return redirect()->route('post.index')->withSuccess('Post Ditambahkan.');
    }

    public function show(Post $post)
    {
      return view('post.show', compact('post'));

    }

    public function edit(Post $post)
    {
      //$post = Post::find($id);
      $categories = Category::all();

      return view('post.edit',compact('post','categories'));

    }

    public function update(Post $post)
    {
    //  $post = Post::find($id);
      $post ->update([
        'title' => request('title'),
        'category_id' =>request('category_id'),
        'content' =>request('content'),
      ]);

      return redirect()->route('post.index')->withInfo('Post Berhasil Dirubah.');

    }

    public function destroy(Post $post)
    {
      $post ->delete();
      return redirect() -> route('post.index')->withDanger('Post Berhasil Dihapus.');

    }

}
