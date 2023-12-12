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
                    <div class="toolbar-title toolbar-title-md" style="text-transform: uppercase; margin-top: 10px;color: #424242;font-weight: 600; font-family: 'Open Sans Condensed', sans-serif;">
                        <div class="sr_back_button"><a href="{{ $back_button }}"><i class="fa fa fa-angle-left icon"></i></a></div>
                    </div>
                </div>
                <div class="col-md-10 text-center">
                    <div class="toolbar-title toolbar-title-md" style="text-transform: uppercase;color: #424242; margin: 23px 0px 23px 10px; padding: 0px 55px;font-weight: 600; font-family: 'Open Sans Condensed', sans-serif;"> Choose Your Pizza </div>
                </div>
            </div>
        </div>
        <div class="clearfix">
            <div class="scroll-content" style="margin-top: 120px; margin-bottom: 0px;">
                <!--notification menu end -->
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="toolbar-title toolbar-title-md deals-category-title"> FAVORITES LINE </div>
                        </div>
                        <div class="col-md-6">
                            <div class="polaroid">
                                <img src="{{asset('/')}}/front/assets/imgs/2503.jpg" alt="5 Terre" style="width: 100%; border-radius: 3px 3px 0 0;">
                                <p class="short_desc">Lebanese Chicken</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="polaroid">
                                <img src="{{asset('/')}}/front/assets/imgs/2503.jpg" alt="5 Terre" style="width: 100%; border-radius: 3px 3px 0 0;">
                                <p class="short_desc">Lebanese Chicken</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="polaroid">
                                <img src="{{asset('/')}}/front/assets/imgs/2503.jpg" alt="5 Terre" style="width: 100%; border-radius: 3px 3px 0 0;">
                                <p class="short_desc">Lebanese Chicken</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="polaroid">
                                <img src="{{asset('/')}}/front/assets/imgs/2503.jpg" alt="5 Terre" style="width: 100%; border-radius: 3px 3px 0 0;">
                                <p class="short_desc">Lebanese Chicken</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="polaroid">
                                <img src="{{asset('/')}}/front/assets/imgs/2503.jpg" alt="5 Terre" style="width: 100%; border-radius: 3px 3px 0 0;">
                                <p class="short_desc">Lebanese Chicken</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="polaroid">
                                <img src="{{asset('/')}}/front/assets/imgs/2503.jpg" alt="5 Terre" style="width: 100%; border-radius: 3px 3px 0 0;">
                                <p class="short_desc">Lebanese Chicken</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- End of .clearfix -->
    </div>
@endsection