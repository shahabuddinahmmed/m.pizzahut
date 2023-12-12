<!-- header-starts -->
<div class="header-section">
    <!--toggle button start-->
    {{--<a class="toggle-btn  menu-collapsed"><i class="fa fa-bars"></i></a>--}}
    <!--toggle button end-->
    <!--notification menu start -->
    <div class="menu-right">

        <div class="logo_bg edge-shadow">
            <a href="{{route('/')}}">
                <img style="width: 50%;" src="{{asset('/')}}front/assets/imgs/pizzahut-logo-icon.svg" alt="">
            </a>
        </div>
        <div class="profile-icon" style="width: 80px;">
            @if(Session::has('UserId'))
                <span style="float: right;">
                    <a href="{{route('track_order')}}">
                    <img src="{{asset('/')}}front/assets/imgs/user-01.png" width="24px" height="24px">
                </a>
                </span>
            @else
                <span style="float: right;">
                    <a href="{{route('login-customer')}}">
                    <img src="{{asset('/')}}front/assets/imgs/user-01.png" width="24px" height="24px">
                </a>
                </span>
            @endif
        </div>
    </div>
</div>
<!--notification menu end -->
<!-- .header-section end -->

<div class="splash"></div><!-- -----Splash -->