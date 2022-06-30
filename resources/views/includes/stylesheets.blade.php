<link rel="stylesheet" href="{{ asset('css/bootstrap4/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/fontawesome-free-5.0.1/css/fontawesome-all.css') }}">

@if (Route::getCurrentRoute()->uri() == 'cart' || Route::getCurrentRoute()->uri() == 'wishlist')
    <link rel="stylesheet" href="{{ asset('css/cart_styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cart_responsive.css') }}">
@elseif(Route::getCurrentRoute()->uri() == 'contact')
    <link rel="stylesheet" href="{{ asset('css/contact_styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/contact_responsive.css') }}">
@elseif(Route::getCurrentRoute()->uri() == 'regular')
    <link rel="stylesheet" href="{{ asset('css/regular_styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/regular_responsive.css') }}">
@else
    <link rel="stylesheet" href="{{ asset('plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/OwlCarousel2-2.2.1/animate.css') }}">
    @if(Route::getCurrentRoute()->uri() == 'blog')
        <link rel="stylesheet" href="{{ asset('css/blog_styles.css') }}">
        <link rel="stylesheet" href="{{ asset('css/blog_responsive.css') }}">
    @elseif(Route::getCurrentRoute()->uri() == 'post')
        <link rel="stylesheet" href="{{ asset('css/blog_single_styles.css') }}">
        <link rel="stylesheet" href="{{ asset('css/blog_single_responsive.css') }}">
    @elseif(str_contains(Route::getCurrentRoute()->uri(),'product'))
        <link rel="stylesheet" href="{{ asset('css/product_styles.css') }}">
        <link rel="stylesheet" href="{{ asset('css/product_responsive.css') }}">
    @elseif(str_contains(Route::getCurrentRoute()->uri(), 'shop'))
        <link rel="stylesheet" href="{{ asset('plugins/jquery-ui-1.12.1.custom/jquery-ui.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/slick-1.8.0/slick.css') }}">
        <link rel="stylesheet" href="{{ asset('css/shop_styles.css') }}">
        <link rel="stylesheet" href="{{ asset('css/shop_responsive.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('plugins/slick-1.8.0/slick.css') }}">
        <link rel="stylesheet" href="{{ asset('css/main_styles.css') }}">
        <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    @endif
@endif


