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
                            <p id="success"></p>
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
                                            <p>
                                               <br> Now Please Click <br><br>
                                                <img id="bKash_button" src="{{asset('/')}}front/assets/imgs/bikash123.jpg">
{{--                                                <button id="bKash_button" class="btn btn-default"> <b style="color: #e3106e"><span><img id="bKash_button" src="{{asset('/')}}front/assets/imgs/bikash123.jpg"></span></b></button> Button For an Successful Payment.<br>--}}
{{--                                                Now Please Select <a href="{{ url('/bkash/payment/checkout',$order->id) }}"><b style="color: #e3106e">'PAY WITH bKash' </b></button></a> Button For an Successful Payment.<br>--}}
                                            </p>
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
    <script>
        var paymentID = '';
        var paymentRequest = { amount: '{{$order->order_total}}',orderID: '{{$order->id}}',intent:'sale'};
        bKash.init({
            paymentMode: 'checkout', //fixed value ‘checkout’
            paymentRequest:paymentRequest,

            createRequest: function(request) { //request object is basically the paymentRequest object, automatically pushed by the script in createRequest method
                $.ajax({
                    url: '{{url('/bkash/payment/checkout')}}'+'/'+paymentRequest.orderID,
                    type: 'GET',
                    contentType: 'application/json',
                    success: function(data) {
                        console.log('got data from create  ..');
                        console.log('data ::=>');
                        console.log(JSON.stringify(data));
                        data = JSON.parse(data);
                        if (data && data.paymentID != null) {
                            paymentID = data.paymentID;
                            bKash.create().onSuccess(data); //pass the whole response data in bKash.create().onSucess() method as a parameter
                        } else {
                            console.log('error');
                            swal("Transaction Failed!",data.errorMessage);;
                            bKash.create().onError();
                        }
                    },
                    error: function(error) {
                        swal("Transaction Failed!",error.errorMessage);
                        console.log(error);
                        bKash.create().onError();
                    }
                });
            },
            executeRequestOnAuthorization: function() {
                $.ajax({
                    url: '{{url('/bkash/checkout/bkash-payment-execute')}}'+'/'+paymentID,
                    type: 'GET',
                    contentType: 'application/json',
                    data: JSON.stringify({
                        "paymentID": paymentID
                    }),
                    success: function(data) {
                        console.log('got data from create  ..');
                        console.log('data ::=>');
                        // console.log(data);
                        console.log(JSON.stringify(data));
                        data = JSON.parse(data);
                        if (data && data.paymentID != null) {
                            console.log(JSON.stringify(data));
                            if(data.transactionStatus!='Completed'){
                                swal("Transaction Failed!",'Here is something wrong! Try again ');
                                bKash.execute().onError();
                            }else {
                                window.location.href = "{{ route('complete-order',['order_id' => $order->id]) }}";//Merchant’s success page
                            }
                        } else {
                            swal("Transaction Failed!",data.errorMessage);
                            console.log('error');
                            bKash.execute().onError();
                        }
                    },
                    error: function(error) {
                        swal("Transaction Failed!",error.errorMessage);
                        console.log('error');
                        bKash.execute().onError();
                    }
                });
            },

            onClose : function(){
                window.location.href = "{{ route('bkash_checkout_payment',['order_id' => $order->id]) }}";
            }
        });
    </script>

@endsection