<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Memory</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1 class="date">
            {{ $memory->created_at->format("Y-m-d") }}
        </h1>
        <h1 class="title">
            {{ $memory->title }}
        </h1>
        <div class="content">
            <div class="content_memory">
                <h3>本文</h3>
                <p>{{ $memory->body }}</p>
            </div>
        </div>
        <div class="footer">
            <a href="/memories">一覧に戻る</a>
        </div>
    </body>
</html>