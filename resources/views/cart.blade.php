@extends('layouts.app')

@section('content')
    <div id="app">
        <cart-component></cart-component>

        <!-- Контейнер для карусели с отступом сверху и снизу -->
        <div class="popular-products mt-8 mb-12"> <!-- Добавлен mb-12 для отступа снизу -->
            <h2 class="text-xl font-semibold text-center mb-4">Популярные товары</h2>
            <carousel8></carousel8>
        </div>
    </div>
@endsection
