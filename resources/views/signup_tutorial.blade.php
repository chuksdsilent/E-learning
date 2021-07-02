<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Acadazone</title>
    <link rel="stylesheet" href="{{asset('libraries/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/settings.css')}}">
    <link rel="stylesheet" href="{{asset('css/signup.css')}}">
    <link rel="stylesheet" href="{{asset('libraries/animate/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/signup.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <style>
        .login-bg {
            background-image: url("{{ asset('images/signups.png')}} ");
            background-repeat: no-repeat;
        }
        .card{
            border-radius: 0px;
        }
        @media screen and (max-width: 700px) {
            .login-bg {
                background-image: url("{{ asset('images/mobile_signup.png')}} ");
                background-repeat: no-repeat;
                background-attachment: fixed;
            }
            .sign-up-form.container {
                min-width: 100%;
            }
        }
        body{
            font-size: 16px;
        }
    </style>
</head>
<body class="login-bg" style="background-image: url('images/tutorial_background.jpg') !important;">
<div class="login-wrapper">
    <div class="navbar navbar-expand-lg navbar-light">
        <nav class="container">
            <a class="navbar-brand" href="{{url('/')}}">ACADAZONE</a>
        </nav>
    </div>
    <div class="container pt-5">
        <div class="col-lg-12 col-sm-12 col-xs-12 col-lg-offset-3">
            <div class="card">
                <div class="card-body">
                    <h3>How to Signup</h3>
                    <hr />
                    1. Click on Signup <br />
                    2. Fill in the form<br />
                    4.  Click on submit<br />
                    5. Go to your mail and click on the link to update your profile<br />
                    6. Update your profile<br />
                    7. Click on Submit to update<br />
                    <hr class="mt-5">
                    <a href="{{url('/links')}}" class="btn btn-primary">Next ></a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
