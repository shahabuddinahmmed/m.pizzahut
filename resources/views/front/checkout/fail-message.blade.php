@extends('front.master', ['body_class' => 'sticky-header left-side-collapsed'])
@section('stylesheet')
    <style>
        .sr_back_button{
            padding: 10px 0px 0px 10px !important;
            width: 100px;
        }
        .sr_back_button a {
            display: block;
        }
    </style>
@endsection
@section('title')
    Order Pizza Online For Delivery | Home
@endsection
@section('body')
    <!-- main content start-->
    <div class="main-content">
        <!-- header-starts -->
        <div class="header-section">
            <!--toggle button start-->
        {{--            <div class="sr_back_button"><a  href="{{route('category-product',2)}}"><i class="fa fa fa-angle-left icon"></i></a></div>--}}
        <!--toggle button end-->
            <!--notification menu start -->
            <div class="menu-right" style=" margin-top: -58px;">
                <a href="{{route('all-pizza')}}">
                    <div class="logo_bg edge-shadow" style="bottom: -20px;">
                        <img style="width: 50%;" src="{{asset('/')}}front/assets/imgs/pizzahut-logo-icon.svg" alt="">
                    </div>
                </a>
            </div>
        </div>
        <!--notification menu end -->
        {{--<div class="toolbar-title toolbar-title-md" style="text-transform: uppercase;color: #424242;padding: 15px 0px 15px 0px; text-align: center; font-weight: 600; font-family: 'Open Sans Condensed', sans-serif;">Order Success
        </div>--}}

        {{--<div class="contain-fluid">--}}
        {{--<div class="store_wrapper">--}}
        {{--<div class="store_card">--}}
        {{--<h1 class="display-4 font-size-md-down-5 mb-3" style="text-align: center;color: #e13c3f;">--}}
        {{--<i class="fas fa-shipping-fast" style="font-size: 30px;"></i> <br/>Your order has been placed successfully--}}
        {{--</h1>--}}

        {{--</div><!-- .store_card -->--}}
        {{--<a class="checkout_btn btn btn-block" href="{{route('all-pizza')}}">Back to Store Page</a>--}}
        {{--<button type="button" class="checkout_btn">Back to Store Page</button>--}}

        {{--</div>--}}
        {{--</div>--}}
        <div class="container cat-bg mt-5">
            <div class="row">
                <div class="col-md-12" style="margin-top: 50px; width: 100%;">
                    <div class="toolbar-title toolbar-title-md" style="font-size: 40px;text-transform: uppercase;color:#e13c3f;padding: 15px 0px 15px 0px; text-align: center; font-weight: 600; font-family: 'Open Sans Condensed', sans-serif;">Sorry !!
                    </div>
                </div>
                <div class="col-md-12" style="width: 100%; margin-left: 40%;">
                    <i class="fas fa-shipping-fast" style="font-size:40px;"></i>
                </div>
                <div class="col-md-12" style="width: 100%; margin-left:0%;">
                    <h4 class="display-4 font-size-md-down-5 mb-3 " style="text-align: center;color: #424242;">
                        Your order has been Failed
                    </h4>
                </div>
                <div class="col-md-4" style="width: 100%;">
                    <a class="complete_btn btn btn-block" href="{{route('all-pizza')}}">Back to Store Page</a>
                    @if($is_partner_service)
                        <a id="complete_bkash_btn" class="btn btn-block" href="#" onclick='webViewJSBridge.goBackHome("PIZZAHUT");return false;'>Go Back To bKash App Home</a>
                    @endif
                </div>
            </div>
        </div>
        <!-- End of .clearfix -->

    </div>
    <!-- main content end-->
@endsection
@section('script')
    @if($is_partner_service)
        <script src="https://cdn.capp.bka.sh/scripts/webview_bridge.js"></script>
    @endif
@endsection