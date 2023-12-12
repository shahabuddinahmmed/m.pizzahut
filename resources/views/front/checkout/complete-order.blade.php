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
            <div class="menu-right" style=" margin-top: -58px;">
                <a href="{{route('all-pizza')}}">
                    <div class="logo_bg edge-shadow" style="bottom: -20px;">
                        <img style="width: 50%;" src="{{asset('/')}}front/assets/imgs/pizzahut-logo-icon.svg" alt="">
                    </div>
                </a>
            </div>
        </div>
        <div class="container cat-bg mt-5">
            <div class="row">
                <div class="col-md-12" style="margin-top: 50px; width: 100%;">
                    <div class="toolbar-title toolbar-title-md" style="font-size: 40px;text-transform: uppercase;color:#e13c3f;padding: 15px 0px 15px 0px; text-align: center; font-weight: 600; font-family: 'Open Sans Condensed', sans-serif;">Congratulations !!
                    </div>
                </div>
                <div class="col-md-12" style="width: 100%; margin-left: 40%;">
                    <i class="fas fa-shipping-fast" style="font-size:40px;"></i>
                </div>
                <div class="col-md-12" style="width: 100%; margin-left:0%;">
                    <h4 class="display-4 font-size-md-down-5 mb-3 " style="text-align: center;color: #424242;">
                        Your order has been placed successfully
                    </h4>
                    <p style="text-align: center;color: #424242;">
                        Thank you for choosing Pizza Hut. Your order number is <b>#OR00{{$order_id}}</b>. <br/>
                        Please call ({{$store_number}}) if you have any query.
                    </p>
                </div>
                <div class="col-md-4" style="width: 100%;">
                    @if(isset($isBkashCheckout) && $isBkashCheckout==1)
                        <a class="complete_btn btn btn-block" href="{{url('api/bikash-data',session()->get('token'))}}">Back to Home Page</a>
                        <button id=“bkash_btn” type=“button” onclick="window.webViewJSBridge.goBackHome('Tickets')"
                                style="position: fixed;left: 0;bottom: 0;width: 100%;height: 8%;font-size: 18px;border-radius: 0px;margin-top: 2%;
                                color: white!important;width: 100%;height: 50px;text-align: left;background-color: #E2136E;border-color: #E2136E;" >
                            Back to bKash App Home<img src='https://capp-cdn.labs.bka.sh/images/arrow.svg' style='float: right;margin-top: 1%;
                                                       padding-right: 1%;'></button>
                    @else
                    <a class="complete_btn btn btn-block" href="{{route('/')}}">Back to Home Page</a>
                    @endif
                    @if($is_partner_service)
{{--                        <a id="complete_bkash_btn" class="btn btn-block" href="#" onclick='webViewJSBridge.goBackHome("PIZZAHUT");return false;'>Go Back To bKash App Home</a>--}}
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