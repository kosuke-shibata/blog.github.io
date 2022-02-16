<!DOCTYPE HTML>
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
            <div>
                <label for="title">タイトル名</label>
                <input type="text" id="title" name="post[title]" placeholder="タイトル" />
            </div>
            <div>
                <label for="body">本文</label>
                <textarea name="post[body]" id="body" placeholder="今日も1日お疲れさまでした。"></textarea>
            </div>
            <input type="submit" value="保存" />
        </form>
        <div class="footer">
            <a href="/posts">戻る</a>
        </div>
    </body>
</html>