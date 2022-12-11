<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Payment</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <div class="expenditure_detail">
            <h2 class="date">{{ $payment->used_at }}</h2>
            <div class="expenditure">支出額:{{ $payment->expenditure }}円</div>
            <div class="usage">用途：{{ $payment->usage->name}}</div>
            <div class="memo">メモ：{{ $payment->memo }}</div>
        </div>
        <div class="footer">
            <div class="edit">
                <button type="button"><a href="/payments/{{ $payment->id }}/edit">編集</a></button>
            </div>
            <form action="/payments/{{ $payment->id }}" id="form_{{ $payment->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="deletePayment({{ $payment->id }})">削除</button>
            </form>
            <br><br>
            <a href="/payments">戻る</a>
        </div>
    </body>
</html>