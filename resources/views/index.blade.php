@extends('layouts.app')

@section('content')
    <div class="main-container">
    @include('header')

    <!-- Контейнер для всех элементов -->
    <div class="threeelementscontainer">
        <!-- Место под Кнопку Вход -->
        <div class="button-entry">
            <img src="https://picsum.photos/304/300" alt="Заполнитель">
        </div>

        <!-- Место для картинки "Акция" -->
        <div class="promotion-image">
            <img src="https://picsum.photos/626/300" alt="Заполнитель">
        </div>

        <!-- Два параллельных элемента -->
        <div class="parallel-elements">
            <div class="parallel-element">
                <img src="https://picsum.photos/304/145" alt="Заполнитель">
            </div>
            <div class="parallel-element">
                <img src="https://picsum.photos/304/145" alt="Заполнитель">
            </div>
        </div>
    </div>

    <!-- Популярные категории -->
    <h2>Популярные категории</h2>
    <div class="carousel">
        <div class="carousel-track">
            <!-- 8 изображений -->
            <div class="carousel-item"><img src="https://picsum.photos/120/100" alt="Категория 1"></div>
            <div class="carousel-item"><img src="https://picsum.photos/120/100" alt="Категория 2"></div>
            <div class="carousel-item"><img src="https://picsum.photos/120/100" alt="Категория 3"></div>
            <div class="carousel-item"><img src="https://picsum.photos/120/100" alt="Категория 4"></div>
            <div class="carousel-item"><img src="https://picsum.photos/120/100" alt="Категория 5"></div>
            <div class="carousel-item"><img src="https://picsum.photos/120/100" alt="Категория 6"></div>
            <div class="carousel-item"><img src="https://picsum.photos/120/100" alt="Категория 7"></div>
            <div class="carousel-item"><img src="https://picsum.photos/120/100" alt="Категория 8"></div>
        </div>
    </div>

    <!-- Популярные производители -->
    <h2>Популярные производители</h2>
    <div class="carousel-manufacturers">
        <div class="carousel-track-manufacturers">
            <!-- 8 изображений -->
            <div class="carousel-item-manufacturers"><img src="https://picsum.photos/200/100" alt="Производитель 1"></div>
            <div class="carousel-item-manufacturers"><img src="https://picsum.photos/200/100" alt="Производитель 2"></div>
            <div class="carousel-item-manufacturers"><img src="https://picsum.photos/200/100" alt="Производитель 3"></div>
            <div class="carousel-item-manufacturers"><img src="https://picsum.photos/200/100" alt="Производитель 4"></div>
            <div class="carousel-item-manufacturers"><img src="https://picsum.photos/200/100" alt="Производитель 5"></div>
            <div class="carousel-item-manufacturers"><img src="https://picsum.photos/200/100" alt="Производитель 6"></div>
            <div class="carousel-item-manufacturers"><img src="https://picsum.photos/200/100" alt="Производитель 7"></div>
            <div class="carousel-item-manufacturers"><img src="https://picsum.photos/200/100" alt="Производитель 8"></div>
        </div>
    </div>

    <!-- Хиты продаж -->
    <h2>Хиты продаж</h2>
    <div class="carousel-hits">
        <div class="carousel-track-hits">
            <!-- 4 изображения -->
            <div class="carousel-item-hits"><img src="https://picsum.photos/304/152" alt="Хит 1"></div>
            <div class="carousel-item-hits"><img src="https://picsum.photos/304/152" alt="Хит 2"></div>
            <div class="carousel-item-hits"><img src="https://picsum.photos/304/152" alt="Хит 3"></div>
            <div class="carousel-item-hits"><img src="https://picsum.photos/304/152" alt="Хит 4"></div>
        </div>
    </div>

    <!-- Новинки, актуальные предложения -->
    <h2>Новинки, актуальные предложения</h2>
    <div class="carousel-new-arrivals">
        <div class="carousel-track-new-arrivals">
            <!-- 8 изображений -->
            <div class="carousel-item-new-arrivals"><img src="https://picsum.photos/200/160" alt="Новинка 1"></div>
            <div class="carousel-item-new-arrivals"><img src="https://picsum.photos/200/160" alt="Новинка 2"></div>
            <div class="carousel-item-new-arrivals"><img src="https://picsum.photos/200/160" alt="Новинка 3"></div>
            <div class="carousel-item-new-arrivals"><img src="https://picsum.photos/200/160" alt="Новинка 4"></div>
            <div class="carousel-item-new-arrivals"><img src="https://picsum.photos/200/160" alt="Новинка 5"></div>
            <div class="carousel-item-new-arrivals"><img src="https://picsum.photos/200/160" alt="Новинка 6"></div>
            <div class="carousel-item-new-arrivals"><img src="https://picsum.photos/200/160" alt="Новинка 7"></div>
            <div class="carousel-item-new-arrivals"><img src="https://picsum.photos/200/160" alt="Новинка 8"></div>
        </div>
    </div>

    <!-- Наши преимущества -->
    <h2>Наши преимущества</h2>
    <div class="carousel-advantages">
        <div class="carousel-track-advantages">
            <!-- 16 изображений -->
            <div class="carousel-item-advantages"><img src="https://picsum.photos/200/150" alt="Преимущество 1"></div>
            <div class="carousel-item-advantages"><img src="https://picsum.photos/200/150" alt="Преимущество 2"></div>
            <div class="carousel-item-advantages"><img src="https://picsum.photos/200/150" alt="Преимущество 3"></div>
            <div class="carousel-item-advantages"><img src="https://picsum.photos/200/150" alt="Преимущество 4"></div>
            <div class="carousel-item-advantages"><img src="https://picsum.photos/200/150" alt="Преимущество 5"></div>
            <div class="carousel-item-advantages"><img src="https://picsum.photos/200/150" alt="Преимущество 6"></div>
            <div class="carousel-item-advantages"><img src="https://picsum.photos/200/150" alt="Преимущество 7"></div>
            <div class="carousel-item-advantages"><img src="https://picsum.photos/200/150" alt="Преимущество 8"></div>
            <div class="carousel-item-advantages"><img src="https://picsum.photos/200/150" alt="Преимущество 9"></div>
            <div class="carousel-item-advantages"><img src="https://picsum.photos/200/150" alt="Преимущество 10"></div>
            <div class="carousel-item-advantages"><img src="https://picsum.photos/200/150" alt="Преимущество 11"></div>
            <div class="carousel-item-advantages"><img src="https://picsum.photos/200/150" alt="Преимущество 12"></div>
            <div class="carousel-item-advantages"><img src="https://picsum.photos/200/150" alt="Преимущество 13"></div>
            <div class="carousel-item-advantages"><img src="https://picsum.photos/200/150" alt="Преимущество 14"></div>
            <div class="carousel-item-advantages"><img src="https://picsum.photos/200/150" alt="Преимущество 15"></div>
            <div class="carousel-item-advantages"><img src="https://picsum.photos/200/150" alt="Преимущество 16"></div>
        </div>
    </div>

    <!-- Вы недавно смотрели -->
    <h2>Вы недавно смотрели</h2>
    <div class="carousel-recently-viewed">
        <div class="carousel-track-recently-viewed">
            <!-- 4 изображения -->
            <div class="carousel-item-recently-viewed"><img src="https://picsum.photos/304/152" alt="Недавно смотрели 1"></div>
            <div class="carousel-item-recently-viewed"><img src="https://picsum.photos/304/152" alt="Недавно смотрели 1"></div>
            <div class="carousel-item-recently-viewed"><img src="https://picsum.photos/304/152" alt="Недавно смотрели 1"></div>
            <div class="carousel-item-recently-viewed"><img src="https://picsum.photos/304/152" alt="Недавно смотрели 1"></div>
            </div>
    </div>
    </div>
@endsection
