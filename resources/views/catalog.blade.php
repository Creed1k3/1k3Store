@extends('layouts.app')

@section('content')
    <div class="catalog-containerr">
        <div class="product-grid-container">
            @include('components/product-card')
            @include('components/product-card')
            @include('components/product-card')
            @include('components/product-card')
        </div>
    </div>
@endsection