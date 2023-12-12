@section('stylesheet')
    <style>
        body {
            background-image: url({{asset('/')}}front/assets/imgs/Backdrop.jpg);
        }

        .toolbar-title-md-1 {
            text-transform: uppercase;
            color: #424242;
            text-align: center;
            margin-top: 20px;
            margin-bottom: 20px;
            font-weight: 600;
            font-family: 'Open Sans Condensed', sans-serif;
        }

        .toolbar-title-md-2 {
            color: #424242;
            padding: 5px 0px 0px 20px;
            font-weight: 400;
            font-size: 16px;

        }

        .hr-style {
            background-color: #cccccc;
            margin-top: 10px
        }

        #location-panel {
            color: #424242;
            padding: 10px;
            font-weight: 400;
            font-size: 14px;
            float: none;
            overflow: hidden;
        }

        #location-panel > #label {
            float: left;
            width: 35%;
        }

        #location-panel > #value {
            float: left;
            width: 65%;
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .hr-border {
            display: flex;
            align-items: center;
            font-size: 18px;
            font-weight: 700;
            margin: 10px 0px;
            text-transform: none;
            padding: 10px;
            font-family: inherit;
        }

        .btn-sm {
            padding: 0px 3px;
            margin-top: 0px;
        }

        .button-right {
            float: right;
            position: inherit;
        }



        input[type=radio] {
            transform: scale(2);
            /*margin-left: 10px;*/
            margin: 10px;
        }

        .form-control {
            height: 50px;
        }

        .form-group {
            margin: 25px 15px 20px 15px;
        }

        .ad_total {
            background: #f4f4f4;
        }

        .checkout_btn {
            width: 95%;
            margin: 10px;
            height: 45px;
            font-size: 17px;
            padding: 0px 10px;
            color: #fff;
            background-color: #0a8020;
            border-radius: 5px;
        }

        input::placeholder {
            color: #999999 !important;
            opacity: 1; /* Firefox */
        }

        input:-ms-input-placeholder { /* Internet Explorer 10-11 */
            color: #999999;
        }

        input::-ms-input-placeholder { /* Microsoft Edge */
            color: #999999;
        }

        .taw_backbutton{
            text-transform: uppercase;
            margin-top: 20px;
            color: #424242;
            font-weight: 600;
            font-family: 'Open Sans Condensed', sans-serif;
        }

        .taw_secure_checkout{
            text-transform: uppercase;
            color: #424242;
            margin: 27px 0px;
            padding: 0px 70px;
            font-weight: 600;
            font-family: united-sans-cond-bold;
            font-size: 23px;
        }

        @media (max-width: 568px) {
            .modal-body {
                position: relative;
                padding: 0;
                margin: 10px;
            }
        }

        @media (max-width: 320px) {

            .taw_secure_checkout {
                padding: 0px 30px;
            }
        }

        @media screen and (max-width: 375px) and (min-width: 321px) {
            .clearfix .hr-border {
                margin-top: 0px;
            }

            #location-panel {
                color: #424242;
                padding: 10px 10px 0px 10px;
                font-weight: 400;
                font-size: 14px;
                float: none;
                overflow: hidden;
            }

            .taw_secure_checkout {
                padding: 0px 45px;
            }

            .payment_method {

                font-size: 15px;
            }

        }


    </style>
    {{--<link rel="stylesheet" href="{{asset('/')}}front/build/bootstrap-datetimepicker.min.css">--}}
@endsection
@extends('front.master', ['body_class' => 'sticky-header left-side-collapsed'])
@section('title')
    Order Pizza Online For Delivery | Home
@endsection
@section('body')


    <!-- main content start-->
    <div class="main-content">
        <div class="header-section">
            <!--notification menu start -->
            <div class="menu-right">
                <div class="logo_bg edge-shadow">
                    <a href="{{route('/')}}">
                        <img style="width: 50%;" src="{{asset('/')}}front/assets/imgs/pizzahut-logo-icon.svg" alt="">
                    </a>
                </div>
            </div>
        </div>
        <div class="clearfix">
            <div class="scroll-content" style="margin-top: 44px;">

                <!--notification menu end -->
                <div class="container" style="padding: 0px;">
                    <div class="row">
                        <div class="col text-center">
                            <div class="toolbar-title toolbar-title-md taw_secure_checkout">
                                <i class="fa fa-lock" aria-hidden="true"></i> SECURE bKash PAYMENT
                            </div>
                            @if(Session::get('message'))
                                <div class="alert alert-success" role="alert">
                                    <strong></strong> {{Session::get('message')}}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="contain-fluid">

                    <div class="checkout_wrapper">
                        <div class="personal-info">
                            <div class="container-fluid">
                                <div class="row invoice-info mt-5">
                                    <div class="col-sm-7">
                                        @if($customer->bkash_msisdn)
                                            <p>
                                                Thanks for creating your Agreement bkash_paymentID. <br>
                                                Now Please Select <a href="{{route('bkash_payment')}}"> <b style="color: #e3106e">'PAY WITH bKash'</b></a> Button For an Successful Payment.
                                            </p>
                                            {{--<a href="{{route('bkash_payment')}}">
                                                <img src="{{asset('/')}}front/assets/imgs/bKash-button.png" alt="Pay with bkash">
                                            </a>--}}
                                        @else
                                            <p>
                                                Select <b>'Add bkash Account'</b> Button to provide your bKash Agreement ID to Pizzahut.
                                                <br>
                                                <small>Agreement Creation is a one-time process through which PizaHut remember Your bKash Account information.</small>
                                            </p>
                                            <a href="{{route('create_agreement')}}">
                                                <img src="{{asset('/')}}front/assets/imgs/add_bkash.png" alt="Add bkash Account">
                                            </a>
                                        @endif
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-5">
                                        <br/>
                                        <strong>Billing Details</strong><br/>
                                        <b>Order ID:</b><span style="color: red;font-weight: bold"> OR00{{$order->id}}</span><br/>
                                        @php($shipping_detail = $order->shipping_detail)
                                        @php($billing_details = $order->billing_detail)
                                        <address>
                                            @if($customer)
                                                <b>Name: </b>{{$customer->first_name}} {{$customer->last_name}} <br>
                                                <b>Mobile: </b>{{$customer->phone_number}}<br>
                                            @endif
                                            @if($billing_details)
                                                Total: <span style="color: red;font-weight: bold">{{$order->order_total}} TK </span><br>
                                                Payment Type: {{$billing_details->payment_type}} <br>
                                                Payment Status: {{$billing_details->payment_status}} <br/>
                                                Order Date:
                                                @if($order->order_time)
                                                    {!! Help::dateOnly($order->created_at) !!}
                                                @endif
                                            @endif
                                        </address>
                                        @if($customer->bkash_agreement_id)
                                            <b>Agreement MSISDN:</b> {{$customer->bkash_msisdn}}<br/>
                                            <b>Agreement ID:</b> {{$customer->bkash_agreement_id}}<br/>
                                            {{--<a class="btn btn-link" href="{{route('bkash_agreement_status')}}">Agreement Status</a>--}}
                                            <a class="btn btn-link" href="{{route('bkash_agreement_cancel')}}" onclick="return confirm('Are You Sure ?')">Cancel Agreement</a>
                                        @endif
                                        <br/>
                                        @if($bkash)
                                            {{--<b>bKash trxID:</b> {{$bkash->trxID}}<br/>--}}
                                            {{--<a class="btn btn-link" href="{{route('bkash_payment_status')}}">Payment Status</a>--}}
                                            {{--<a class="btn btn-link" href="{{route('search_transaction_api')}}">Search Transactions</a>--}}
                                        @endif
                                    </div>
                                    <!-- /.col -->
                                </div>

                            </div>
                        </div>
                    </div>


                </div>
                <!-- End of .clearfix -->
            </div>
        </div>
    </div>
    <!-- main content end-->

@endsection