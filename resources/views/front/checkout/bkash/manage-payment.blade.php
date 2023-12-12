@section('stylesheet')
    <style>
        body {
            background-image: url({{asset('/')}}front/images/Backdrop.jpg);
        }

        :focus {
            outline: none;
        }
    </style>
@endsection
@extends('front.master', ['body_class' => 'sticky-header left-side-collapsed'])
@section('title')
    Order Pizza Online For Delivery | Home
@endsection
@section('body')

    <div class="splash"></div><!-- -----Splash -->

    <section>

        <!-- main content start-->
        <div class="main-content">
            <div class="container-fluid ">
                <div class="row bg-white">
                    <div class="col-md-6"></div>
                    <div class="col-md-5 text-right mt-3">
                        @if(Session::has('UserId'))
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                               style="float: right;margin: -3px 0px;background-color: #ffffff;border-color: #ffffff;font-size: 13px;padding: 5px;font-weight: 700;min-width: 115px;color: #666;">
                                Hi {{Session::get('UserName')}}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="{{route('track_order')}}">Track Order</a>
                                <a class="dropdown-item" href="{{route('manage_payment')}}">Manage Payment</a>
                                <a class="dropdown-item" href="{{route('logout-customer')}}">Logout</a>
                            </div>
                        @else
                            <div class="dropdown sing-in">
                                <i class="fas fa-user-circle" style="font-size: 22px;"></i>
                                <a href="{{route('login-customer')}}"> SignIn / Register</a>
                            </div>

                        @endif
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
                                <div class="toolbar-title toolbar-title-md"
                                     style="text-transform: uppercase;color: #424242;margin-top: 13px;padding-right: 164px;font-weight: 600;font-family: united-sans-cond-bold;font-size: 23px;">
                                    {{--<div class="sr_back_button"><a href="{{ $back_button }}"><i class="fa fa fa-angle-left icon"></i></a></div>--}}
                                </div>
                            </div>
                            <div class="col-md-10 text-center">
                                <div class="toolbar-title toolbar-title-md"
                                     style="text-transform: uppercase;color: #424242;margin-top: 20px;padding-right: 164px;font-weight: 600; font-family: 'Open Sans Condensed', sans-serif;">
                                    <i class="fa fa-lock text-center" aria-hidden="true"></i> Manage Account
                                    - bKash
                                    <p></p>
                                </div>
                                @if(Session::get('message'))
                                    <div class="alert alert-info" id="success-alert" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" style="margin: 0px;">
                                            x
                                        </button>
                                        <strong>{{Session::get('message')}}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="contain-fluid">
                        {{--{{Form::open(['route'=>'save-order','class'=>'contact-form','method'=>'POST','name'=>'newOrder'])}}--}}
                        <div class="container-fluid">
                            <div class="row">
                                <!-- /.col -->
                                <div class="col-sm-5 align-middle">
                                    <a href="{{route('manage_payment')}}">
                                        <img src="{{asset('/')}}front/images/add_bkash.png" alt="Manage bkash">
                                    </a>
                                </div>
                                <!-- /.col -->
                            </div>

                        </div>
                        {{--                        {{Form::close()}}--}}
                    </div>
                    <!-- End of .clearfix -->
                </div>
            </div>
        </div>
        <!-- main content end-->
    </section>


@endsection
@section('script')
    <script type="text/javascript">
        $(function () {

        });
    </script>
    {{--<script src="{{asset('/')}}client_end/js/site.tokenized-checkout.js"></script>--}}
@endsection