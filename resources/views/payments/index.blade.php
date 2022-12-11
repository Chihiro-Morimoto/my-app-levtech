<!DOCTYPE html>
<html lang="{{str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>ToDoList</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>支出リスト</h1>
        <div class="payments">
            @foreach ($payments as $payment)
                <div class="payment">
                    <p class="date">日付：{{ $payment->used_at }}</p>
                    <p class="deadline">支出額：{{ $payment->expenditure }}</p>
                </div>
            @endforeach
        </div>
    </body>
</html>