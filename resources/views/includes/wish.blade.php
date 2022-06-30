<div class="cart_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="cart_container">
                    @php($total = 0)
                    @if (is_array($items) && sizeof($items)>0)
                        <div class="cart_title">Wishlist</div>
                        <div class="cart_items">
                            <ul class="cart_list">
                                @foreach($items as $item)
                                    @foreach($item as $values)
                                        @foreach($values as $value)
                                            <li class="cart_item clearfix">
                                                <div class="cart_item_image"><img style="max-height: 110px"
                                                                                  src="{{asset('public/images').'/'.$value->type.'/'.$value->brand.'/'.$value->image}}/1.jpg"
                                                                                  alt="{{$value->name}}"></div>
                                                <div
                                                    class="cart_item_info d-flex flex-md-row flex-column justify-content-center">
                                                    <div class="cart_item_name cart_info_col">
                                                        <div class="cart_item_title">Name</div>
                                                        <div class="cart_item_name_text"><a href="{{ route('product')."/".$value->type."/".$value->brand."/".$value->id}}">{{$value->name}}</a></div>
                                                    </div>
                                                    <div class="cart_item_name cart_info_col">
                                                        <div class="cart_item_title">Brand</div>
                                                        <div class="cart_item_brand_text">{{$value->brand}}</div>
                                                    </div>
                                                    <div class="cart_item_price cart_info_col">
                                                        <div class="cart_item_title">Price</div>
                                                        @if ((int)$value->discount>0)
                                                            <div
                                                                @php($price = ceil(((int)$value->price - (int)$value->price * (int)$value->discount/100)/(int)$currencies->value))
                                                                class="cart_item_price_text">{{$currencies->sign. $price}}</div>
                                                        @else
                                                            @php($price = ceil($value->price/(int)$currencies->value))
                                                            <div
                                                                class="cart_item_price_text">{{$currencies->sign. $price}}</div>
                                                        @endif
                                                    </div>

                                                    <div class="cart_item_name cart_info_col">
                                                        <div class="button_container">
                                                            <button type="button" class="button cart_button" name="{{'add-'.$value->type.'-'.$value->brand.'-'.$value->id}}" value ="{{ceil(((int)$value->price - (int)$value->price * (int)$value->discount/100)/(int)$currencies->value)}}">Add to Cart</button>

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

                                                        </div>
                                                    </div>

                                                </div>
                                            </li>
                                        @endforeach
                                    @endforeach
                                @endforeach
                            </ul>
                        </div>
                    @else
                        <div class="cart_title">Shopping Cart is empty</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

