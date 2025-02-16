@extends('layouts.app')

@section('content')

    <div class="cartcontainer">
        <h1>Корзина</h1>
        <div class="placeholder-content">
            <img src="https://picsum.photos/304/300" alt="Заполнитель">
            <p>Заполнитель контента для страницы Корзина.</p>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
@endsection