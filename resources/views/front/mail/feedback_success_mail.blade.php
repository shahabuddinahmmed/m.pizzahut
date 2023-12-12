
@extends('front.master', ['body_class' => 'sticky-header left-side-collapsed'])

@section('title')
    Feedback | Home
@endsection
@section('body')
    <!-- main content start-->
    <div class="main-content">
    {{--    @include('front.includes.back-header')--}}
    <!--notification menu end -->

        <div class="container cat-bg mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="toolbar-title toolbar-title-md" style="font-size: 40px;text-transform: uppercase;color:#e13c3f;padding: 15px 0px 15px 0px; text-align: center; font-weight: 600; font-family: 'Open Sans Condensed', sans-serif;">
                        Thank you for your Feedback!!
                    </div>
                </div>
                <div class="col-md-12">
                    <h1 class="display-4 font-size-md-down-5 mb-3 " style="text-align: center;color: #424242;">
                        {{--<i class="fas fa-shipping-fast" style="font-size: 40px;"></i> --}}
                        Your feedback mail sent successfully
                    </h1>
                </div>
                <div class="col-md-4">
                    <a class="complete_btn btn btn-block" href="{{route('/')}}">Back to Home Page</a>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
        <!-- End of .clearfix -->

    </div>
    <!-- main content end-->
@endsection
