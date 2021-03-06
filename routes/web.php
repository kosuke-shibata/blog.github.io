<?php
//MVCのCの部分

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => ['auth']], function(){
    Route::get('/posts/create', 'PostController@create');
    
    
    Route::get('/', 'PostController@index');
    
    
    Route::get('/posts/{post}', 'PostController@show');
    //{post} = $postのこと。/posts/1でやると$postに１が入る。
    //これがControllerクラスのshow()の引数の$postのなかに入る。
    //すると、'post'のなかに１が入り、show.blade.phpの$postのなかに１が入って画面にid=1のデータが表示される。
    
    
    Route::post('/posts', 'PostController@store');//create.blade.phpのformをPOSTで送っているため、::postの方の/posts/が送られる。
    
    Route::get('/posts/{post}/edit', 'PostController@edit');//{post} = $postのこと
    
    Route::put('/posts/{post}', 'PostController@update');
    
    Route::delete('/posts/{post}', 'PostController@destory');
    
    Route::get('/categories/{category}', 'CategoryController@index');
    
    Route::get('/home', 'HomeController@index')->name('home');
});
    Auth::routes();

