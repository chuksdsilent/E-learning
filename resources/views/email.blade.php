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
            background-color: #f9f9f9;
        }


        @media screen and (max-width: 700px) {

            .login-bg {
                background-image: url("{{ asset('images/mobile_signup.png')}} ");
                background-repeat: no-repeat;
                background-attachment: fixed;
            }


        }

    </style>
</head>

<body class="login-bg">
<div class="login-wrapper">
    <div class="navbar navbar-expand-lg navbar-light">
        <nav class="container">
            <a class="navbar-brand" href="#">Acadazone</a>
        </nav>
    </div>
    <div class="container sign-up-form">
        <div class="row  d-flex justify-content-center my-4">
            <div class="col-md-12 col-12">
                <div class="container">
                    <div class="card mt-3" id="sign-up-form">
                        <form action="{{url('/forget-password')}}" method="post">
                            @csrf
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
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mt-3 btn-block">
                                    Continue
                                </button>
                            </div>
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

<script>
    $("#display-name").keydown(function () {
        $('#display-error').text('This name will be displayed to the students');
    });
    $("#display-name").blur(function () {
        $('#display-error').text('');
    });



</script>
</body>

</html>
