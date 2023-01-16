<x-app-layout>
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
                <a href="/tasks/create">[新規作成]</a>
                @foreach ($tasks as $task)
                    @if(Auth::user()->can('view', $task))
                        <div class="task">
                            <p class="title">
                                <a href="/tasks/{{ $task->id }}">{{ $task->title }}</a>
                            </p>
                            <p class="deadline">期限：{{ $task->deadline }}</p>
                            <form action="/tasks/{{ $task->id }}" id="form_{{ $task->id }}" method="post" class="deletButton">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="deleteTask({{ $task->id }})">削除</button>
                            </form>
                            <br>
                        </div>
                        <br>
                    @endif
                @endforeach
            </div>
        
            <script>
                function checkTask(id){
                    document.getElementById(`checkbox_${id}`).submit();
                }
            
                function deleteTask(id){
                    'use strict'
                    if (confirm('本当に削除しますか？')){
                        document.getElementById(`form_${id}`).submit();
                    }
                }
            </script>
        
            <style>
                a{
                    text-decoration:none;
                }
                .title{
                    display:inline-block;
                }
                .deadline{
                    display:inline-block;
                }
                form{
                    display:inline-block;
                }
            </style>
        </body>
    </html>
</x-app-layout>