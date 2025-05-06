<!-- resources/views/product.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <div id="product-page" class="product-page">
            <product-page :product="{{ json_encode($product) }}"></product-page>
        </div>
    </div>
@endsection
