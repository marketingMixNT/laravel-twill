<!doctype html>
<html lang="en">
<head>
    <title>{{ $item->title }}</title>
</head>
@vite('resources/css/app.css') 

<body>
    <div class="mx-auto max-w-2xl">
        {!! $item->renderBlocks() !!}
    </div>
</body>
</html>
