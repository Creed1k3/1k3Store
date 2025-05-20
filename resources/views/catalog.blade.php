@extends('layouts.app')

@section('content')
<div class="catalog-container mt-8 mb-12">
<catalog-component
    :products='@json($products)'
    :categories='@json($categories)'
></catalog-component>
</div>
@endsection
