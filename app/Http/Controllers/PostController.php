<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Post $post)
    //Postメソッドを使用するためにPostをかく
    {
        $posts = DB::table('posts')->get();
        // return view('posts/index')->with(['posts' => $post->get()]);
        
        // return view('posts/index')->with(['posts' => $post->getByLimit()]);
        
        return view('posts/index', ['posts' => $posts])->with(['posts' => $post->getPaginateByLimit()]);//with(['posts'~ のpostsはindex.blade.phpの$postsと連携している。
    }
    
    // public function show(Post $post) {
    //     return view('posts/show')->with('posts' => $post);
    // }
    
    public function show(Post $post)
    {
        return view('posts/show')->with(['post' => $post]);//ここで$post->get()としてしまうとせっかく$postで撮ったidの意味がなくなる
    }
    
    
}
?>

