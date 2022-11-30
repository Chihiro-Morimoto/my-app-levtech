<!DOCTYPE html>
<html lang="{{str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>ToDoPost</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Todoリスト</h1>
        <form action="/tasks" method="POST">
            @csrf
            <div class="title">
                <h2>タイトル</h2>
                <input type="text" name="task[title]" value="{{ old('task.title') }}"/>
                <p class="title_error" style="color:red">{{ $errors->first('task.title') }}</p>
            </div>
            <div class="deadline">
                <h2>期限</h2>
                <input type="datetime-local" name="task[deadline]" value="{{ old('task.deadline') }}"/>
                <p class="deadline_error" style="color:red">{{ $errors->first('task.deadline') }}</p>
            </div>
            <div class="place">
                <h2>場所</h2>
                <input type="text" name="task[place]" value="{{ old('task.place') }}"/>
                <p class="place_error" style="color:red">{{ $errors->first('task.place') }}</p>
            </div>
            <div class="body">
                <h2>内容</h2>
                <textarea name="task[body]">{{ old('task.body') }}</textarea>
                <p class="body_error" style="color:red">{{ $errors->first('task.body') }}</p>
            </div>
            <br>
            <input type="submit" value="保存"/>
        </form>
        <br><br>
        <div class="footer">
            <a href="/tasks">一覧に戻る</a>
        </div>
    </body>
</html>