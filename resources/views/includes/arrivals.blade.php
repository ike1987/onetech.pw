<div class="new_arrivals">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="tabbed_container">
                    <div class="tabs clearfix tabs-right">
                        <div class="new_arrivals_title">Hot New Arrivals</div>

                        <ul class="clearfix">
                            <li class="active"><!--Featured--></li>

                        </ul>

                        <div class="tabs_line"><span></span></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12" style="z-index:1;">

                            <!-- Product Panel -->
                            <div class="product_panel panel active">
                                <div class="arrivals_slider slider">

                                @foreach($items['newArrivals'] as $item)
                                    @foreach($item as $value)
                                        <!-- Slider Item -->
                                            <div class="arrivals_slider_item">
                                                <div class="border_active"></div>
                                                <div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                                    <div class="product_image d-flex flex-column align-items-center justify-content-center"><img style="max-height: 110px" src="{{asset('public/images').'/'.$value->type."/".$value->brand."/".$value->image}}/1.jpg" alt="{{$value->name}}"></div>
                                                    <div class="product_content">
                                                        <div class="product_price discount">{{$currencies->sign. ceil(((int)$value->price - (int)$value->price * (int)$value->discount/100)/(int)$currencies->value)}}
                                                            @if ($value->discount>0)
                                                            <span>{{$currencies->sign.ceil((int)$value->price/(int)$currencies->value)}}</span>
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
                                                            <button class="product_cart_button" name="{{'add-'.$value->type.'-'.$value->brand.'-'.$value->id}}" value ="{{ceil(((int)$value->price - (int)$value->price * (int)$value->discount/100)/(int)$currencies->value)}}">Add to Cart</button>
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
                                                                                <i class="fas fa-heart"></i></div>                                                    <ul class="product_marks">
                                                        <li class="product_mark product_discount">-{{$value->discount}}%</li>
                                                        <li class="product_mark product_new">new</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endforeach


                                </div>
                                <div class="arrivals_slider_dots_cover"></div>
                            </div>

                        </div>

                        <!--
                        <div class="col-lg-3">
                            <div class="arrivals_single clearfix">
                                <div class="d-flex flex-column align-items-center justify-content-center">
                                    <div class="arrivals_single_image"><img src="images/new_single.png" alt=""></div>
                                    <div class="arrivals_single_content">
                                        <div class="arrivals_single_category"><a href="#">Smartphones</a></div>
                                        <div class="arrivals_single_name_container clearfix">
                                            <div class="arrivals_single_name"><a href="#">LUNA Smartphone</a></div>
                                            <div class="arrivals_single_price text-right">$379</div>
                                        </div>
                                        <div class="rating_r rating_r_4 arrivals_single_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <form action="#"><button class="arrivals_single_button">Add to Cart</button></form>
                                    </div>
                                    <div class="arrivals_single_fav product_fav active"><i class="fas fa-heart"></i></div>
                                    <ul class="arrivals_single_marks product_marks">
                                        <li class="arrivals_single_mark product_mark product_new">new</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        -->
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
