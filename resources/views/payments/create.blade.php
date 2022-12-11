<!DOCTYPE html>
<html lang="{{str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>PaymentPost</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>支出</h1>
        <form action="/payments" method="POST">
            @csrf
            <div class="date">
                <h2>日付</h2>
                <input type="date" name="payment[used_at]" value="{{ old('payment.used_at') }}"/>
                <p class="date_error" style="color:red">{{ $errors->first('payment.used_at') }}</p>
            </div>
            <div class="expenditure">
                <h2>支出額</h2>
                <input type="number" name="payment[expenditure]" value="{{ old('payment.expenditure') }}"/>円
                <p class="expenditure_error" style="color:red">{{ $errors->first('payment.expenditure') }}</p>
            </div>
            <div class="usage">
                <h2>用途</h2>
                <select name="payment[usage_id]">
                    @foreach($usages as $usage)
                        <option value="{{ $usage->id }}">{{ $usage->name }}</option>
                        <p class="usage_error" style="color:red">{{ $errors->first('payment.usage_id') }}</p>
                    @endforeach
                </select>
            </div>
            <div class="memo">
                <h2>メモ</h2>
                <textarea name="payment[memo]">{{ old('payment.memo') }}</textarea>
                <p class="memo_error" style="color:red">{{ $errors->first('payment.memo') }}</p>
            </div>
            <input type="submit" value="保存"/>
        </form>
        <br><br>
        <div class="footer">
            <a href="/payments">一覧に戻る</a>
        </div>
    </body>
</html>