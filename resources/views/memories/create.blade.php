<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Memory</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>今日の日記作成</h1>
        <form action="/memories" method="POST">
            @csrf
            <div class="title">
                <h2>タイトル</h2>
                <input type="text" name="memory[title]" value="{{ old('memory.title') }}"/>
                <p class="title_error" style="color:red">{{ $errors->first('memory.title') }}</p>
            </div>
            <div class="body">
                <h2>本文</h2>
                <textarea name="memory[body]">{{ old('memory.body') }}</textarea>
                <p class="body_error" style="color:red">{{ $errors->first('memory.body') }}</p>
            </div>
            <input type="submit" value="保存"/>
        </form>
        <div class="footer">
            <a href="/memories">一覧に戻る</a>
        </div>
    </body>
</html>