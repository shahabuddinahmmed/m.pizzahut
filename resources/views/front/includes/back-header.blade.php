<!-- header-starts -->
<div class="header-section">
    <!--toggle button start-->
    @unless(empty($back))
        @php($back_button = $back)
    @else
        @php($back_button = url()->previous())
    @endunless
    <div class="sr_back_button" style="margin-left: 10px;width: 100px">
        <a style="display: block" href="{{ $back_button }}">
            <i class="fa fa fa-angle-left icon"></i>
        </a>
    </div>
    <!--toggle button end-->
    <!--notification menu start -->

    <div class="menu-right">
        <div class="logo_bg edge-shadow">
                <a href="{{route('/')}}"><img style="width: 50%;" src="{{asset('/')}}front/assets/imgs/pizzahut-logo-icon.svg" alt=""></a>
        </div>
    </div>
</div>
<!--notification menu end -->


{{--<div class="splash"></div><!-- -----Splash -->--}}