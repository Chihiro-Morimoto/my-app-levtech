<!DOCTYPE html>
<html lang="{{str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>ToDoList</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Todoリスト</h1>
        <div class="tasks">
            <a href="/tasks/create">新規作成</a>
            @foreach ($tasks as $task)
                <div class="task">
                    <h2 class="task">
                        <input class="task_check" type="checkbox">
                        <a href="/tasks/{{ $task->id }}">{{ $task->title }}</a>
                    </h2>
                    <p class="deadline">期限：{{ $task->deadline }}</p>
                    <form action="/tasks/{{ $task->id }}" id="form_{{ $task->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deleteTask({{ $task->id }})">削除</button>
                    </form>
                    <br>
                </div>
            @endforeach
        </div>
        <script>
            function deleteTask(id){
                'use strict'
                if (confirm('本当に削除しますか？')){
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
    </body>
</html>