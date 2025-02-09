<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Корзина - 1k3Store</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    @include('header')

    <div class="container">
        <h1>Корзина</h1>
        <div class="placeholder-content">
            <img src="https://picsum.photos/304/300" alt="Заполнитель">
            <p>Заполнитель контента для страницы Корзина.</p>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>