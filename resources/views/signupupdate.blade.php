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

        #hide-faculty {
            display: none;
        }

        #hide-school {
            display: none;
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
                <a class="navbar-brand" href="#">ACADAZONE</a>
            </nav>
        </div>
        <div class="container sign-up-form">
            <div class="row  d-flex justify-content-center my-4">
                <div class="col-md-12 col-12">
                    <div class="container">
                        @if (Session::has('sucess_msg'))
                        <div class="alert alert-success">
                            <i class="fa fa-check-circle" aria-hidden="true"></i>
                            {{ Session::get('sucess_msg')}}
                        </div>
                        @endif
                        @if (Session::has('error_msg'))
                        <div class="alert alert-danger">
                            <i class="fa fa-check-circle" aria-hidden="true"></i>
                            {{ Session::get('error_msg')}}
                        </div>
                        @endif
                        <div class="card mt-3 signup" id="sign-up-form">
                            <h2 class="px-3 pl-4">Update Profile</h2>
                            <hr />
                            <form action="{{url('user/signup')}}" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="role" value="{{$role }}">
                                <div class="row">

                                    @if(Session::has('role'))
                                    @if(Session::get('role') == "I")
                                    <input type="hidden" name="title" value="no title">
                                    @endif
                                    @endif

                                    <div class="form-group col-md-6 col-12">
                                        <label for="">First Name</label>
                                        <input type="text" name="first_name" value="{{old('first_name')}}"
                                            id="first_name" class="form-control">
                                        @if ($errors->has('first_name'))
                                        <small class="text-danger">{{ $errors->first('first_name') }}</small>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label for="">Last Name</label>
                                        <input type="text" name="last_name" id="last_name" value="{{old('last_name')}}"
                                            class="form-control">
                                        @if ($errors->has('last_name'))
                                        <small class="text-danger">{{ $errors->first('last_name') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label for="">Username</label>
                                        <input type="text" name="username" id="username" class="form-control"
                                            value="{{old('last_name')}}">
                                        @if ($errors->has('username'))
                                        <small class="text-danger">{{ $errors->first('username') }}</small>
                                        @endif
                                        @if (Session::has('username'))
                                        <small class="text-danger">{{ Session::get('username') }}</small>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label for="">Phone Number</label>
                                        <input type="text" name="phone" id="phone" class="form-control"
                                            value="{{old('phone')}}">
                                        @if ($errors->has('phone'))
                                        <small class="text-danger">{{ $errors->first('phone') }}</small>
                                        @endif
                                        @if (Session::has('phone'))
                                        <small class="text-danger">{{ Session::get('phone') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                </div>
                                @if($role == "S")
                                <div class="row">
                                    <div class="form-group col-md-12 col-12">
                                        <label for="">Institution </label>
                                        <select name="institution" id="institution" class="form-control">
                                            <option value="">Select Institution</option>
                                            <option value="sec">Secondary Education</option>
                                            <option value="uni">University Education</option>
                                            <option value="others">Others</option>
                                            <option value="other-courses">Other Courses</option>
                                        </select>
                                    </div>
                                </div>
                                @endif
                                <div class="form-group" id="others">

                                    <label for="">School</label>
                                    <select name="institution_id" id="school" class="form-control">
                                        <option value="">Select School</option>
                                        @foreach($institutions as $institution)
                                        <option value="{{$institution->institution_id}}">
                                            {{$institution->institution_name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="row mt-3">
                                        <div class="col-md-12 col-12 col-lg-12 col-xs-6 col-sm-6">
                                            <div class="form-group">
                                                <label for="">Level</label>
                                                <select name="institution_level" id="level" class="form-control">
                                                    <option value="">Select Level</option>
                                                </select>
                                                @if ($errors->has('university'))
                                                <small class="text-danger">{{ $errors->first('university') }}</small>
                                                @endif
                                            </div>
                                            <small class="text-danger">{{ $errors->first('university') }}</small>
                                        </div>
                                    </div>
                                </div>
                                <div id="hide-school">
                                    <div class="row">

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">School Name</label>
                                                <input type="text" class="form-control" name="school_name" />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Class</label>
                                                <select name="student_class" id="student_class" class="form-control">
                                                    <option value="1">JS1</option>
                                                    <option value="2">JS2</option>
                                                    <option value="3">JS3</option>
                                                    <option value="4">SS1</option>
                                                    <option value="5">SS2</option>
                                                    <option value="6">SS3</option>
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="hide-faculty">
                                    <div class="row">
                                        <div class="col-md-12 col-12 col-lg-12 col-xs-6 col-sm-6">
                                            <div class="form-group">
                                                <label for="">Universities</label>
                                                <input type="text" name="university" id="" class="form-control">
                                                @if ($errors->has('university'))
                                                <small class="text-danger">{{ $errors->first('university') }}</small>
                                                @endif
                                            </div>
                                            <small class="text-danger">{{ $errors->first('university') }}</small>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-12 col-lg-6 col-xs-6 col-sm-6">
                                            <div class="form-group">
                                                <label for="">Faculty</label>
                                                <select name="faculty" id="fac_id" class="form-control">
                                                    <option value="">Select Faculty</option>
                                                    @foreach($faculties as $faculty)
                                                    <option value="{{$faculty->fac_id}}">{{$faculty->name}}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('faculty'))
                                                <small class="text-danger">{{ $errors->first('faculty') }}</small>
                                                @endif
                                            </div>
                                            <small class="text-danger">{{ $errors->first('faculty') }}</small>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-6 col-xs-6 col-sm-6">
                                            <div class="form-group">
                                                <label for="">Department</label>
                                                <select name="department" id="dept_id" class="form-control dept_id">
                                                    <option value="">Select Department</option>
                                                </select>
                                                @if ($errors->has('department'))
                                                <small class="text-danger">{{ $errors->first('department') }}</small>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-12 col-lg-12 col-xs-6 col-sm-6">
                                            <div class="form-group">
                                                <label for="">Level</label>
                                                <select name="level" id="level" class="form-control">
                                                    <option value="">Select Level</option>
                                                    <option value="1">100</option>
                                                    <option value="2">200</option>
                                                    <option value="3">300</option>
                                                    <option value="4">400</option>
                                                    <option value="5">500</option>
                                                </select>
                                                @if ($errors->has('level'))
                                                <small class="text-danger">{{ $errors->first('level') }}</small>
                                                @endif
                                            </div>
                                            <small class="text-danger">{{ $errors->first('level') }}</small>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block mt-3">
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
    <script src="{{asset('libraries/javascript/login.js')}}"></script>
    <script src="{{asset('libraries/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{asset('libraries/axios/axios.js')}}"></script>
    <script src="{{asset('libraries/axios/globalValues.js')}}"></script>
    <script src="{{asset('libraries/js/get_department.js')}}"></script>
    <script src="{{asset('libraries/js/levels.js')}}"></script>

    <script>
        let others = $("#others");
        others.hide();
        $("#display-name").keydown(function () {
            $('#display-error').text('This name will be displayed to the students');
        });
        $("#display-name").blur(function () {
            $('#display-error').text('');
        });

        $("#institution").change(function (e) {
            const institution = $(this).val();
            if (institution === "uni") {
                $("#hide-faculty").css({
                    'display': 'inline'
                });
                $("#hide-school").css({
                    'display': 'none'
                });
                others.hide();
            } else if (institution === "sec") {
                $("#hide-school").css({
                    'display': 'inline'
                });
                $("#hide-faculty").css({
                    'display': 'none'
                });
                others.hide();
            } else if (institution === "others") {
                others.show();
                $("#hide-faculty").hide();
                $("#hide-school").hide();
            }
        });

    </script>
</body>

</html>
