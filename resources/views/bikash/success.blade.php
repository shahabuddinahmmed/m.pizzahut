<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('frontend/Content/bootstrap.min.css') }}" rel="stylesheet">
    <title>Payment Success</title>
</head>
<body>
<div class="container">
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img src="https://www.pizzahutbd.com/front/assets/imgs/home-logo.png" width="50" height="50" class="d-inline-block align-top" alt="Pizzahut">
        </a>
    </nav>
    <br><br>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div style="text-align: center;" class="col-sm-12">
                    @if(isset($response))
                        <h1>TrxID:  {{ json_decode($response)->trxID }}</h1>
                    @endif
                </div>
            </div>
            <br><br>
            <div class="row">
                <div style="text-align: center" class="col-sm-12">
                    <h2>Congratulations !! Your payment has been successfully done.</h2>
                    <br>
                    <br>
                    <button style="text-align: center" onclick="buttonClick()" type="button" class="btn btn-success">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    let response = '{{ $response }}';
    console.log(response);
</script>
<script type="text/javascript">
    isAppReady = false;
    window.addEventListener("flutterInAppWebViewPlatformReady", function (event) {
        isAppReady = true;
    });

    function buttonClick() {
        if (isAppReady) {
            window.flutter_inappwebview.callHandler('showToast', 'success');
        }
    }
</script>
</body>
</html>
