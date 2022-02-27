<!DOCTYPE HTML>
<!--MVCモデルのVの部分-->
@extends('layouts.app')

@section('content')
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
        <h1 class="title">
            Create BlogName
        </h1>
        <form action="/posts" method='post'>
            @csrf
            <div class="create_title">
                <label for="title">タイトル名</label>
                <input type="text" id="title" name="post[title]" placeholder="タイトル" value="{{ old('post.title') }}" />
                <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
            </div>
            <div class="create_body">
                <label for="body">本文</label>
                <textarea name="post[body]" id="body" placeholder="今日も1日お疲れさまでした。"  value="{{ old('post.body') }}"></textarea>
                <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
            </div>
            <!--name="post[title]",name="post[body]"とすることで、サーバ側で扱う時、post => [ 'title' => 'aaaa', 'body' => 'bbbb']というような形で、postの配列に入れ子で扱うことができる-->
            <div class="select_category">
                カテゴリー
                <select name="post[category_id]" size="1">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <input type="submit" value="保存" />
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>
@endsection