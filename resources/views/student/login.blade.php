<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Learning</title>
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
                <a class="navbar-brand" href="{{url('/')}}">E-Learning</a>
            </nav>
        </div>
        <div class="container sign-up-form">
            <div class="row  d-flex justify-content-center my-4">
                <div class="col-md-12 col-12">
                    <div class="container">

                        @if (Session::has('errmsg'))
                            <div class="alert alert-danger">{{Session::get('errmsg')}}</div>
                        @endif
                        <div class="card mt-3" id="sign-up-form">
                            <h2 class=" px-3">Login</h2>
                            <hr />
                            <form action="{{url('student/login')}}" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="role" value="I">
                                <div class="row">
                                    <div class="form-group col-md-12 col-12">
                                        <label for="">Email</label>
                                        <input type="text" name="email" value="{{old('email')}}" id="first_name"
                                            class="form-control">
                                        @if ($errors->has('email'))
                                        <small class="text-danger">{{ $errors->first('email') }}</small>
                                        @endif
                                    </div>
                                    <div class="form-group  col-md-12 col-12">
                                        <label for="">Password</label>
                                        <input type="password" name="password" class="form-control">
                                        @if ($errors->has('password'))
                                        <small class="text-danger">{{ $errors->first('password')}}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary mt-3 btn-block">
                                        Login
                                    </button>
                                </div>
                                You dont have account yet &nbsp; <a href=" {{url('signup/form')}} " style="color: darkgoldenrod">Sign
                                    up</a>
                                <br>
                                <a href="{{url('/enter-email')}}"  style="color: darkgoldenrod">Forget Password</a>
                            </form>
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
