<x-app-layout>
    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <head>
            <meta charset="utf-8">
            <title>Memory</title>
            <!-- Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        </head>
        <body>
            <h1>日記</h1>
            <a href="/memories/create">新規作成</a>
            <div class="memories">
                @foreach ($memories as $memory)
                    @if(Auth::user()->can('view', $memory))
                        <h2 class="title">
                            <a href="/memories/{{ $memory->id }}">
                            {{ $memory->created_at->format("Y-m-d") }}：{{ $memory->title }}
                            </a>
                        </h2>
                        <form action="/memories/{{ $memory->id }}" id="form_{{ $memory->id }}" method="post">
                            @csrf
                            @method("DELETE")
                            <button type="button" onclick="deleteMemory({{ $memory->id }})">削除</button>
                        </form>
                        <br>
                    @endif
                @endforeach
            </div>
            <div class="paginate">
                {{ $memories->links() }}
            </div>
        
            <script>
                function deleteMemory(id){
                    "use strict"
                
                    if(confirm("削除すると復元できません。\n本当に削除しますか？")){
                        document.getElementById(`form_${id}`).submit();
                    }
                }
            </script>
        
        </body>
    </html>
</x-app-layout>