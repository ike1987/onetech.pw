<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @yield('title')
    @include('includes.meta')
    @include('includes.stylesheets')
</head>

<body>

<div class="super_container">
	<!-- Header -->
	@include('includes.header')

    <!-- Content -->
	@yield('content')

	<!-- Newsletter -->
    @include('includes.newsletter')

	<!-- Footer -->
    @include('includes.footer')
</div>
    @include('includes.scripts')

</body>

</html>
