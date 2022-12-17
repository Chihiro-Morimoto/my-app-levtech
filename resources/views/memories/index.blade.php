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
        <div class="memories">
            @foreach ($memories as $memory)
                <div class="memory">
                    <h2 class="title">{{ $memory->created_at->format("Y-m-d") }}：{{ $memory->title }}</h2>
                    <p class="body">{{ $memory->body }}</p>
                </div>
            @endforeach
        </div>
        <div class="paginate">
            {{ $memories->links() }}
        </div>
    </body>
</html>