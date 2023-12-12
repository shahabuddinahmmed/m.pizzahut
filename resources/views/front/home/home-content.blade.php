@section('stylesheet')
    <style>
        body {
            background-image: url({{asset('/')}}front/assets/imgs/Backdrop.jpg);
        }
        .bc-color{
            background-color: #fff;
        }
        @media screen and (min-width: 385px) and (max-width: 480px) {
            .clearfix .hr-border {
                margin: 60px 0px 18px 0px;
            }
        }
        @media (max-width: 568px){

            button.close {
                overflow: auto !important;
                margin-right: 5px;
                margin-top: -25px;
                opacity: 1;
                font-size: 15px;

            }
        }

        .change_location {
            background-color: #f4f4f4;
            color: #737373;
            padding: 10px 30px;
            margin: 0px 26px;
            border: 2px solid #d1d1d1;
            cursor: pointer;
            /* width: 100%; */
            opacity: 0.9;
            width: 85%;
            border-radius: 10px;
            font-size: 16px;
        }
        .continue_location{
            margin: 10px 0px 20px 0px;
        }
        .shadow-lg {
            box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important;
        }
    </style>
@endsection
@extends('front.master', ['body_class' => 'sticky-header left-side-collapsed'])
@section('title')
    Pizza Hut | Buy 1 Family Pizza and Get 1 Free
@endsection
@section('body')
    @include('front.includes.left-sidebar')
    <!-- main content start-->
    <div class="main-content">
        @include('front.includes.main-header')
        <!--<div id="myModal" class="modal fade" role="dialog">-->
        <!--    <div class="modal-dialog">-->
        <!--         Modal content-->
        <!--        <div class="modal-content text-center">-->
        <!--            <div class="modal-header" style="border-bottom: 1px solid #e5e5e5 !important">-->
        <!--                <h5 class="modal-title">Continue in Pizzahutbd App</h5>-->
        <!--            </div>-->
        <!--            <div class="modal-body" style="padding: 20px 0px">-->
        <!--                <a href="https://play.google.com/store/apps/details?id=com.sam.ph_mob_app_bd" style="font-size: 18px; font-weight: 800;font-family: sharp-sans-bold;">Open</a>-->
        <!--            </div>-->
        <!--            <div class="modal-footer" style="text-align: center">-->
        <!--                <button type="button" class="btn" data-dismiss="modal">Cancel</button>-->
        <!--            </div>-->
        <!--        </div>-->

        <!--    </div>-->
        <!--</div>-->
        <div class="clearfix">
            <div class="scroll-content" style="margin-top: 44px;">
                <div id="ion-card" class="location-wrap card" style="background: url('https://pizzahutbd.com/{{$mobile_banner}}') no-repeat;">
                    <div class="layer"></div>
                </div><!-- #ion-card -->
            @include('front.home.search-location-section')
            @include('front.home.change-location-section')

            <!-- .selection -->

                {{--<div class="item" text-center="" style="height: 150px;"></div>--}}

                <div class="hr-border text-style " text-center="" style=""> OUR MOST POPULAR DEALS
                </div>

                <div class="container">
                    <div class="row">

                        @foreach ($slectDeals as $deals)
                            {{--@if (date("D")=="Sun")--}}
                            {{--<div class="col-md-12 bc-color">--}}
                            {{--<img class="add_image" alt="banners" height="auto" src="{{asset('/')}}front/assets/imgs/body-banner/body-banner-03.png">--}}
                            {{--</div>--}}
                            {{--@else--}}
                            {{--<div class="col-md-12 bc-color">--}}
                            {{--<img class="add_image" alt="banners" height="auto" src="{{asset('/')}}front/assets/imgs/body-banner/body-banner-01.png">--}}
                            {{--</div>--}}
                            {{--@endif--}}
                            <div class="col-md-12 bc-color">
                                <a href="{{route('deals-detail',['id'=>$deals->id])}}" class="checkLocation" ><img class="add_image" alt="banners" height="auto" src="{{m_asset('/')}}{{$deals->image}}"></a>
                            </div>
                        @endforeach


                        <div class="col-md-12 bc-color" style="width: 100%">
                            <a href="" class="btn btn-primary btn-block" onclick="event.preventDefault();" data-toggle="modal" data-target="#searchLocationModal" style="background-color: #0a8020;border: none;margin: 20px 15px;width: 90%;">View all Deals</a>
                            {{--<button type="button" class="btn btn-success btn-block" >View all Deals</button>--}}
                        </div>
                    </div>
                </div>

                <div class="container-fluid" style="background-color: #000; height: 370px; padding-top:20px;">
                    <div class="center">
                        <a class="footer_menu" href="{{route('about-us')}}">About us</a>
                        <a class="footer_menu" href="{{route('store-filter.index')}}">Store Locator</a>
                        @if(Session::has('UserId'))
                            <a href="{{ route('logout-customer') }}">{{ __('Logout') }}</a>
                        @else
                            <a class="footer_menu" href="{{route('login-customer')}}">Log in/Register</a>
                        @endif
                        {{--<a class="footer_menu" href="#">Sign In/Register</a>--}}
                    </div>
                    <div class="txt-center">
                        <a class="footer_menu" href="">Follow Us</a>
                    </div>
                    <div class="text-center" style="margin-top: 10px">
                        <a class="footer_icon" href="https://www.facebook.com/pizzahutbangladesh/" target="_blank">
                            <img class="rounded" alt="facebook" height="20"
                                 src="{{asset('/')}}front/assets/imgs/facebook.svg" width="20"></a>
                        <a class="footer_icon" href="https://www.instagram.com/officialpizzahutbd/" target="_blank">
                            <img class="rounded" alt="insta" height="20"
                                 src="{{asset('/')}}front/assets/imgs/instagram.svg" width="20"></a>
                        <a class="footer_icon" href="https://twitter.com/PizzaHutBD" target="_blank">
                            <img class="rounded" alt="twitter" height="20"
                                 src="{{asset('/')}}front/assets/imgs/twitter.svg" width="20"></a>
                        <a class="footer_icon" href="https://www.linkedin.com/company/transcom-foods-limited" target="_blank">
                            <img class="rounded" alt="linkedin" height="20"
                                 src="{{asset('/')}}front/assets/imgs/linkedin.png" width="20"></a>
                        </span>
                    </div>
                    <div class="text-center" style="margin-top: 10px">
                        <a href="https://play.google.com/store/apps/details?id=com.sam.ph_mob_app_bd" target="_blank">
                            <img src="{{ url('attached_images/play-store.png') }}"  width="100">
                        </a>
                    </div>
                    <div class="text-center" style="margin-top: 10px">
                        <h5 class="mt-3">Help us in serving you better <br/>
                            <a href="{{route('feedback')}}" target="_blank">
                                <button class="btn btn-primary" style="margin-top: 15px;background-color: #2C3E50;border-color:#2C3E50;">Give Feedback</button>
                            </a>
                        </h5>
                    </div>

                    <nav class="footer_text"
                         style="margin: 0px 0px 15px; color: white; font-size: 12px; padding: 13px 16px;text-align: center;">
                        <p style="margin-bottom: 0;">© {{ date('Y') }} , Pizza Hut Bangladesh. All rights reserved.</p>
                    </nav>
                </div>
            </div>
        </div><!-- End of .clearfix -->

    </div>

    <!-- main content end-->


    @include('front.includes.search-location-modal')
    <div class="modal fade" id="pizzaOnLoad" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body p-0" style="margin-top: 300px">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 p-0">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">
                                                    <i class="fa fa icon fa-times-circle"></i>
                                                </span>
                                </button>
                                <a href={{url($popupImageData->redirect_url)}} class="checkLocation"> <img src="{{m_asset($popupImageData->image_path)}} " alt="" style="max-width: 100%; margin-top: -35px"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
@section('script')
    @if($isPopUpActive)
        <script>
            $(document).ready(function() {
                $('#pizzaOnLoad').modal('show');
            });
            // $(window).load(function(){
            // });
        </script>
    @endif
<!-- This is edited for popup start -->
    <script type="text/javascript">
    $(window).on('load', function() {
        $('#pizzaOnLoad').modal('show');
    });
</script>
<!-- This is edited for popup end -->
    <script>
        function shiftingMode(mode) {
            $("input[name='shiftingMode']").val(mode);
        }
        $("#success-alert").fadeTo(10000, 500).slideUp(500, function () {
            $("#success-alert").slideUp(500);
        });
        $('.checkLocation').on('click',function (event) {
            event.preventDefault();
            let storeID = '{{Session::has('StoreID')}}';
            if(storeID){
                window.location.replace($(this).attr('href'));
            }else{
                let parent = $('#searchLocationModal');
                parent.find("input[name='destinationURL']").val($(this).attr('href'));
                parent.modal('show');
            }
        });
    </script>
    {{--<script async defer--}}
    {{--src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDeFN4A3eenCTIUYvCI7dViF-N-V5X8RgA">--}}
    {{--</script>--}}
    @include('front.includes.setLocation')

@endsection