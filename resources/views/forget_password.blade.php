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
            <a class="navbar-brand" href="{{url('/')}}">Acadazone</a>
        </nav>
    </div>
    <div class="container sign-up-form">
        <div class="row  d-flex justify-content-center my-4">
            <div class="col-md-12 col-12">
                <div class="container">
                    <div id="processing"></div>

                    <div class="card mt-3" id="sign-up-form">
                        <form action="{{url('api/update-password')}}" method="post">
                            <input type="hidden" name="email" id="email" value="{{$email}}">
                            @csrf
                            <input type="hidden" name="role" value="I">
                            <div class="row">
                                <div class="form-group col-md-12 col-12">
                                    <label for="">New Password</label>
                                    <input type="password" name="password" value="{{old('password')}}" id="new-password"
                                           class="form-control">

                                        <small class="text-danger" id="new_password_error">{{ $errors->first('password') }}</small>

                                </div>
                                <div class="form-group  col-md-12 col-12">
                                    <label for="">Confirm Password</label>
                                    <input type="password" name="cpassword" class="form-control" id="c-password">
                                        <small class="text-danger" id="c_password"></small>

                                </div>
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-primary mt-3 btn-block" id="submit">
                                    Update
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
<script src="{{asset('libraries/axios/axios.js')}}"></script>
{{--<script src="{{asset('libraries/axios/globalValues.js')}}"></script>--}}

<script>
    $("#display-name").keydown(function () {
        $('#display-error').text('This name will be displayed to the students');
    });
    $("#display-name").blur(function () {
        $('#display-error').text('');
    });

    $("#submit").on('click',function () {
        $("#processing").html("<alert class=\"alert alert-success d-block\">processing...</alert>\n");
        $("#submit").text("Processing..")
        let data = new FormData();
        data.append('password', $("#new-password").val());
        data.append('cpassword', $("#c-password").val());
        data.append('email', $("#email").val());
        axios({
            method: 'post',
            url: 'https://acadazone.com/api/update-password',
            responseType: 'application/json',
            data: data
        })
            .then(function(response) {
                $("#processing").html("<alert class=\"alert alert-success d-block\">Password reset completed</alert>\n");
                $("#new-password").val("");
                $("#c-password").val("");
                $("#new_password_error").text("");
                $("#c_password").text("");
            })
            .catch(function (error) {
                // handle error
               if(error.response.data.errors.password){
                    $("#new_password_error").text(error.response.data.errors.password[0]);
               }else if(error.response.data.errors.cpassword){
                    $("#c_password").text(error.response.data.errors.cpassword[0]);
                }
                $("#processing").html("<div></div>");
            })
            .finally(function () {
                // always executed
                $("#submit").text("Update")

            });
    });

</script>
</body>

</html>
