@extends('layouts.itshop')

@section('title')
    <title>Product</title>
@endsection

@section('content')

    <!-- Single Product -->
    @include('includes.product')

    <!-- Brands -->
    @include('includes.brands')

@endsection
