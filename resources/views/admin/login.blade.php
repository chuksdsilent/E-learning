<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Felken</title>
    <link rel="stylesheet" href="{{asset('libraries/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/settings.css')}}">
    <link rel="stylesheet" href="{{asset('css/signup.css')}}">

    <link rel="stylesheet" href="{{asset('libraries/animate/animate.min.css')}}">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
</head>

<body>
    <div class="login">
        <div class="navbar navbar-expand-lg navbar-light">
            <nav class="container">
                <a class="navbar-brand" href="#">Acadazone</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </nav>
        </div>
        <div class="container sign-up-form">
            @if (Session::has('errmsg'))
            <div class="alert alert-danger">{{Session::get('errmsg')}}</div>
            @endif
            <div class="row  d-flex justify-content-center my-4">
                <div class="col-md-12 col-12">
                    <div class="container">
                        <div class="card mt-3" id="sign-up-form">
                            <h2 class="py-3 px-3">Login</h2>
                            <form action="{{url('admin/login')}}" method="get">
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
                                    <button type="submit" class="btn btn-primary mt-3">
                                        Login
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
</body>

</html>
