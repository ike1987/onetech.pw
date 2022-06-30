<div class="shop">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">

                <!-- Shop Sidebar -->
                <div class="shop_sidebar">
                    <div class="sidebar_section">
                        <div class="sidebar_title">Categories</div>
                        <ul class="sidebar_categories">
                            <li><a href="{{route('shop', ['category' => 'smartphones'])}}">Smartphones</a></li>
                            <li><a href="{{route('shop', ['category' => 'cellphones'])}}">Cellphones</a></li>
                            <li><a href="{{route('shop', ['category' => 'watches'])}}">Smart watches</a></li>
                            <li><a href="{{route('shop', ['category' => 'bracelets'])}}">Fitness bracelets</a></li>

                        </ul>
                    </div>

                    @if (!$category == null)
                        <div class="sidebar_section filter_by_section">
                            <div class="sidebar_title">Filter By</div>
                            <div class="sidebar_subtitle">Price</div>
                            <div class="filter_price">
                                <div id="slider-range" class="slider_range"
                                     aria-valuemin="<?=ceil((int)$items['price']['min'] / 32.5) - 3;?>"
                                     aria-valuemax="<?=ceil((int)$items['price']['max'] / 32.5) + 3;?>"></div>
                                <p>Range: </p>
                                <p><input type="text" id="amount" class="amount" readonly
                                          style="border:0; font-weight:bold;"></p>
                            </div>
                        </div>
                        <!--
                        <div class="sidebar_section">
                            <div class="sidebar_subtitle color_subtitle">Color</div>
                            <ul class="colors_list">
                                <li class="color"><a href="#" style="background: #b19c83;"></a></li>
                                <li class="color"><a href="#" style="background: #000000;"></a></li>
                                <li class="color"><a href="#" style="background: #999999;"></a></li>
                                <li class="color"><a href="#" style="background: #0e8ce4;"></a></li>
                                <li class="color"><a href="#" style="background: #df3b3b;"></a></li>
                                <li class="color"><a href="#" style="background: #ffffff; border: solid 1px #e1e1e1;"></a></li>
                            </ul>
                        </div>
                        -->
                        <div class="sidebar_section">
                            <div class="sidebar_subtitle brands_subtitle">Brands</div>
                            <ul class="brands_list">
                                @foreach($items['brand'] as $item)
                                    @foreach($item as $value)
                                        <li class="brand"><a
                                                href="{{route('shop')}}/{{$category}}/{{$value->brand}}">{{$value->brand}}</a>
                                        </li>
                                    @endforeach
                                @endforeach
                            </ul>
                        </div>
                    @endif

                </div>
            </div>

            <div class="col-lg-9">

                <!-- Shop Content -->

                <div class="shop_content">
                    <div class="shop_bar clearfix">
                        <div class="shop_product_count"><span>187</span> products found</div>
                        <div class="shop_sorting">
                            <span>Sort by:</span>
                            <ul>
                                <li>
                                    <span class="sorting_text">highest rated<i class="fas fa-chevron-down"></i></span>
                                    <ul>
                                        <li class="shop_sorting_button"
                                            data-isotope-option='{ "sortBy": "original-order" }'>highest rated
                                        </li>
                                        <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "name" }'>
                                            name
                                        </li>
                                        <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "price" }'>
                                            price
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="product_grid">
                        <div class="product_grid_border"></div>

                    @php($date = date('m:y'))
                    @foreach($items['items'] as $item)
                        @foreach($item as $value)
                            <!-- Product Item -->
                                <div class="product_item
                                 @if(str_contains($value->arrival, $date))is_new
                                 @endif
                                @if($value->discount>0) discount
                                 @endif ">
                                    <div class="product_border"></div>
                                    <div
                                        class="product_image d-flex flex-column align-items-center justify-content-center">
                                        <img style="max-height: 110px"
                                             src="{{asset('public/images').'/'.$value->type.'/'.$value->brand.'/'.$value->image}}/1.jpg"
                                             alt="{{$value->name}}"></div>
                                    <div class="product_content">
                                        <div
                                            class="product_price discount">{{$currencies->sign. ceil(((int)$value->price - (int)$value->price * (int)$value->discount/100)/(int)$currencies->value)}}
                                            @if ($value->discount>0)
                                                <span>{{$currencies->sign. ceil((int)$value->price/(int)$currencies->value)}}</span>
                                            @endif
                                        </div>
                                        <div class="product_name">
                                            <div>
                                                <a href="{{ route('product').'/'.$value->type.'/'.$value->brand.'/'.$value->id}}"
                                                   tabindex="0">{{$value->name}}</a></div>
                                        </div>

                                        <div style="padding-top: 10px">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button class="cart_button"
                                                    name="{{'add-'.$value->type.'-'.$value->brand.'-'.$value->id}}"
                                                    value="{{ceil(((int)$value->price - (int)$value->price * (int)$value->discount/100)/(int)$currencies->value)}}"
                                                    style="background-color: #0e8ce4; border-radius: 5px; border: none; color:white; ">
                                                Add to Cart
                                            </button>
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
                                                                <i class="fas fa-heart"></i></div>
                                                            <ul class="product_marks">
                                                                <li class="product_mark product_discount">
                                                                    -{{$value->discount}}%
                                                                </li>
                                                                <li class="product_mark product_new">new</li>
                                                            </ul>
                                                    </div>
                                                    @endforeach
                                                    @endforeach

                                            </div>

                                            <!-- Shop Page Navigation -->
                                            <!--
                                            <div class="shop_page_nav d-flex flex-row">
                                            <div class="page_prev d-flex flex-column align-items-center justify-content-center"><i class="fas fa-chevron-left"></i></div>
                                            <ul class="page_nav d-flex flex-row">
                                            <li><a href="#">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li><a href="#">...</a></li>
                                            <li><a href="#">21</a></li>
                                            </ul>
                                            <div class="page_next d-flex flex-column align-items-center justify-content-center"><i class="fas fa-chevron-right"></i></div>
                                            </div>
                                            -->
                                </div>

                    </div>
                </div>
            </div>
        </div>
