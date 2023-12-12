@section('stylesheet')
    <link href="{{asset('/')}}front/build/categoryProduct.css" rel="stylesheet">
    <link href="{{asset('/')}}front/build/deals.css" rel="stylesheet">

    <style>
        .viewcart_button {
            bottom: 0px;
            margin: 10px;
            padding: 6px 12px;
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
            <div class="scroll-content">
                @include('front.includes.product-menu')


                {{--<div class="top_wrapper">--}}
                {{--<div class="top_wrapper_left">--}}
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
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                @php($product_name = '')
                <h1 class="ribbon" style="margin-bottom: 25px">
                    <strong class="ribbon-content">Deals</strong>
                </h1>
                <div class="container">
                    <div class="row">
                        @foreach($products as $product)
                            <a href="{{route('deals-detail',['id'=>$product->id])}}">
                                <div class="col-md-12 bg-white">
                                    <div class="deals_card">
                                        @if($product->image)
                                            <img class="img-fluid" src="{{m_asset($product->image)}}"
                                                 alt="{{$product->title}}" width="100%">
                                        @else
                                            <img class="img-fluid" src="{{ asset('/')}}client_end/images/BOGO1.png"
                                                 alt="5 Terre" width="100%">
                                        @endif
                                        <div class="deals-card-content">
                                            <div class="deal-item-name">
                                                {{$product->title}}
                                            </div>
                                            <div class="deal-item-desc">
                                                {{$product->short_description}}
                                            </div>
                                            @if($product->price >0 || $product->price!=null)
                                            <div class="deal-price">
                                                <span>From</span>
                                                <span class="pro_price">{{get_show_price($product->price,$product->sd)}}</span>
                                            </div>
                                            @endif
                                                <button class="sc-AxheI bqJhFB" style="margin-bottom: 0px;">Select
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                            </a>
                        @endforeach
                    </div>
                </div>
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
    @include('front.includes.setLocation')
@endsection