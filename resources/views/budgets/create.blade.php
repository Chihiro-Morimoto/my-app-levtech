<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Memory</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>予算を設定</h1>
        <form action="/budgets" method="POST">
            @csrf
            <div class="date">
                <h2>日付</h2>
                <input type="date" name="budget[scheduled]" value="{{ old('budget.scheduled') }}"/>
                <p class="date_error" style="color:red">{{ $errors->first('budget.scheduled') }}</p>
            </div>
            <div class="estimate">
                <h2>予算</h2>
                <input type="number" name="budget[estimate]" value="{{ old('budget.estimate') }}"/>円
                <p class="estimate_error" style="color:red">{{ $errors->first('budget.estimate') }}</p>
            </div>
            <input type="submit" value="保存"/>
        </form>
        <div class="footer">
            <a href="/budgets">一覧に戻る</a>
        </div>
    </body>
</html>