@extends('layouts.app')
@section('content')

<div class="threelements">
    <div class="firstelement">
        <login-block></login-block>
    </div>
    <div class="secondelement">
        <index-slider></index-slider>
    </div>
    <div class="thirdelement">
        <vertical-slider></vertical-slider>
    </div>
</div>

<h2 class="section-title">🔥 Популярные категории</h2>
<div class="indexgrid">
    <index-grid />
</div>

<h2 class="section-title">🏆 Хиты продаж</h2>
<div class="carousel">
    <carousel></carousel>
</div>

<h2 class="section-title">💥 Новинки</h2>
<div class="carousel-hits">
    <carousel8></carousel8>
</div>

<!-- Дополнительный красивый блок -->
<h2 class="section-title">💎 Наши плюсы</h2>
<div class="advantages-grid">
    <div class="advantage">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon"><path d="M5 13l4 4L19 7" /></svg>
        <p>Гарантия на всю технику</p>
    </div>
    <div class="advantage">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon"><path d="M3 12l2-2 4 4 8-8 2 2-10 10z" /></svg>
        <p>Только проверенные бренды</p>
    </div>
    <div class="advantage">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon"><path d="M12 2l2 7h7l-5.5 4 2 7L12 16l-5.5 4 2-7L3 9h7z" /></svg>
        <p>Хиты по лучшим ценам</p>
    </div>
    <div class="advantage">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon"><path d="M3 3h18v18H3z" /></svg>
        <p>Современный каталог товаров</p>
    </div>
    <div class="advantage">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon"><path d="M5 12h14M12 5l7 7-7 7" /></svg>
        <p>Удобная и быстрая доставка</p>
    </div>
    <div class="advantage">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon"><circle cx="12" cy="12" r="10" /><path d="M8 12l2 2 4-4" /></svg>
        <p>Безопасная оплата</p>
    </div>
    <div class="advantage">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon"><path d="M9 17v-2a4 4 0 0 1 8 0v2" /><circle cx="12" cy="7" r="4" /></svg>
        <p>Поддержка клиентов 24/7</p>
    </div>
    <div class="advantage">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon"><path d="M2 12h20M12 2l7 7-7 7" /></svg>
        <p>Простой возврат и обмен</p>
    </div>
    <div class="advantage">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon"><path d="M3 7h18v10H3z" /><path d="M8 21h8" /></svg>
        <p>Регулярные акции и скидки</p>
    </div>
    <div class="advantage">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon"><path d="M4 4h16v16H4z" /><path d="M9 9h6v6H9z" /></svg>
        <p>Интуитивно понятный сайт</p>
    </div>
</div>


@endsection

<style>
    .section-title {
        font-size: 1.8rem;
        font-weight: 600;
        margin: 2rem 0 1rem;
        color: #1F2937;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
.advantages-grid {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 1.5rem;
    margin-top: 2rem;
    margin-bottom: 3rem;
}

.advantage {
    text-align: center;
    padding: 1rem;
    border-radius: 12px;
    background-color: #F9FAFB;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.03);
    transition: transform 0.2s ease;
}

.advantage:hover {
    transform: translateY(-3px);
}

.icon {
    width: 40px;
    height: 40px;
    margin-bottom: 0.5rem;
    stroke: #3B82F6;
    stroke-width: 2;
    fill: none;
}

.advantage p {
    font-size: 1rem;
    color: #1F2937;
    margin: 0;
}
</style>
