@section('stylesheet')
    <style>
        #ckt_btn {
            background-color: #0a8020;
            width: 95%;
            margin: 10px;
            height: 30px;
            font-size: 12px;
            padding-top: 5px;
            color: #fff;
            border-radius: 2px;
        }

        .quantity {
            display: block;
            width: 80px;

        }

        .quantity button, .times-circle button {
            background-color: white;
        }

        .quantity .fa, .times-circle .fa {
            color: #e0e0e0;
            font-size: 20px;
        }

        .minus-circle {
            float: left;
        }

        .item-qty {
            float: left;
            width: 20px;
            text-align: center;
        }

        .plus-circle {
            float: left;
        }

        .times-circle {
            float: right;
        }

        /******************* Carousel *************************/
        .product_card .short-desc {
            min-height: 25px;
            line-height: 15px;
            font-weight: 400;
            font-size: 12px;
            color: #000;
            white-space: normal;
            margin: 2px 0px 2px 0px;

            display: block;
            display: -webkit-box;
            max-width: 80%;
            height: 25px;
            line-height: 1;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            margin-bottom: 5px;
        }

        .product_card .pro-sub-title {
            font-size: 12px;
            font-weight: 400;
            margin-bottom: 2px;
        }

        .product_card .pro-sub-title > span:first-child {
            margin-right: 20px;
        }

        .product_card {
            position: relative;
            overflow: hidden;
            width: 85%;
            height: 90px !important;
            margin: 10px 15px;
        }

        .product_card .add-to-cart {
            position: absolute;
            bottom: 10px;
            right: 15px;
            padding: 0 20px;
            font-size: 14px;
            background-color: #0a8020;
        }

        .product_card .pro_image {
            float: left;
            width: 30%;

        }

        .product_card .pro_detail {
            float: left;
            padding-left: 10px;
            width: 70%;

        }

        .product_card .pro_price {
            text-align: right;
            position: absolute;
            right: 15px;
            font-size: 18px;
            color: rgb(0, 0, 0);
        }

        .product_card .pro-detail-customize {
            text-decoration: underline;
            position: absolute;
            bottom: 2px;

        }

        .ad_right_arrow {
            margin-top: 20px;
        }

        .sr_back_button {
            font-size: 30px;
            margin-right: 0px;
            float: left;
            margin-top: 0px !important;
        }

        .cart_card {
            margin: 10px;
            border-radius: 2px;
            width: calc(100% - 20px);
            font-size: 1.4rem;
            background: #fff;
            display: block;
            font-family: 'Open Sans', sans-serif;
            height: 200px;
            overflow-y: scroll;
        }

        .hr-border {
            display: flex;
            align-items: center;
            font-size: 23px;
            font-weight: 700;
            margin: 0px;
            text-transform: uppercase;
            padding: 10px;
        }

        hr {
            margin-top: 7px;
            margin-bottom: 5px;
            border: 0;
            border-top: 1px solid #eee;
        }

        .product_name {
            display: block;
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            padding-top: 13px;
        }

        #accordion .panel-heading {
            padding: 0;
        }

        #accordion .panel-title > a {
            display: block;
            padding: 0.4em 0.6em;
            outline: none;
            font-weight: bold;
            text-decoration: none;
        }

        #accordion .panel-title > a.accordion-toggle::before, #accordion a[data-toggle="collapse"]::before {
            content: "\e113";
            float: left;
            font-family: 'Glyphicons Halflings';
            margin-right: 1em;
        }

        .addon_title {
            width: 130px;
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .product_card .pro_price {
            margin: -20px 0px 0px 0px;
        }

        #accordion .panel-title > a.accordion-toggle.collapsed::before, #accordion a.collapsed[data-toggle="collapse"]::before {
            content: "\e114";
        }


        .coupon-code-injector-input-group {
            position: relative;
        }
        .position-relative {
            position: relative!important;
        }
        .coupon-code-injector-input {
            width: 100% !important;
            border-style: dashed !important;
            padding-right: 80px !important;
            font-size: 13px !important;
            font-weight: 400;
            line-height: 1.5;
            color: #231f20;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #dfdfe3 !important;
            border-radius: 5px;
        }
        .cart_card table{
            /*width:100%;*/
            /*border: none;*/
        }

        .cart_card table tr td{
            padding-left: 4px;
        }

        .cupon--add--button{
            border-color: #0a8020;
            background-color: #0a8020;
        }

        .cart_apply_text{
            display: flex;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: center;
            justify-content: center;
            font-weight: 400;
            font-size: 10px;
            color: rgb(0, 0, 0);
            height: 15px;
            margin: 5px 0px 5px 0px;

        }

        .cart_card_other_center {
            background: rgb(230, 230, 230);

            height: 140px;

            border-top: 2px solid #999;

            border-bottom: 2px solid #999;
        }

        @media screen and (max-width: 375px) and (min-width: 321px) {
            .cart_card {
                min-height: 250px;
            }
            .container {
                 margin: 0px 15px !important;
                 padding: auto !important;
            }
        }

        @media screen and (max-width: 480px) and (min-width: 386px) {
            .product_name {
                height: 45px;
            }

            .cart_card {
                min-height: 340px;
            }
            .container {
                margin: 15px 15px !important;
                padding: 0px auto !important;
            }
        }

        @media screen and (min-width: 321px) and (max-width: 385px) {
            .product_name {
                width: 100%;
            }
            .container {
                margin: 15px 15px !important;
                padding: 0px auto !important;
            }
        }
        @media (max-width: 640px){
            .container {
                padding-right: 15px !important;
                padding-left: 15px !important;
            }
        }



    </style>
@endsection
@extends('front.master', ['body_class' => 'sticky-header left-side-collapsed'])
@section('title')
    Order Pizza Online For Delivery | Cart
@endsection
@section('body')
    <!-- main content start-->
    <div class="main-content">
        @include('front.includes.back-header',['user_login'=>true,'back'=>route('all-pizza')])
        <div class="clearfix">
            <div class="scroll-content" style="margin-top: 44px;">
                <div class="cartEmpty">
                    <div class="hr-border text-style" style="margin-top: 25px;">Your Cart
                    </div>
                    <div class="container">
                        <p style="color: #8c8b8b; font-size: 12px; padding: 20px 30px;">Your Cart looks a little empty.
                            Why not check out some of our unbeatable deals?
                        </p>
                    </div>
                </div>
                <div class="cartNotEmpty">
                    <div class="hr-border text-style" style="margin-top: 25px;"> YOUR CART</div>
                    <div class="contain-fluid">
                        <div class="cart_wrapper">
                            <div class="cart_card" id="cartDetails">
                                <table>
                                    <tbody>
                                    @php($subtotal = 0)
                                    @php($total_price = 0)
                                    @foreach($carts as $cart)
                                        <?php
                                        $full_name =$cart->name;
                                        $position = strpos($full_name, '<br/>');
                                        $name = substr($full_name, 0, $position);
                                        $details = substr($full_name,$position);
                                        $subtotal = $cart->price * $cart->qty;
                                        //            $total_tax += $cart->tax;
                                        //            $total_sd += $cart->options->sd;
                                        //            echo $name;
                                        ?>
                                        <tr>
                                            <td style="width: 50%;">
                                                <span class="product_name">{{($name==null) ? $full_name : $name}}</span></td>
                                            <td style="width: 5%;">
                                                <a href="#cart_{{$cart->id}}" data-toggle="collapse"><i
                                                            class="fa fa-angle-down" style=""></i></a>
                                            </td>
                                            <td style="width: 10%;">
                                                <span class="quantity">
                                                    <div class="minus-circle">
                                                        <form class="UpdateToCart"
                                                              action="{{-- route('update-cart-product')  --}}"
                                                              method="post">
                                                        {{csrf_field()}}
                                                            <input type="hidden" name="qty" id=""
                                                                   value="{{(int)$cart->qty - 1}}">
                                                        <input type="hidden" name="rowId" id=""
                                                               value="{{$cart->rowId}}">
                                                        <button type="submit"><i
                                                                    class="fa fa-minus-circle"></i></button>
                                                        </form>
                                                    </div>
                                                    <div class="item-qty">{{$cart->qty}}</div>
                                                    <div class="plus-circle">
                                                        <form class="UpdateToCart"
                                                              action="{{-- route('update-cart-product')  --}}"
                                                              method="post">
                                                        {{csrf_field()}}
                                                            <input type="hidden" name="qty" id=""
                                                                   value="{{(int)$cart->qty + 1}}">
                                                            <input type="hidden" name="rowId" id=""
                                                                   value="{{$cart->rowId}}">
                                                        <button class="plus-circle" type="submit"><i
                                                                    class="fa fa-plus-circle"></i></button>
                                                    </form>
                                                    </div>
                                                </span>
                                            </td>
                                            <td style="width: 40%;text-align: center;">
                                                <span class="">৳ {{Help::getIntegralPart($subtotal)}}</span>
                                                
                                                <div class="times-circle">
                                                    <form class="UpdateToCart" action="#" method="post">
                                                        {{csrf_field()}}
                                    
                                                        <input type="hidden" name="rowId" id=""
                                                               value="{{$cart->rowId}}">
                                                        <button type="submit"><i class="fa fa-times-circle"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="4">
                                                <div id="cart_{{$cart->id}}" class="collapse">
                                                    {!! $cart->options->short_description !!}
                                                    {!! $details !!}
                                                </div>
                                            </td>
                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                                <span style="display: none" id="grandTotal"> {{Session::get('grandTotal')}}  </span>
                                <span style="display: none" id="subTotal"> {{Help::getIntegralPart(Session::get('totalPrice'))}}  </span>
                                <span style="display: none" id="totalTax"> {{Session::get('totalTax')}}  </span>
                                <span style="display: none" id="totalSD"> {{Session::get('totalSD')}}  </span>
                                <span style="display: none" id="deliveryCharge"> {{Session::get('delivery_charge')}}  </span>
                                <span style="display: none" id="dc_vat"> {{Session::get('dc_vat')}}  </span>
                                <span style="display: none" id="couponApplied"> {{Session::get('couponApplied')}}  </span>
                            </div><!-- .store_card -->
                            <hr style="background-color: #858585;">
                            <div class="cart_apply_text">
                                Avail special offer or <span class="underline" style="margin-left: 5px;font-weight: 600;">  apply personalized coupon?</span>
                            </div>
                            <form action="{{ route('front.coupon.check') }}" method="POST">
                                @csrf
                            <div class="container">
                                <div class="row">

                                        <div class="col-sm-10 col-lg-10 col-md-10 col-xs-10">
                                            <div class="coupon-code-injector-input-group">
                                                <div class="position-relative">

                                                    <input type="text"
                                                           placeholder="Enter your coupon code"
                                                           class="coupon-code-injector-input form-control" name="code">
                                                </div>
                                                <small data-v-84019584="" class="form-text text-muted"><sup data-v-84019584="">*</sup>one coupon per
                                                    {{ (Session::get('alert-success')) ? Session::get('alert-success') : '' }}
                                                </small>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 col-lg-2 col-md-2 col-xs-2">
                                            <button type="submit" class="btn btn-success cupon--add--button" style="font-size: 13px;">Add</button>
                                        </div>

                                </div>
                            </div>
                            </form>
                            @if(sizeof($ingredients)>0)
                            <div class="cart_card_other_center">
                                <div class="title cart_other_center" text-center="">Others have ordered these too</div>
                                <div id="demo" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach($ingredients as $product)
                                            <div class="item">
                                                <div class="product_card">
                                                    <form class="addToCart" action="#" method="post">
                                                        <div class="pro_image">
                                                            @if($product->image)
                                                                <img src="{{m_asset($product->image)}}"
                                                                     alt="{{$product->name}}" width="120px">
                                                            @else
                                                                <img src="{{asset('/')}}front/assets/imgs/noimage.png"
                                                                     width="120px">
                                                            @endif
                                                            {{--<img src="{{asset('/')}}front/assets/imgs/noimage.png" width="120px">--}}
                                                        </div>
                                                        <div class="pro_detail">
                                                            <input type="hidden" name="product_id"
                                                                   value="{{$product->id}}">
                                                            <input type="hidden" name="product_name"
                                                                   value="{{$product->title.'<br/>'.$product->description}}">
                                                            <input type="hidden" name="sd" value="{{round($product->price_family/100*10)}}">
                                                            <input type="hidden" name="product_qty" value="1" min="1">
                                                            <input type="hidden" name="product_price"
                                                                   value="{{get_show_price($product->price_family)}}" min="1">
                                                            <input type="hidden" name="product_image"
                                                                   value="{{$product->image}}">
                                                            <p><span class="addon_title">{{$product->title}}</span><span
                                                                        class="pro_price">৳{{get_show_price($product->price_family)}}</span>
                                                            </p>
                                                            <p class="short-desc">{{$product->description}}</p>
                                                            <div>
                                                                <input class="btn btn-success add-to-cart add2cart"
                                                                       type="submit" name="submit" value="Add">
                                                                {{--<a class="btn btn-success add2cart" href="{{route('/')}}">Add</a>--}}
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        @endforeach
                                    

                                    </div>
                                    <a class="right carousel-control" href="#demo" data-slide="next">
                                        <div class="ad_right_arrow">
                                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            @endif
                        
                            <div class="panel-group" id="accordion">
                                <div class="panel panel-default">
                                    <div class="ad_total"
                                         style="border-bottom: 2px solid #cccccc;padding-bottom: 10px;">
                                        <div class="bill_title_head">
                                            <span class="bill-total-text"> Bill Total
                                            </span>
                                            <div class="right bill-total taka" id="totalPrice">
                                                {{Session::get('grandTotal')}}
                                            </div>
                                        </div>
                                    </div>
                                    <div id="collapse1" class="panel-collapse collapse in">
                                        <div class="">
                                            <div class="ad_total" style="margin-top: -9px;">
                                                <div class="bill_title_head" style="">
                                                    <div class="bill">
                                                        <span class="left">Item total</span>
                                                        <span class="right taka"
                                                              id="subTotalView">{{Help::getIntegralPart(Session::get('totalPrice'))}}</span>
                                                    </div>
                                                    @if(Session::has('discount'))
                                                        <div class="bill">
                                                            <span class="left">Discount</span>
                                                            <span class="right taka" id="totalDiscountView">{{Session::get('discount')}}</span>
                                                        </div>
                                                    @endif
                                                    <div class="bill">
                                                        <span class="left">VAT</span>
                                                        <span class="right taka"
                                                              id="totalTaxView">{{Session::get('totalTax')}}</span>
                                                    </div>
                                                    <div class="bill">
                                                        <span class="left">SD</span>
                                                        <span class="right taka"
                                                              id="totalSDView">{{Session::get('totalSD')}}</span>
                                                    </div>
                                                    <div class="bill">
                                                        <span class="left">Delivery Charge</span>
                                                        <span class="right taka"
                                                              id="deliveryChargeView">{{round(Session::get('delivery_charge'))}}</span>
                                                    </div>
                                                    <div class="bill">
                                                        <span class="left">VAT on delivery charge</span>
                                                        <span class="right taka"
                                                              id="dcVATView">{{round(Session::get('dc_vat'))}}</span>
                                                    </div>
                                                    <div class="bill you_pay">
                                                        <span class="left">Order Total</span>
                                                        <span class="right taka"
                                                              id="totalPriceView">{{Session::get('grandTotal')}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="btn" id="ckt_btn" href="{{route('checkout')}}">
                        Checkout
                        <div class="right bill-total taka" id="totalPriceButton">{{Session::get('grandTotal')}}</div>
                    </a>
                </div>
            </div>

        </div><!-- End of .clearfix -->
        {{--</div>--}}

    </div>

    <!-- main content end-->
@endsection
@section('script')
    <script>
        $(function () {
            let productList = $('#productList');
            let total_price = $('#totalPrice').html();
            let couponAppliedView = $('#couponApplied').html();
            if(couponAppliedView == 1){
                $('#couponAppliedView').html('{{ Session::get('codeMessage') }}');
            }
            
            if (parseFloat(total_price) > 0) {
                $('.cartNotEmpty').show();
                $('.cartEmpty').hide();
            } else {
                $('.cartEmpty').show();
                $('.cartNotEmpty').hide();
            }
            $('.product_name_expand').click(function () {
                if ($(this).find('i').hasClass('fa-angle-down')) {
                    $(this).parents('tr').find('.product_name').height('auto');
                    $(this).find('i').removeClass('fa-angle-down').addClass('fa-angle-up');
                } else {
                    $(this).parents('tr').find('.product_name').height('48');
                    $(this).find('i').removeClass('fa-angle-up').addClass('fa-angle-down');
                    // $('.top_wrapper').css('height', '100px');
                }

            });
            $('#ckt_btn').click(function (e) {
                var totalPrice = $('#grandTotal').html();
                if (parseFloat(totalPrice) > 0) {
                    return true;
                } else {
                    alert('Add Product First');
                    return false;
                }
            });

            function checkBalance() {
                var totalPrice = $('#grandTotal').html();
                if (parseFloat(totalPrice) > 0) {
                    return true;
                } else {
                    alert('Add Product First');
                    return false;
                }

            }

            let setTotalField = function () {
                let total_price = $('#grandTotal').html();
                let subTotal = $('#subTotal').html();
                let totalTax = $('#totalTax').html();
                let totalSD = $('#totalSD').html();
                let couponAppliedView = $('#couponApplied').html();

                $('#totalPrice').html(total_price);
                $('#totalPriceButton').html(total_price);
                $('#subTotalView').html(subTotal);
                $('#totalTaxView').html(totalTax);
                $('#totalSDView').html(totalSD);
                $('#totalPriceView').html(total_price);

                if(couponAppliedView == 0){
                    $('#couponAppliedView').html('One Coupon Per');
                }

                if (parseFloat(total_price) > 0) {
                    $('.cartNotEmpty').show();
                    $('.cartEmpty').hide();
                } else {
                    $('.cartEmpty').show();
                    $('.cartNotEmpty').hide();
                }
            };

            $('.carousel-inner .item:first-child').addClass('active');
            $('#cartDetails').on('submit', '.UpdateToCart', function (event) {
                // $('.UpdateToCart').submit(function (event) {
                event.preventDefault();
                var form = $(this);
                var qty = form.find("input[name='qty']").val();
                var rowId = form.find("input[name='rowId']").val();
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                if (qty) {
                    var url = '{{ route("update-cart", ":id") }}';
                } else {
                    var url = '{{ route("delete-cart-product", ":id") }}';
                }
                {{--var url = '{{ route("update-cart", ":id") }}';--}}
                    url = url.replace(':id', rowId);
                $.ajax({
                    type: "POST",
                    url: url,
                    // data: {form:form},
                    data: {
                        _token: CSRF_TOKEN,
                        qty: qty,
                        rowId: rowId,
                        redirect_page: 'view-cart'
                    },
                    success: function (msg) {
                        $('#cartDetails').html(msg);
                        setTotalField();
                    }
                });
            });

            $('.addToCart').submit(function (event) {
                event.preventDefault();
                var form = $(this);
                var product_id = form.find("input[name='product_id']").val();
                var product_virtual_id = form.find("input[name='product_virtual_id']").val();
                var product_name = form.find("input[name='product_name']").val();
                var product_sd = form.find("input[name='sd']").val();
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
                        product_sd: product_sd,
                        product_price: product_price,
                        product_qty: product_qty,
                        product_image: product_image,
                        redirect_page: 'view-cart'
                    },
                    success: function (msg) {
                        $('#cartDetails').html(msg);
                        setTotalField();
                        // var totalPrice = $('#totalPrice').html();
                        // $('.bill-total').children('span').html(totalPrice);
                        // if (totalPrice > 0) {
                        //     $('.cartNotEmpty').show();
                        //     $('.cartEmpty').hide();
                        // } else {
                        //     $('.cartEmpty').show();
                        //     $('.cartNotEmpty').hide();
                        // }
                    }
                });
            });
        });
    </script>
@endsection