<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="index, follow">

    <!-- SEO Meta Tags -->
    <meta name="description" content="Welcome to my blog! Here, I share insights on web development, technology, and coding tutorials.">
    <meta name="keywords" content="web development, coding, tutorials, programming, JavaScript, PHP, HTML, CSS, tech blog"> 
    <meta name="author" content="Hussain Ahmed">

    <title>{{ $pageTitle ?? "Blog" }}</title>

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="bg-slate-200 text-slate-800">

    <header class="bg-white border-b border-slate-300 fixed w-full">
        <x-navbar />
    </header>

    <main class="max-w-5xl mx-auto min-h-[calc(100vh-3.5rem)] py-16 px-5">
        {{ $slot }}
    </main>

    <footer class="h-14 text-sm text-slate-200 font-light bg-slate-800 flex items-center justify-center">
        Copyright &copy; {{ new DateTime()->format('Y') }} All right reserved.
    </footer>

</body>

</html>
