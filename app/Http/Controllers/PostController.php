<?php
//MVCモデルのCの部分

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Post;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function index(Post $post)
    //Post.phpを使用するためにPostをかく
    {
        $posts = DB::table('posts')->get();
        // return view('posts/index')->with(['posts' => $post->get()]);
        
        // return view('posts/index')->with(['posts' => $post->getByLimit()]);
        
        return view('posts/index')->with(['posts' => $post->getPaginateByLimit(10)]);//with(['posts'~ のpostsはindex.blade.phpの$postsと連携している。それはposts => $postsとして割り当てているから。
    }
    
    // public function show(Post $post) {
    //     return view('posts/show')->with('posts' => $post);
    // }
    
    public function show(Post $post)
    {
        return view('posts/show')->with(['post' => $post]);//ここで$post->get()としてしまうとせっかく$postで撮ったidの意味がなくなる
    }
    
    public function create(Category $category) //Category.phpのモデルを使用するよという意味
    {
        return view('posts/create')->with(['categories' => $category->get()]);
    }
    
    // public function store(Request $request) {
    //     $createPost = new App\Post;
    //     $createPost->title = $request->title;
    //     $createPost->body = $request->body;
    //     $createPost->save();
    //     return redirect('/posts');
        
    // }
    
    public function store(PostRequest $request, Post $post)
    {
        $input = $request['post'];
        //['post']の中はpost.titleとpost.body
        //$requestのキー['post']は、HTMLのFormタグ内で定義した各入力項目のname属性と一致する
        $post->fill($input)->save();//$inputを全て保存
        return redirect('/posts/' . $post->id);// /posts/{post}をリダイレクト
    }
    
    public function edit(Post $post) {
        return view('posts/edit')->with(['post' => $post]);//'post'はedit.blade.phpの$postのことである。これをedit()の引数の$postにいれている。
    }
    
    public function update(PostRequest $request, Post $post) {
        $input_post = $request['post'];
        $post->fill($input_post)->save();
        return redirect('/posts/' . $post->id);
    }
}
?>

