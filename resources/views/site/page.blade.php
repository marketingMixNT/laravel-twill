<!doctype html>
<html lang="en">
<head>
    <title>{{ $item->title }}</title>
</head>
@vite('resources/css/app.css') 

<body>
    <x-menu/> 

    <div class="mx-auto max-w-2xl">
        {!! $item->renderBlocks() !!}
    </div>
</body>
</html>
