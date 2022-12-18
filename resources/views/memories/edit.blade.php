<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Memory</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1 class="title">日記編集画面</h1>
        <div class="content">
            <form action="/memories/{{ $memory->id }}" method="POST">
                @csrf
                @method("PUT")
                <div class="content_title">
                    <h2>タイトル</h2>
                    <input type="text" name="memory[title]" value="{{ $memory->title }}"/>
                </div>
                <div class="content_body">
                    <h2>本文</h2>
                    <textarea name="memory[body]">{{ $memory->body }}</textarea>
                </div>
                <input type="submit" value="保存">
            </form>
        </div>
        <br>
        <div class="footer">
            <a href="/memories">一覧に戻る</a>
        </div>
    </body>
</html>