<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }} - @yield('title') </title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>
    @vite('resources/css/app.css')

</head>
<body id="app" class="min-h-screen bg-blue-gray-50/50">
@include('partials.cashier.menu')
<main class="p-4">
    @yield('content')
</main>
@vite(['resources/js/app.js'])

</body>
