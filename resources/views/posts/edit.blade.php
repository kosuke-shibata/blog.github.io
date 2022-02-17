<!DOCTYPE HTML>
<!--MVCモデルのVの部分-->

<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Blog Edit</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
        <h1 class="title">
            Blog Edit
        </h1>
        <form action="/posts/{{ $post->id }}" method='post'>
            @csrf
            @method('PUT')
            <div class=edit_title>
                <label for="title">タイトル名</label>
                <input type="text" id="title" name="post[title]" placeholder="タイトル" value="{{ $post->title }}" />
            </div>
            <div class="edit_body">
                <label for="body">本文</label>
                <textarea name="post[body]" id="body" placeholder="本文"> {{ $post->body }}</textarea>
                <!--<textarea>はvalue属性に対応していない-->
            </div>
            <input type="submit" value="保存" />
            
        </form>
        <div class="footer">
            <a href="/posts">戻る</a>
        </div>
    </body>
</html>