<div class="best_sellers">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="tabbed_container">
                    <div class="tabs clearfix tabs-right">
                        <div class="new_arrivals_title">Hot Best Sellers</div>
                        <ul class="clearfix">
                            <li class="active">Top</li>
                            <!--
                            <li>Audio & Video</li>
                            <li>Laptops & Computers</li>
                            -->
                        </ul>
                        <div class="tabs_line"><span></span></div>
                    </div>

                    <div class="bestsellers_panel panel active">

                        <!-- Best Sellers Slider -->

                        <div class="bestsellers_slider slider">
                            @foreach($items['bestSellers'] as $item)
                                @foreach($item as $value)

                                    <div class="bestsellers_item discount">
                                        <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                            <div class="bestsellers_image"><img style="max-height: 110px" src="{{asset('public/images')}}/{{$value->type}}/{{$value->brand}}/{{$value->image}}/1.jpg" alt="{{$value->name}}"></div>
                                            <div class="bestsellers_content">
                                                <div class="bestsellers_category"><a href="#">{{$value->type}}</a></div>
                                                <div class="product_name">{{ucfirst($value->brand)}}</div>
                                                <div class="bestsellers_name"><a href="{{ route('product')}}/{{$value->type}}/{{$value->brand}}/{{$value->id}}">{{ucfirst($value->name)}}</a></div>
                                                <!--
                                                <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                                -->
                                                <div class="bestsellers_price discount">{{$currencies->sign}}{{ ceil(((int)$value->price - (int)$value->price * (int)$value->discount/100)/(int)$currencies->value)}}
                                                    @if ($value->discount>0)
                                                        <span>{{$currencies->sign}}{{ceil((int)$value->price/(int)$currencies->value)}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bestsellers_fav active"><!--<i class="fas fa-heart"></i>--></div>
                                        <ul class="bestsellers_marks">
                                            @if ($value->discount>0)
                                                <li class="bestsellers_mark bestsellers_discount">-{{$value->discount}}%</li>
                                            @endif
                                            <li class="bestsellers_mark bestsellers_new">new</li>
                                        </ul>
                                    </div>

                            @endforeach
                        @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
