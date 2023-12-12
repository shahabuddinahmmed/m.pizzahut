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

                    @if ($selectHomePage->selected_value==1)
                        <a href="{{route('all-pizza')}}">
                    @elseif($selectHomePage->selected_value==2)
                        <a href="{{route('all-pasta')}}">
                    @elseif($selectHomePage->selected_value==3)
                        <a href="{{route('all-appetisers')}}">
                    @elseif($selectHomePage->selected_value==4)
                        <a href="{{route('all-deals')}}">
                    @elseif($selectHomePage->selected_value==5)  
                        <a href="{{route('all-drinks')}}"> 
                    @endif

                        <img style="width: 50%;" src="{{asset('/')}}front/assets/imgs/pizzahut-logo-icon.svg" alt="">
                    </a>
                </div>
            </div>
        </div>
        @unless(empty($back))
            @php($back_button = $back)
        @else
            @php($back_button = url()->previous())
        @endunless
        <div class="clearfix">
            <div class="scroll-content" style="margin-top: 44px;">

                <!--notification menu end -->
                <div class="container" style="padding: 0px;">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="toolbar-title toolbar-title-md taw_backbutton">
                                <div class="sr_back_button">
                                    <a href="{{ $back_button }}">
                                        <i class="fa fa fa-angle-left icon"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-10 text-center">
                            <div class="toolbar-title toolbar-title-md taw_secure_checkout">
                                <i class="fa fa-lock" aria-hidden="true"></i> secure checkout
                            </div>
                        </div>
                    </div>
                </div>

                <div class="contain-fluid">
                    {{Form::open(['route'=>'save-order','class'=>'contact-form','method'=>'POST','name'=>'newOrder'])}}

                    <div class="checkout_wrapper">
                        <div id="location-panel">
                            <div id="label">
                                <i class="fa fa-map-marker" aria-hidden="true"></i> Delivering To :
                            </div>
                            <div id="value">
                                {{--<b><span>{{$store->name}}</span></b><br>--}}
                                <span>{{Session::get('Location')}}</span>
                            </div>
                        </div>

                        <div class="toolbar-title toolbar-title-md toolbar-title-md-2" id="location-panel">

                            <div id="value">
                                <i class="fa fa-clock-o" aria-hidden="true"></i> Order for :
                                <span> {{$delivery_day}}, <span id="orderViewTime">{{$default_time}}</span></span>
                            </div>

                            <div id="label">
                                {{-- <a href="--}}{{--route('product-details',['id'=>$product->id])--}}{{--"
                                    onclick="event.preventDefault();" data-toggle="modal"
                                    data-target="#shiftingTime">Change</a>--}}
                                <button type="button" onclick="event.preventDefault();" data-toggle="modal"
                                        data-target="#shiftingTime"
                                        class="btn btn-outline-secondary btn-sm text-uppercase">Change
                                </button>
                            </div>
                            </span>
                            {{Form::hidden('order_time',$default_datetime,array('id' => 'order_time'))}}
                        </div>
                        <div class="personal-info">
                            <div class="container">
                                <div class="hr-border text-style " text-center=""> Who are we delivering to?</div>
                                {{--<form class="was-validated">--}}
                                <div class="form-group">
                                    <label style="font-size: 14px" for="name">Name*</label>
                                    @if(Session::has('CustomerName') || Session::has('CustomerName') != 'Customer' )
                                        {{Form::text('name',Session::get('CustomerName'),array('id' => 'name', 'required' => 'required', 'class' => 'form-control '))}}
                                    @else
                                        {{Form::text('name','',array('id' => 'name', 'required' => 'required', 'placeholder' => 'First name is enough', 'class' => 'form-control '))}}
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label style="font-size: 14px" for="mbl">Mobile Number*</label>
                                    @if(Session::has('CustomerMobile'))
                                        {{Form::text('mobile',Session::get('CustomerMobile'),array('id' => 'mobile', 'required' => 'required', 'class' => 'form-control ', 'readonly'=>true))}}
                                    @else
                                        {{Form::text('mobile','',array('id' => 'mobile', 'required' => 'required', 'placeholder' => 'So we can contact you for pizza updates', 'class' => 'form-control '))}}
                                    @endif                                </div>
                                <div class="form-group">
                                    <label style="font-size: 14px" for="email">Email*:</label>
                                    @if(Session::has('CustomerEmail'))
                                        {{Form::email('email',Session::get('CustomerEmail'),array('id' => 'email','required' => 'required', 'class' => 'form-control '))}}
                                    @else
                                        {{Form::email('email',Session::get('CustomerEmail'),array('id' => 'email','required' => 'required', 'placeholder' => 'To send you order confirmation', 'class' => 'form-control '))}}
                                    @endif                                </div>

                                @if($mode == 'Delivery')
                                    <div class="hr-border text-style " text-center=""> Where should we deliver it to?
                                    </div>
                                    {{--<div class="toolbar-title toolbar-title-md"--}}
                                    {{--style="color: #424242;padding: 5px 0px 20px 5px;font-weight: 400; font-size: 16px;">--}}
                                    {{--<i class="fa fa-map-marker" aria-hidden="true"></i> Delivering To--}}
                                    {{--<span class="change cursor">--}}
                                    {{--<span class="" style="padding-left: 71px;">--}}
                                    {{--{{Session::get('Location')}}--}}
                                    {{--H 90A, Satguru Ram Singh Rd, Block H, Kirti Nagar, New Delhi, Delhi 110015, India--}}
                                    {{--</span>--}}
                                    {{--</span>--}}
                                    {{--</div>--}}
                                    <div class="form-group">
                                        <label style="font-size: 14px" for="ads">Address Details*</label>
                                        {{Form::text('address_details','',array('id' => 'address_details','required' => 'required', 'placeholder' => 'Section, Block, Road, House, Flat/Office/Building', 'class' => 'form-control '))}}
                                    </div>
                                    <div class="form-group">
                                        <label style="font-size: 14px" for="ai">Additional Information*</label>
                                        {{Form::text('additional_information','',array('id' => 'additional_information','required' => 'required', 'placeholder' => 'Landmark (optional)', 'class' => 'form-control '))}}
                                    </div>
                                @else
                                    <h4 class="titel-1 mt-5">Where should you pick it from?</h4>

                                    <div id="location-panel">
                                        <div id="label">
                                            <i class="fa fa-map-marker" aria-hidden="true"></i> Pickup From
                                        </div>
                                        <div id="value">
                                            <b><span>{{$store->name}}</span></b><br>
                                            <span>{{$store->location}}</span>
                                        </div>
                                    </div>
                                @endif
                                <div class="hr-border text-style " text-center=""> How would you like to pay?</div>
                                @if(!$is_partner_service)
                                <div class="row">
                                    <div class="col-md-12 payment_method">
                                        <div class="left">
                                            <input type="radio" class="custom-control-input"
                                                   id="customControlValidation2" name="payment_type" value="Cash" required checked>
                                            <span>Cash on Delivery</span>
                                        </div>
                                        <div class="right">
                                            <img mj-image="" src="{{asset('/')}}front/assets/imgs/payments--cod.png">
                                        </div>
                                    </div>
                                </div>
                                    <div class="row">
                                        <div class="col-md-12 payment_method">
                                            <div class="left">
                                                <input type="radio" class="custom-control-input"
                                                       id="customControlValidation2" name="payment_type" value="SSL" required>
                                                <span>Online</span>
                                            </div>
                                            <div class="right">
                                                <img mj-image="" src="{{asset('/')}}front/assets/imgs/ssl.png"/>
                                            </div>
                                        </div>
                                    </div>
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-12 payment_method">--}}
{{--                                        <div class="left">--}}
{{--                                            <input type="radio" class="custom-control-input"--}}
{{--                                                   id="customControlValidation2" name="payment_type" value="Online" required>--}}
{{--                                            <span> Online Payment</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="right">--}}
{{--                                            <img mj-image="" src="{{asset('/')}}front/assets/imgs/payments--cc.png"/>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="row">
                                    <div class="col-md-12 payment_method">
                                        <div class="left">
                                            <input type="radio" class="custom-control-input"
                                                   id="customControlValidation2" name="payment_type" value="bKash" required>
                                            <span> bKash</span>
                                        </div>
                                        <div class="right">
                                            <img mj-image="" src="{{asset('/')}}front/assets/imgs/bKash.png"/>
                                        </div>
                                    </div>
                                </div>
                                @else
                                    <div class="row">
                                        <div class="col-md-12 payment_method">
                                            <div class="left">
                                                <input type="radio" class="custom-control-input"
                                                       id="customControlValidation2" name="payment_type" value="bKash" required checked>
                                                <span> bKash</span>
                                            </div>
                                            <div class="right">
                                                <img mj-image="" src="{{asset('/')}}front/assets/imgs/bKash.png"/>
                                            </div>
                                        </div>
                                    </div>

                                @endif
                                {{--<div class="bill">
                                    <span class="left">
                                        <div class="bx-border">
                                            <img mj-image="" src="{{asset('/')}}front/assets/imgs/payments--cod.png">
                                            <p class="payment-txt" text-center="">Cash on Delivery</p>
                                        </div>
                                        <input type="radio" class="custom-control-input" id="customControlValidation2" checked name="payment_type" required style="margin-left: 50%;" value="Cash">
                                    </span>
                                    <span class="right">
                                        <div class="bx-border">
                                            <img mj-image="" src="{{asset('/')}}front/assets/imgs/payments--cc.png">
                                            <p class="payment-txt" text-center="">Online Payment</p>
                                        </div>
                                        <input type="radio" class="custom-control-input" id="customControlValidation3" name="payment_type" style="margin-left: 50%;" value="Online" required>
                                    </span>
                                </div>--}}
                                @include('front.checkout._total-amount')
                                <div class="toolbar-title toolbar-title-md"
                                     style="color: #424242;padding: 5px 0px 0px 5px;font-weight: 400; font-size: 16px;">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1" checked
                                               style="width: 20px;height: 20px;">
                                        <label class="custom-control-label" for="customCheck1" style=" color: #424242; padding: 5px 0px 20px 5px;
                                font-weight: 400; font-size: 16px;"> I agree to receive promotional <br/>
                                            communication</label>
                                    </div>
                                </div>
                                {{--</form>--}}
                            </div>
                        </div>
                        <button type="submit" class="checkout_btn">
                            <div  class="button-inner __web-inspector-hide-shortcut__">Go To Payment
                                <span class="right bill-total taka" style="margin-left: 20px;" id="g_total">{{Session::get('grandTotal')}}</span>
                            </div>
                        </button>
                        {{--<p class="terms">--}}
                            {{--By placing your order, you agree to our <br>--}}
                            {{--<a class="underline" href="#" target="_blank">Terms &amp;Conditions</a>--}}
                            {{--<span>&amp;</span>--}}
                            {{--<a class="underline" href="#" target="_blank">Privacy Policy</a>--}}
                        {{--</p>--}}

                    </div>
                    {{Form::close()}}
                </div>
                <!-- End of .clearfix -->
            </div>
        </div>
    </div>
    <!-- main content end-->
    <!-- Modal -->
    <div class="modal fade" id="shiftingTime" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    {{--<div class="sr_back_button" data-dismiss="modal"><a href="{{route('/')}}"><i class="fa fa fa-angle-left icon"></i></a></div>--}}

                    <h4 class="modal-title cust_title">Delivery Date:&nbsp; <b>{{$delivery_date}}</b></h4>
                </div>
                <div class="modal-body">
                    {{--<div class="container">--}}
                    {{--<div class="row">--}}
                    {{--<div class='col-sm-6'>--}}
                    {{--<div class="form-group">--}}
                    {{--<div class='input-group date' id='datetimepicker3'>--}}
                    {{--<input type='text' class="form-control" />--}}
                    {{--<span class="input-group-addon">--}}
                    {{--<span class="glyphicon glyphicon-time"></span>--}}
                    {{--</span>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}

                    <form>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Select Order Time</label>
                            <?php

                            ?>
                            <select class="form-control" id="selectOrderTime">
                                {{--                                <option value="{{$current_time}}" selected>ASAP</option>--}}
                                @foreach($hours as $k=>$v)
                                    {{--@if(time() <= strtotime($k))--}}
                                    <option value="{{$k}}">{{$v}}</option>
                                    {{--@endif--}}
                                @endforeach
                            </select>
                        </div>
                        {{--<input type="text" id="time" data-format="HH:mm" data-template="HH : mm" name="datetime">--}}
                    </form>
                </div>

                <div class="modal-footer">
                    {{--<form class="addToCart" action="#" method="post">--}}
                    {{--<input type="hidden" name="product_id">--}}
                    {{--<input type="hidden" name="product_virtual_id" value="786">--}}
                    {{--<input type="hidden" name="product_name">--}}
                    {{--<input type="hidden" name="product_qty" min="1">--}}
                    {{--<input type="hidden" name="product_price">--}}
                    {{--<input type="hidden" name="product_image">--}}
                    <button type="submit" class="checkout_btn add2cart"> Confirm</button>
                    {{--</form>--}}
                </div>
            </div>

        </div>
    </div>
@include('front.checkout.rec-model')
@endsection
@section('script')
    {{--<script src="{{asset('/')}}front/build/moment.min.js"></script>--}}
    {{--<script src="{{asset('/')}}front/build/bootstrap-datetimepicker.min.js"></script>--}}
    {{--<script src="{{asset('/')}}front/build/combodate.js"></script>--}}

    <script type="text/javascript">
        $(function () {
            // $('#datetimepicker3').datetimepicker({
            //     format: 'LT',
            //     format: 'HH:mm',
            //     stepping: 15,
            //     enabledHours: [9, 10, 11, 12, 13, 14, 15, 16]
            // format: 'hh:mm A',
            // stepping: 15,
            // disabledTimeIntervals: [
            //     [moment().hour(0).minutes(0), moment().hour(6).minutes(59)],
            //     [moment().hour(18).minutes(1), moment().hour(24).minutes(0)]
            // });
            // $('#time').combodate({
            //     firstItem: 'name', //show 'hour' and 'minute' string at first item of dropdown
            //     minuteStep: 1
            // });
            $('#shiftingTime').on('click', '.add2cart', function () {
                event.preventDefault();
                let product_text = $("#selectOrderTime option:selected").html();
                let product_val = $("#selectOrderTime").val();
                $("input[name='order_time']").val(product_val);
                $("#orderViewTime").html(product_text);
                $('#shiftingTime').modal('hide');
            });
        });
    </script>
@endsection