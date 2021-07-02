<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Acadazone</title>
    <link rel="stylesheet" href="{{asset('libraries/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/settings.css')}}">
    <link rel="stylesheet" href="{{asset('libraries/animate/animate.min.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/signup.css')}}">

    <style>
        .login-bg {
            background-image: url("{{ asset('images/student_login1.png')}} ");
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        @media screen and (max-width: 700px) {

            .login-bg {
                background-image: url("{{ asset('images/mobile_login.png')}} ");
                background-repeat: no-repeat;
                background-attachment: fixed;
            }
        }
    </style>
</head>
<body class="login-bg">
<?php  session(['/login' => url()->previous()]); ?>
<div class="login-wrapper">
    <div class="navbar navbar-expand-lg navbar-light">
        <nav class="container">
            <a class="navbar-brand" href="{{url('/')}}">Acadazone</a>
        </nav>
    </div>
    <div class="container sign-up-form">
        <div class="row  d-flex justify-content-center my-4">
            <div class="col-md-12 col-12">
                <div class="container">

                    <div class="card mt-3 py-4 px-4" id="sign-up-form">
                        <a href="{{url('/signup/form')}}" class="btn btn-success btn-block mb-4">Signup</a>
                        <h6>To Login click on the link below</h6>
                        <a href="{{url('/login')}}" class="btn btn-primary btn-block">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script src="{{asset('libraries/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('libraries/javascript/login.js')}}"></script>
<script src="{{asset('libraries/javascript/signup.js')}}"></script>
<script src="{{asset('libraries/bootstrap/bootstrap.min.js')}}"></script>
</body>

</html>
