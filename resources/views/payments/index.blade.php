<x-app-layout>
    <!DOCTYPE html>
    <html lang="{{str_replace('_', '-', app()->getLocale()) }}">
        <head>
            <meta charset="utf-8">
            <title>Payments</title>
            <!-- Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        </head>
        <body>
            <h1>支出リスト</h1>
            <div class="payments">
                <a href="/payments/create">[新規作成]</a>
                @foreach ($payments as $payment)
                    @if(Auth::user()->can('view', $payment))
                        <div class="payment">
                            <p class="date">日付：{{ $payment->used_at }}</p>
                            <p class="expenditure">
                                <a href="/payments/{{$payment->id}}">支出額：{{ $payment->expenditure }}円</a>
                            </p>
                            <form action="/payments/{{ $payment->id }}" id="form_{{ $payment->id }}" method="post" class="deletButton">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="deletePayment({{ $payment->id }})">削除</button>
                            </form>
                        </div>
                        <br>
                    @endif
                @endforeach
            </div>
        
            <script>
                function deletePayment(id){
                    'use strict'
                
                    if (confirm('削除すると復元できません。\n本当に削除しますか？')){
                        document.getElementById(`form_${id}`).submit();
                    }
                }
            </script>
        
        </body>
    </html>
</x-app-layout>