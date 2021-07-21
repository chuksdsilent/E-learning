<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Learning</title>
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

        .sign-up-form.container {
            max-width: 600px;
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

    </style>
</head>
<body class="login-bg">
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
                        <div class="card mt-3" id="sign-up-form">
                            <h2 class=" px-3">Signup</h2>
                            <hr />
                            <form action="{{url('register/email')}}" method="post">
                                @csrf
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
                                        <input type="password" name="password" class="form-control" id="password">
                                        @if ($errors->has('password'))
                                        <small class="text-danger">{{ $errors->first('password')}}</small>
                                        @endif
                                    </div>
                                    <div class="form-group  col-md-12 col-12">
                                        <label for="">Confirm Password</label>
                                        <input type="password" name="cpassword" class="form-control" id="cpassword">
                                        @if ($errors->has('cpassword'))
                                        <small class="text-danger">{{ $errors->first('cpassword')}}</small>
                                        @endif
                                    </div>
                                    <span class="text-danger" style="padding-left: 10px;" id="divCheckPasswordMatch">

                                    </span>

                                <div class="row">
                                    <div class="form-group col-md-12 col-12">
                                        <label for="" style="fon-size: 20px;">Registration Type</label>
                                        <br />
                                        <input type="radio" name="role" id="" value="I"> <span style="font-size: 20px;">Tutor</span>
                                        <input type="radio" name="role" id="" value="S" class="ml-3"> <span  style="font-size: 20px;">Student</span>
                                        @if ($errors->has('role'))
                                            <small class="text-danger">{{ $errors->first('role') }}</small>
                                        @endif
                                    </div>
{{--                                    <div class="form-group"> &nbsp; &nbsp; <input type="checkbox" name="agreement"--}}
{{--                                        id="termsChkbx">&nbsp; I agree to--}}
{{--                                        the <a href="{{url('/terms-and-conditions')}}"  target="_blank" style="color: blue;">  Terms of Service</a> </div>--}}
{{--                                    </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <input type="hidden" name="recaptcha_v3" id="recaptcha_v3">--}}
{{--                                        <script src="https://www.google.com/recaptcha/api.js?render=6LfB4SEbAAAAAGiZZFmhr6iPvnZc1UbVdsaHJLMw"></script>--}}
{{--                                        <script>--}}
{{--                                            grecaptcha.ready(function() {--}}
{{--                                                grecaptcha.execute("6LfB4SEbAAAAAGiZZFmhr6iPvnZc1UbVdsaHJLMw", {action: 'homepage'}).then(function(token) {--}}
{{--                                                    if(token) {--}}
{{--                                                        //js--}}
{{--                                                        document.getElementById('recaptcha_v3').value = token;--}}
{{--                                                        //if you use jquery library--}}
{{--                                                        //$("#recaptcha_v3").val(token);--}}
{{--                                                    }--}}
{{--                                                });--}}
{{--                                            });--}}
{{--                                        </script>--}}
{{--                                        {!! app('captcha')->display(['data-theme' => 'dark', 'data-type' => 'audio',]) !!}--}}
{{--                                        {!! NoCaptcha::renderJs() !!}--}}
{{--                                        {!! NoCaptcha::display() !!}--}}
{{--                                        @if ($errors->has('g-recaptcha-response'))--}}
{{--                                            <span class="help-block text-danger">--}}
{{--                                            <strong>{{ $errors->first('g-recaptcha-response') }}</strong>--}}
{{--                                            </span>--}}
{{--                                        @endif--}}
{{--                                        <div class="g-recaptcha"--}}
{{--                                             data-sitekey="{{env('GOOGLE_RECAPTCHA_KEY')}}">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="form-group col-md-12">
                                    <button type="submit" id="sub1" class="btn btn-primary mt-3 btn-block">
                                        Sign Up
                                    </button>
                                </div>
                                    <div class="form-group">
                                        Do you have an account already? &nbsp; <a href=" {{url('/login')}} "
                                                                                  style="color: blue;">Login</a>
                                        <br/ />
                                    </div>
                                <a href="{{url('/enter-email')}}">Forget Password</a>
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
    <script src="{{asset('libraries/axios/axios.js')}}"></script>
    <script src="{{asset('libraries/axios/globalValues.js')}}"></script>
    <script src="{{asset('libraries/js/get_department.js')}}"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script>

        // document.getElementById('sub1').disabled = "disabled";
        //
        // document.getElementById('termsChkbx').addEventListener('click', function (e) {
        //     document.getElementById('sub1').disabled = !e.target.checked;
        // });

        $("#cpassword").keyup(checkPasswordMatch);

        function checkPasswordMatch() {
            var password = $("#password").val();
            var confirmPassword = $("#cpassword").val();

            if (password != confirmPassword)
                $("#divCheckPasswordMatch").html("Passwords do not match!");
            else
                $("#divCheckPasswordMatch").html("<style='color:green'>Passwords match</style>");
        }
        $("#display-name").keydown(function () {
            $('#display-error').text('This name will be displayed to the students');
        });
        $("#display-name").blur(function () {
            $('#display-error').text('');
        });
    </script>
</body>
</html>
