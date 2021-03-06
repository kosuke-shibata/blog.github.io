<!DOCTYPE html>
<!--MVCモデルのVの部分-->

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Blog Name</h1>
        <div class='posts'>
            @foreach ($posts as $post)
            <div class='post'>
                <h2 class='title'><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h2>
                <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
                <p class='body'>{{ $post->body }}</p>
            </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
        <div class="create">
            [<a href='/posts/create'>作成</a>]
        </div>
    </body>
</html>
