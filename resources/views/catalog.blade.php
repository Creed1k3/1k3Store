@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Каталог товаров</h1>
        <div class="product-card">
            <div class="product-image">
                <img src="iphone.png" alt="Product Image">
            </div>
            <div class="product-details">
                <h2 class="product-title">Название товара</h2>
                <p class="product-description">Описание товара...</p>
                <p class="product-price">999 ₽</p>
                <button class="add-to-cart-btn">Добавить в корзину</button>
            </div>
        </div>
    </div>
@endsection