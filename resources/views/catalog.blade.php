@extends('layouts.app')

@section('content')
    <div class="catalog-container mt-8 mb-12"> <!-- mt-8 for margin-top and mb-12 for margin-bottom -->
        <!-- Сайдбар с фильтрами -->
        <div class="filter-sidebar">
            <h3>Фильтры</h3>

            <!-- Фильтр по категории -->
            <div class="filter-section">
                <h4>Категория</h4>
                <select>
                    <option value="all">Все категории</option>
                    <option value="electronics">Электроника</option>
                    <option value="clothing">Одежда</option>
                    <option value="books">Книги</option>
                    <option value="home">Дом и сад</option>
                </select>
            </div>

            <!-- Фильтр по цене -->
            <div class="filter-section">
                <h4>Цена</h4>
                <div class="price-range">
                    <input type="number" placeholder="От" min="0">
                    <span>-</span>
                    <input type="number" placeholder="До" min="0">
                </div>
            </div>

            <!-- Фильтр по характеристикам -->
            <div class="filter-section">
                <h4>Характеристики</h4>
                <label>
                    <input type="checkbox" name="feature" value="new"> Новинки
                </label>
                <label>
                    <input type="checkbox" name="feature" value="sale"> Со скидкой
                </label>
                <label>
                    <input type="checkbox" name="feature" value="in-stock"> В наличии
                </label>
            </div>

            <!-- Кнопка применения фильтров -->
            <button class="apply-filters">Применить</button>
        </div>

        <!-- Сетка товаров -->
        <div class="product-grid-container">
            @foreach($products as $product)
                <product-card :product="{{ json_encode($product) }}"></product-card>
            @endforeach
        </div>
    </div>
@endsection
