<!DOCTYPE html>
<html lang="{{str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Payment</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>支出 編集画面</h1>
        <div class="expenditure_detail">
            <form action="/budgets/{{ $budget->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="date">
                    <h2>日付</h2>
                    <input type="date" name="budget[scheduled]" value="{{ $budget->scheduled }}"/>
                <p class="date_error" style="color:red">{{ $errors->first('budget.scheduled') }}</p>
                </div>
                <div class="estimate">
                    <h2>予算</h2>
                    <input type="number" name="budget[estimate]" value="{{ $budget->estimate }}"/>円
                    <p class="estimate_error" style="color:red">{{ $errors->first('budget.estimate') }}</p>
                </div>
                <input type="submit" value="保存"/>
            </form>
            </div>
            <br><br>
            <div class="footer">
                <a href="/payments">一覧に戻る</a>
            </div>
        </body>
    </html>