<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Post $post)
    //Postメソッドを使用するためにPostをかく
    {
        // return view('posts/index')->with(['posts' => $post->get()]);
        
        // return view('posts/index')->with(['posts' => $post->getByLimit()]);
        
        return view('posts/index')->with(['posts' => $post->getPaginateByLimit()]);
    }
}
?>

