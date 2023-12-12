@section('stylesheet')
    <link href="{{asset('/')}}front/build/categoryProduct.css" rel="stylesheet">
    <style>
        .modal-backdrop {
            display: none;
        }

        .modal {
            background: rgba(0, 0, 0, 0.5);
        }

        .radio-group .col {
            padding: 0px !important;
        }

        .radio-group label {
            color: #303030;
            display: inline-block;
            cursor: pointer;
            font-weight: 400;
            font-size: 12px;
            padding: 5px 11px;
            margin-bottom: 0px;
            margin-right: -15px;
        }

        .product_size_label {
            display: inline-block;
            text-align: center;
            box-sizing: border-box;
            width: inherit;
            /* border-radius: 10px 0 0 10px; */
        }

        .toppings_icons {
            margin: 10px;
            width: 40px;
        }

        .cust_pan_padding {
            padding-right: 5px;
            padding-left: 5px;
        }

        .tablink {
            min-width: 25%;
        }

        .delivery- {
            color: #95989a;
            margin-top: 25px;
            font-size: 14px;
        }

        .location- {
            color: #95989a;
            margin-top: 26px;
            font-size: 14px;
        }


    </style>
@endsection
@extends('front.master', ['body_class' => 'sticky-header left-side-collapsed'])
@section('title')
    Order Pizza Online For Delivery | Home
@endsection
@section('body')
    @include('front.includes.left-sidebar')
    <!-- main content start-->
    <?php
    if (Session::get('Mode') == 'Delivery') {
        $mode = 'delivery';
        $icon = 'bike';
    } else {
        $mode = 'takeaway';
        $icon = 'takeway';
    }
    ?>
    <div class="main-content">
        @include('front.includes.cart-header')
        {{--class="tabpagecontent"--}}
        <div id="Pizza">
            <div class="scroll-content" id="productList">
                <div class="container-fluid bg-white">
                    <div class="row deli_loc_row">
                        <div class="col-md-4">
                            <div class="delivery-">
                                <img src="{{asset('/')}}front/assets/imgs/{{$icon}}.png" width="25px">
                                <span>Mode:</span> {{ Session::get('Mode') }}
                            </div>
                        </div>
                        <div class="col-md-8" style="padding-left: 0px;">
                            <div class="location-">
                            <span style="float: left">
                            <i name="location" style="color:#95989a" class="icon icon-md ion-md-location"
                               aria-label="location-" ng-reflect-name="location"></i>
                            <span style="padding-left: 5px;"> Location :</span>
                            </span>

                                <span id="ellipsis">
                                @if($mode == 'delivery')
                                        {{ Session::get('Location') }}
                                    @else
                                        {{$storeName}}
                                    @endif
                            </span>
                                <input type="hidden" name="shiftingMode" value="{{ $mode }}">
                                <button type="button" onclick="event.preventDefault();" data-toggle="modal"
                                        data-target="#changeLocationModal"
                                        class="btn btn-outline-secondary btn-sm text-uppercase">Change
                                </button>
                                {{-- <span id="expand_address"><i class="fa fa fa-angle-down icon"></i></span>--}}
                            </div>
                        </div>
                    </div>
                </div>
            {{--<div class="top_wrapper">--}}
            {{--<div class="top_wrapper_left">--}}
            {{--                        @php($mode = Session::get('Mode'))--}}
            {{--<div class="line_01">--}}
            {{--<img src="{{asset('/')}}front/assets/imgs/{{$icon}}.png" width="35px">--}}
            {{--<span class="txt-red">Mode:</span> {{ Session::get('Mode') }}--}}
            {{--</div>--}}
            {{--<div class="line_02">--}}
            {{--<span style="float: left">--}}
            {{--<i name="location" style="color:#e13340" class="icon icon-md ion-md-location"--}}
            {{--aria-label="location" ng-reflect-name="location"></i>--}}
            {{--<span class="txt-red" style="padding-left: 15px;"> Location :</span>--}}
            {{--</span>--}}

            {{--<span id="ellipsis">--}}
            {{--@if($mode == 'delivery')--}}
            {{--{{ Session::get('Location') }}--}}
            {{--@else--}}
            {{--{{$storeName}}--}}
            {{--@endif--}}
            {{--</span>--}}
            {{--<input type="hidden" name="shiftingMode" value="{{ $mode }}">--}}
            {{--<button type="button" onclick="event.preventDefault();" data-toggle="modal"--}}
            {{--data-target="#changeLocationModal"--}}
            {{--class="btn btn-outline-secondary btn-sm text-uppercase">Change--}}
            {{--</button>--}}
            {{-- <span id="expand_address"><i class="fa fa fa-angle-down icon"></i></span>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}

            <!--Start Product Card 01 -->
                @php($product_name = '')
                <h1 class="ribbon">
                    <strong class="ribbon-content">{{$categoryName}}</strong>
                </h1>
                @foreach($products as $product)
                    @if($product_name != $product->category_name)
                        <div class="hr-border text-style " text-center=""> {{$product->category_name}}</div>
                    @endif
                    <?php
                    $price = 0;
                    if ($product->price_family > 0) {
                        $price = $product->price_family;
                    } elseif ($product->price_medium > 0) {
                        $price = $product->price_medium;
                    } elseif ($product->price_personal > 0) {
                        $price = $product->price_personal;
                    }
                    ?>
                    @php($crusts = $product->ingredients)
                    <div class="product_card">
                        <form class="addToCart" action="#" method="post">
                            <div class="pro_image">
                                @if($product->image)
                                    <img src="{{m_asset($product->image)}}" alt="{{$product->title}}" width="120px">
                                @else
                                    <img src="{{asset('/')}}front/assets/imgs/noimage.png" width="120px">
                                @endif

                            </div>
                            <div class="pro_details">
                                <input type="hidden" name="product_qty" value="1" min="1">
                                <input type="hidden" name="product_image" value="{{$product->image}}">
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                <input type="hidden" name="short_description" value="{{$product->short_description}}">
                                <input type="hidden" name="product_raw_name" value="{{$product->title}}">

                                @if($product->price_family > 0)
                                    @php($pizza_size = 'price_family')
                                    <input type="hidden" name="product_size_id" value="{{$product->id.'000'}}">
                                    <input type="hidden" name="product_name"
                                           value="{{$product->title.'<br/>'.'Size - Family'}}">
                                    <input type="hidden" name="product_price" value="{{$product->price_family}}"
                                           min="1">
                                    <p><span>{{$product->title}}</span><span
                                                class="pro_price mobile_pro_price">{{$product->price_family}}</span></p>
                                @elseif($product->price_medium > 0)
                                    @php($pizza_size = 'price_medium')
                                    <input type="hidden" name="product_size_id" value="{{$product->id.'001'}}">
                                    <input type="hidden" name="product_name"
                                           value="{{$product->title.'<br/>'.'Size - Medium'}}">
                                    <input type="hidden" name="product_price" value="{{$product->price_medium}}"
                                           min="1">
                                    <p><span>{{$product->title}}</span><span
                                                class="pro_price mobile_pro_price">{{$product->price_medium}}</span></p>
                                @elseif($product->price_personal > 0)
                                    @php($pizza_size = 'price_personal')
                                    <input type="hidden" name="product_size_id" value="{{$product->id.'002'}}">
                                    <input type="hidden" name="product_name"
                                           value="{{$product->title.'<br/>'.'Size - Personal'}}">
                                    <input type="hidden" name="product_price" value="{{$product->price_personal}}"
                                           min="1">
                                    <p><span>{{$product->title}}</span><span
                                                class="pro_price mobile_pro_price">{{$product->price_personal}}</span></p>
                                @endif
                                <p class="short-desc">{{$product->short_description}}</p>
                                <div class="radio-group">
                                    @php($checked = 'checked')
                                    @php($product_number = 0)

                                    <div class="row ml-0 mr-0 product_content_display">
                                        @if($product->price_family > 0)
                                            <div class="col col-lg col-sm-12" style="border-right:3px solid white">
                                                <input type="radio" name="pizza_size" data-size="price_family"
                                                       data-name="product_display"
                                                       {{$checked}}
                                                       data-size_id="{{$product->id.'000'}}"
                                                       data-title="{{'Size - Family'}}"
                                                       data-price="{{$product->price_family}}"
                                                       data-product_number={{$product_number++}}
                                                               id="family_size_{{$product->id}}">
                                                <label for="family_size_{{$product->id}}" class="product_size_label">Family</label>&nbsp;&nbsp;&nbsp;
                                            </div>
                                            @php($checked = '')
                                        @endif
                                        @if($product->price_medium > 0)
                                            <div class="col col-lg col-sm-12">
                                                <input type="radio" name="pizza_size" data-size="price_medium"
                                                       data-name="product_display"
                                                       {{$checked}}
                                                       data-size_id="{{$product->id.'001'}}"
                                                       data-title="{{'Size - Medium'}}"
                                                       data-price="{{$product->price_medium}}"
                                                       data-product_number={{$product_number++}}
                                                               id="medium_size_{{$product->id}}">
                                                <label for="medium_size_{{$product->id}}" class="product_size_label">Medium</label>&nbsp;&nbsp;&nbsp;
                                            </div>
                                            @php($checked = '')
                                        @endif
                                        @if($product->price_personal > 0)
                                            <div class="col col-lg col-sm-12" style="border-left:3px solid white;">
                                                <input type="radio" name="pizza_size" data-size="price_personal"
                                                       data-name="product_display"
                                                       {{$checked}}
                                                       data-size_id="{{$product->id.'009'}}"
                                                       data-title="{{'Size - Personal'}}"
                                                       data-price="{{$product->price_personal}}"
                                                       data-product_number={{$product_number}}
                                                               id="personal_size_{{$product->id}}">
                                                <label for="personal_size_{{$product->id}}"
                                                       class="product_size_label">Personal</label>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="info pan_sfo_text">
                                    <div class="row ml-0 mr-0">

                                        <div class="col-md-4 cust_pan_padding">
                                            <a class="removelinkdefault"
                                               href="{{--route('product-details',['id'=>$product->id])--}}"
                                               onclick="event.preventDefault();" data-toggle="modal"
                                               data-target="#prd_{{$product->id}}" data-whatever="{{$product->id}}">
                                                <p class="pro-detail-customize">Customize</p>
                                            </a>
                                        </div>
                                        <div class="col-md-4 crust_content_display cust_pan_padding">

                                            @foreach($crusts as $k=>$ingredient)
                                                <input type="radio" name="pizza_crust" data-size="price_medium"
                                                       data-name="crust_display"
                                                       value="{{$ingredient->id}}"
                                                       data-size_id="{{$product->id.'00'.$ingredient->id}}"
                                                       data-price_medium="{{$ingredient->price_medium}}"
                                                       data-price_personal="{{$ingredient->price_personal}}"
                                                       data-price_family="{{$ingredient->price_family}}"
                                                       data-crust_number="{{$k}}"
                                                       id="{{'crust_'.$k.$product->id}}"
                                                        {{ $k == 0 ? "checked" : ""}}
                                                >
                                                <label for="{{'crust_'.$k.$product->id}}"
                                                       class="product_size_label">{{$ingredient->name}}@if($k==0)&nbsp;|
                                                    &nbsp;@endif</label>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                {{--<a class="removelinkdefault"--}}
                                {{--href="--}}{{--route('product-details',['id'=>$product->id])--}}{{--"--}}
                                {{--data-toggle="modal"--}}
                                {{--data-target="#prd_{{$product->id}}" data-whatever="{{$product->id}}">--}}
                                {{--<p class="pro-detail-customize">Customize</p>--}}
                                {{--</a>--}}

                                <div>
                                    <input class="btn btn-success add-to-cart addToPrizeCart" type="button"
                                           name="submit" value="Add">
                                </div>

                                {{-----------------------------------------Customize------------------------------------------------------------}}

                                <div class="modal fade" id="prd_{{$product->id}}" tabindex="3" role="dialog"
                                     aria-hidden="true">
                                    <div class="modal-dialog cust_modal-dialog" role="document">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            @if($product->image)
                                                <img class="custom-top-img" src="{{m_asset($product->image)}}"
                                                     alt="{{$product->title}}">
                                            @else
                                                <img class="custom-top-img"
                                                     src="{{m_asset('/')}}front/assets/imgs/noimage.png"
                                                     alt="No Image">
                                            @endif

                                            <div class="modal-header cust_modal_header">
                                                <div class="sr_back_button" data-dismiss="modal">
                                                    <a href="{{route('/')}}"><i class="fa fa-times-circle icon"
                                                                                style="color: #fff;"></i></a>
                                                </div>

                                                <h4 class="modal-title cust_title pizza-title">{{$product->title}}</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="pizza-desc">{{$product->short_description}}</div>
                                                <div id="full_name"></div>
                                                <div class="pizza-builder-group-title" data-toggle="collapse"
                                                     data-target="#size_{{$product->id}}">Select Pizza Size
                                                </div>
                                                <div id="size_{{$product->id}}" class="collapse in">
                                                    <table width="100%">
                                                        <theah>
                                                            <tr>
                                                                <th width="80%"></th>
                                                                <th width="20%"></th>
                                                            </tr>
                                                        </theah>
                                                        <tbody id="product_content">
                                                        @php($checked = 'fa-check')
                                                        @if ($product->price_family > 0)
                                                            <tr>
                                                                <td>
                                                                    <div class='pizza-builder-group-item pizzaName'>
                                                                        Family
                                                                    </div>
                                                                    <div class='pizzaPrice'
                                                                         style='visibility: hidden;height: 0px;'>{{$product->price_family}}</div>
                                                                </td>
                                                                <td class='custom_piza_check' data-name='product'
                                                                    data-size_id="{{$product->id.'001'}}"
                                                                    data-price="{{$product->price_family}}"
                                                                    data-product_number={{$product_number}}
                                                                            data-size='price_family'>
                                                                    <i aria-hidden='true'
                                                                       class='fa {{$checked}}'></i>
                                                                </td>
                                                            </tr>
                                                            @php($checked = 'fa-plus')
                                                        @endif
                                                        @if($product->price_medium > 0)
                                                            <tr>
                                                                <td>
                                                                    <div class='pizza-builder-group-item pizzaName'>
                                                                        Medium
                                                                    </div>
                                                                    <div class='pizzaPrice'
                                                                         style='visibility: hidden;height: 0px;'>{{$product->price_medium}}</div>
                                                                </td>
                                                                <td class='custom_piza_check' data-name='product'
                                                                    data-size_id="{{$product->id.'002'}}"
                                                                    data-price="{{$product->price_medium}}"
                                                                    data-product_number={{$product_number}}
                                                                            data-size='price_medium'>
                                                                    <i aria-hidden='true'
                                                                       class='fa {{$checked}}'></i>
                                                                </td>
                                                            </tr>
                                                            @php($checked = 'fa-plus')
                                                        @endif
                                                        @if($product->price_personal > 0)
                                                            <tr>
                                                                <td>
                                                                    <div class='pizza-builder-group-item pizzaName'>
                                                                        Personal
                                                                    </div>
                                                                    <div class='pizzaPrice'
                                                                         style='visibility: hidden;height: 0px;'>{{$product->price_personal}}</div>
                                                                </td>
                                                                <td class='custom_piza_check' data-name='product'
                                                                    data-size_id="{{$product->id.'009'}}"
                                                                    data-price="{{$product->price_personal}}"
                                                                    data-product_number={{$product_number}}
                                                                            data-size='price_personal'
                                                                >
                                                                    <i aria-hidden='true'
                                                                       class='fa {{$checked}}'></i>
                                                                </td>
                                                            </tr>
                                                        @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="pizza-builder-group-title" data-toggle="collapse"
                                                     data-target="#crust_{{$product->id}}">Select Pizza Crust
                                                </div>
                                                <div id="crust_{{$product->id}}" class="collapse in">
                                                    <table width="100%">
                                                        <theah>
                                                            <tr>
                                                                <th width="20%"></th>
                                                                <th width="40%"></th>
                                                                <th width="20%"></th>
                                                                <th width="10%"></th>
                                                                <th width="10%"></th>
                                                            </tr>
                                                        </theah>
                                                        <tbody id="crust_content">
                                                        @php($crusts = $product->ingredients)
                                                        @php($all_crust = $product->ingredients->all())
                                                        @if(count($all_crust) > 0)
                                                            @php($ingredient1 = $all_crust[0])

                                                            <tr data-price_family="{{$ingredient1['price_family']}}"
                                                                data-price_medium="{{$ingredient1['price_medium']}}"
                                                                data-price_personal="{{$ingredient1['price_personal']}}">
                                                                <td>
                                                                    @if($ingredient1->image)
                                                                        <img class="toppings_icons"
                                                                             src="{{m_asset($ingredient1->image)}}"
                                                                             alt="">
                                                                    @else
                                                                        <img class="toppings_icons"
                                                                             src="{{asset('/')}}front/assets/imgs/Dec-21-pan.png"
                                                                             alt="">
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <div class="pizza-builder-group-item pizzaName">
                                                                        {{$ingredient1->name}}
                                                                    </div>
                                                                </td>
                                                                <td class='group-item-price'>
                                                                    <span class="pizzaPrice">{{$ingredient1[$pizza_size]}}</span>
                                                                </td>
                                                                <td class="custom_piza_check"
                                                                    data-name="crust"
                                                                    data-ingredient_id="{{$ingredient1->id}}"
                                                                    data-size_id="{{$product->id.'00'.$ingredient1->id}}"
                                                                >
                                                                    <i class="fa fa-check text-right"
                                                                       aria-hidden="true"></i>
                                                                </td>
                                                            </tr>
                                                        @endif
                                                        @if(count($all_crust) > 1)
                                                            @php($ingredient2 = $all_crust[1])
                                                            <tr data-price_family="{{$ingredient2['price_family']}}"
                                                                data-price_medium="{{$ingredient2['price_medium']}}"
                                                                data-price_personal="{{$ingredient2['price_personal']}}"
                                                                @if($pizza_size != 'price_medium' && in_array($product->category_id, [4,8,9,6]))
                                                                style="display: none;"
                                                                    @endif>
                                                                <td>
                                                                    @if($ingredient2->image)
                                                                        <img class="toppings_icons"
                                                                             src="{{m_asset($ingredient2->image)}}"
                                                                             alt="">
                                                                    @else
                                                                        <img class="toppings_icons"
                                                                             src="{{asset('/')}}front/assets/imgs/Dec-21-pan.png"
                                                                             alt="">
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <div class="pizza-builder-group-item pizzaName">
                                                                        {{$ingredient2->name}}
                                                                    </div>
                                                                </td>
                                                                <td class='group-item-price'>
                                                                    <span class="pizzaPrice">{{$ingredient2[$pizza_size]}}</span>
                                                                </td>
                                                                <td class="custom_piza_check"
                                                                    data-name="crust"
                                                                    data-ingredient_id="{{$ingredient2->id}}"
                                                                    data-size_id="{{$product->id.'00'.$ingredient2->id}}">
                                                                    <i class="fa fa-plus text-right"
                                                                       aria-hidden="true"></i>
                                                                </td>
                                                            </tr>
                                                        @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="pizza-builder-group-title" data-toggle="collapse"
                                                     data-target="#active_toppings_{{$product->id}}">Current
                                                    toppings
                                                </div>
                                                <div id="active_toppings_{{$product->id}}" class="collapse in">
                                                    <table width="100%">
                                                        <theah>
                                                            <tr>
                                                                <th width="20%"></th>
                                                                <th width="40%"></th>
                                                                <th width="20%"></th>
                                                                <th width="20%"></th>
                                                            </tr>
                                                        </theah>
                                                        <tbody class="current_toppings"></tbody>
                                                    </table>
                                                </div>
                                                <div class="pizza-builder-group-title" data-toggle="collapse"
                                                     data-target="#toppings_{{$product->id}}">Toppings List
                                                </div>
                                                <div id="toppings_{{$product->id}}" class="collapse in toppings">
                                                    <table width="100%">
                                                        <theah>
                                                            <tr>
                                                                <th width="20%"></th>
                                                                <th width="40%"></th>
                                                                <th width="20%"></th>
                                                                <th width="20%"></th>
                                                            </tr>
                                                        </theah>
                                                        <tbody id="toppings_content">
                                                        @php($toppings = $product->addons)
                                                        @foreach($toppings as $addons)
                                                            <tr data-price_family="{{$addons['price_family']}}"
                                                                data-price_medium="{{$addons['price_medium']}}"
                                                                data-price_personal="{{$addons['price_personal']}}">
                                                                <td>
                                                                    @if($addons->image)
                                                                        <img class="toppings_icons pizzaImage"
                                                                             src="{{m_asset($addons->image)}}"
                                                                             alt="">
                                                                    @else
                                                                        <img class="toppings_icons pizzaImage"
                                                                             src="{{asset('/')}}front/assets/imgs/Dec-21-pan.png"
                                                                             alt="">
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <div class="pizza-builder-group-item pizzaName">
                                                                        {{$addons->name}}
                                                                    </div>
                                                                </td>
                                                                <td class='group-item-price'>
                                                                    <span class="pizzaPrice">{{$addons[$pizza_size]}}</span>
                                                                </td>
                                                                <td class="custom_piza_check" data-name="toppings">
                                                                    <i class="fa fa-plus text-right"
                                                                       aria-hidden="true"></i>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="qty_card">
                                                    <table>
                                                        <tr>
                                                            <td width="70%"><span class="storename">Quantity</span></td>
                                                            <td width="30%">
                                                                <span class="storename quantity">
                                                                    <div class="minus-circle">
                                                                        <button id="minus-circle" type="button">
                                                                            <i class="fa fa-minus-circle"></i></button>
                                                                    </div>
                                                                    <div class="item-qty"> 1 </div>
                                                                    <div class="plus-circle">
                                                                        <button id="plus-circle" type="button"><i
                                                                                    class="fa fa-plus-circle"></i></button>
                                                                    </div>
                                                                </span>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div><!-- .store_card -->
                                            </div>
                                            <div class="modal-footer">
                                                <form action="#" method="post">
                                                    <input type="hidden" name="product_id">
                                                    <input type="hidden" name="product_virtual_id" value="786">
                                                    <input type="hidden" name="product_name">
                                                    <input type="hidden" name="product_qty" min="1">
                                                    <input type="hidden" name="product_price">
                                                    <input type="hidden" name="product_image">
                                                    <button type="button" class="checkout_btn addToCustomCart" data-dismiss="modal"> Add To
                                                        Cart <span class="text-right ml-5 mobile_pro_price"
                                                                   id="total_price">{{$price}}</span>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    @php($product_name = $product->category_name)
                @endforeach
            </div><!-- .scroll-content -->

        </div><!-- End of Deals -->


    </div>

    @include('front.includes.category-product-footer')
    @include('front.includes.change-location-modal')
    @include('front.includes.search-location-modal')
    <!-- Footer Tab Script -->
@endsection
@section('script')
    <script>
        $(function () {
            // $("input[name='pizza_size']").change(function () {
            //     let id = $(this).data('size_id');
            //     let title = $(this).data('title');
            //     let price = $(this).data('price');
            //     $(this).parents('.pro_detail').find('.pro_price').html(price);
            //     $(this).parents('.pro_detail').find('input[name=product_size_id]').val(id);
            //     $(this).parents('.pro_detail').find('input[name=product_name]').val(title);
            //     $(this).parents('.pro_detail').find('input[name=product_price]').val(price);
            // });
            $('#expand_address').click(function () {
                if ($(this).find('i').hasClass('fa-angle-down')) {
                    $('#ellipsis').css('white-space', 'normal');
                    $(this).find('i').removeClass('fa-angle-down').addClass('fa-angle-up');
                    $('.top_wrapper').css('height', '135px');
                } else {
                    $('#ellipsis').css('white-space', 'nowrap');
                    $(this).find('i').removeClass('fa-angle-up').addClass('fa-angle-down');
                    $('.top_wrapper').css('height', '100px');
                }

            });
        });


        $(function () {

            let productList = $('#productList');

            productList.on('hidden.bs.modal', function (e) {
                productList.css("overflow-y", "scroll");
            }).on('show.bs.modal', function (e) {
                productList.css("overflow-y", "hidden");
            });

            function changePrize(_this) {
                var current_product = $(_this).parents('.pro_details');
                let item_name = $(_this).data('name');
                let product_size = $(_this).data('size');
                let product_title = current_product.find("input[name='product_raw_name']").val();
                let total_price = 0;
                let setToppings = function (price) {
                    current_product.find('#crust_content').children('tr').each(function () {
                        $(this).find('.pizzaPrice').html($(this).data(price));
                    });
                    current_product.find('#toppings_content').children('tr').each(function () {
                        $(this).find('.pizzaPrice').html($(this).data(price));
                    });
                };
                let addToppings = function () {
                    let visual_topping = "<tr>\n" +
                        "                            <td>\n" +
                        "                                <img class=\"toppings_icons\" src=:addon_image>" +
                        "                                </img>\n" +
                        "                            </td>\n" +
                        "                            <td>\n" +
                        "                                <div class=\"pizza-builder-group-item pizzaName\" >:addon_name\n" +
                        "                                </div>\n" +
                        "                            </td>\n" +
                        "                            <td class='group-item-price'>\n" +
                        "                                +<span class=\"pizzaPrice\" >:addon_price\n" +
                        "                                </span>\n" +
                        "                            </td>\n" +
                        "                            <td class=\"custom_piza_check\" data-name=\"toppings\" ><i style='visibility: hidden;' class=\"fa fa-check text-right\" aria-hidden=\"true\"></i>\n" +
                        "                            </td>\n" +
                        "                            <td class=\"custom_piza_check\" data-name=\"remove-toppings\"><i class=\"fa fa-times-circle text-right\" aria-hidden=\"true\"></i>\n" +
                        "                            </td>\n" +
                        "                        </tr>";
                    let topping_name = $(_this).parent('tr').find('.pizzaName').html();
                    let topping_price = $(_this).parent('tr').find('.pizzaPrice').html();
                    let topping_image = $(_this).parent('tr').find('.pizzaImage').attr('src');
                    visual_topping = visual_topping.replace(':addon_name', topping_name);
                    visual_topping = visual_topping.replace(':addon_price', topping_price);
                    visual_topping = visual_topping.replace(':addon_image', topping_image);
                    current_product.find('.current_toppings').append(visual_topping);
                };//.bind(_this);
                let removeToppings = function () {
                    $(_this).parent('tr').remove();
                };//.bind(_this);
                let addCheckIcon = function () {
                    // var _this = $(e.currentTarget);
                    $(_this).find('i').removeClass('fa-plus').addClass('fa-check');
                    var this_tr = $(_this).parents('tr');
                    $(_this).closest('tbody').children().not(this_tr).each(function () {
                        $(this).find('i').removeClass('fa-check').addClass('fa-plus');
                    });
                };//.bind(_this);
                let calculateTotalPrice = function () {
                    let full_name = product_title + '<br/>';
                    // let full_name = '';
                    let item_quantity = current_product.find('input[name=product_qty]').val();
                    let product = 'Size: ';
                    let crust = '<br/>Crust: ';
                    let toppings = '<br/>Toppings: ';
                    current_product.find('.custom_piza_check').each(function () {
                        if ($(this).children('i').hasClass('fa-check')) {
                            let name = $(this).parent('tr').find('.pizzaName').html();
                            let price = $(this).parent('tr').find('.pizzaPrice').html();
                            let product_full_name = $(this).data('name');
                            if (typeof name !== "undefined") {
                                if (product_full_name == 'product') {
                                    product += name + ',';
                                } else if (product_full_name == 'crust') {
                                    crust += name + ',';
                                } else if (product_full_name == 'toppings') {
                                    toppings += name + ',&nbsp;';
                                }
                                // full_name += name + ',&nbsp;';
                            }
                            if (typeof price !== "undefined") {
                                total_price += parseFloat(price);
                            }
                        }
                    });
                    full_name += product + crust + toppings;

                    if (full_name.length > 0) {
                        current_product.find('#full_name').html(full_name);
                        current_product.find('input[name=product_name]').val(full_name);
                    }
                    // current_product.find('input[name=uniq_product_price]').val(total_price);
                    current_product.find('input[name=product_price]').val(total_price);
                    current_product.find('input[name=sd]').val(Math.round(total_price * 0.10));
                    if (item_quantity > 1)
                        total_price = (total_price * item_quantity).toFixed(2);
                    current_product.find('.mobile_pro_price').html(total_price);
                };//.bind(_this);
                let toppingsPrice = function (product_size) {
                    current_product.find('.current_toppings').html('');
                    setToppings(product_size);
                    // $.when(addCheckIcon()).done(function () {
                    //     setToppings(product_size);
                    // });
                };
                let generateProductId = function () {
                    let size_id = $(_this).data('size_id');
                    if (item_name == 'crust_display' || item_name == 'crust') {
                        let crust_value = $(_this).val();
                        let selected_product_size_id = current_product.find('.product_content_display').find("input[name='pizza_size']:checked").data('size_id');
                        if (crust_value == 3) {
                            size_id = selected_product_size_id;
                        } else if (crust_value == 4) {
                            size_id = parseInt(selected_product_size_id) + 3;
                        }
                    } else if (item_name == 'product_display' || item_name == 'product') {
                        let selected_crust_value = current_product.find('.crust_content_display').find("input[name='pizza_crust']:checked").val();
                        if (selected_crust_value == 4) {
                            size_id = parseInt(size_id) + 3;
                        }
                    }
                    $(_this).parents('.pro_details').find('input[name=product_size_id]').val(size_id);
                };
                if (item_name == 'product') {
                    let crust_id = current_product.find("input[name='pizza_crust']:checked").val();
                    let product_title = $(_this).data('size');
                    if (crust_id >= 1 && crust_id <= 2) {
                        if (product_title == 'price_medium') {
                            current_product.find('#crust_content').children('tr:eq(1)').show();
                        } else {
                            current_product.find('#crust_content').children('tr:eq(1)').hide();
                            current_product.find('#crust_content').children('tr:eq(0)').find('td.custom_piza_check > i').removeClass('fa-plus').addClass('fa-check');
                            current_product.find('#crust_content').children('tr:eq(0)').siblings().find('td.custom_piza_check > i').removeClass('fa-check').addClass('fa-plus');
                        }
                    }
                    generateProductId();
                    $.when(addCheckIcon()).done(function () {
                        $.when(toppingsPrice(product_size)).done(function () {
                            calculateTotalPrice();
                        });
                    });
                } else if (item_name == 'crust') {

                    generateProductId();
                    $.when(addCheckIcon()).done(function () {
                        calculateTotalPrice();
                    });
                } else if (item_name == 'toppings') {
                    $.when(addToppings()).done(function () {
                        calculateTotalPrice();
                    });
                } else if (item_name == 'remove-toppings') {
                    $.when(removeToppings()).done(function () {
                        calculateTotalPrice();
                    });
                } else if (item_name == 'product_display') {
                    generateProductId();
                    $.when(toppingsPrice(product_size)).done(function () {
                        calculateTotalPrice();
                    });
                } else if (item_name == 'crust_display') {
                    generateProductId();
                    $.when(toppingsPrice(product_size)).done(function () {
                        calculateTotalPrice();
                    });
                } else {
                    calculateTotalPrice();
                }
            }

            let setTotalPrice = function (qty, current_product) {
                let total_price = current_product.find('input[name=product_price]').val();
                current_product.find('.item-qty').html(qty);
                current_product.find('input[name=product_qty]').val(qty);
                let grand_total_price = (parseInt(total_price) * qty).toFixed(2);
                current_product.find('.mobile_pro_price').html(grand_total_price);
                // current_product.find('input[name=product_price]').val(grand_total_price);
                if (total_price > 0) {
                    $('.cartNotEmpty').show();
                    $('.cartEmpty').hide();
                } else {
                    $('.cartEmpty').show();
                    $('.cartNotEmpty').hide();
                }
            };
            productList.on('click', '.minus-circle', function () {
                var current_product = $(this).parents('.pro_details');
                let item_quantity = parseInt(current_product.find('.item-qty').html());
                if (item_quantity > 1) {
                    item_quantity -= 1;
                    setTotalPrice(item_quantity, current_product);
                }
            });
            productList.on('click', '.plus-circle', function () {
                var current_product = $(this).parents('.pro_details');
                let item_quantity = parseInt(current_product.find('.item-qty').html());
                item_quantity += 1;
                setTotalPrice(item_quantity, current_product);
            });
            productList.off('click', '.card-body').on('click', '.custom_piza_check', function (e) {
                if (!$(this).find('i').hasClass('fa-check')) { //then change back to the original one
                    changePrize(this);
                }
            });

            productList.on('change', "input[name='pizza_size']", function () {
                //Add Size in full name , chek button regarding size and crust in modal
                let current_product = $(this).parents('.pro_details');
                let product_title = current_product.find("input[name='pizza_size']:checked").data('size');
                let crust_id = current_product.find("input[name='pizza_crust']:checked").val();
                if (crust_id >= 1 && crust_id <= 2) {
                    if (product_title == 'price_medium') {
                        current_product.find('#crust_content').children('tr:eq(1)').show();
                    } else {
                        current_product.find('#crust_content').children('tr:eq(1)').hide();
                    }
                }
                let product_number = $(this).data('product_number');
                current_product.find('#product_content').children('tr:eq(' + product_number + ')').find('td.custom_piza_check > i').removeClass('fa-plus').addClass('fa-check');
                current_product.find('#product_content').children('tr:eq(' + product_number + ')').siblings().find('td.custom_piza_check > i').removeClass('fa-check').addClass('fa-plus');
                changePrize(this);
            });
//Price change as medium and family in
            productList.on('change', "input[name='pizza_crust']", function () {
                let crust_id = parseInt(this.value) - 1;
                let crust_number = $(this).data('crust_number');
                let parent = $(this).parents('.pro_details');
                parent.find('#crust_content').children('tr:eq(1)').show();
                parent.find('#crust_content').children('tr:eq(' + crust_number + ')').find('td.custom_piza_check > i').removeClass('fa-plus').addClass('fa-check');
                parent.find('#crust_content').children('tr:eq(' + crust_number + ')').siblings().find('td.custom_piza_check > i').removeClass('fa-check').addClass('fa-plus');
                let price_medium = $(this).data('price_medium');
                let price_personal = $(this).data('price_personal');
                let price_family = $(this).data('price_family');


                if (crust_id == 0) {
                    parent.find('.radio-group > .row').children('.col:eq(0)').show();
                    parent.find('.radio-group > .row').children('.col:eq(2)').show();
                    // changePrize(this);
                } else if (crust_id == 1) {
                    parent.find('.radio-group > .row').children('.col:eq(0)').hide();
                    parent.find('.radio-group > .row').children('.col:eq(2)').hide();
                    parent.find('.radio-group > .row').children('.col:eq(1)').find('input[type=radio]').prop("checked", true);
                    parent.find('#product_content').children('tr:eq(1)').find('td.custom_piza_check > i').removeClass('fa-plus').addClass('fa-check');
                    parent.find('#product_content').children('tr:eq(1)').siblings().find('td.custom_piza_check > i').removeClass('fa-check').addClass('fa-plus');
                } else {
                    // For crust ID 3 & 4
                }

                changePrize(this);
            });

            productList.on('click', '.addToPrizeCart', function (event) {
                event.preventDefault();
                changePrize(this);
                var form = $(this).parents('.pro_details');
                var product_id = form.find("input[name='product_id']").val();
                var product_size_id = form.find("input[name='product_size_id']").val();
                var product_name = form.find("input[name='product_name']").val();
                var product_short_description = form.find("input[name='short_description']").val();
                var product_price = form.find("input[name='product_price']").val();
                var product_qty = form.find("input[name='product_qty']").val();
                var product_image = form.find("input[name='product_image']").val();
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: "POST",
                    url: '{{route('add-to-card')}}',
                    // data: {form:form},
                    data: {
                        _token: CSRF_TOKEN,
                        product_id: product_id,
                        product_size_id: product_size_id,
                        product_name: product_name,
                        product_short_description: product_short_description,
                        product_price: product_price,
                        product_qty: product_qty,
                        product_image: product_image
                    },
                    success: function (msg) {
                        $('.card-icon').html(msg);
                        $('.cart-count').html($('.card-icon').find('#cart_count').html());
                        $('.cart-cost').html($('.card-icon').find('#cart_subtotal').html());
                    }
                });
            });
            productList.on('click', '.addToCustomCart', function (event) {
                event.preventDefault();
                changePrize(this);
                var form = $(this).parents('.pro_details');
                var product_id = form.find("input[name='product_id']").val();
                var product_virtual_id = '786';
                var product_name = form.find("input[name='product_name']").val();
                var product_short_description = form.find("input[name='short_description']").val();
                var product_price = form.find("input[name='product_price']").val();
                var product_qty = form.find("input[name='product_qty']").val();
                var product_image = form.find("input[name='product_image']").val();
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: "POST",
                    url: '{{route('add-to-card')}}',
                    // data: {form:form},
                    data: {
                        _token: CSRF_TOKEN,
                        product_id: product_id,
                        product_virtual_id: product_virtual_id,
                        product_name: product_name,
                        product_short_description: product_short_description,
                        product_price: product_price,
                        product_qty: product_qty,
                        product_image: product_image
                    },
                    success: function (msg) {
                        $('.card-icon').html(msg);
                        $('.cart-count').html($('.card-icon').find('#cart_count').html());
                        $('.cart-cost').html($('.card-icon').find('#cart_subtotal').html());
                    }
                });

            });
            $('.carousel-inner .carousel-item:first-child').addClass('active');

            {{--$('.addToCart').submit(function (event) {--}}
            {{--event.preventDefault();--}}
            {{--var form = $(this);--}}
            {{--var product_id = form.find("input[name='product_id']").val();--}}
            {{--var product_size_id = form.find("input[name='product_size_id']").val();--}}
            {{--var product_virtual_id = form.find("input[name='product_virtual_id']").val();--}}
            {{--var product_name = form.find("input[name='product_name']").val();--}}
            {{--var product_short_description = form.find("input[name='short_description']").val();--}}
            {{--var product_price = form.find("input[name='product_price']").val();--}}
            {{--var product_qty = form.find("input[name='product_qty']").val();--}}
            {{--var product_image = form.find("input[name='product_image']").val();--}}
            {{--var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');--}}
            {{--$.ajax({--}}
            {{--type: "POST",--}}
            {{--url: '{{route('add-to-card')}}',--}}
            {{--// data: {form:form},--}}
            {{--data: {--}}
            {{--_token: CSRF_TOKEN,--}}
            {{--product_id: product_id,--}}
            {{--product_size_id: product_size_id,--}}
            {{--product_virtual_id: product_virtual_id,--}}
            {{--product_name: product_name,--}}
            {{--product_short_description: product_short_description,--}}
            {{--product_price: product_price,--}}
            {{--product_qty: product_qty,--}}
            {{--product_image: product_image--}}
            {{--},--}}
            {{--success: function (msg) {--}}
            {{--$('.card-icon').html(msg);--}}
            {{--$('.cart-count').html($('.card-icon').find('#cart_count').html());--}}
            {{--$('.cart-cost').html($('.card-icon').find('#cart_subtotal').html());--}}
            {{--}--}}
            {{--});--}}
            {{--});--}}

            $('#cartDetails').on('submit', '.UpdateToCart', function (e) {
                // $('.UpdateToCart').submit(function (event) {
                e.preventDefault();
                var form = $(this);
                var qty = form.find("input[name='qty']").val();
                var rowId = form.find("input[name='rowId']").val();
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                if (qty) {
                    var url = '{{ route("update-cart", ":id") }}';
                } else {
                    var url = '{{ route("delete-cart-product", ":id") }}';
                }
                url = url.replace(':id', rowId);
                $.ajax({
                    type: "POST",
                    url: url,
                    // data: {form:form},
                    data: {
                        _token: CSRF_TOKEN,
                        qty: qty,
                        rowId: rowId
                    },
                    success: function (msg) {
                        $('#cartDetails').html(msg);
                        let total_price = $('#totalPriceVirtual').html();
                        $('#totalPrice').children('span').html(total_price);
                        if (total_price > 0) {
                            $('.cartNotEmpty').show();
                            $('.cartEmpty').hide();
                        } else {
                            $('.cartEmpty').show();
                            $('.cartNotEmpty').hide();
                        }
                        // $('.profile-icon').html(msg);
                        // console.log(msg);
                        // $('#productCustomize').modal('hide');
                    }
                });
            });
            setNavigation();

        });


        function setNavigation() {
            var path = window.location;
            // path = path.replace(/\/$/, "");
            path = decodeURIComponent(path);

            $(".tab a").each(function () {
                let href = $(this).attr('href');
                if (path === href) {
                    $(this).children('.tablink').addClass('active');
                }
            });
        }
    </script>
    {{--    <script>
            (function (window, document, undefined) {
                'use strict';

                // Select nav items that have submenus
                var hasSubmenu = document.querySelectorAll('[data-id]');
                var active = 'active';
                var i = 0;

                // Show the submenu by toggling the relevant class names
                function showSubmenu(event) {
                    // We lose reference of this when filtering the nav items
                    var self = this;

                    // Select the relevant submenu, by the data-id attribute
                    var submenu = document.getElementById(self.dataset.id);

                    // Probably best to prevent clicks through
                    event.preventDefault();

                    // Referring to the submenu parentNode
                    // find all elements that aren't the submenu and remove active class
                    var otherSubmenu = Array.prototype.filter.call(
                        submenu.parentNode.children,
                        function (child) {
                            if (child !== submenu) {
                                removeChildClass(child);
                            }
                        });

                    // Referring to the the nav item parentNode
                    // find all elements that aren't the submenu and remove active class
                    var otherItem = Array.prototype.filter.call(
                        self.parentNode.children,
                        function (child) {
                            if (child !== self) {
                                removeChildClass(child);
                            }
                        });

                    self.classList.toggle(active);
                    submenu.classList.toggle(active);
                }

                // Remove the active class
                function removeChildClass(el) {
                    // Check if it exists, then remove
                    if (el.classList.contains(active)) {
                        el.classList.remove(active);
                    }
                }

                // On clicks show submenus
                for (i = 0; i < hasSubmenu.length; i++) {
                    hasSubmenu[i].addEventListener('click', showSubmenu);
                }
            })(window, document);
        </script>--}}
    @include('front.includes.setLocation')
@endsection