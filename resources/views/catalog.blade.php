@extends('layouts.app')

@section('content')
    <div class="catalog-containerr">
    @include('header')
        <div class="product-grid-container">
        @include('components/product-card')
        @include('components/product-card')
        @include('components/product-card')
        @include('components/product-card')
        <counter></counter>
        </div>
    </div>
@endsection