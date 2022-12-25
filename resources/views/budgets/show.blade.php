<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>budget</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1 class="date">
            {{ $budget->scheduled }}
        </h1>
        <p class="estimate">
            予算：{{ $budget->estimate }}円
        </p>
        <p class="balance">
            残高：{{ $budget->balance }}円
        </p>
        <p class="saving">
            節約率：{{ $budget->saving }}%
        </p>
        <div class="footer">
            <div class="edit">
                <button type="button"><a href="/budgets/{{ $budget->id }}/edit">編集</a></button>
            </div>
            <form action="/budgets/{{ $budget->id }}" id="form_{{ $budget->id }}" method="post" class="deletButton">
                @csrf
                @method('DELETE')
                <button type="button" onclick="deleteBudget({{ $budget->id }})">削除</button>
            </form>
            <br>
            <a href="/budgets">一覧に戻る</a>
        </div>
        
        <script>
            function deleteBudget(id){
                'use strict'
                
                if (confirm('削除すると復元できません。\n本当に削除しますか？')){
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
    </body>
</html>