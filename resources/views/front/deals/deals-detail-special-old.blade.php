@section('stylesheet')
    <link href="{{asset('/')}}front/build/categoryProduct.css" rel="stylesheet">
    <link href="{{asset('/')}}front/build/deals.css" rel="stylesheet">
    <style>
        .modal-backdrop {
            display: none;
        }

        .modal {
            background: rgba(0, 0, 0, 0.5);
        }

        .modal-dialog {
            width: 100%;
            margin: auto;
        }

        .deals-category-title {
            text-transform: uppercase;
            color: #424242;
            margin: 15px auto;
            padding: 0px;
            display: block;
            text-align: center !important;
            font-weight: 600;
            font-family: 'Open Sans Condensed', sans-serif;
            width: 375px;
        }

        .sticky-header .main-content {
            padding-top: 0px;
        }

        .btn-deals---btn {
            width: 100%;
            height: 30px;
            font-size: 13px;
            font-weight: 400;
            margin: 5px auto;
            border-color: #0a8020;
            background-color: #0a8020;
            padding: 5px 10px;
            color: #fff;
            text-align: left;
        }

        .btn-deals---btn .pro_price {
            float: right;
        }

        .polaroid {
            height: auto !important;
            max-width: 160px;
            cursor: pointer;
            margin: 10px 15px;
            background-color: #fff;
            padding: 0px 0px 10px;
            border-radius: 0px 0px 5px 5px;
        }

        .custom-top-img {
            margin-top: 0px;
            width: 100%;
            height: auto;
        }

    </style>
@endsection
@extends('front.master', ['body_class' => 'sticky-header left-side-collapsed'])
@section('title')
    Order Pizza Online For Delivery | Home
@endsection
@section('body')

    <div class="main-content">
        <div class="header-section">
            <!--notification menu start -->
            @include('front.includes.deals-header')
        </div>

        @unless(empty($back))
            @php($back_button = $back)
        @else
            @php($back_button = url()->previous())
        @endunless
        <div class="container" style="padding: 0px;background-color: #e2e6e8;">
            <div class="row">
                <div class="col-md-2">
                    <div class="toolbar-title toolbar-title-md"
                         style="text-transform: uppercase; margin-top: 10px;color: #424242;font-weight: 600; font-family: 'Open Sans Condensed', sans-serif;">
                        <div class="sr_back_button"><a href="{{ $back_button }}"><i
                                        class="fa fa fa-angle-left icon"></i></a></div>
                    </div>
                </div>
                <div class="col-md-10 text-center">
                    <div class="toolbar-title toolbar-title-md"
                         style="text-transform: uppercase;color: #424242; margin: 23px 0px 23px 10px; padding: 0px 55px;font-weight: 600; font-family: 'Open Sans Condensed', sans-serif;">
                        Your Deals Details
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix">
            <div class="scroll-content" style="margin-top: 120px;">
                <!--notification menu end -->
                <div class="container-fluid" style="border-bottom: 1px solid #efefef;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        @if($deal->image)
                                            <img class="img-fluid" src="{{m_asset($deal->image)}}"
                                                 alt="{{$deal->title}}" width="100%">
                                        @else
                                            <img class="img-fluid" src="{{ asset('/')}}front/assets/imgs/BOGO1.png"
                                                 alt="5 Terre"
                                                 width="100%">
                                        @endif
                                    </div>
                                    <div class="col-md-12 bg-white">
                                        <div class="deal-img-text">
                                            <h6 class="h5-title">{{$deal->title}}</h6>
                                            <p class="title-description">{{$deal->short_description}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container mainContainer" style="border-bottom: 1px solid #efefef;">
                    <input type="hidden" name="product_qty" value="1" min="1">
                    <input type="hidden" name="product_image" value="{{$deal->image}}">
                    <input type="hidden" name="product_id" value="{{$deal->id}}">
                    <input type="hidden" name="product_virtual_id" value="786">
                    <input type="hidden" name="short_description" value="{{$deal->short_description}}">
                    <input type="hidden" name="long_description" value="{{$deal->long_description}}">
                    <input type="hidden" name="product_size" value="{{'Size - '.$deal->pizza_size}}">
                    <input type="hidden" name="product_raw_name" value="{{$deal->title}}">
                    <input type="hidden" name="product_name" value="{{$deal->title}}">
                    <input type="hidden" name="sd">
                    <input type="hidden" name="product_raw_price" value="{{get_show_price($deal->price,1)}}">
                    <input type="hidden" name="product_price" value="{{get_show_price($deal->price,1)}}"
                           min="1">
                    <div class="row">
                        <div class="col-md-12 pizza_selection_col-12 selectPizza">
                            <div class="deals-item">
                                <div class="row">
                                    {{--data-toggle="modal" data-target="#choosePizza"--}}
                                    <div class="col-md-10" style="width: 75%;">
                                        <h5 class="deals-pizza-title">Pizza</h5>
                                        <p class="deals-name-description setPizza" data-additional_price="0"
                                           id="pizza_id_1">Choose your Pizza</p>
                                        <div class="setoptionaltext" id="firstPizzaValue"></div>
                                    </div>
                                    <div class="col-md-2 text-center" style="width: 25%;padding-top: 28px;">
                                        {{--<button type="button" class="btn btn-primary" >--}}
                                        {{--Launch demo modal--}}
                                        {{--</button>--}}
                                        {{--<a href="#" style="display: block" onclick="">--}}
                                        <i class="fa fa fa-plus icon"></i>
                                        {{--</a>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 pizza_selection_col-12 optionalPizza optionaledPizza"
                             style="display: none">
                            <div class="deals-item">
                                <div class="row">
                                    {{--data-toggle="modal" data-target="#choosePizza"--}}
                                    <div class="col-md-10" style="width: 75%;">
                                        <h5 class="deals-pizza-title">Pizza</h5>
                                        <p class="deals-name-description setPizza" data-additional_price="0"
                                           id="pizza_id_2">Choose Free Pizza</p>
                                        <div class="setoptionaltextfree" id="secondPizzaValue"></div>

                                    </div>
                                    <div class="col-md-2 text-center" style="width: 25%;padding-top: 28px;">
                                        {{--<button type="button" class="btn btn-primary" >--}}
                                        {{--Launch demo modal--}}
                                        {{--</button>--}}
                                        {{--<a href="#" style="display: block" onclick="">--}}
                                        <i class="fa fa fa-plus icon"></i>
                                        {{--</a>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- End of .clearfix -->
    </div>
    <a class="btn viewcart_button addToPrizeCart" style="display: none;">
        {{--<span class="cart-count" float-left="">1</span>--}}
        Add to my cart
        ৳ &nbsp; <span class="cart-cost totalPrice">{{get_show_price($deal->price,1)}}</span>
    </a>

    <!-- Modal -->
    <div id="choosePizza" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <div class="main-content">
                        <div class="header-section">
                            <!--notification menu start -->
                            @include('front.includes.deals-header')
                        </div>
                        <div class="container" style="padding: 0px;background-color: #e2e6e8;">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="toolbar-title toolbar-title-md"
                                         style="text-transform: uppercase; margin-top: 10px;color: #424242;font-weight: 600; font-family: 'Open Sans Condensed', sans-serif;">
                                        <div class="sr_back_button"><a href="#" data-dismiss="modal"><i
                                                        class="fa fa fa-angle-left icon"></i></a></div>
                                    </div>
                                </div>
                                <div class="col-md-10 text-center">
                                    <div class="toolbar-title toolbar-title-md"
                                         style="text-transform: uppercase;color: #424242; margin: 23px 0px 23px 10px; padding: 0px 55px;font-weight: 600; font-family: 'Open Sans Condensed', sans-serif;">
                                        Choose Your Pizza
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix">
                            <div class="scroll-content" style="margin-top: 90px; margin-bottom: 0px;">
                                <!--notification menu end -->
                                <div class="container">
                                    <div class="row">
                                        @if($crown!=null)
                                            @if(!empty($crown))
                                                <div class="col-xs-12 text-center">
                                                    <div class="toolbar-title toolbar-title-md deals-category-title">
                                                        Crown
                                                    </div>
                                                </div>
                                            @endif
                                            @foreach($crown as $product)
                                                <div class="col-xs-6">
                                                    <div class="polaroid pizzaImage"
                                                         data-price_family="{{get_show_price($product['price_family'],$product['sd'])}}">
                                                        @if($product->image)
                                                            <img class="custom-top-img"
                                                                 src="{{m_asset($product->image)}}"
                                                                 alt="{{$product->title}}"
                                                                 style="width: 100%; border-radius: 3px 3px 0 0;">
                                                        @else
                                                            <img class="custom-top-img"
                                                                 src="{{m_asset('/')}}front/assets/imgs/noimage.png"
                                                                 alt="No Image"
                                                                 style="width: 100%; border-radius: 3px 3px 0 0;">
                                                        @endif
                                                        <p class="short_desc">{{$product->title}}</p>
                                                        <p class="category" style="display: none">crown</p>
                                                        <p class="sd" style="display: none">0</p>
                                                            <button class="btn btn-deals---btn">Add + <span
                                                                        class="pro_price">{{ get_show_price($product['price_family'],$product['sd']) }}</span></button>

                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                        @if(!empty($favorite_lien_pizza))
                                            <div class="col-xs-12 text-center">
                                                <div class="toolbar-title toolbar-title-md deals-category-title">
                                                    Favorite Line
                                                </div>
                                            </div>
                                        @endif
                                        @foreach($favorite_lien_pizza as $product)
                                            <div class="col-xs-6">
                                                <div class="polaroid pizzaImage"
                                                     data-price_family="{{get_show_price($product['price_family'],$product['sd'])}}"
                                                >
                                                    @if($product->image)
                                                        <img class="custom-top-img" src="{{m_asset($product->image)}}"
                                                             alt="{{$product->title}}"
                                                             style="width: 100%; border-radius: 3px 3px 0 0;">
                                                    @else
                                                        <img class="custom-top-img"
                                                             src="{{m_asset('/')}}front/assets/imgs/noimage.png"
                                                             alt="No Image"
                                                             style="width: 100%; border-radius: 3px 3px 0 0;">
                                                    @endif
                                                    <p class="short_desc">{{$product->title}}</p>
                                                    <p class="category" style="display: none">favorites_line</p>
                                                    <p class="sd" style="display: none">1</p>
                                                        <button class="btn btn-deals---btn">Add + <span
                                                                    class="pro_price">{{ get_show_price($product['price_family'],$product['sd']) }}</span></button>

                                                </div>
                                            </div>
                                        @endforeach
                                        @if(!empty($supreme_lien_pizza))
                                            <div class="col-xs-12 text-center">
                                                <div class="toolbar-title toolbar-title-md deals-category-title">
                                                    Supremes Line
                                                </div>
                                            </div>
                                        @endif
                                        @foreach($supreme_lien_pizza as $product)
                                            <div class="col-xs-6">
                                                <div class="polaroid pizzaImage"
                                                     data-price_family="{{get_show_price($product['price_family'],$product['sd'])}}">
                                                    @if($product->image)
                                                        <img class="custom-top-img" src="{{m_asset($product->image)}}"
                                                             alt="{{$product->title}}"
                                                             style="width: 100%; border-radius: 3px 3px 0 0;">
                                                    @else
                                                        <img class="custom-top-img"
                                                             src="{{m_asset('/')}}front/assets/imgs/noimage.png"
                                                             alt="No Image"
                                                             style="width: 100%; border-radius: 3px 3px 0 0;">
                                                    @endif
                                                    <p class="short_desc">{{$product->title}}</p>
                                                    <p class="category" style="display: none">supreme_lien_pizza</p>
                                                    <p class="sd" style="display: none">1</p>
                                                        <button class="btn btn-deals---btn">Add + <span
                                                                    class="pro_price">{{ get_show_price($product['price_family'],$product['sd']) }}</span></button>

                                                </div>
                                            </div>
                                        @endforeach
                                        @if(!empty($super_supreme_pizza))
                                            <div class="col-xs-12 text-center">
                                                <div class="toolbar-title toolbar-title-md deals-category-title"> Super
                                                    Supremes
                                                </div>
                                            </div>
                                        @endif
                                        @foreach($super_supreme_pizza as $product)
                                            <div class="col-xs-6">
                                                <div class="polaroid pizzaImage"
                                                     data-price_family="{{get_show_price($product['price_family'],$product['sd'])}}">
                                                    @if($product->image)
                                                        <img class="custom-top-img" src="{{m_asset($product->image)}}"
                                                             alt="{{$product->title}}"
                                                             style="width: 100%; border-radius: 3px 3px 0 0;">
                                                    @else
                                                        <img class="custom-top-img"
                                                             src="{{m_asset('/')}}front/assets/imgs/noimage.png"
                                                             alt="No Image"
                                                             style="width: 100%; border-radius: 3px 3px 0 0;">
                                                    @endif
                                                    <p class="short_desc">{{$product->title}}</p>
                                                    <p class="category" style="display: none">super_supreme_pizza</p>
                                                    <p class="sd" style="display: none">1</p>
                                                     <button class="btn btn-deals---btn">Add + <span
                                                                    class="pro_price">{{ get_show_price($product['price_family'],$product['sd']) }}</span></button>
                                                </div>
                                            </div>
                                        @endforeach
                                        @if(!empty($veg_delight ))
                                            <div class="col-xs-12 text-center">
                                                <div class="toolbar-title toolbar-title-md deals-category-title"> Veg
                                                    Delight
                                                </div>
                                            </div>
                                        @endif
                                        @foreach($veg_delight as $product)
                                            <div class="col-xs-6">
                                                <div class="polaroid pizzaImage"
                                                     data-price_family="{{get_show_price($product['price_family'],$product['sd'])}}">
                                                    @if($product->image)
                                                        <img class="custom-top-img" src="{{m_asset($product->image)}}"
                                                             alt="{{$product->title}}"
                                                             style="width: 100%; border-radius: 3px 3px 0 0;">
                                                    @else
                                                        <img class="custom-top-img"
                                                             src="{{m_asset('/')}}front/assets/imgs/noimage.png"
                                                             alt="No Image"
                                                             style="width: 100%; border-radius: 3px 3px 0 0;">
                                                    @endif
                                                    <p class="short_desc">{{$product->title}}</p>
                                                    <p class="category" style="display: none">veg_delight</p>
                                                    <p class="sd" style="display: none">1</p>
                                                        <button class="btn btn-deals---btn">Add + <span
                                                                    class="pro_price">{{ get_show_price($product['price_family'],$product['sd']) }}</span></button>

                                                </div>
                                            </div>
                                        @endforeach
                                        @if($cheesy_bites_fav!=null)
                                            @if(!empty($cheesy_bites_fav ))
                                                <div class="col-xs-12 text-center">
                                                    <div class="toolbar-title toolbar-title-md deals-category-title">
                                                        Cheesy Bites (Favourite Line)
                                                    </div>
                                                </div>
                                            @endif
                                            @foreach($cheesy_bites_fav as $product)
                                                <div class="col-xs-6">
                                                    <div class="polaroid pizzaImage"
                                                         data-price_family="{{get_show_price($product['price_family'],$product['sd'])}}">
                                                        @if($product->image)
                                                            <img class="custom-top-img"
                                                                 src="{{m_asset($product->image)}}"
                                                                 alt="{{$product->title}}"
                                                                 style="width: 100%; border-radius: 3px 3px 0 0;">
                                                        @else
                                                            <img class="custom-top-img"
                                                                 src="{{m_asset('/')}}front/assets/imgs/noimage.png"
                                                                 alt="No Image"
                                                                 style="width: 100%; border-radius: 3px 3px 0 0;">
                                                        @endif
                                                        <p class="short_desc">{{$product->title}}</p>
                                                        <p class="category" style="display: none">cheesy_bites_favourite</p>
                                                        <p class="sd" style="display: none">0</p>
                                                            <button class="btn btn-deals---btn">Add + <span
                                                                        class="pro_price">{{ get_show_price($product['price_family'],$product['sd']) }}</span></button>

                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                        @if($cheesy_bites!=null)
                                            @if(!empty($cheesy_bites ))
                                                <div class="col-xs-12 text-center">
                                                    <div class="toolbar-title toolbar-title-md deals-category-title">
                                                        Cheesy Bites(Supreme Line)
                                                    </div>
                                                </div>
                                            @endif
                                            @foreach($cheesy_bites as $product)
                                                <div class="col-xs-6">
                                                    <div class="polaroid pizzaImage"
                                                         data-price_family="{{get_show_price($product['price_family'],$product['sd'])}}">
                                                        @if($product->image)
                                                            <img class="custom-top-img"
                                                                 src="{{m_asset($product->image)}}"
                                                                 alt="{{$product->title}}"
                                                                 style="width: 100%; border-radius: 3px 3px 0 0;">
                                                        @else
                                                            <img class="custom-top-img"
                                                                 src="{{m_asset('/')}}front/assets/imgs/noimage.png"
                                                                 alt="No Image"
                                                                 style="width: 100%; border-radius: 3px 3px 0 0;">
                                                        @endif
                                                        <p class="short_desc">{{$product->title}}</p>
                                                        <p class="category" style="display: none">cheesy_bites_supreme</p>
                                                        <p class="sd" style="display: none">0</p>
                                                            <button class="btn btn-deals---btn">Add + <span
                                                                        class="pro_price">{{ get_show_price($product['price_family'],$product['sd']) }}</span></button>

                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                        @if($golden_surprise_fav!=null)
                                            @if(!empty($golden_surprise_fav))
                                                <div class="col-xs-12 text-center">
                                                    <div class="toolbar-title toolbar-title-md deals-category-title">
                                                        Sausage Stuffed Crust(Favourite Line)
                                                    </div>
                                                </div>
                                            @endif
                                            @foreach($golden_surprise_fav as $product)
                                                <div class="col-xs-6">
                                                    <div class="polaroid pizzaImage"
                                                         data-price_family="{{get_show_price($product['price_family'],$product['sd'])}}">
                                                        @if($product->image)
                                                            <img class="custom-top-img"
                                                                 src="{{m_asset($product->image)}}"
                                                                 alt="{{$product->title}}"
                                                                 style="width: 100%; border-radius: 3px 3px 0 0;">
                                                        @else
                                                            <img class="custom-top-img"
                                                                 src="{{m_asset('/')}}front/assets/imgs/noimage.png"
                                                                 alt="No Image"
                                                                 style="width: 100%; border-radius: 3px 3px 0 0;">
                                                        @endif
                                                        <p class="short_desc">{{$product->title}}</p>
                                                        <p class="category" style="display: none">golden_surprise_favourite</p>
                                                        <p class="sd" style="display: none">0</p>
                                                            <button class="btn btn-deals---btn">Add + <span
                                                                        class="pro_price">{{ get_show_price($product['price_family'],$product['sd']) }}</span></button>

                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                        @if($golden_surprise!=null)
                                            @if(!empty($golden_surprise))
                                                <div class="col-xs-12 text-center">
                                                    <div class="toolbar-title toolbar-title-md deals-category-title">
                                                       Sausage Stuffed Crust(Supreme Line)
                                                    </div>
                                                </div>
                                            @endif
                                            @foreach($golden_surprise as $product)
                                                <div class="col-xs-6">
                                                    <div class="polaroid pizzaImage"
                                                         data-price_family="{{get_show_price($product['price_family'],$product['sd'])}}">
                                                        @if($product->image)
                                                            <img class="custom-top-img"
                                                                 src="{{m_asset($product->image)}}"
                                                                 alt="{{$product->title}}"
                                                                 style="width: 100%; border-radius: 3px 3px 0 0;">
                                                        @else
                                                            <img class="custom-top-img"
                                                                 src="{{m_asset('/')}}front/assets/imgs/noimage.png"
                                                                 alt="No Image"
                                                                 style="width: 100%; border-radius: 3px 3px 0 0;">
                                                        @endif
                                                        <p class="short_desc">{{$product->title}}</p>
                                                        <p class="category" style="display: none">golden_surprise_supreme</p>
                                                        <p class="sd" style="display: none">0</p>
                                                            <button class="btn btn-deals---btn">Add + <span
                                                                        class="pro_price">{{ get_show_price($product['price_family'],$product['sd']) }}</span></button>

                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                        @if($thin_crust!=null)
                                            @if(!empty($thin_crust))
                                                <div class="col-xs-12 text-center">
                                                    <div class="toolbar-title toolbar-title-md deals-category-title">
                                                        Thin Crust
                                                    </div>
                                                </div>
                                            @endif
                                            @foreach($thin_crust as $product)
                                                <div class="col-xs-6">
                                                    <div class="polaroid pizzaImage"
                                                         data-price_family="{{get_show_price($product['price_family'],$product['sd'])}}">
                                                        @if($product->image)
                                                            <img class="custom-top-img"
                                                                 src="{{m_asset($product->image)}}"
                                                                 alt="{{$product->title}}"
                                                                 style="width: 100%; border-radius: 3px 3px 0 0;">
                                                        @else
                                                            <img class="custom-top-img"
                                                                 src="{{m_asset('/')}}front/assets/imgs/noimage.png"
                                                                 alt="No Image"
                                                                 style="width: 100%; border-radius: 3px 3px 0 0;">
                                                        @endif
                                                        <p class="short_desc">{{$product->title}}</p>
                                                        <p class="category" style="display: none">thin_crust</p>
                                                        <p class="sd" style="display: none">0</p>
                                                            <button class="btn btn-deals---btn">Add + <span
                                                                        class="pro_price">{{ get_show_price($product['price_family'],$product['sd']) }}</span></button>

                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                        @if($kabab_crust!=null)
                                            @if(!empty($kabab_crust))
                                                <div class="col-xs-12 text-center">
                                                    <div class="toolbar-title toolbar-title-md deals-category-title">
                                                        Kabab Crust
                                                    </div>
                                                </div>
                                            @endif
                                            @foreach($kabab_crust as $product)
                                                <div class="col-xs-6">
                                                    <div class="polaroid pizzaImage"
                                                         data-price_family="{{get_show_price($product['price_family'],$product['sd'])}}">
                                                        @if($product->image)
                                                            <img class="custom-top-img"
                                                                 src="{{m_asset($product->image)}}"
                                                                 alt="{{$product->title}}"
                                                                 style="width: 100%; border-radius: 3px 3px 0 0;">
                                                        @else
                                                            <img class="custom-top-img"
                                                                 src="{{m_asset('/')}}front/assets/imgs/noimage.png"
                                                                 alt="No Image"
                                                                 style="width: 100%; border-radius: 3px 3px 0 0;">
                                                        @endif
                                                        <p class="short_desc">{{$product->title}}</p>
                                                        <p class="category" style="display: none">kabab_crust</p>
                                                        <p class="sd" style="display: none">1</p>
                                                            <button class="btn btn-deals---btn">Add + <span
                                                                        class="pro_price">{{ get_show_price($product['price_family'],$product['sd']) }}</span></button>

                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif

                                        @if($battle_beef!=null)
                                            @if(!empty($battle_beef))
                                                <div class="col-xs-12 text-center">
                                                    <div class="toolbar-title toolbar-title-md deals-category-title">
                                                        Battle Of Beef
                                                    </div>
                                                </div>
                                            @endif
                                            @foreach($battle_beef as $product)
                                                <div class="col-xs-6">
                                                    <div class="polaroid pizzaImage"
                                                         data-price_family="{{get_show_price($product['price_family'],$product['sd'])}}">
                                                        @if($product->image)
                                                            <img class="custom-top-img"
                                                                 src="{{m_asset($product->image)}}"
                                                                 alt="{{$product->title}}"
                                                                 style="width: 100%; border-radius: 3px 3px 0 0;">
                                                        @else
                                                            <img class="custom-top-img"
                                                                 src="{{m_asset('/')}}front/assets/imgs/noimage.png"
                                                                 alt="No Image"
                                                                 style="width: 100%; border-radius: 3px 3px 0 0;">
                                                        @endif
                                                        <p class="short_desc">{{$product->title}}</p>
                                                        <p class="category" style="display: none">battle_beef</p>
                                                        <p class="sd" style="display: none">1</p>
                                                            <button class="btn btn-deals---btn">Add + <span
                                                                        class="pro_price">{{ get_show_price($product['price_family'],$product['sd']) }}</span></button>

                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                        @if($new_line!=null)
                                            @if(!empty($new_line))
                                                @foreach($new_line as $key=>$new)
                                                    <div class="col-xs-12 text-center">
                                                        <div class="toolbar-title toolbar-title-md deals-category-title">
                                                            {{ $key }}
                                                        </div>
                                                    </div>
                                                    @foreach($new as $product)
                                                        <div class="col-xs-6">
                                                            <div class="polaroid pizzaImage"
                                                                 data-price_family="{{get_show_price($product['price_family'],$product['sd'])}}">
                                                                @if($product->image)
                                                                    <img class="custom-top-img"
                                                                         src="{{m_asset($product->image)}}"
                                                                         alt="{{$product->title}}"
                                                                         style="width: 100%; border-radius: 3px 3px 0 0;">
                                                                @else
                                                                    <img class="custom-top-img"
                                                                         src="{{m_asset('/')}}front/assets/imgs/noimage.png"
                                                                         alt="No Image"
                                                                         style="width: 100%; border-radius: 3px 3px 0 0;">
                                                                @endif
                                                                <p class="short_desc">{{$product->title}}</p>
                                                                <p class="category" style="display: none">{{ $key }}</p>
                                                                <p class="sd" style="display: none">0</p>
                                                                    <button class="btn btn-deals---btn">Add + <span
                                                                                class="pro_price">{{ get_show_price($product['price_family'],$product['sd']) }}</span></button>

                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endforeach
                                            @endif
                                        @endif

                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- End of .clearfix -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    <div id="chooseFreePizza" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <div class="main-content">
                        <div class="header-section">
                            <!--notification menu start -->
                            @include('front.includes.deals-header')
                        </div>
                        <div class="container" style="padding: 0px;background-color: #e2e6e8;">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="toolbar-title toolbar-title-md"
                                         style="text-transform: uppercase; margin-top: 10px;color: #424242;font-weight: 600; font-family: 'Open Sans Condensed', sans-serif;">
                                        <div class="sr_back_button"><a href="#" data-dismiss="modal"><i
                                                        class="fa fa fa-angle-left icon"></i></a></div>
                                    </div>
                                </div>
                                <div class="col-md-10 text-center">
                                    <div class="toolbar-title toolbar-title-md"
                                         style="text-transform: uppercase;color: #424242; margin: 23px 0px 23px 10px; padding: 0px 55px;font-weight: 600; font-family: 'Open Sans Condensed', sans-serif;">
                                        Choose Your Pizza
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" value="0" name="selectedPrice" id="selectedPrice">
                        <div class="clearfix">
                            <div class="scroll-content" style="margin-top: 120px; margin-bottom: 0px;">
                                <!--notification menu end -->
                                <div class="container">
                                    <div class="row" id="crown">
                                        @if($crown!=null)
                                            <div class="col-xs-12 text-center">
                                                <div class="toolbar-title toolbar-title-md deals-category-title"> Crown
                                                </div>
                                            </div>
                                            @foreach($crown as $product)
                                                <div class="col-xs-6">
                                                    <div class="polaroid pizzaImage"
                                                         data-price_family="{{get_show_price($product['price_family'],$product['sd'])}}">
                                                        @if($product->image)
                                                            <img class="custom-top-img" src="{{m_asset($product->image)}}"
                                                                 alt="{{$product->title}}"
                                                                 style="width: 100%; border-radius: 3px 3px 0 0;">
                                                        @else
                                                            <img class="custom-top-img"
                                                                 src="{{m_asset('/')}}front/assets/imgs/noimage.png"
                                                                 alt="No Image"
                                                                 style="width: 100%; border-radius: 3px 3px 0 0;">
                                                        @endif
                                                        <p class="short_desc">{{$product->title}}</p>
                                                        <p class="category" style="display: none">
                                                            crown {{ ($deal->id == 20) ? '(Medium)' : '' }}</p>
                                                        <p class="sd" style="display: none">0</p>
                                                            <button class="btn btn-deals---btn">Add + <span
                                                                        class="pro_price">{{ get_show_price($product['price_family'],$product['sd']) }}</span></button>

                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="row" id="fvline">
                                        @if($favorite_lien_pizza!=null)
                                            <div class="col-xs-12 text-center">
                                                <div class="toolbar-title toolbar-title-md deals-category-title">
                                                    Favorite
                                                    Line
                                                </div>
                                            </div>
                                        @endif
                                        @foreach($favorite_lien_pizza as $product)
                                            <div class="col-xs-6">
                                                <div class="polaroid pizzaImage"
                                                     data-price_family="{{get_show_price($product['price_family'],$product['sd'])}}"
                                                >
                                                    @if($product->image)
                                                        <img class="custom-top-img" src="{{m_asset($product->image)}}"
                                                             alt="{{$product->title}}"
                                                             style="width: 100%; border-radius: 3px 3px 0 0;">
                                                    @else
                                                        <img class="custom-top-img"
                                                             src="{{m_asset('/')}}front/assets/imgs/noimage.png"
                                                             alt="No Image"
                                                             style="width: 100%; border-radius: 3px 3px 0 0;">
                                                    @endif
                                                    <p class="short_desc">{{$product->title}}</p>
                                                    <p class="category" style="display: none">
                                                        favorites_line {{ ($deal->id == 20) ? '(Medium)' : '' }}</p>
                                                    <p class="sd" style="display: none">1</p>
                                                        <button class="btn btn-deals---btn">Add + <span
                                                                    class="pro_price">{{ get_show_price($product['price_family'],$product['sd']) }}</span></button>

                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="row" id="supreme">
                                        @if($supreme_lien_pizza!=null)
                                            <div class="col-xs-12 text-center">
                                                <div class="toolbar-title toolbar-title-md deals-category-title">
                                                    Supremes
                                                    Line
                                                </div>
                                            </div>
                                        @endif
                                        @foreach($supreme_lien_pizza as $product)
                                            <div class="col-xs-6">
                                                <div class="polaroid pizzaImage"
                                                     data-price_family="{{get_show_price($product['price_family'],$product['sd'])}}">
                                                    @if($product->image)
                                                        <img class="custom-top-img" src="{{m_asset($product->image)}}"
                                                             alt="{{$product->title}}"
                                                             style="width: 100%; border-radius: 3px 3px 0 0;">
                                                    @else
                                                        <img class="custom-top-img"
                                                             src="{{m_asset('/')}}front/assets/imgs/noimage.png"
                                                             alt="No Image"
                                                             style="width: 100%; border-radius: 3px 3px 0 0;">
                                                    @endif
                                                    <p class="short_desc">{{$product->title}}</p>
                                                    <p class="category" style="display: none">
                                                        supreme_lien_pizza {{ ($deal->id == 20) ? '(Medium)' : '' }}</p>
                                                    <p class="sd" style="display: none">1</p>
                                                        <button class="btn btn-deals---btn">Add + <span
                                                                    class="pro_price">{{ get_show_price($product['price_family'],$product['sd']) }}</span></button>

                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="row" id="super_supreme">
                                        @if($super_supreme_pizza!=null)
                                            <div class="col-xs-12 text-center">
                                                <div class="toolbar-title toolbar-title-md deals-category-title"> Super
                                                    Supremes
                                                </div>
                                            </div>
                                        @endif
                                        @foreach($super_supreme_pizza as $product)
                                            <div class="col-xs-6">
                                                <div class="polaroid pizzaImage"
                                                     data-price_family="{{get_show_price($product['price_family'],$product['sd'])}}">
                                                    @if($product->image)
                                                        <img class="custom-top-img" src="{{m_asset($product->image)}}"
                                                             alt="{{$product->title}}"
                                                             style="width: 100%; border-radius: 3px 3px 0 0;">
                                                    @else
                                                        <img class="custom-top-img"
                                                             src="{{m_asset('/')}}front/assets/imgs/noimage.png"
                                                             alt="No Image"
                                                             style="width: 100%; border-radius: 3px 3px 0 0;">
                                                    @endif
                                                    <p class="short_desc">{{$product->title}}</p>
                                                    <p class="category" style="display: none">
                                                        super_supreme_pizza {{ ($deal->id == 20) ? '(Medium)' : '' }}</p>
                                                    <p class="sd" style="display: none">1</p>
                                                        <button class="btn btn-deals---btn">Add + <span
                                                                    class="pro_price">{{ get_show_price($product['price_family'],$product['sd']) }}</span></button>

                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="row" id="veg">
                                        @if($veg_delight!=null)
                                            <div class="col-xs-12 text-center">
                                                <div class="toolbar-title toolbar-title-md deals-category-title"> Veg
                                                    Delight
                                                </div>
                                            </div>
                                        @endif
                                        @foreach($veg_delight as $product)
                                            <div class="col-xs-6">
                                                <div class="polaroid pizzaImage"
                                                     data-price_family="{{get_show_price($product['price_family'],$product['sd'])}}">
                                                    @if($product->image)
                                                        <img class="custom-top-img" src="{{m_asset($product->image)}}"
                                                             alt="{{$product->title}}"
                                                             style="width: 100%; border-radius: 3px 3px 0 0;">
                                                    @else
                                                        <img class="custom-top-img"
                                                             src="{{m_asset('/')}}front/assets/imgs/noimage.png"
                                                             alt="No Image"
                                                             style="width: 100%; border-radius: 3px 3px 0 0;">
                                                    @endif
                                                    <p class="short_desc">{{$product->title}}</p>
                                                    <p class="category" style="display: none">
                                                        veg_delight {{ ($deal->id == 20) ? '(Medium)' : '' }}</p>
                                                    <p class="sd" style="display: none">1</p>
                                                        <button class="btn btn-deals---btn">Add + <span
                                                                    class="pro_price">{{ get_show_price($product['price_family'],$product['sd']) }}</span></button>

                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="row" id="cheesy_fav">
                                        @if($cheesy_bites_fav!=null)
                                            <div class="col-xs-12 text-center">
                                                <div class="toolbar-title toolbar-title-md deals-category-title"> Cheesy
                                                    Bites (Favourite Line)
                                                </div>
                                            </div>
                                            @foreach($cheesy_bites_fav as $product)
                                                <div class="col-xs-6">
                                                    <div class="polaroid pizzaImage"
                                                         data-price_family="{{get_show_price($product['price_family'],$product['sd'])}}">
                                                        @if($product->image)
                                                            <img class="custom-top-img"
                                                                 src="{{m_asset($product->image)}}"
                                                                 alt="{{$product->title}}"
                                                                 style="width: 100%; border-radius: 3px 3px 0 0;">
                                                        @else
                                                            <img class="custom-top-img"
                                                                 src="{{m_asset('/')}}front/assets/imgs/noimage.png"
                                                                 alt="No Image"
                                                                 style="width: 100%; border-radius: 3px 3px 0 0;">
                                                        @endif
                                                        <p class="short_desc">{{$product->title}}</p>
                                                        <p class="category" style="display: none">cheesy_bites_favourite {{ ($deal->id == 20) ? '(Medium)' : '' }}</p>
                                                        <p class="sd" style="display: none">0</p>

                                                            <button class="btn btn-deals---btn">Add + <span
                                                                        class="pro_price">{{ get_show_price($product['price_family'],$product['sd']) }}</span></button>

                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="row" id="cheesy">
                                        @if($cheesy_bites!=null)
                                            <div class="col-xs-12 text-center">
                                                <div class="toolbar-title toolbar-title-md deals-category-title"> Cheesy
                                                    Bites(Supreme Line)
                                                </div>
                                            </div>
                                            @foreach($cheesy_bites as $product)
                                                <div class="col-xs-6">
                                                    <div class="polaroid pizzaImage"
                                                         data-price_family="{{get_show_price($product['price_family'],$product['sd'])}}">
                                                        @if($product->image)
                                                            <img class="custom-top-img"
                                                                 src="{{m_asset($product->image)}}"
                                                                 alt="{{$product->title}}"
                                                                 style="width: 100%; border-radius: 3px 3px 0 0;">
                                                        @else
                                                            <img class="custom-top-img"
                                                                 src="{{m_asset('/')}}front/assets/imgs/noimage.png"
                                                                 alt="No Image"
                                                                 style="width: 100%; border-radius: 3px 3px 0 0;">
                                                        @endif
                                                        <p class="short_desc">{{$product->title}}</p>
                                                        <p class="category" style="display: none">cheesy_bites_supreme {{ ($deal->id == 20) ? '(Medium)' : '' }}</p>
                                                        <p class="sd" style="display: none">0</p>

                                                            <button class="btn btn-deals---btn">Add + <span
                                                                        class="pro_price">{{ get_show_price($product['price_family'],$product['sd']) }}</span></button>

                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="row" id="golden_fav">
                                        @if($golden_surprise_fav!=null)
                                            <div class="col-xs-12 text-center">
                                                <div class="toolbar-title toolbar-title-md deals-category-title"> 
                                                Sausage Stuffed Crust(Favourite Line)
                                                </div>
                                            </div>
                                            @foreach($golden_surprise_fav as $product)
                                                <div class="col-xs-6">
                                                    <div class="polaroid pizzaImage"
                                                         data-price_family="{{get_show_price($product['price_family'],$product['sd'])}}">
                                                        @if($product->image)
                                                            <img class="custom-top-img"
                                                                 src="{{m_asset($product->image)}}"
                                                                 alt="{{$product->title}}"
                                                                 style="width: 100%; border-radius: 3px 3px 0 0;">
                                                        @else
                                                            <img class="custom-top-img"
                                                                 src="{{m_asset('/')}}front/assets/imgs/noimage.png"
                                                                 alt="No Image"
                                                                 style="width: 100%; border-radius: 3px 3px 0 0;">
                                                        @endif
                                                        <p class="short_desc">{{$product->title}}</p>
                                                        <p class="category" style="display: none">
                                                            golden_surprise_favourite {{ ($deal->id == 20) ? '(Medium)' : '' }}</p>
                                                        <p class="sd" style="display: none">1</p>
                                                            <button class="btn btn-deals---btn">Add + <span
                                                                        class="pro_price">{{ get_show_price($product['price_family'],$product['sd']) }}</span></button>

                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="row" id="golden">
                                        @if($golden_surprise!=null)
                                            <div class="col-xs-12 text-center">
                                                <div class="toolbar-title toolbar-title-md deals-category-title">
                                                    Sausage Stuffed Crust(Supreme Line)
                                                </div>
                                            </div>
                                            @foreach($golden_surprise as $product)
                                                <div class="col-xs-6">
                                                    <div class="polaroid pizzaImage"
                                                         data-price_family="{{get_show_price($product['price_family'],$product['sd'])}}">
                                                        @if($product->image)
                                                            <img class="custom-top-img"
                                                                 src="{{m_asset($product->image)}}"
                                                                 alt="{{$product->title}}"
                                                                 style="width: 100%; border-radius: 3px 3px 0 0;">
                                                        @else
                                                            <img class="custom-top-img"
                                                                 src="{{m_asset('/')}}front/assets/imgs/noimage.png"
                                                                 alt="No Image"
                                                                 style="width: 100%; border-radius: 3px 3px 0 0;">
                                                        @endif
                                                        <p class="short_desc">{{$product->title}}</p>
                                                        <p class="category" style="display: none">
                                                            golden_surprise_supreme {{ ($deal->id == 20) ? '(Medium)' : '' }}</p>
                                                        <p class="sd" style="display: none">1</p>

                                                            <button class="btn btn-deals---btn">Add + <span
                                                                        class="pro_price">{{ get_show_price($product['price_family'],$product['sd']) }}</span></button>

                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="row" id="thin_crust">
                                    @if($thin_crust!=null)
                                        <div class="col-xs-12 text-center">
                                            <div class="toolbar-title toolbar-title-md deals-category-title"> Thin Crust
                                            </div>
                                        </div>
                                        @foreach($thin_crust as $product)
                                            <div class="col-xs-6">
                                                <div class="polaroid pizzaImage"
                                                     data-price_family="{{get_show_price($product['price_family'],$product['sd'])}}">
                                                    @if($product->image)
                                                        <img class="custom-top-img" src="{{m_asset($product->image)}}"
                                                             alt="{{$product->title}}"
                                                             style="width: 100%; border-radius: 3px 3px 0 0;">
                                                    @else
                                                        <img class="custom-top-img"
                                                             src="{{m_asset('/')}}front/assets/imgs/noimage.png"
                                                             alt="No Image"
                                                             style="width: 100%; border-radius: 3px 3px 0 0;">
                                                    @endif
                                                    <p class="short_desc">{{$product->title}}</p>
                                                    <p class="category" style="display: none">
                                                        thin_crust {{ ($deal->id == 20) ? '(Medium)' : '' }}</p>
                                                    <p class="sd" style="display: none">0</p>
                                                        <button class="btn btn-deals---btn">Add + <span
                                                                    class="pro_price">{{ get_show_price($product['price_family'],$product['sd']) }}</span></button>

                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="row" id="kabab_crust">
                                    @if($kabab_crust!=null)
                                        <div class="col-xs-12 text-center">
                                            <div class="toolbar-title toolbar-title-md deals-category-title"> Kabab Crust
                                            </div>
                                        </div>
                                        @foreach($kabab_crust as $product)
                                            <div class="col-xs-6">
                                                <div class="polaroid pizzaImage"
                                                     data-price_family="{{get_show_price($product['price_family'],$product['sd'])}}">
                                                    @if($product->image)
                                                        <img class="custom-top-img" src="{{m_asset($product->image)}}"
                                                             alt="{{$product->title}}"
                                                             style="width: 100%; border-radius: 3px 3px 0 0;">
                                                    @else
                                                        <img class="custom-top-img"
                                                             src="{{m_asset('/')}}front/assets/imgs/noimage.png"
                                                             alt="No Image"
                                                             style="width: 100%; border-radius: 3px 3px 0 0;">
                                                    @endif
                                                    <p class="short_desc">{{$product->title}}</p>
                                                    <p class="category" style="display: none">kabab_crust {{ ($deal->id == 20) ? '(Medium)' : '' }}</p>
                                                    <p class="sd" style="display: none">1</p>
                                                        <button class="btn btn-deals---btn">Add + <span
                                                                    class="pro_price">{{ get_show_price($product['price_family'],$product['sd']) }}</span></button>

                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>

                                <div class="row" id="battle_beef">
                                    @if($battle_beef!=null)
                                        <div class="col-xs-12 text-center">
                                            <div class="toolbar-title toolbar-title-md deals-category-title"> Battle Of Beef
                                            </div>
                                        </div>
                                        @foreach($battle_beef as $product)
                                            <div class="col-xs-6">
                                                <div class="polaroid pizzaImage"
                                                     data-price_family="{{get_show_price($product['price_family'],$product['sd'])}}">
                                                    @if($product->image)
                                                        <img class="custom-top-img" src="{{m_asset($product->image)}}"
                                                             alt="{{$product->title}}"
                                                             style="width: 100%; border-radius: 3px 3px 0 0;">
                                                    @else
                                                        <img class="custom-top-img"
                                                             src="{{m_asset('/')}}front/assets/imgs/noimage.png"
                                                             alt="No Image"
                                                             style="width: 100%; border-radius: 3px 3px 0 0;">
                                                    @endif
                                                    <p class="short_desc">{{$product->title}}</p>
                                                    <p class="category" style="display: none">battle_beef {{ ($deal->id == 20) ? '(Medium)' : '' }}</p>
                                                    <p class="sd" style="display: none">1</p>
                                                        <button class="btn btn-deals---btn">Add + <span
                                                                    class="pro_price">{{ get_show_price($product['price_family'],$product['sd']) }}</span></button>

                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="row" id="new_line">
                                    @if($new_line!=null)
                                        @foreach($new_line as $key=>$new)
                                            <div class="col-xs-12 text-center">
                                                <div class="toolbar-title toolbar-title-md deals-category-title"> {{ $key }}
                                                </div>
                                            </div>
                                            @foreach($new as $product)
                                                <div class="col-xs-6">
                                                    <div class="polaroid pizzaImage"
                                                         data-price_family="{{get_show_price($product['price_family'],$product['sd'])}}">
                                                        @if($product->image)
                                                            <img class="custom-top-img" src="{{m_asset($product->image)}}"
                                                                 alt="{{$product->title}}"
                                                                 style="width: 100%; border-radius: 3px 3px 0 0;">
                                                        @else
                                                            <img class="custom-top-img"
                                                                 src="{{m_asset('/')}}front/assets/imgs/noimage.png"
                                                                 alt="No Image"
                                                                 style="width: 100%; border-radius: 3px 3px 0 0;">
                                                        @endif
                                                        <p class="short_desc">{{$product->title}}</p>
                                                        <p class="category" style="display: none">{{ $key }} {{ ($deal->id == 20) ? '(Medium)' : '' }}</p>
                                                        <p class="sd" style="display: none">0</p>
                                                            <button class="btn btn-deals---btn">Add + <span
                                                                        class="pro_price">{{ get_show_price($product['price_family'],$product['sd']) }}</span></button>

                                                    </div>
                                                </div>
                                            @endforeach
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- End of .clearfix -->
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </div>

    {{--    </div>--}}
    {{--    </div>--}}


@endsection
@section('script')
    <script>
        $(function () {
            let rootParent = $('.mainContainer');

            function setPizzaName() {
                let product_raw_name = rootParent.find('input[name=product_raw_name]').val();
                let product_size = rootParent.find('input[name=product_size]').val();
                let long_description = rootParent.find('input[name=long_description]').val();
                // let product_name = rootParent.find('input[name=product_name]').val();
                let full_name = 'Additional Pizza: ';
                $('.selectedPizza').each(function () {
                    let name = $(this).find('.setPizza').html();
                    full_name += name + ','
                });
                rootParent.find('input[name=product_name]').val(product_raw_name + '<br/>' + product_size + '<br/>' + full_name + '<br/>' + long_description);
            }

            function setPizzaPrice(selected_pizza_price, sd) {
                @if($deal->id==20)
                document.getElementById('firstPizzaValue').innerHTML = selected_pizza_price;
                document.getElementById('secondPizzaValue').innerHTML = 'Free';
                @endif
                rootParent.find('input[name=product_price]').val(selected_pizza_price);
                if (sd == 1) {
                    rootParent.find('input[name=sd]').val(Math.round(selected_pizza_price * 0.10));
                } else {
                    rootParent.find('input[name=sd]').val(Math.round(selected_pizza_price * 0));
                }
                $('.totalPrice').html(Math.round(selected_pizza_price));
            }

            function showPizzaprice() {
                let total_pizza = '{{$deal->pizza_count}}';
                let selected_pizza = $('.container > .row').children('.selectedPizza').length;
                if (parseInt(total_pizza) == selected_pizza)
                    $('.addToPrizeCart').show();
                else
                    $('.addToPrizeCart').hide();
            }

            rootParent.on('click', '.selectPizza', function () {
                $('#choosePizza').modal('show');
                $(this).addClass('active');
            });
            rootParent.on('click', '.optionalPizza', function () {
                let chooseFreePizza = $('#chooseFreePizza');
                let totalPrice = $('.totalPrice').html();
                chooseFreePizza.find('.col-md-6').each(function () {
                    let __this = $(this);
                    let optional_pizza_price = __this.find('.pizzaImage').data('price_family');
                    {{--                    @if($deal->id!=14 && $deal->id!=20)--}}
                    {{--                    if (optional_pizza_price > totalPrice) {--}}
                    {{--                        __this.hide()--}}
                    {{--                    } else {--}}
                    {{--                        __this.show()--}}
                    {{--                    }--}}
                    {{--                    @endif--}}
                });
                chooseFreePizza.modal('show');
            });
            $('#chooseFreePizza').on('show.bs.modal', function (event) {
                let button = $(event.relatedTarget);// Button that triggered the modal
                let recipient = button.data('whatever'); // Extract info from data-* attributes
                let modal = $(this);
                modal.off('click').on('click', '.pizzaImage', function (e) {
                    let selectPizza = $('.optionalPizza');
                    @if($deal->id != 20)
                    let sd = $(this).find('.sd').html();
                    let firstPizzaPrice = document.getElementById("selectedPrice").value;
                    let free_price = $(this).data('price_family');
                    if (firstPizzaPrice < free_price) {
                        document.getElementById('firstPizzaValue').innerHTML = 'Free';
                        document.getElementById('secondPizzaValue').innerHTML = free_price;
                        setPizzaPrice(free_price, sd);
                    } else {
                        document.getElementById('firstPizzaValue').innerHTML = firstPizzaPrice;
                        document.getElementById('secondPizzaValue').innerHTML = 'Free';
                        setPizzaPrice(firstPizzaPrice, sd);
                    }
                    @endif
                    let short_desc = $(this).find('.short_desc').html();
                    let cat = $(this).find('.category').html();
                    let tcate = cat.replace("_", " ");
                    short_desc = short_desc + '-' + tcate;
                    selectPizza.find('.setPizza').html(short_desc);
                    modal.modal('hide');
                    selectPizza.find('i.fa').removeClass('fa-plus').addClass('fa-times-circle').addClass('optional-icon');
                    selectPizza.find('div.setoptionaltextfree').removeClass('setoptionaltextfree').addClass('optional-text');
                    selectPizza.removeClass('optionalPizza').addClass('selectedPizza');
                    setPizzaName();
                    showPizzaprice();
                    // $('.addToPrizeCart').attr("disabled", false);
                });
            });
            $('#choosePizza').on('show.bs.modal', function (event) {
                let button = $(event.relatedTarget);// Button that triggered the modal
                let recipient = button.data('whatever'); // Extract info from data-* attributes
                let modal = $(this);
                modal.off('click').on('click', '.pizzaImage', function (e) {
                    let selectPizza = $('.selectPizza.active');
                    let additional_price = $(this).data('price_family');
                    let short_desc = $(this).find('.short_desc').html();
                    let sd = $(this).find('.sd').html();
                    let cat = $(this).find('.category').html();
                    let tcate = cat.replace("_", " ");
                    short_desc = short_desc + '-' + tcate;

                    @if($deal->id==21 || $deal->id==14)
                    if (cat== 'favorites_line') {
                        document.getElementById("fvline").style.display = "inline-flex";
                        document.getElementById("supreme").style.display = "inline-flex";
                        document.getElementById("super_supreme").style.display = "inline-flex";
                        document.getElementById("veg").style.display = "none";
                        document.getElementById("cheesy").style.display = "none";
                        document.getElementById("golden").style.display = "none";
                        document.getElementById("golden_fav").style.display = "none";
                        document.getElementById("cheesy_fav").style.display = "none";
                        document.getElementById("thin_crust").style.display = "none";
                        document.getElementById("crown").style.display = "none";
                        document.getElementById("kabab_crust").style.display = "none";
                    }

                    if (cat == 'supreme_lien_pizza') {
                        document.getElementById("fvline").style.display = "inline-flex";
                        document.getElementById("supreme").style.display = "inline-flex";
                        document.getElementById("super_supreme").style.display = "inline-flex";
                        document.getElementById("veg").style.display = "none";
                        document.getElementById("cheesy").style.display = "none";
                        document.getElementById("golden").style.display = "none";
                        document.getElementById("golden_fav").style.display = "none";
                        document.getElementById("cheesy_fav").style.display = "none";
                        document.getElementById("thin_crust").style.display = "none";
                        document.getElementById("crown").style.display = "none";
                        document.getElementById("kabab_crust").style.display = "none";
                    }
                    if (cat == 'super_supreme_pizza') {
                        document.getElementById("fvline").style.display = "inline-flex";
                        document.getElementById("supreme").style.display = "inline-flex";
                        document.getElementById("super_supreme").style.display = "inline-flex";
                        document.getElementById("veg").style.display = "none";
                        document.getElementById("cheesy").style.display = "none";
                        document.getElementById("golden").style.display = "none";
                        document.getElementById("golden_fav").style.display = "none";
                        document.getElementById("cheesy_fav").style.display = "none";
                        document.getElementById("thin_crust").style.display = "none";
                        document.getElementById("crown").style.display = "none";
                        document.getElementById("kabab_crust").style.display = "none";
                    }
                    if (cat == 'veg_delight') {
                        document.getElementById("fvline").style.display = "none";
                        document.getElementById("supreme").style.display = "none";
                        document.getElementById("super_supreme").style.display = "none";
                        document.getElementById("veg").style.display = "inline-flex";
                        document.getElementById("cheesy").style.display = "none";
                        document.getElementById("golden").style.display = "none";
                        document.getElementById("golden_fav").style.display = "none";
                        document.getElementById("cheesy_fav").style.display = "none";
                        document.getElementById("thin_crust").style.display = "none";
                        document.getElementById("crown").style.display = "none";
                        document.getElementById("kabab_crust").style.display = "none";
                    }
                    if (cat == 'cheesy_bites_supreme') {
                        document.getElementById("fvline").style.display = "none";
                        document.getElementById("supreme").style.display = "none";
                        document.getElementById("super_supreme").style.display = "none";
                        document.getElementById("veg").style.display = "none";
                        document.getElementById("cheesy").style.display = "inline-flex";
                        document.getElementById("golden").style.display = "none";
                        document.getElementById("golden_fav").style.display = "none";
                        document.getElementById("cheesy_fav").style.display = "inline-flex";
                        document.getElementById("thin_crust").style.display = "none";
                        document.getElementById("crown").style.display = "none";
                        document.getElementById("kabab_crust").style.display = "none";
                        document.getElementById("battle_beef").style.display = "none";
                    }
                    if (cat == 'cheesy_bites_favourite') {
                        document.getElementById("fvline").style.display = "none";
                        document.getElementById("supreme").style.display = "none";
                        document.getElementById("super_supreme").style.display = "none";
                        document.getElementById("veg").style.display = "none";
                        document.getElementById("cheesy").style.display = "inline-flex";
                        document.getElementById("golden").style.display = "none";
                        document.getElementById("golden_fav").style.display = "none";
                        document.getElementById("cheesy_fav").style.display = "inline-flex";
                        document.getElementById("thin_crust").style.display = "none";
                        document.getElementById("crown").style.display = "none";
                        document.getElementById("kabab_crust").style.display = "none";
                        document.getElementById("battle_beef").style.display = "none";
                    }
                    if (cat == 'golden_surprise_supreme') {
                        document.getElementById("fvline").style.display = "none";
                        document.getElementById("supreme").style.display = "none";
                        document.getElementById("super_supreme").style.display = "none";
                        document.getElementById("veg").style.display = "none";
                        document.getElementById("cheesy").style.display = "none";
                        document.getElementById("golden").style.display = "inline-flex";
                        document.getElementById("golden_fav").style.display = "inline-flex";
                        document.getElementById("cheesy_fav").style.display = "none";
                        document.getElementById("thin_crust").style.display = "none";
                        document.getElementById("crown").style.display = "none";
                        document.getElementById("kabab_crust").style.display = "none";
                        document.getElementById("battle_beef").style.display = "none";
                    }
                    if (cat == 'golden_surprise_favourite') {
                        document.getElementById("fvline").style.display = "none";
                        document.getElementById("supreme").style.display = "none";
                        document.getElementById("super_supreme").style.display = "none";
                        document.getElementById("veg").style.display = "none";
                        document.getElementById("cheesy").style.display = "none";
                        document.getElementById("golden").style.display = "inline-flex";
                        document.getElementById("golden_fav").style.display = "inline-flex";
                        document.getElementById("cheesy_fav").style.display = "none";
                        document.getElementById("thin_crust").style.display = "none";
                        document.getElementById("crown").style.display = "none";
                        document.getElementById("kabab_crust").style.display = "none";
                        document.getElementById("battle_beef").style.display = "none";
                    }
                    if (cat == 'thin_crust') {
                        document.getElementById("fvline").style.display = "none";
                        document.getElementById("supreme").style.display = "none";
                        document.getElementById("super_supreme").style.display = "none";
                        document.getElementById("veg").style.display = "none";
                        document.getElementById("cheesy").style.display = "none";
                        document.getElementById("golden").style.display = "none";
                        document.getElementById("golden_fav").style.display = "none";
                        document.getElementById("cheesy_fav").style.display = "none";
                        document.getElementById("thin_crust").style.display = "inline-flex";
                        document.getElementById("crown").style.display = "none";
                        document.getElementById("kabab_crust").style.display = "none";
                        document.getElementById("battle_beef").style.display = "none";
                    }
                    if (cat == 'crown') {
                        document.getElementById("fvline").style.display = "none";
                        document.getElementById("supreme").style.display = "none";
                        document.getElementById("super_supreme").style.display = "none";
                        document.getElementById("veg").style.display = "none";
                        document.getElementById("cheesy").style.display = "none";
                        document.getElementById("golden").style.display = "none";
                        document.getElementById("golden_fav").style.display = "none";
                        document.getElementById("cheesy_fav").style.display = "none";
                        document.getElementById("thin_crust").style.display = "none";
                        document.getElementById("kabab_crust").style.display = "none";
                        document.getElementById("crown").style.display = "inline-flex";
                        document.getElementById("battle_beef").style.display = "none";
                    }
                    if (cat == 'kabab_crust') {
                        document.getElementById("fvline").style.display = "none";
                        document.getElementById("supreme").style.display = "none";
                        document.getElementById("super_supreme").style.display = "none";
                        document.getElementById("veg").style.display = "none";
                        document.getElementById("cheesy").style.display = "none";
                        document.getElementById("golden").style.display = "none";
                        document.getElementById("golden_fav").style.display = "none";
                        document.getElementById("cheesy_fav").style.display = "none";
                        document.getElementById("thin_crust").style.display = "none";
                        document.getElementById("kabab_crust").style.display = "inline-flex";
                        document.getElementById("crown").style.display = "none";
                        document.getElementById("battle_beef").style.display = "none";
                    }
                    if (cat == 'battle_beef') {
                        // document.getElementById("fvline").style.display = "none";
                        // document.getElementById("supreme").style.display = "none";
                        // document.getElementById("super_supreme").style.display = "none";
                        // document.getElementById("veg").style.display = "none";
                        document.getElementById("cheesy").style.display = "none";
                        document.getElementById("golden").style.display = "none";
                        document.getElementById("golden_fav").style.display = "none";
                        document.getElementById("cheesy_fav").style.display = "none";
                        document.getElementById("thin_crust").style.display = "none";
                        document.getElementById("kabab_crust").style.display = "none";
                        document.getElementById("crown").style.display = "none";
                        document.getElementById("battle_beef").style.display = "inline-flex";
                    }
                    @elseif($deal->id == 20)
                    if (cat == 'favorites_line') {
                        document.getElementById("supreme").style.display = "none";
                        document.getElementById("super_supreme").style.display = "none";
                        document.getElementById("veg").style.display = "none";
                        document.getElementById("cheesy").style.display = "none";
                        document.getElementById("golden").style.display = "none";
                        document.getElementById("golden_fav").style.display = "none";
                        document.getElementById("cheesy_fav").style.display = "none";
                        document.getElementById("kabab_crust").style.display = "none";
                    }

                    if (cat == 'supreme_lien_pizza') {
                        document.getElementById("fvline").style.display = "none";
                        document.getElementById("super_supreme").style.display = "none";
                        document.getElementById("veg").style.display = "none";
                        document.getElementById("cheesy").style.display = "none";
                        document.getElementById("golden").style.display = "none";
                        document.getElementById("golden_fav").style.display = "none";
                        document.getElementById("cheesy_fav").style.display = "none";
                        document.getElementById("kabab_crust").style.display = "none";
                    }
                    if (cat == 'super_supreme_pizza') {
                        document.getElementById("fvline").style.display = "none";
                        document.getElementById("supreme").style.display = "none";
                        document.getElementById("veg").style.display = "none";
                        document.getElementById("cheesy").style.display = "none";
                        document.getElementById("golden").style.display = "none";
                        document.getElementById("golden_fav").style.display = "none";
                        document.getElementById("cheesy_fav").style.display = "none";
                        document.getElementById("kabab_crust").style.display = "none";
                    }
                    if (cat == 'veg_delight') {
                        document.getElementById("cheesy").style.display = "none";
                        document.getElementById("supreme").style.display = "none";
                        document.getElementById("super_supreme").style.display = "none";
                        document.getElementById("cheesy").style.display = "none";
                        document.getElementById("golden").style.display = "none";
                        document.getElementById("golden_fav").style.display = "none";
                        document.getElementById("cheesy_fav").style.display = "none";
                        document.getElementById("kabab_crust").style.display = "none";
                    }
                    if (cat == 'thin_crust') {
                        document.getElementById("cheesy").style.display = "none";
                        document.getElementById("supreme").style.display = "none";
                        document.getElementById("super_supreme").style.display = "none";
                        document.getElementById("cheesy").style.display = "none";
                        document.getElementById("golden").style.display = "none";
                        document.getElementById("golden_fav").style.display = "none";
                        document.getElementById("cheesy_fav").style.display = "none";
                        document.getElementById("kabab_crust").style.display = "none";
                    }
                    if (cat == 'kabab_crust') {
                        document.getElementById("cheesy").style.display = "none";
                        document.getElementById("supreme").style.display = "none";
                        document.getElementById("super_supreme").style.display = "none";
                        document.getElementById("cheesy").style.display = "none";
                        document.getElementById("golden").style.display = "none";
                        document.getElementById("golden_fav").style.display = "none";
                        document.getElementById("cheesy_fav").style.display = "none";
                        document.getElementById("thin_crust").style.display = "none";
                    }
                    if (cat == 'cheesy_bites_supreme') {
                        document.getElementById("fvline").style.display = "none";
                        document.getElementById("supreme").style.display = "none";
                        document.getElementById("super_supreme").style.display = "none";
                        document.getElementById("veg").style.display = "none";
                        document.getElementById("golden").style.display = "none";
                        document.getElementById("golden_fav").style.display = "none";
                        document.getElementById("cheesy_fav").style.display = "none";
                        document.getElementById("thin_crust").style.display = "none";
                        document.getElementById("kabab_crust").style.display = "none";
                    }
                    if (cat == 'cheesy_bites_favourite') {
                        document.getElementById("fvline").style.display = "none";
                        document.getElementById("supreme").style.display = "none";
                        document.getElementById("super_supreme").style.display = "none";
                        document.getElementById("veg").style.display = "none";
                        document.getElementById("golden").style.display = "none";
                        document.getElementById("golden_fav").style.display = "none";
                        document.getElementById("cheesy").style.display = "none";
                        document.getElementById("thin_crust").style.display = "none";
                        document.getElementById("kabab_crust").style.display = "none";
                    }

                    if (cat == 'golden_surprise_supreme') {
                        document.getElementById("cheesy").style.display = "none";
                        document.getElementById("supreme").style.display = "none";
                        document.getElementById("super_supreme").style.display = "none";
                        document.getElementById("veg").style.display = "none";
                        document.getElementById("fvline").style.display = "none";
                        document.getElementById("golden_fav").style.display = "none";
                        document.getElementById("cheesy_fav").style.display = "none";
                        document.getElementById("thin_crust").style.display = "none";
                        document.getElementById("kabab_crust").style.display = "none";
                    }
                    if (cat == 'golden_surprise_favourite') {
                        document.getElementById("cheesy").style.display = "none";
                        document.getElementById("supreme").style.display = "none";
                        document.getElementById("super_supreme").style.display = "none";
                        document.getElementById("veg").style.display = "none";
                        document.getElementById("fvline").style.display = "none";
                        document.getElementById("cheesy_fav").style.display = "none";
                        document.getElementById("golden").style.display = "none";
                        document.getElementById("thin_crust").style.display = "none";
                        document.getElementById("kabab_crust").style.display = "none";
                    }
                    @elseif($deal->id == 21)
                    if (cat == 'favorites_line') {
                        document.getElementById("fvline").style.display = "inline-flex";
                        document.getElementById("supreme").style.display = "none";
                        document.getElementById("super_supreme").style.display = "none";
                        document.getElementById("veg").style.display = "none";
                        document.getElementById("cheesy").style.display = "none";
                        document.getElementById("golden").style.display = "none";
                        document.getElementById("golden_fav").style.display = "none";
                        document.getElementById("cheesy_fav").style.display = "none";
                        document.getElementById("thin_crust").style.display = "none";
                        document.getElementById("crown").style.display = "none";
                        document.getElementById("kabab_crust").style.display = "none";
                    }
                    if (cat == 'golden_surprise_favourite') {
                        document.getElementById("cheesy").style.display = "none";
                        document.getElementById("supreme").style.display = "none";
                        document.getElementById("super_supreme").style.display = "none";
                        document.getElementById("veg").style.display = "none";
                        document.getElementById("fvline").style.display = "none";
                        document.getElementById("cheesy_fav").style.display = "none";
                        document.getElementById("thin_crust").style.display = "none";
                        document.getElementById("crown").style.display = "none";
                        document.getElementById("kabab_crust").style.display = "none";
                    }
                    if (cat == 'golden_surprise_supreme') {
                        document.getElementById("cheesy").style.display = "none";
                        document.getElementById("supreme").style.display = "none";
                        document.getElementById("super_supreme").style.display = "none";
                        document.getElementById("veg").style.display = "none";
                        document.getElementById("fvline").style.display = "none";
                        // document.getElementById("golden_fav").style.display = "none";
                        document.getElementById("cheesy_fav").style.display = "none";
                        document.getElementById("thin_crust").style.display = "none";
                        document.getElementById("crown").style.display = "none";
                        document.getElementById("kabab_crust").style.display = "none";
                    }
                    if (cat == 'thin_crust') {
                        document.getElementById("cheesy").style.display = "none";
                        document.getElementById("supreme").style.display = "none";
                        document.getElementById("super_supreme").style.display = "none";
                        document.getElementById("veg").style.display = "none";
                        document.getElementById("fvline").style.display = "none";
                        document.getElementById("golden_fav").style.display = "none";
                        document.getElementById("golden").style.display = "none";
                        document.getElementById("cheesy_fav").style.display = "none";
                        document.getElementById("crown").style.display = "none";
                        document.getElementById("kabab_crust").style.display = "none";
                        document.getElementById("thin_crust").style.display = "inline-flex";
                    }
                    if (cat == 'crown') {
                        document.getElementById("fvline").style.display = "none";
                        document.getElementById("supreme").style.display = "none";
                        document.getElementById("super_supreme").style.display = "none";
                        document.getElementById("veg").style.display = "none";
                        document.getElementById("cheesy").style.display = "none";
                        document.getElementById("golden").style.display = "none";
                        document.getElementById("golden_fav").style.display = "none";
                        document.getElementById("cheesy_fav").style.display = "none";
                        document.getElementById("thin_crust").style.display = "none";
                        document.getElementById("kabab_crust").style.display = "none";
                        document.getElementById("crown").style.display = "inline-flex";
                    }
                    if (cat == 'kabab_crust') {
                        document.getElementById("fvline").style.display = "none";
                        document.getElementById("supreme").style.display = "none";
                        document.getElementById("super_supreme").style.display = "none";
                        document.getElementById("veg").style.display = "none";
                        document.getElementById("cheesy").style.display = "none";
                        document.getElementById("golden").style.display = "none";
                        document.getElementById("golden_fav").style.display = "none";
                        document.getElementById("cheesy_fav").style.display = "none";
                        document.getElementById("thin_crust").style.display = "none";
                        document.getElementById("kabab_crust").style.display = "inline-flex";
                        document.getElementById("crown").style.display = "none";
                    }
                    @endif

                    selectPizza.find('.setPizza').html(short_desc);
                    modal.modal('hide');
                    selectPizza.find('i.fa').removeClass('fa-plus').addClass('fa-times-circle').addClass('compulsory-icon');
                    selectPizza.find('div.setoptionaltext').removeClass('setoptionaltext').addClass('optional-text').addClass('optional-currency');
                    selectPizza.removeClass('active').removeClass('selectPizza').addClass('selectedPizza');
                    setPizzaName();
                    setPizzaPrice(additional_price, sd);
                    document.getElementById("selectedPrice").value = additional_price;
                    $('.optionalPizza').show();
                    showPizzaprice();
                    // $('.addToPrizeCart').show();
                });
            });

            rootParent.on('click', 'i.compulsory-icon', function (e) {
                let parent = $(this).parents('.selectedPizza');
                parent.find('i.fa').removeClass('fa-times-circle').addClass('fa-plus').removeClass('compulsory-icon');
                parent.find('p.setPizza').html('Choose Your Pizza');
                parent.addClass('selectPizza').removeClass('selectedPizza');
                $('.optionaledPizza').hide();
                let optionaledPizza = $('.optionaledPizza');
                optionaledPizza.find('i.fa').removeClass('fa-times-circle').addClass('fa-plus').removeClass('optional-icon');
                optionaledPizza.find('p.setPizza').html('Choose Your Pizza');
                optionaledPizza.addClass('optionalPizza').removeClass('selectedPizza');
                setPizzaName();
                showPizzaprice();
                // $('.addToPrizeCart').attr("disabled", true);
                // $('.addToPrizeCart').hide();
            });
            rootParent.on('click', 'i.optional-icon', function (e) {
                let parent = $(this).parents('.selectedPizza');
                parent.find('i.fa').removeClass('fa-times-circle').addClass('fa-plus').removeClass('optional-icon');
                parent.find('p.setPizza').html('Choose Your Pizza');
                parent.addClass('optionalPizza').removeClass('selectedPizza');
                setPizzaName();
                showPizzaprice();
                // $('.addToPrizeCart').attr("disabled", true);
            });
            $('.addToPrizeCart').on('click', function (event) {
                event.preventDefault();
                var form = rootParent;
                var product_id = form.find("input[name='product_id']").val();
                var product_virtual_id = '786';
                var product_name = form.find("input[name='product_name']").val();
                var product_short_description = '';
                var product_price = form.find("input[name='product_price']").val();
                var product_sd = form.find("input[name='sd']").val();
                var product_qty = form.find("input[name='product_qty']").val();
                var product_image = form.find("input[name='product_image']").val();
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: "POST",
                    url: '{{route('add-to-card')}}',
                    // data: {form:form},
                    data: {
                        _token: CSRF_TOKEN,
                        deal_id: product_id,
                        product_virtual_id: product_virtual_id,
                        product_name: product_name,
                        product_short_description: product_short_description,
                        product_price: product_price,
                        product_sd: product_sd,
                        product_qty: product_qty,
                        product_image: product_image
                    },
                    success: function (msg) {
                        window.location.replace('{{route('all-deals')}}');
                    }
                });
            });
        });
    </script>
@endsection
