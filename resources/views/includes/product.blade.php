


@foreach($items as $item)
    @foreach($item as $value)

<div class="single_product">
    <div class="container">
        <div class="row">

            <!-- Images -->
            <div class="col-lg-2 order-lg-1 order-2">
                <ul class="image_list">
                    @for ($count = 1; $count < count(scandir($dir = 'images/'.$value->type.'/'.$value->brand.'/'.$value->image))-1; $count++)
                        <li data-image="{{asset('images').'/'.$value->type.'/'.$value->brand.'/'.$value->image.'/'.$count}}.jpg"><img src="{{asset('images').'/'.$value->type.'/'.$value->brand.'/'.$value->image.'/'.$count}}.jpg" alt=""></li>
                    @endfor
                </ul>
            </div>

            <!-- Selected Image -->
            <div class="col-lg-5 order-lg-2 order-1">
                <div class="image_selected">
                    <img  src="{{asset('public/images').'/'.$value->type.'/'.$value->brand.'/'.$value->image}}/1.jpg"
                          alt="{{$value->name}}">
                </div>
            </div>
            <!-- Description -->
            <div class="col-lg-5 order-3">
                <div class="product_description">
                    <div class="product_category"> {{$value->type}}</div>
                    <div class="product_name"> {{$value->name}}</div>
                    <!--
                    <div class="rating_r rating_r_4 product_rating"><i></i><i></i><i></i><i></i><i></i></div>
                    -->
                    <div class="product_text">
                        <p>
                            @if ($value->type == 'bracelets')
                                Functions:{{$value->functions}}, screen: {{$value->resolution}}/{{$value->sensor}},
                                calls: {{$value->calls}},features:{{$value->features}}, interface: {{$value->interface}},
                                waterproof: {{$value->waterproof}},male/female:{{$value->gender}},
                                calls: {{$value->calls}}, OS: {{$value->os}}, color: {{$value->color}},
                                size: {{$value->size}}, weight: {{$value->weight}}
                            @elseif($value->type == 'cellphones')
                                Series: {{$value->series}}, flash-card: {{$value->slot}}, sim-card: {{$value->sim}}/{{$value->simduo}},
                                battery: {{$value->battery}}, screen: {{$value->resolution}}/{{$value->screensize}},
                                camera: rear {{$value->rearcam}}/front {{$value->frontcam}},
                                shell material: {{$value->material}}, producer: {{$value->producer}}
                            @elseif($value->type == 'smartphones')
                                Series: {{$value->series}}, CPU: {{$value->cpu}}/{{$value->core}}/{{$value->frequency}},
                                RAM: {{$value->ram}}, ROM: {{$value->rom}}, OS: {{$value->os}},
                                flash-card:{{$value->slot}}, sim-card:{{$value->sim}}/{{$value->simduo}},
                                battery:{{$value->battery}}, screen:{{$value->resolution}}/{{$value->screensize}},
                                camera: rear {{$value->rearcam}}/front {{$value->frontcam}},
                                shell material: {{$value->material}}, height: {{$value->height}}, weight: {{$value->weight}},
                                producer: {{$value->producer}}
                            @else
                                Functions: {{$value->functions}}, сompatibility: {{$value->сompatibility}},
                                screen:{{$value->screen}}/{{$value->resolution}}/{{$value->diagonal}},
                                CPU: {{$value->cpu}},RAM: {{$value->ram}}, ROM: {{$value->rom}}, OS: {{$value->os}},
                                bluetooth: {{$value->bluetooth}}, case: {{$value->case}}, strap: {{$value->strap}},
                                networks: {{$value->networks}}, hrm: {{$value->hrm}}, microphone: {{$value->microphone}},
                                connectors: {{$value->connectors}}
                            @endif

                        </p>
                    </div>
                    <div class="order_info d-flex flex-row">
                        <form action="#">
                            <!--
                            <div class="clearfix" style="z-index: 1000;">

                                 Product Quantity
                                <div class="product_quantity clearfix">
                                    <span>Quantity: </span>
                                    <input id="quantity_input" type="text" pattern="[0-9]*" value="1">
                                    <div class="quantity_buttons">
                                        <div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>
                                        <div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
                                    </div>
                                </div>

                                Product Color
                                <ul class="product_color">
                                    <li>
                                        <span>Color: </span>
                                        <div class="color_mark_container"><div id="selected_color" class="color_mark"></div></div>
                                        <div class="color_dropdown_button"><i class="fas fa-chevron-down"></i></div>

                                        <ul class="color_list">
                                            <li><div class="color_mark" style="background: #999999;"></div></li>
                                            <li><div class="color_mark" style="background: #b19c83;"></div></li>
                                            <li><div class="color_mark" style="background: #000000;"></div></li>
                                        </ul>
                                    </li>
                                </ul>

                            </div>
-->
                            <div class="product_price">{{$currencies->sign .ceil(((int)$value->price - (int)$value->price * (int)$value->discount/100)/(int)$currencies->value)}}</div>
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

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

    @endforeach
@endforeach
