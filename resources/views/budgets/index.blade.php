<!DOCTYPE html>
<html lang="{{str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>budgets</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>予算-支出管理</h1>
        <div class="budgets">
            <a href="/budgets/create">[新規作成]</a>
            @foreach($budgets as $budget)
                <p class="date">
                    <a href="/budgets/{{ $budget->id }}">日付：{{ $budget->scheduled }}</a>
                </p>
                <p class="saving">節約率：{{ $budget->saving }}</p>
                <form action="/budgets/{{ $budget->id }}" id="form_{{ $budget->id }}" method="post" class="deletButton">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="deleteBudget({{ $budget->id }})">削除</button>
                </form>
            @endforeach
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