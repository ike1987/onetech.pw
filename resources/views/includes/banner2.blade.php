<div class="banner_2">
    <div class="banner_2_background" style="background-image:url(asset('public/images')/banner_2_background.jpg)"></div>
    <div class="banner_2_container">
        <div class="banner_2_dots"></div>
        <!-- Banner 2 Slider -->
        <div class="owl-carousel owl-theme banner_2_slider">

        @foreach(array_keys($items['promoactions']['banner2']) as $key)
            @foreach($items['promoactions']['banner2'][$key] as $value)
                <!-- Banner 2 Slider Item -->
                    <div class="owl-item">
                        <div class="banner_2_item">
                            <div class="container fill_height">
                                <div class="row fill_height">
                                    <div class="col-lg-4 col-md-6 fill_height">
                                        <div class="banner_2_content">
                                            <div class="banner_2_category">{{$value->type}}</div>
                                            <div class="banner_2_title">{{$value->name}}</div>
                                            <div class="banner_2_text">{{$value->functions}}
                                            </div>
                                            <!--
                                            <div class="rating_r rating_r_4 banner_2_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            -->
                                            <div class="button banner_2_button"><a href="{{ route('product')}}/{{$value->type}}/{{$value->brand}}/{{$value->id}}">Explore</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-6 fill_height">
                                        <div class="banner_2_image_container">
                                            <div class="banner_2_image"><img src="{{asset('public/images')}}/{{$value->type}}/{{$value->brand}}/{{$value->image}}/1.jpg" alt="{{$value->name}}"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach

        </div>
    </div>
</div>
