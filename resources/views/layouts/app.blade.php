<!DOCTYPE html>

<html lang="id">
<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'PT Bramax Teknologi Indonesia')</title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

</head>

<body class="bg-[#0b0b0b] text-white">

    @include('layouts.navbar')

    @yield('content')

    {{-- Live Chat --}}
    @if (!request()->is('admin/*'))
    <x-live-chat />
@endif

</body>
</html>