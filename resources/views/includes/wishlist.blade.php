<div class="wish_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="wish_container">
                    @php($total = 0)
                    @if (is_array($items) && sizeof($items)>0)
                        <div class="wish_title">Wishlist</div>
                        <div class="wish_items">
                            <ul class="wish_list">
                                @foreach($items as $item)
                                    @foreach($item as $values)
                                        @foreach($values as $value)
                                            <li class="wish_item clearfix">
                                                <div class="wish_item_image"><img style="max-height: 110px"
                                                                                  src="{{asset('public/images').'/'.$value->type.'/'.$value->brand.'/'.$value->image}}/1.jpg"
                                                                                  alt="{{$value->name}}"></div>
                                                <div class="wish_item_info d-flex flex-md-row flex-column justify-content-right">
                                                    <div class="wish_item_name wish_info_col">
                                                        <div class="wish_item_title">Type</div>
                                                        <div class="wish_item_name_text">{{$value->type}}</div>
                                                    </div>
                                                    <div class="wish_item_name wish_info_col">
                                                        <div class="wish_item_title">Name</div>
                                                        <div class="wish_item_name_text">{{$value->name}}</div>
                                                    </div>
                                                    <div class="wish_item_name wish_info_col">
                                                        <div class="wish_item_title">Brand</div>
                                                        <div class="wish_item_brand_text">{{$value->brand}}</div>
                                                    </div>
                                                    <div class="wish_item_price wish_info_col">
                                                        <div class="wish_item_title">Price</div>
                                                        @if ((int)$value->discount>0)
                                                            <div
                                                                @php($price = ceil(((int)$value->price - (int)$value->price * (int)$value->discount/100)/(int)$currencies->value))
                                                                class="wish_item_price_text">{{$currencies->sign. $price}}</div>
                                                        @else
                                                            @php($price = ceil($value->price/(int)$currencies->value))
                                                            <div
                                                                class="wish_item_price_text">{{$currencies->sign. $price}}</div>
                                                        @endif
                                                    </div>

                                                    <div class="wish_item_name wish_info_col justify-content-left">
                                                        <div class="button_container">
                                                            <button type="button" class="button cart_button" name="{{'add-'.$value->type.'-'.$value->brand.'-'.$value->id}}" value ="{{ceil(((int)$value->price - (int)$value->price * (int)$value->discount/100)/(int)$currencies->value)}}">Add to Cart</button>
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
                        <div class="wish_title">Wishlist is empty</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

