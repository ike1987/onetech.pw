<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js/cookie.js') }}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function ajaxsend(url, name) {
        $.ajax({
            url: url,
            type: "POST",
            data: {
                name: name,
                _token: $('meta[name="csrf-token"]').attr('content'),
                _method: "PUT",
            },
            success: function (response) {
                console.log(response);
                location.reload();
            },
        });
    }

    ////////////////Cart update

    if (!$.cookie('cart_price')) {
        $.cookie('cart_price', 0);
    } else {
        $('.cart_price span').text($.cookie('cart_price'));
    }
    $('.cart_button, .minus, .plus, .product_cart_button').on('click', function () {
        var name = $(this).attr('name');
        var price = parseInt($(this).attr('value'));
        var url = "{{url('cart/update')}}";

        if ($(this).hasClass('minus')) {
            $.cookie('cart_price', parseInt($.cookie('cart_price')) - price);
        } else {
            $.cookie('cart_price', parseInt($.cookie('cart_price')) + price);
        }
        $('.cart_price span').text($.cookie('cart_price'));

        ajaxsend(url, name);
    })



    $('.product_fav').on('click', function () {


        var name = $(this).attr('name');
        var url = "{{url('wishlist/update')}}";

        ajaxsend(url, name);
    })

</script>
<script src="{{ asset('css/bootstrap4/popper.js') }}"></script>
<script src="{{ asset('css/bootstrap4/bootstrap.min.js') }}"></script>
<script src="{{ asset('plugins/greensock/TweenMax.min.js') }}"></script>
<script src="{{ asset('plugins/greensock/TimelineMax.min.js') }}"></script>
<script src="{{ asset('plugins/scrollmagic/ScrollMagic.min.js') }}"></script>
<script src="{{ asset('plugins/greensock/animation.gsap.min.js') }}"></script>
<script src="{{ asset('plugins/greensock/ScrollToPlugin.min.js') }}"></script>
<script src="{{ asset('plugins/easing/easing.js') }}"></script>


@if (Route::getCurrentRoute()->uri() == 'cart' || Route::getCurrentRoute()->uri() == 'wishlist')
    <script src="{{ asset('js/cart_custom.js') }}"></script>
@elseif (Route::getCurrentRoute()->uri() == 'contact')
    <script src="{{ asset('js/contact-api.js') }}"></script>
    <script src="{{ asset('js/contact_custom.js') }}"></script>
@elseif(Route::getCurrentRoute()->uri() == 'regular')
    <script src="{{ asset('js/regular_custom.js') }}"></script>
@else
    <script src="{{ asset('plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
    @if (str_contains(Route::getCurrentRoute()->uri(), 'product'))
        <script src="{{ asset('js/product_custom.js') }}"></script>
    @elseif(Route::getCurrentRoute()->uri() == '/')
        <script src="{{ asset('plugins/slick-1.8.0/slick.js') }}"></script>
        <script src="{{ asset('js/custom.js') }}"></script>
    @else
        <script src="{{ asset('plugins/parallax-js-master/parallax.min.js') }}"></script>
        @if (Route::getCurrentRoute()->uri() == 'blog')
            <script src="{{ asset('js/blog_custom.js') }}"></script>
        @elseif (Route::getCurrentRoute()->uri() == 'post')
            <script src="{{ asset('js/blog_single_custom.js') }}"></script>
        @else
            <script src="{{ asset('plugins/slick-1.8.0/slick.js') }}"></script>
            <script src="{{ asset('plugins/Isotope/isotope.pkgd.min.js') }}"></script>
            <script src="{{ asset('plugins/jquery-ui-1.12.1.custom/jquery-ui.js') }}"></script>
            <script src="{{ asset('js/shop_custom.js') }}"></script>
        @endif
    @endif
@endif
