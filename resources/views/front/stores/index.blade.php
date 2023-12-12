@section('stylesheet')
    <style>
        .store_card a {
            /*display: block;*/
            /*width: 133px;*/
            height: 30px;
            font-size: 12px;
            padding: 0px 10px;
            color: #fff;
            background-color: #0a8020;
            border-radius: 2px;
            padding: 6px 17px;
        }
        .store_card a.directions {
            text-decoration: underline;
            border-bottom: 0px !important;
        }
         .sr_back_button{
             float: left;

         }
    </style>
@endsection
@extends('front.master', ['body_class' => 'sticky-header left-side-collapsed'])
@section('title')
    Order Pizza Online For Delivery | Home
@endsection
@section('body')
<!-- main content start-->
<div class="main-content">
    <!-- header-starts -->
    @include('front.includes.back-header',['back'=>route('/')])
    {{--<div class="header-section">--}}
        {{--<!--toggle button start-->--}}
        {{--<div class="sr_back_button"><a href="{{ url()->previous() }}"><i class="fa fa fa-angle-left icon"></i></a></div>--}}
        {{--<!--toggle button end-->--}}
        {{--<!--notification menu start -->--}}
        {{--<div class="menu-right" style=" margin-top: -58px;">--}}
            {{--<a href="{{route('/')}}">--}}
                {{--<div class="logo_bg edge-shadow" style="bottom: -20px;">--}}
                    {{--<img style="width: 50%;" src="{{asset('/')}}front/assets/imgs/pizzahut-logo-icon.svg" alt="">--}}
                {{--</div>--}}
            {{--</a>--}}
        {{--</div>--}}
    {{--</div>--}}
    <!--notification menu end -->
    <div class="toolbar-title toolbar-title-md"
         style="text-transform: uppercase;color: #424242;padding: 15px 0px 15px 30%; font-weight: 600; font-family: 'Open Sans Condensed', sans-serif;">
        Stores Selection
    </div>

    <div class="contain-fluid">
        <div class="store_wrapper">
            <div class="scroll-content" style="margin-top: 100px;">
        @foreach($stores as $store)
            @php($store = (object)$store)
                <div class="store_card">
                    <table>
                        <col width="60%">
                        <col width="40%">
                        <tr>
                            <td><span class="storename">{{$store->name}}</span></td>
                            {{--<td><span class="distance">{{$store->distance}} km</span></td>--}}
                        </tr>
                        <tr>
                            <td><span class="storeaddress">{{$store->location}}</span><br>
                                <span class="storeaddress">Contact Number: {{$store->business_solution_number}}</span>
                            </td>
                            <td style="float: right;"><span class="datetime">{{$store->timing}}</span></td>
                        </tr>
                        <tr>
                            {{--<td><a class="directions" style="" target="blank" href="#" onclick="return false;">Directions</a></td>--}}
                            <td colspan="2">
                                <a href="{{route('stores.show',['id'=>$store->id])}}" class="" color="green">Take Away Now</a>
                                {{--<button class="" color="green">Take Away Now</button>--}}
                            </td>
                        </tr>
                    </table>
                </div><!-- .store_card -->

            @endforeach
            </div>



            {{--<div class="store_card">--}}
                {{--<table>--}}
                    {{--<tr>--}}
                        {{--<td><span class="storename">PH RBD Funcity Mall, Rohini</span></td>--}}
                        {{--<td><span class="distance">11 km</span></td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<td><span class="storeaddress">Prashant Vihar, Shop no. G-19 & 20,</span></td>--}}
                        {{--<td style="float: right;"><span class="datetime">11:00 AM 11:15 PM</span></td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<td><a class="directions" style="" target="blank" href="#">Directions</a></td>--}}
                        {{--<td style="float: right;">--}}
                            {{--<a href="{{route('save-store',['id'=>'Prashant Vihar, Shop no. G-19 & 20'])}}" class="" color="green">Take Away Now</a>--}}
                            {{--<button class="" color="green">Take Away Now</button>--}}
                        {{--</td>--}}
                    {{--</tr>--}}
                {{--</table>--}}
            {{--</div><!-- .store_card -->--}}

            {{--<div class="store_card">--}}
                {{--<table>--}}
                    {{--<tr>--}}
                        {{--<td><span class="storename">PH RBD Aggarwal City Plaza</span></td>--}}
                        {{--<td><span class="distance">9 km</span></td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<td><span class="storeaddress">Aggarwal City plaza,</span></td>--}}
                        {{--<td style="float: right;"><span class="datetime">11:00 AM 11:15 PM</span></td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<td><a class="directions" style="" target="blank" href="#">Directions</a></td>--}}
                        {{--<td style="float: right;">--}}
                            {{--<a href="{{route('save-store',['id'=>'Aggarwal City plaza'])}}" class="" color="green">Take Away Now</a>--}}
                            {{--<button class="" color="green">Take Away Now</button>--}}
                        {{--</td>--}}
                    {{--</tr>--}}
                {{--</table>--}}
            {{--</div><!-- .store_card -->--}}

        </div>
    </div>
    <!-- End of .clearfix -->

</div>
<!-- main content end-->
@endsection