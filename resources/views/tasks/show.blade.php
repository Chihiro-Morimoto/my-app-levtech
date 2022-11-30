<!DOCTYPE html>
<html lang="{{str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>ToDoDetail</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>{{ $task->title }}</h1>
        <div class="content">
            <p class="deadline">期限：{{ $task->deadline }}</p>
            <p class="place">場所：{{ $task->place }}</h2>
            <p class="body">内容：{{ $task->body }}</p>
        </div>
        <div class="footer">
            <a href="/tasks">一覧に戻る</a>
        </div>
    </body>
</html>