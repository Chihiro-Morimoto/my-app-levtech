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
            <div class="edit">
                <button type="button"><a href="/tasks/{{ $task->id }}/edit">編集</a></button>
            </div>
            <form action="/tasks/{{ $task->id }}" id="form_{{ $task->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="deleteTask({{ $task->id }})">削除</button>
            </form>
            <br><br>
            <a href="/tasks">一覧に戻る</a>
        </div>
        
        <script>
            function deleteTask(id){
                'use strict'
                if (confirm('本当に削除しますか？')){
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
        
        <style>
            .edit{
                display:inline-block;
            }
            form{
                display:inline-block;
            }
        </style>
    </body>
</html>