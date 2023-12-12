@section('stylesheet')
    <style>
        body {
            background-image: url({{asset('/')}}front/assets/imgs/Backdrop.jpg);
        }
        .about-pg{
            font-size: 13px;
            margin-bottom: 10px;
            text-align: justify;
        }
    </style>
@endsection
@extends('front.master', ['body_class' => 'sticky-header left-side-collapsed'])
@section('title')
    Order Pizza Online For Delivery | About - Us
@endsection
    @section('body')
            <!-- main content start-->
            <div class="main-content">
                <!-- header-starts -->
                <div class="header-section">
                    <!--notification menu start -->
                    <div class="menu-right">
                        <div class="logo_bg edge-shadow">
                            <a href="{{route('all-pizza')}}">
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
                                        <i class="fa fa-lock text-center" aria-hidden="true"></i> ABOUTUS
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
                                        <div class="container-fluid bg-white">
                                            <div class="row ">
                                                <div class="col-md-12 about-pg ">
                                                    <p>
                                                        Pizza Hut is a US based international restaurant chain that is home to one of the world’s favorite food, Pizzas and much more. The brand had started their journey in 1958 in Wichita, Kansas, when two college students Frank and Dan Carney; opened their first pizza restaurant. They laid the foundations for what would later become the largest and most successful pizza restaurant in the world.
                                                    </p>
                                                </div>
                                                <div class="col-md-12 about-pg ">
                                                    <p>
                                                        Pizza Hut is a division of Yum! Brands Inc. and has more than 13,200 restaurants and delivery units operating worldwide. The 100th country to join the Pizza Hut club under the flag of Yum! Restaurants International is Tanzania. Here, Pizza Hut had delivered pizza at the top of Mt. Kilimanjaro to celebrate the beginning of their operations
                                                    </p>
                                                </div>
                                                <div class="col-md-12 about-pg">
                                                    <p>
                                                        At Pizza Hut, the core belief that drives us forward is that great food builds great memories. But that is possible when delicious meals are shared amongst one and all. And to bring this thought to life, Pizza Hut relentlessly tries to bring in the best food offers of the country, to make these fun sharing experiences into great memories to cherish.
                                                    </p>
                                                </div>
                                                <div class="col-md-12 about-pg">
                                                    <p>
                                                        Pizza Hut, in Bangladesh, has been trying to make their pizzas more accessible to the customers by both creating value and opening new stores across geographical area. From the beginning of their journey in Bangladesh in 2003, Pizza Hut has opened 8 dine-in restaurants and 8 Pizza Hut outlets from where the valued customers can get their pizzas delivered. From our tantalizing appetizers to signature pan pizzas, pastas, risottos and desserts, our menu has something for everyone. Pizza Hut brand experience resonates generosity, friendships, naturalness and fun; making it stand for much more than the Pizza.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        {{--</form>--}}
                                    </div>
                                    </form>
                                </div>
                            </div>
                            <!-- The Modal -->
                        </div>
                    </div>
                </div>
                <!-- End of .clearfix -->

            </div>
            <!-- main content end-->
@endsection