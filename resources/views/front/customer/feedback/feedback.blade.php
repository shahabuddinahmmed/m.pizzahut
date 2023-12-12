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

        /* Change styles for cancel button and signup button on extra small screens */
        @media screen and (max-width: 300px) {
            .cancelbtn, .signupbtn {
                width: 100%;
            }
        }
        form{
            border:1px solid #ccc;
            padding:10px;
        }
        .sr_back_button {
            float: left;
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
                @if(Session::get('message'))
                    <div class="alert alert-success" id="success-alert" role="alert">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                        <strong>{{Session::get('message')}}</strong>
                    </div>
                @endif
                <div class="contain-fluid">
                    <div class="login_wrapper">
                        <div class="col-md-6">
                            <a href="{{route('feedback-dining')}}">
                                <div class="jumbotron customer-feed">
                                    <img src="{{asset('/')}}front/assets/imgs/dienien-icon.png" width="120px">
                                    <h4>Dine in Feedback</h4>
                                </div>
                            </a>

                        </div>
                        <div class="col-md-6">
                            <a href="{{route('feedback-delivery')}}">
                                <div class="jumbotron customer-feed">
                                    <img src="{{asset('/')}}front/assets/imgs/orderonline-icon.png" width="120px">
                                    <h4>Delivery Feedback</h4>
                                </div>
                            </a>
                        </div>
                    </div>
            </div>
        </div>
        <!-- End of .clearfix -->

{{--        <div class="modal" id="myModal">--}}
{{--            <div class="modal-dialog">--}}
{{--                <div class="modal-content">--}}

{{--                    <!-- Modal Header -->--}}
{{--                    <div class="modal-header">--}}

{{--                        <button type="button" class="close" data-dismiss="modal">&times;</button>--}}
{{--                    </div>--}}

{{--                    <!-- Modal body -->--}}
{{--                    <div class="modal-body">--}}
{{--                        Login Success Full--}}
{{--                    </div>--}}

{{--                    <!-- Modal footer -->--}}
{{--                    <div class="modal-footer">--}}
{{--                        <button type="button"  class="btn btn-success" data-dismiss="modal">Close</button>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

    </div>
    <!-- main content end-->
@endsection