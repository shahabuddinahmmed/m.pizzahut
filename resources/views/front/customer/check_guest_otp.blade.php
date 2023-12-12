@section('stylesheet')
    <style>
        body {
            background-image: url({{asset('/')}}front/assets/imgs/Backdrop.jpg);
            font-family: Arial, Helvetica, sans-serif;
        }
        * {box-sizing: border-box}

        /* Full-width input fields */
        input[type=text], input[type=number] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }

        input[type=text]:focus, input[type=number]:focus {
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
            padding: 10px 20px;
            /* margin: 8px 0; */
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
            border-radius: 7px;
            font-size: 16px;
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

        /* Change styles for cancel button and signup button on extra small screens */
        @media screen and (max-width: 300px) {
            .cancelbtn, .signupbtn {
                width: 100%;
            }
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
                <div class="container" style="padding: 0px;">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="toolbar-title toolbar-title-md" style="text-transform: uppercase; margin-top: 23px;color: #424242;font-weight: 600; font-family: 'Open Sans Condensed', sans-serif;">
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
                        <div class="input_field" style="padding: 20px 50px;">
                            <div class="input-group mb-3 col-12" style="">
                                <div class="container">
                                    <h4> <i class="fa fa-mobile"></i> Login With Mobile Number</h4>{{--Session::get('newCustomerOTP')--}}
                                    @if(Session::get('message'))
                                        <div class="alert alert-success" role="alert">
                                            <strong></strong> {{Session::get('message')}}
                                        </div>
                                    @endif
                                    @if(Session::get('otp_message'))
                                        <div class="alert alert-error" role="alert">
                                            <strong></strong> {{Session::get('otp_message')}}
                                        </div>
                                    @endif

                                    <div class="container">
                                        {{Form::open(['route'=>'save-guest-customer','class'=>'contact-form','method'=>'POST','name'=>'saveCustomer'])}}


                                        <label for="code"><b>Verification Code</b>{{--Session::get('newCustomerOTP')--}}</label>
                                        {{Form::text('otp_pin','',array('required' => 'required', 'placeholder' => 'Enter Verification Code'))}}
                                        <div class="invalid-feedback">{{$errors->has('otp_pin') ? $errors->first('otp_pin') : ''}}</div>

                                        <label>
                                        </label>

                                        <div class="full-button center-align round" margin-top="" padding-bottom="">
                                            <button type="submit"><span class="button-inner" style="border-radius: 10px">Login</span></button>
                                        </div>
                                    </div>
                                    {{Form::close()}}
                                </div>
                                {{--</form>--}}
                            </div>
                            {{--</form>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- main content end-->
@endsection