@section('stylesheet')
    <style>
        body {
            background-image: url({{asset('/')}}front/assets/imgs/Backdrop.jpg);
            font-family: Arial, Helvetica, sans-serif;
        }

        * {
            box-sizing: border-box
        }

        /* Full-width input fields */
        input[type=text], input[type=password], input[type=email] {
            width: 100%;
            padding: 15px;
            margin: 0px 0 16px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
            color: #000000;
            opacity: .5;
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
            opacity: 1;
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

        /* Change styles for cancel button and signup button on extra small screens */
        @media screen and (max-width: 300px) {
            .cancelbtn, .signupbtn {
                width: 100%;
            }
        }

        form {
            padding: 10px;
        }

        .button-md {
            font-family: 'Open Sans', sans-serif;
            font-weight: 400;
            font-size: 15px;
            text-transform: none;
            /* -webkit-box-shadow: none; */
            box-shadow: none;
            padding: 0px 0px;
            max-width: 120px;
            max-height: 30px;
            border-radius: 5px;
            margin: 14px 70px;
        }

        .sr_back_button {
            font-size: 35px;
        }

        .login_lable{
            font-size: 14px;
            margin: 0px 14px;
        }
    </style>
@endsection
@extends('front.master', ['body_class' => 'sticky-header left-side-collapsed'])
@section('title')
    Order Pizza Online For Delivery | Customer Login
@endsection
@section('body')
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
                            <div class="toolbar-title toolbar-title-md" style="text-transform: uppercase; margin-top: 10px;color: #424242;font-weight: 600; font-family: 'Open Sans Condensed', sans-serif;">
                                <div class="sr_back_button"><a href="{{ $back_button }}"><i class="fa fa fa-angle-left icon"></i></a></div>
                            </div>
                        </div>
                        <div class="col-md-10 text-center">
                            <div class="toolbar-title toolbar-title-md" style="text-transform: uppercase;color: #424242; margin: 23px 0px 23px 10px; padding: 0px 55px;font-weight: 600; font-family: 'Open Sans Condensed', sans-serif;">
                                <i class="fa fa-lock text-center" aria-hidden="true"></i> SIGNIN/LOGIN
                            </div>
                        </div>
                    </div>
                </div>

                <div class="contain-fluid">
                    <div class="login_wrapper">
                        <div class="input_field">
                            {{--<form>--}}
                            <div class="col-md-12" style="">
                                {{--<form action="/action_page.php" style="border:1px solid #ccc">--}}
                                <div class="container">
                                    <!--<p>Please fill in this form to create an account.</p>
                                    <hr>-->
                                    @if(Session::get('message'))
                                        <div class="alert alert-success" role="alert">
                                            <strong></strong> {{Session::get('message')}}
                                        </div>
                                    @endif
                                    <div class="container">
                                        {{Form::open(['route'=>'login-customer-by-mobile','class'=>'contact-form','method'=>'POST','name'=>'loginCustomerByMobile'])}}
                                            <label for="first"><span class="login_lable">Mobile Number*</span></label>

                                            {{Form::text('phone_number','',array('required' => 'required', 'autocomplete'=>"off", 'placeholder' => 'Please provide your registered mobile','id'=>'mobile','class' => 'form-control '.$errors->first('phone_number','is-invalid')))}}
                                            <div class="invalid-feedback">{{$errors->has('phone_number') ? $errors->first('phone_number') : ''}}</div>

                                            <div class="full-button center-align round" margin-top="" padding-bottom="">
                                                <button class="button-border disable-hover button button-md button-default button-default-md button-full button-full-md button-md-green"
                                                        type="submit"><span class="button-inner"
                                                                            style="border-radius: 10px">Submit</span>
                                                </button>
                                            </div>
                                        {{Form::close()}}

                                    </div>
                                    <hr>

                                    {{--<h3 style="text-align: center">OR</h3>--}}
                                    {{--<div class="container">--}}
                                        {{--{{Form::open(['route'=>'login-customer-by-email','class'=>'contact-form','method'=>'POST','name'=>'loginCustomerByEmail'])}}--}}

                                        {{--<label for="uname"><b>Username</b></label>--}}
                                        {{--{{Form::email('email_address','',array('required' => 'required', 'placeholder' => 'Your Email Address', 'id' => 'emailAddress'))}}--}}
                                        {{--<div class="invalid-feedback">{{$errors->has('email_address') ? $errors->first('email_address') : ''}}</div>--}}
                                        {{--<div id="res"></div>--}}
                                        {{--<label for="psw"><b>Password</b></label>--}}
                                        {{--{{Form::password('password',array('required' => 'required', 'placeholder' => 'Your Password'))}}--}}
                                        {{--<div class="invalid-feedback">{{$errors->has('password') ? $errors->first('password') : ''}}</div>--}}
                                        {{--<label>--}}
                                            {{--<input type="checkbox" checked="checked" name="remember"> Remember me--}}
                                        {{--</label>--}}
                                        {{--<div class="full-button center-align round mt-3">--}}
                                            {{--<button class="button-border disable-hover button button-md button-default button-default-md button-full button-full-md button-md-green"--}}
                                                    {{--type="submit">--}}
                                                {{--<span class="button-inner" style="border-radius: 10px">Login</span>--}}
                                            {{--</button>--}}
                                        {{--</div>--}}
                                        {{--{{Form::close()}}--}}
                                    {{--</div>--}}
                                </div>
                            </div>
                            </form>
                        </div>
                        {{--<span class="text-center">Not Registration ? Please <a href="{{route('register-customer')}}">Sign Up</a></span>--}}
                    </div>
                    <!-- The Modal -->
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
{{--                        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

    </div>
    <!-- main content end-->
@endsection