<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])</head>
<body>
<div class="wrapper" id="app">
    <header-component></header-component>
        @yield('content')
    <footer-component></footer-component>
</div>
</body>
</html>