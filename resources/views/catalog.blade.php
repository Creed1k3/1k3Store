@extends('layouts.app')

@section('content')
    <div class="catalog-container">
        <div class="product-grid-container">
            @foreach($products as $product)
                <product-card :product="$product"></product-card>
            @endforeach
        </div>
    </div>
@endsection