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

        .regtxt {
            
            font-size: 11px;
            font-weight: normal;
            color: #333333;
        }

        .sr_back_button {
            float: left;
        }


        /* Change styles for cancel button and signup button on extra small screens */
        @media screen and (max-width: 300px) {
            .cancelbtn, .signupbtn {
                width: 100%;
            }
        }
        form{
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

        .col-md-6{
            width: 50%;
        }

        select {
            margin: 5px 0 22px 0;
        }

        label{
            margin: 5px 0 22px 0;
        }

        textarea{
            margin: 5px 0 22px 0;
        }

        .input-group-addon {
            padding: 6px;
            font-size: 20px;
            font-weight: 200;
            line-height: 0;
            color: #555;
            text-align: center;
            background-color: #fff;
            border: none;
            border-radius: 4px;
        }

        .btn-primary {
            color: #fff;
            background-color: #0a8020;
            border-color: #0a8020;
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
                    <div class="row">
                        <div class="login_wrapper">
                            <div class="input_field">
                                <div class="col-md-12">
                                    <p class="feedback-text">FEEDBACK</p>
                                </div>
                                <div class="col-md-12">
                                    <h5 class="mb-3">(*)as mandatory field</h5>
                                </div>
                                @if(Session::get('message'))
                                    <div class="alert alert-success" id="success-alert" role="alert">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                                        <strong>{{Session::get('message')}}</strong>
                                    </div>
                                @endif
                                <div class="col-md-12">
                                    {{Form::open(['route'=>'dining-info-save','class'=>'needs-validation','method'=>'POST','name'=>'loginCustomerByEmail','files' => true])}}
                                    <input type="hidden" name="experience_info" value="{{$experience_info}}">
                                    {{--<form class="needs-validation" novalidate="">  --}}{{--<form>--}}
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="col-form-label" for="customer_name">Customer Name (*)</label>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="Full Name" value="" required="required">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="col-form-label" for="email">Gender (*)</label>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <select class="form-control" name="gender" class="span16" id="typeselector">
                                                    {{--<option value="" selected="selected">Select</option>--}}
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="col-form-label" for="email">E-mail (*)</label>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <input type="text" name="email" class="form-control" id="" placeholder="Email" value="" required="">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="col-form-label" for="email">Mobile No (*)</label>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <input type="text" class="form-control" name="mobile_no" id="" value="" required="">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="col-form-label" for="email">Your preferred time for contact</label>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <select class="form-control" name="contact_time" class="span16" id="typeselector">
                                                    <option value="" selected="selected">Select</option>
                                                    <<option value="11-3 AM">11-3 AM</option>
                                                    <option value="3-7 PM">3-7 PM</option>
                                                    <option value="After 7 PM">After 7 PM</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="col-form-label" for="email">Address</label>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <textarea class="form-control" name="address" id="address" placeholder="Address"></textarea>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="col-form-label" for="email">City of the Pizza hut restaurant (*)</label>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="col-form-label" for="email">Dhaka</label>
                                                <input type="hidden" name="city" value="Dhaka">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="col-form-label" for="email">Restaurant Address (*)</label>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="col-form-label mb-3" for="email">{{$store->location}}</label>
                                                <input type="hidden" name="restaurant_address" value="{{$store->location}}">
                                                <input type="hidden" name="store_id" value="{{$store->id}}"/>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="col-form-label" for="email">Date of visit (*)</label>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="form-group">
                                                    <div class='input-group date' id='datetimepicker1'>
                                                        <input type='text' class="form-control" name="date_of_visit"/>
                                                        <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="col-form-label" for="email">Time of Visit</label>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <select class="form-control" name="time_of_visit" class="span16" id="typeselector">
                                                    <option value="" selected="selected">Select</option>
                                                    <<option value="11-3 AM">11am-3pm</option>
                                                    <option value="3-7 PM">3-7pm</option>
                                                    <option value="After 7 PM">After 7 pm</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="col-form-label" for="email">Your Feedback (*)</label>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <textarea class="form-control" name="feedback" id="address" placeholder="Feedback"></textarea>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="col-form-label" for="email">How often do you visit pizza hut ?</label>
                                            </div>
                                            <div class="col-md-6 mb-3" style="margin-bottom: 22px">
                                                <input type="radio" name="how_often_u_visit" value="Weekly"> Weekly <br/>
                                                <input type="radio" name="how_often_u_visit" value="Monthly"> Monthly <br/>
                                                <input type="radio" name="how_often_u_visit" value="Occasionally"> Occasionally <br/>
                                                <input type="radio" name="how_often_u_visit" value="This is my first visit"> This is my first visit
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="col-form-label" for="email">Upload Pictures</label>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <strong>Picture 1</strong>
                                                {{Form::file('feedbackImage1', array('id' => 'categoryImage', 'class'=>'custom-file-input', 'accept'=>"image/*"))}}
                                                {{--<input type="file" name="image1" value="" id="image1">--}}
                                                <br/>
                                                <strong>Picture 2</strong>
                                                {{Form::file('feedbackImage2', array('id' => 'categoryImage', 'class'=>'custom-file-input', 'accept'=>"image/*"))}}
                                                {{--<input type="file" name="image2" value="" id="image2">--}}
                                                <br/>
                                                <p><b>File Type</b>: JPEG|JPG|PNG|GIF|gif|jpg|png|jpeg , <b>Upload Max Size </b>:5MB</p>
                                            </div>
                                        </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="col-form-label" for="email">Security Question (*)</label>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="row">
                                                <div class="col-3" style="padding-top: 14px">{{ app('mathcaptcha')->label() }} = </div>
                                                <div class="col-8">{!! app('mathcaptcha')->input(['class' => 'form-control', 'id' => 'mathgroup', 'size'=>'6']) !!}</div>
                                            </div>
                                            @if ($errors->has('mathcaptcha'))
                                                <span class="help-block" style="color: red">
                                            <strong>{{ $errors->first('mathcaptcha') }}</strong>
                                        </span>
                                            @endif
                                        </div>

                                    </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="col-form-label" for="email">Was the restaurant clean?</label>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <input type="radio" name="restaurant_clean" value="yes">&nbsp; Yes
                                                <input type="radio" name="restaurant_clean" value="no" style=" margin-left: 20px;">&nbsp; No
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="col-form-label" for="email">Was the service hospitable and friendly?</label>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <input type="radio" name="service_hospitable" value="yes">&nbsp; Yes
                                                <input type="radio" name="service_hospitable" value="no" style=" margin-left: 20px;">&nbsp; No
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="col-form-label" for="email">Did you receive what you ordered?</label>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <input type="radio" name="receive_ordered" value="yes">&nbsp; Yes
                                                <input type="radio" name="receive_ordered" value="no" style=" margin-left: 20px;">&nbsp; No
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="col-form-label" for="email">Was the restaurant well maintained?</label>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <input type="radio" name="restaurant_maintained" value="yes">&nbsp; Yes
                                                <input type="radio" name="restaurant_maintained" value="no" style=" margin-left: 20px;">&nbsp; No
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="col-form-label" for="email">Was the food to your liking?</label>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <input type="radio" name="food_liking" value="yes">&nbsp; Yes
                                                <input type="radio" name="food_liking" value="no" style=" margin-left: 20px;">&nbsp; No
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="col-form-label" for="email">Were you served speedily?</label>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <input type="radio" name="served_speedily" value="yes">&nbsp; Yes
                                                <input type="radio" name="served_speedily" value="no" style=" margin-left: 20px;">&nbsp; No
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="col-form-label" for="email">Did you feel that you got value for your money?</label>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <input type="radio" name="value_for_money" value="yes">&nbsp; Yes
                                                <input type="radio" name="value_for_money" value="no" style=" margin-left: 20px;">&nbsp; No
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="col-form-label" for="email">Will you visit Pizza Hut again in the near future?</label>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <input type="radio" name="visit_again" value="yes">&nbsp; Yes
                                                <input type="radio" name="visit_again" value="no" style=" margin-left: 20px;">&nbsp; No
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <button class="btn btn-primary" type="submit"><< Back</button>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <button class="btn btn-primary" type="submit">Submit</button>
                                            </div>
                                        </div>
                                    {{Form::close()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <!-- End of .clearfix -->

        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        Login Success Full
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button"  class="btn btn-success" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
        </div>
    </div>
    </div>
    <!-- main content end-->
@endsection