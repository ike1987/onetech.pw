
@foreach($items['promoactions']['banner1'] as $value)
    <div class="banner">
        <div class="banner_background" style="background-image:url(asset('public/images')/banner_background.jpg)"></div>
        <div class="container fill_height">
            <div class="row fill_height">

                <div class="banner_product_image"><img src="{{asset('public/images')}}/{{$value->type}}/{{$value->brand}}/{{$value->image}}/1.jpg" alt="{{$value->name}}"></div>
                <div class="col-lg-5 offset-lg-4 fill_height">
                    <div class="banner_content">
                        <h1 class="banner_text">new era of smartphones</h1>
                        <div class="banner_price"><span>{{$currencies->sign}}{{ceil((int)$value->price/(int)$currencies->value)}}</span>{{$currencies->sign}}{{ ceil(((int)$value->price - (int)$value->price * (int)$value->discount/100)/(int)$currencies->value)}}</div>
                        <div class="banner_product_name">{{$value->name}}</div>
                        <div class="button banner_button"><a href="{{ route('product')}}/{{$value->type}}/{{$value->brand}}/{{$value->id}}">Shop Now</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

