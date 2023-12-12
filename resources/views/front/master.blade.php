<!DOCTYPE HTML>
<html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="description" content="Order delicious pizza, pasta, appetizers & more online for carryout or delivery from a Pizza Hut store near you. View menu, find store locations, and more">
    <meta name="keywords" content="Online Order, Online Delivery, Take Away, Dine-in, Pizza,Bangladesh" />
    <meta name="author" content="Aamra Infotainment Ltd.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="icon" type="image/x-icon" href="{{asset('/')}}front/assets/icon/favicon.ico">

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('/')}}front/build/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <!-- Graph CSS -->
    <link href="{{asset('/')}}front/build/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- Splash Style -->
    <!-- Custom CSS -->
    <link href="{{asset('/')}}front/build/fontstyle.css" rel='stylesheet' type='text/css' />
    <link href="{{asset('/')}}front/build/main.css" rel='stylesheet' type='text/css' />
    <link href="{{asset('/')}}front/build/style.css" rel='stylesheet' type='text/css' />
    <style>
        .no-js #loader { display: none;  }
        .js #loader { display: block; position: absolute; left: 100px; top: 0; }
        .splash {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url({{asset('/')}}front/assets/imgs/loader_50x50.gif) center no-repeat #fff;
            /*display: none;*/
        }

        @font-face {
            font-family: "united-sans-cond-bold";
            src: url("{{asset('/')}}front/fonts/UnitedSansCond-Bold.ttf");
        }
    </style>
    @yield('stylesheet')

    @if (config('app.env') === 'production')
        <!-- UI redress attack - Clickjacking -->
        <style id="antiClickjack">body {
                display: none !important;
            }</style>
        <script type="text/javascript">
            if (self === top) {
                var antiClickjack = document.getElementById("antiClickjack");
                antiClickjack.parentNode.removeChild(antiClickjack);
            } else {
                top.location = self.location;
            }
        </script>
        
        <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-150642375-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-150642375-1');
</script>

        <!-- Google Tag Manager -->

        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':

                    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],

                j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=

                'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);

            })(window,document,'script','dataLayer','GTM-M8F9HWG');</script>

        <!-- End Google Tag Manager -->
    @endif
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <!--{{--    <script src="js/jquery-1.8.3.min.js"></script>--}}-->
    <script type=“text/javascript” src=“https://cdn.capp.bka.sh/scripts/webview_bridge.js”></script>
    <script type=“text/javascript” src=“https://cdn.capp.bka.sh/scripts/webview_bridge.js”></script>
    <!--{{--    <script type=“text/javascript” src=“https://capp-cdn.labs.bka.sh/scripts/webview_bridge.js”></script>--}}-->
    <!--{{--    <script id = "myScript" src="https://scripts.sandbox.bka.sh/versions/1.2.0-beta/checkout/bKash-checkout-sandbox.js"></script>--}}-->
    <script id = "myScript" src="https://scripts.pay.bka.sh/versions/1.2.0-beta/checkout/bKash-checkout.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
    <!--{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}-->
    <!--{{--<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>--}}-->
    <!--{{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>--}}-->


    <!--{{--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>--}}-->
    <!--{{--<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>--}}-->
    
    
   


</head>
<body
        @unless(empty($body_class))
            class="{{$body_class}}"
        @endunless
>
<!-- Google Tag Manager (noscript) -->

<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M8F9HWG"
            height="0" width="0" style="display:none;visibility:hidden">
    </iframe>
</noscript>

<!-- End Google Tag Manager (noscript) -->
<!-- Load Facebook SDK for JavaScript -->
<!--<div id="fb-root"></div>-->
<!--<script>-->
<!--    window.fbAsyncInit = function() {-->
<!--        FB.init({-->
<!--            xfbml            : true,-->
<!--            version          : 'v9.0'-->
<!--        });-->
<!--    };-->

<!--    (function(d, s, id) {-->
<!--        var js, fjs = d.getElementsByTagName(s)[0];-->
<!--        if (d.getElementById(id)) return;-->
<!--        js = d.createElement(s); js.id = id;-->
<!--        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';-->
<!--        fjs.parentNode.insertBefore(js, fjs);-->
<!--    }(document, 'script', 'facebook-jssdk'));</script>-->

<!-- Your Chat Plugin code -->
<!--<div class="fb-customerchat"-->
<!--    attribution=install_email-->
<!--     page_id="1668217490127738"-->
<!--     theme_color="#0A7CFF"--}}-->
<!--    logged_in_greeting="Thank you for visiting us. How can we help you? "-->
<!--     logged_out_greeting="Thank you for visiting us. How can we help you? ">-->
<!--</div>-->

<!-- Meta Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '1845780112427574');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=1845780112427574&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code -->

<section>
    @yield('body')
</section>
<script src="{{asset('/')}}front/build/jquery.min.js"></script>
<script src="{{asset('/')}}front/build/modernizr.js"></script>
<script src="{{asset('/')}}front/build/bootstrap.min.js"></script>
<script src="{{asset('/')}}front/build/jquery.nicescroll.js"></script>
<script src="{{asset('/')}}front/build/scripts.js"></script>

<!-- Splash Script -->
<script>
    $(document).ready(function () {
        $(".splash").fadeOut("slow");
        {{--console.log('{{m_asset('/')}}')--}}
    });
</script>
<script>
    $(document).ready(function(){
        if($(window).width() > 750) {
            window.location = "https://pizzahutbd.com/";
        }
    });
</script>
@yield('script')

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/locales/bootstrap-datepicker.es.min.js"></script>
<script>
    console.log('%c aamra infotainment Limited \n  Developed by Ismail Hossen ', 'background: #000; font-weight:500; color: #fff');
</script>
<script >
    $(function () {
        $('#datetimepicker1').datepicker({
            format: "yyyy-mm-dd",
            language: "en",
            autoclose: true,
            todayHighlight: true
        });
        $("#success-alert").fadeTo(10000, 500).slideUp(500, function () {
            $("#success-alert").slideUp(500);
        });
    });
</script>
<script>
    $(document).on('click', '.panel-heading span.clickable', function(e){
        var $this = $(this);
        if(!$this.hasClass('panel-collapsed')) {
            $this.parents('.panel').find('.panel-body').slideUp();
            $this.addClass('panel-collapsed');
            $this.find('i').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');

        } else {
            $this.parents('.panel').find('.panel-body').slideDown();
            $this.removeClass('panel-collapsed');
            $this.find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');

        }
    })
</script>
<script>
    $(document).ready(function(){
        $("#myModal").modal('show');
    });
</script>
<script>
    $(document).ready(function(){
        $("#pizzaWish").modal('show');
    });
</script>
<script src='{{ asset('rec/slick.min.js') }}'></script>
<link rel="stylesheet" type="text/css" href="{{ asset('rec/slick-theme.css') }}"/>
<script type='text/javascript'>

    $(document).ready(function(){
        $('.wish-pizz').slick({
            slidesToShow:3,
            slidesToScroll:1,
            autoplay: true,
            autoplaySpeed: 3000,
            arrows: true,
            responsive: [
                {
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 1,
                    }
                }]

        });
    });

    $('.modal').on('shown.bs.modal', function (e) {
        $('.wish-pizz').slick('setPosition');
        $('.wrap-modal-slider').addClass('open');
    })
</script>
</body>
</html>