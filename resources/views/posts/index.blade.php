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
                <p class='body'>{{ $post->body }}</p>
                <form action="/posts/{{ $post->id }}" id="form_delete" method="post" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <!--<button class="btn" type="submit">削除</button>-->
                    <p class="delete">[<span onclick="return deletePost();">削除</span>]</p>
                </form>
            </div>
            @endforeach
        </div>
        <div class="create">
            [<a href='/posts/create'>作成</a>]
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
        
        <script> 
            function deletePost() {
                'use strict';
                if (confirm('本当に削除しますか？')) {
                    document.getElementById('form_delete').submit();
                } else {
                    return false;
                }
            }
        </script>
    </body>
</html>
