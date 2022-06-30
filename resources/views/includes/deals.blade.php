<div class="deals_featured">
    <div class="container">
        <div class="row">
            <div class="col d-flex flex-lg-row flex-column align-items-center justify-content-start">

                <!-- Deals -->
                <div class="deals">
                    <div class="deals_title">Deals of the Week</div>
                    <div class="deals_slider_container">

                        <!-- Deals Slider -->
                        <div class="owl-carousel owl-theme deals_slider">
                        @foreach($items['weekDeals'] as $item)
                            @foreach($item as $value)
                            <!-- Deals Item -->
                            <div class="owl-item deals_item">
                                <div class="deals_image d-flex flex-column align-items-center justify-content-center"><img style="height: 45%; width: 45%" src="{{asset('public/images')."/".$value->type."/".$value->brand."/".$value->image}}/1.jpg" alt="{{$value->name}}"></div>
                                <div class="deals_content">
                                    <div class="deals_info_line d-flex flex-row justify-content-start">
                                        <div class="deals_item_category"><a href="{{route('shop')."/".$value->type}}">{{ucfirst($value->brand)}} {{$value->type}}</a></div>
                                        @if ((int)$value->discount > 0)
                                        <div class="deals_item_price_a ml-auto">{{$currencies->sign. ceil((int)$value->price/(int)$currencies->value)}}</div>
                                        @endif
                                    </div>
                                    <div class="deals_info_line d-flex flex-row justify-content-start">
                                        <div class="deals_item_name"><a href="{{ route('product')."/".$value->type."/".$value->brand."/".$value->id}}">{{$value->name}}</a></div>
                                        <div class="deals_item_price ml-auto">{{$currencies->sign. ceil(((int)$value->price - (int)$value->price * (int)$value->discount/100)/(int)$currencies->value)}}</div>
                                    </div>
                                    <div class="available">
                                        <div class="available_line d-flex flex-row justify-content-start">
                                            <div class="available_title">Already sold: <span>{{$value->sales}}</span></div>
                                            <div class="sold_title ml-auto">Available: <span>{{$value->stock}}</span></div>
                                        </div>
                                        <div class="available_bar"><span style="width:{{ceil((int)$value->sales*100/(int)$value->stock)}}%"></span></div>
                                    </div>
                                    <div class="deals_timer d-flex flex-row align-items-center justify-content-start">
                                        <div class="deals_timer_title_container">
                                            <div class="deals_timer_title">Hurry Up</div>
                                            <div class="deals_timer_subtitle">Offer ends in:</div>
                                        </div>
                                        <div class="deals_timer_content ml-auto">
                                            <div class="deals_timer_box clearfix" data-target-time="{{$value->promoactions}}">
                                                <div class="deals_timer_unit">
                                                    <div id="deals_timer1_hr" class="deals_timer_hr"></div>
                                                    <span>hours</span>
                                                </div>
                                                <div class="deals_timer_unit">
                                                    <div id="deals_timer1_min" class="deals_timer_min"></div>
                                                    <span>mins</span>
                                                </div>
                                                <div class="deals_timer_unit">
                                                    <div id="deals_timer1_sec" class="deals_timer_sec"></div>
                                                    <span>secs</span>
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

                    <div class="deals_slider_nav_container">
                        <div class="deals_slider_prev deals_slider_nav"><i class="fas fa-chevron-left ml-auto"></i></div>
                        <div class="deals_slider_next deals_slider_nav"><i class="fas fa-chevron-right ml-auto"></i></div>
                    </div>
                </div>

                <!-- Featured -->
                <div class="featured">
                    <div class="tabbed_container">
                        <div class="tabs">
                            <ul class="clearfix">
                                <li class="onsale" title="onsale" >On Sale</li>
                                <li class="bestrated" title="bestrated">Best Rated</li>
                            </ul>
                            <div class="tabs_line"><span></span></div>
                        </div>

                        <!-- Product Panel -->
                        <div class="product_panel panel onsale_panel">
                            <div class="featured_slider slider">
                            @foreach($items['onSale'] as $item)
                                @foreach($item as $value)
                                <!-- Slider Item -->
                                    <div class="featured_slider_item">
                                        <div class="border_active"></div>
                                        <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                            <div class="product_image d-flex flex-column align-items-center justify-content-center"><img style="max-height: 120px" src="{{asset('public/images').'/'.$value->type."/".$value->brand."/".$value->image}}/1.jpg" alt="{{$value->name}}"></div>
                                            <div class="product_content">
                                                <div class="product_price discount">{{$currencies->sign. ceil(((int)$value->price - (int)$value->price * (int)$value->discount/100)/(int)$currencies->value)}}<span>{{$currencies->sign}}{{ceil((int)$value->price/(int)$currencies->value)}}</span></div>
                                                <div class="product_name">{{ucfirst($value->brand)}}</div>
                                                <div class="product_name"><div><a href="{{ route('product')."/".$value->type."/".$value->brand."/".$value->id}}">{{$value->name}}</a></div></div>
                                                <div class="product_extras">
                                                <!--
                                                    <div class="product_color">
                                                        <input type="radio" checked name="product_color" style="background:#b19c83">
                                                        <input type="radio" name="product_color" style="background:#000000">
                                                        <input type="radio" name="product_color" style="background:#999999">
                                                    </div>
                                                    -->
                                                    <button class="product_cart_button" name="{{'add-'.$value->type.'-'.$value->brand.'-'.$value->id}}" value="{{ceil(((int)$value->price - (int)$value->price * (int)$value->discount/100)/(int)$currencies->value)}}">Add to Cart</button>
                                                </div>
                                            </div>
                                            @if(isset($_SESSION['wish']))
                                                @if(array_search($value->type.'-'.$value->brand.'-'.$value->id, $_SESSION['wish']) === false)
                                                    <div class="product_fav" name="{{$value->type.'-'.$value->brand.'-'.$value->id}}">
                                                        @else
                                                            <div class="product_fav active" style="visibility: visible; opacity: 1" name="{{$value->type.'-'.$value->brand.'-'.$value->id}}">
                                                                @endif
                                                                @else
                                                                    <div class="product_fav" name="{{$value->type.'-'.$value->brand.'-'.$value->id}}">
                                                                        @endif
                                                                        <i class="fas fa-heart"></i></div>                                            <ul class="product_marks">
                                                <li class="product_mark product_discount">-{{$value->discount}}%</li>
                                                <li class="product_mark product_new">new</li>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach
                            </div>
                            <div class="featured_slider_dots_cover"></div>
                        </div>

                        <!-- Product Panel -->

                        <div class="product_panel panel bestrated_panel">
                            <div class="featured_slider slider">
                            @foreach($items['bestRated'] as $item)
                                @foreach($item as $value)

                                <!-- Slider Item -->
                                    <div class="featured_slider_item">
                                        <div class="border_active"></div>
                                        <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                            <div class="product_image d-flex flex-column align-items-center justify-content-center"><img style="max-height: 120px;max-width: 160px" src="{{asset('public/images').'/'.$value->type."/".$value->brand."/".$value->image}}/1.jpg" alt="{{$value->name}}"></div>
                                            <div class="product_content">
                                                <div class="product_price discount">
                                                    @if ((int)$value->discount>0)
                                                        @php ($price = ceil(((int)$value->price - (int)$value->price * (int)$value->discount/100)/(int)$currencies->value))
                                                        {{$currencies->sign. $price}}<span>{{$currencies->sign. ceil((int)$value->price/(int)$currencies->value)}}</span>
                                                    @else
                                                        @php ($price = ceil($value->price/(int)$currencies->value))
                                                        {{$currencies->sign. $price}}
                                                    @endif

                                                </div>
                                                <div class="product_name">{{ucfirst($value->brand)}}</div>
                                                <div class="product_name"><div><a href="{{ route('product')."/".$value->type."/".$value->brand."/".$value->id}}">{{$value->name}}</a></div></div>
                                                <div class="product_extras">
                                                    <!--
                                                    <div class="product_color">
                                                        <input type="radio" checked name="product_color" style="background:#b19c83">
                                                        <input type="radio" name="product_color" style="background:#000000">
                                                        <input type="radio" name="product_color" style="background:#999999">
                                                    </div>
                                                    -->
                                                    <button class="product_cart_button" name="{{'add-'.$value->type.'-'.$value->brand.'-'.$value->id}}" value="{{$price}}">Add to Cart</button>
                                                </div>
                                            </div>
                                            @if(isset($_SESSION['wish']))
                                                @if(array_search($value->type.'-'.$value->brand.'-'.$value->id, $_SESSION['wish']) === false)
                                                    <div class="product_fav" name="{{$value->type.'-'.$value->brand.'-'.$value->id}}">
                                                        @else
                                                            <div class="product_fav active" style="visibility: visible; opacity: 1" name="{{$value->type.'-'.$value->brand.'-'.$value->id}}">
                                                                @endif
                                                                @else
                                                                    <div class="product_fav" name="{{$value->type.'-'.$value->brand.'-'.$value->id}}">
                                                                        @endif
                                                                        <i class="fas fa-heart"></i></div>                                            <ul class="product_marks">
                                               @if((int)$value->discount >0)
                                                <li class="product_mark product_discount">-{{$value->discount }}%</li>
                                                @endif
                                                <li class="product_mark product_new">new</li>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach
                            </div>
                            <div class="featured_slider_dots_cover"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
