@extends('layouts.itshop')

@section('title')
    <title>ITshop</title>
@endsection





@section('content')
    <!-- Banner -->
    @include('includes.banner')

    <!-- Characteristics -->
    @include('includes.characteristics')

    <!-- Deals of the week -->
    @include('includes.deals')

    <!-- Banner -->
    @include('includes.banner2')

    <!-- Hot New Arrivals -->

    @include('includes.arrivals')

    <!-- Best Sellers -->
    @include('includes.bestsellers')




@endsection
