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
                <h2 class="title">
                    <a href="/memories/{{ $memory->id }}">
                    {{ $memory->created_at->format("Y-m-d") }}：{{ $memory->title }}
                    </a>
                </h2>
            @endforeach
        </div>
        <div class="paginate">
            {{ $memories->links() }}
        </div>
    </body>
</html>