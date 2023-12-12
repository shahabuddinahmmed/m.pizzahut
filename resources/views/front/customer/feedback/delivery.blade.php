@section('stylesheet')
    <style>
        body {
            background-image: url({{asset('/')}}front/assets/imgs/Backdrop.jpg);
            font-family: Arial, Helvetica, sans-serif;
        }
        * {box-sizing: border-box}

        /* Full-width input fields */
        input[type=text], input[type=password], input[type=email]  {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }

        input[type=text]:focus, input[type=password]:focus, input[type=email]:focus {
            background-color: #ddd;
            outline: none;
        }

        hr {
            border: 1px solid #f1f1f1;
            margin-bottom: 25px;
        }

        /* Set a style for all buttons */
        button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
        }

        button:hover {
            opacity:1;
        }

        .sr_back_button {
            float: left;
        }
        /* Extra styles for the cancel button */
        .cancelbtn {
            padding: 14px 20px;
            background-color: #f44336;
        }

        /* Float cancel and signup buttons and add an equal width */
        .cancelbtn, .signupbtn {
            float: left;
            width: 50%;
        }

        /* Add padding to container elements */
        .container {
            padding: 16px;
        }

        /* Clear floats */
        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }

        .customer-feed{
            background: #fff0d1;
            border: 1px solid #fbce6d;
            text-align: center;
            margin-top: 20px;
            border-radius: 10px;
            text-transform: uppercase;
            color: #403d3d;
        }

        .customer-feed h4{
            font-weight: 600;
            letter-spacing: 1px;
        }

        .regtxt {

            font-size: 11px;
            font-weight: normal;
            color: #333333;
        }


        /* Change styles for cancel button and signup button on extra small screens */
        @media screen and (max-width: 300px) {
            .cancelbtn, .signupbtn {
                width: 100%;
            }
        }
        form{
            border:1px solid #ccc;
            padding: 20px;
        }
        .form-check{
            margin-bottom: 20px;
        }
        .form-group{
            margin-bottom: 20px;
        }
        .login_wrapper {
            padding: 30px 20px;
        }

        .next_btn {
            background-color: #0a8020;
            font-size: 12px;
            border-radius: 4px;
        }

        .feedback-text{
            font-size: 22px;
            line-height: 0px;
            color: #7b0000;
            padding: 0 0 0px;
            min-height: auto;
            text-transform: none;
            /* text-indent: 10px; */
            font-weight: 900;
        }

        .feedback-text-sub{
            font-size: 14px;
            /* line-height: 0px; */
            color: #bd3019;
            padding: 11px 0 0px;
            min-height: auto;
            text-transform: none;
            /* text-indent: 10px; */
            font-weight: 700;
        }
        label {
            font-size: 13px;
        }
    </style>
@endsection
@extends('front.master', ['body_class' => 'sticky-header left-side-collapsed'])
@section('title')
    Order Pizza Online For Delivery | Customer Login
@endsection
@section('body')
    <div class="main-content">
    @include('front.includes.back-header')

        <div class="clearfix">
            <div class="scroll-content" style="margin-top: 44px;">
                <!--notification menu end -->
                <div class="toolbar-title toolbar-title-md" style="text-transform: uppercase;color: #424242;padding: 27px 0px 15px 0px; font-weight: 600; text-align: center">
                    Customer Feedback
                </div>

                <div class="contain-fluid">
                    <div class="login_wrapper">
                        <div class="input_field">
                            {{--<form>--}}
                            <div class="col-md-12">
                                <p class="feedback-text">FEEDBACK</p>
                            </div>
                            <div class="col-md-12">
                                <p class="feedback-text-sub">LET US KNOW ABOUT YOUR EXPERIENCE WITH PIZZA HUT</p>
                            </div>
                            <div class="col-md-12">
                                <span class="regtxt">
                                    <strong>We value your opinion and welcome your feedback. Kindly fill the appropriate form.<br>
                                    </strong><br>
                                </span>
                            </div>
                            @if(Session::get('message'))
                                <div class="alert alert-success" id="success-alert" role="alert">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                                    <strong>{{Session::get('message')}}</strong>
                                </div>
                            @endif
                            <div class="col-md-12 my-5">
                                <form method="GET" action="{{route('delivery-info')}}">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="experience_info" id="exampleRadios1" value="unsatisfactory" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            I had an unsatisfactory experience
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="experience_info" id="exampleRadios2" value="great">
                                        <label class="form-check-label" for="exampleRadios2">
                                            I had a great experience
                                        </label>
                                    </div>

                                   {{-- <div class="form-group">
                                        <label for="exampleFormControlSelect1">City</label>
                                        <select class="form-control" id="exampleFormControlSelect1">
                                            <option value="3">Dhaka</option>
                                        </select>
                                    </div>--}}
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect2">Store</label>
                                        <select class="form-control" name="store_id" id="storeId" required="required">
                                            <option value="">Select an Outlet</option>
                                            @foreach($stores as $store)
                                                <option value="{{$store->id}}">{{$store->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="btn next_btn">Next</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <!-- main content end-->
@endsection