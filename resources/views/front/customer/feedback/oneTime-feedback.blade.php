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
            transform: scale(1.5);
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

        .taw_backbutton {
            text-transform: uppercase;
            margin-top: 20px;
            color: #424242;
            font-weight: 600;
            font-family: 'Open Sans Condensed', sans-serif;
        }

        .taw_secure_checkout {
            text-transform: uppercase;
            color: #424242;
            margin: 27px 0px 10px;
            padding: 0px 70px;
            font-weight: 600;
            font-family: united-sans-cond-bold;
            font-size: 30px;
        }

        .col-md-12 {
            width: 100%;
        }

        .col-md-6 {
            width: 50%;
        }

        .jut_feedback_checkbox input {
            margin: 5px 20px;
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

            .jut_feedback_checkbox {

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
                    <a href="https://m.pizzahutbd.com/"></a>
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
                        <div class="col-md-12 text-center">
                            <div class="toolbar-title toolbar-title-md taw_secure_checkout">
                                Customer Feedback
                            </div>
                        </div>
                    </div>
                </div>

                <div class="contain-fluid">
                    <div class="checkout_wrapper">
{{--                        {{ dd(route('sms-feedback-mail-send')) }}--}}
                        <form action="{{ route('sms-feedback-mail-send') }}" method="POST">
                            @csrf
                        <div class="container">
                            <div class="row jut_feedback_checkbox">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <input type="hidden" name="customer_id" value="{{ $customerId }}">
                                <input type="hidden" name="order_id" value="{{ $orderId }}">
                                <div class="col-md-12">

                                    <label for="name">Have you received the food on due
                                        time?</label>

                                </div>
                                <div class="col-md-12">
                                    <input type="radio" class="custom-control-input" id="oneTime1"
                                           name="is_due_time" value="1" required checked>
                                    <span> Yes</span>
                                    <input type="radio" class="custom-control-input" id="oneTime1"
                                           name="is_due_time" value="0" required>
                                    <span> No</span>

                                </div>
                            </div>
                            <div class="row jut_feedback_checkbox">
                                <div class="col-md-12">

                                    <label for="name">Was the food hot?</label>

                                </div>
                                <div class="col-md-12">
                                    <input type="radio" class="custom-control-input" id="oneTime2"
                                           name="is_hot" value="1" required checked>
                                    <span> Yes</span>
                                    <input type="radio" class="custom-control-input" id="oneTime2"
                                           name="is_hot" value="0" required>
                                    <span> No</span>
                                </div>
                            </div>
                            <div class="row jut_feedback_checkbox">
                                <div class="col-md-12">
                                    <label for="comment">Leave a comment</label>
                                    <textarea type="text" name="comment" class="form-control" id="comment"></textarea>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="checkout_btn">
                            <div class="button-inner __web-inspector-hide-shortcut__">Submit</div>
                        </button>
                        </form>
                    </div>
                    {{--{{Form::close()}}--}}
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

                            <select class="form-control" id="selectOrderTime">
                                {{-- --}}{{--                                <option value="{{$current_time}}" selected>ASAP</option>--}}{{--
                                 @foreach($hours as $k=>$v)
                                     --}}{{--@if(time() <= strtotime($k))--}}{{--
                                     <option value="{{$k}}">{{$v}}</option>
                                     --}}{{--@endif--}}{{--
                                 @endforeach--}}
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