<div class="cart_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="cart_container">
                    @php($total = 0)
                    @if (is_array($items) && sizeof($items)>0)
                        <div class="cart_title">Shopping Cart</div>
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
                                                    <div class="cart_item_quantity cart_info_col">
                                                        <div class="cart_item_title">Quantity</div>
                                                        <div class="def-number-input number-input safari_only">
                                                            <button
                                                                onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                                                                class="minus"
                                                                name="{{'remove-'.$value->type.'-'.$value->brand.'-'.$value->id}}"
                                                                value="{{$price}}"></button>
                                                            <input class="quantity" min="0" name="quantity"
                                                                   value="{{$quantities[$loop->parent->parent->iteration]}}"
                                                                   type="number">
                                                            <button
                                                                onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                                                                class="plus"
                                                                name="{{'add-'.$value->type.'-'.$value->brand.'-'.$value->id}}"
                                                                value="{{$price}}"></button>
                                                        </div>
                                                    </div>
                                                    <div class="cart_item_total cart_info_col">
                                                        <div class="cart_item_title">Total</div>

                                                        @if ((int)$value->discount>0)
                                                            <div
                                                                class="cart_item_total_text">{{$currencies->sign. ceil(((int)$value->price - (int)$value->price * (int)$value->discount/100)/(int)$currencies->value)*$quantities[$loop->parent->parent->iteration]}}</div>
                                                        @else
                                                            <div
                                                                class="cart_item_total_text">{{$currencies->sign.ceil($value->price/(int)$currencies->value)*$quantities[$loop->parent->parent->iteration]}}</div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </li>
                                            @if ((int)$value->discount>0)
                                                @php($total= $total + ceil(((int)$value->price - (int)$value->price * (int)$value->discount/100)/(int)$currencies->value)*$quantities[$loop->parent->parent->iteration])
                                            @else
                                                @php($total= $total + ceil($value->price/(int)$currencies->value)*$quantities[$loop->parent->parent->iteration])
                                            @endif
                                        @endforeach
                                    @endforeach
                                    @if($loop->last)

                                    <!-- Order Total -->
                                        <div class="order_total">
                                            <div class="order_total_content text-md-right">
                                                <div class="order_total_title">Order Total:</div>
                                                <div class="order_total_amount">{{$currencies->sign.$total }}  </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        <div class="cart_buttons">
                            <button type="button" class="button cart_button_checkout">Checkout</button>
                        </div>
                    @else
                        <div class="cart_title">Shopping Cart is empty</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

