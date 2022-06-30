@extends('layouts.itshop')

@section('title')
    <title>Post blog</title>
@endsection

@section('content')

	<!-- Home -->
    @include('includes.home_single')

	<!-- Single Blog Post -->
    @include('includes.post_single')

	<!-- Blog Posts -->
    @include('includes.post')

@endsection
