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
        <vertical-slider>
        </vertical-slider>
        </div>
        </div>
    <h2>Популярные категории</h2>
    <div class="indexgrid">
    <index-grid />
    </div>

    <!-- Популярные производители -->
    <h2>Популярные производители</h2>
    <div class="carousel">
    <carousel>
    </carousel>
    </div>

    <!-- Хиты продаж -->
    <h2>Хиты продаж</h2>
    <div class="carousel-hits">
    <carousel8>
    </carousel>
    </div>
    <h2>Наши Плюсы:</h2>
    <div class="advgrid">
    <advantages-grid>
</advantages-grid>
    </div>
    
@endsection
