<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Acadazone</title>
    <link rel="stylesheet" href="{{asset('libraries/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/settings.css')}}">
    <link rel="stylesheet" href="{{asset('css/client.css')}}">
    <link rel="stylesheet" href="{{asset('libraries/aos/aos.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bebas+Neue|Roboto+Condensed&display=swap" rel="stylesheet">
    <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<style>
    body {
        font-family: 'Roboto Condensed', sans-serif;
        background: red;
        background: url("{{asset('images/pricing.png')}}");
    }

    .card,
    .card-body {
        padding: 0rem;
        /*border: 0px;*/
        border-radius: 0px;
    }

    .btn {
        border-radius: 0px;
    }

    h4.pricing-header {
        background: #ff5425;
        text-align: center;
        padding: .8rem 0rem 1.5rem 0rem;
        font-size: 25px;
        color: white;
        -webkit-clip-path: polygon(0 0, 100% 0, 100% 80%, 0 100%);
        clip-path: polygon(0 0, 100% 0, 100% 80%, 0 100%);
    }

    .amount {
        font-size: 80px;
        padding: 1rem;
        text-align: center;

    }

    span.mon {
        font-size: 30px;
    }

    hr {
        border: .1rem white solid;
    }

    header {
        color: black;
        font-weight: bolder;

    }

    .col-md-4 {
        margin-top: 6rem !important;
    }

</style>

<body>
    <div class="nav-wrapper">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="{{url('/')}}">ACADAZONE</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto ">
                    </ul>
                    <ul class="navbar-nav inline">
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('signup/form')}}" id="signup">
                                Register
                            </a>
                        </li>
                        <li class="nav-i
                    tem">
                            <a class="nav-link" href="{{url('login')}}" id="login">
                                Login
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>

    <div class="container" style="margin-top: 10rem; margin-bottom: 15rem;">

        @if(Session::has('msg'))
        <div class="alert alert-success" id="alert">{{Session::get('msg')}}</div>
        @endif
        <script>
            setTimeout(function (e) {
                document.getElementById("alert").display = "none";
            }, 2000);

        </script>
        <header> PRICE LIST</header>
        <hr style="margin-bottom: 2rem;" />

        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="pricing-header">Monthly</h4>
                        <p class="amount">$20<span class="mon">.99/mon</span></p>
                        <div class="d-flex justify-content-center">
                            <a href="{{url('payment/?plan=monthly&plan_cost=100')}}" class="btn btn-primary"
                                style="width: 50%; position: relative; top: 20px; background: #9c6f57;">Select Plan</a>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="pricing-header" style="background: #6f699d;">Quartly</h4>
                        <p class="amount">$100<span class="mon">.99/mon</span></p>
                        <div class="d-flex justify-content-center">
                            <a href="" class="btn btn-primary"
                                style="width: 50%; position: relative; top: 20px; background: #9c6f57;">Select Plan</a>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="pricing-header" style="background: #9ca44d">Yearly</h4>
                        <p class="amount">$150<span class="mon">.99/mon</span></p>
                        <div class="d-flex justify-content-center">
                            <a href="" class="btn btn-primary"
                                style="width: 50%; position: relative; top: 20px; background: #9c6f57;">Select Plan</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <footer style="padding: 10px 0px 20px 0px; color: white; background-color: #2f2f2f;">
        <div class="container py-3">
            <div class="row">
                <div class="col-md-3 col-3">
                    <h4>Explore</h4>
                    <a href="{{url('/')}}">Home</a>
                    <a href="{{url('about-us')}}">About Us</a>
                </div>
                <div class="col-md-3 col-3">
                    <h4>Contact Us</h4>
                    <a href="{{url('/send-mail')}}"> Info@acadazone.com </a>
                </div>
                <div class="col-md-3 col-3">
                    <h4>Follow</h4>
                </div>
                <div class="col-md-3 col-3">
                    <h4>Legal</h4>
                    <a href="{{url('/terms-and-conditions')}}">Terms of Service</a>
                    <a href="">Privacy Policy</a>
                </div>
            </div>

        </div>

    </footer>
    </div>
    <div class="copyright">
        <h6 class="">
            Copyright 2020 Acadazone. All Right Reserved.
        </h6>
    </div>
</body>

</html>
