<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-papNM3P2n5LzX+...==">
@vite(['resources/js/app.js'])
      <style>
    @font-face {
      font-family: 'GTEestiPro';
      /* Путь относительный к public/ */
      src: url('/fonts/GTEestiPro.woff2') format('woff2');
      font-weight: normal;
      font-style: normal;
      font-display: swap;
    }
    /* Назначаем глобально */
    html, body {
      font-family: 'GTEestiPro', Arial, sans-serif;
    }
  </style>
</head>
<body>
<div class="wrapper" id="app">
    <header-component></header-component>
        @yield('content')
    <footer-component></footer-component>
</div>
</body>
</html>