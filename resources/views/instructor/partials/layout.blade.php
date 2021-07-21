<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Learning - @yield('title')</title>
    <link rel="stylesheet" href="{{asset('libraries/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('libraries/toastify.css')}}">
    <link rel="stylesheet" href="{{asset('/css/settings.css')}}">
    <link rel="stylesheet" href="{{asset('/css/instructor_desktop.css')}}">
    <link rel="stylesheet" href="{{asset('/css/admin_desktop.css')}}">
    <link rel="stylesheet" href="{{asset('/css/switch.css')}}">
    <link rel="stylesheet" href="{{asset('libraries/animate/animate.min.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('libraries/fontawesome/css/all.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('libraries/fontawesome/css/fontawesome.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('libraries/customswitch/switch.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('libraries/datatables/datatables/css/jquery.dataTables.min.css')}}"
        rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/css/dashboard.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

</head>

<body>
    <div class="login-wrapper">
        <div class="row no-padding no-magin">
            <div class="col-md-12 no-padding no-magin">
                <div class="navbar desktop navbar-expand-lg navbar-light">
                    <div class="container">
                        <a class="navbar-brand" href="{{url('instructor/dashboard')}}">E-Learning</a>

                        <ul class="navbar-nav mr-3">

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="profile-pics">
                                        @if ( \App\Instructors::where('email',
                                        Auth::user()->email)->value('profile_pics') != "")
                                        <img src=" {{ asset( \App\Instructors::where('email', Auth::user()->email)->value('profile_pics') )}} "
                                            class="img-fluid mr-2" alt="" id="pics"
                                            style="width: 35px; height: 35px; border-radius: 50%; object-fit: cover;">
                                        @else
                                        <img src="{{asset('images/profile_avater.png')}}" class="img-fluid mr-2" alt="">
                                        @endif
                                        {{\App\Instructors::where('email', Auth::user()->email)->value('first_name')}}
                                        {{\App\Instructors::where('email', Auth::user()->email)->value('last_name')}}
                                    </span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{route('instructor.change-password')}}">Change
                                        Password</a>
                                    <a class="dropdown-item" href="{{route('instructor.profile')}}">Profile</a>
                                    <a class="dropdown-item" href="{{route('instructor.logout')}}">Logout</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>



                <nav class="navbar mobile navbar-expand-xs bg-light fixed-top">
                    <div class="d-flex">
                        <div style="font-size: 20px;" class="mr-auto">
                            <a href="{{url('/')}}">ACADAZONE</a>

                        </div>
                        <div>
                            <a href="javascript:;" style="color: #312d2d;" class="mr-2 my-0" id="menu-btn">
                                <i class="fas fa-bars"
                                    style="font-size: 20px; border: 2px solid #312d2d; padding: 6px; border-radius: 10px;"></i>
                            </a>
                        </div>

                    </div>
                </nav>
                <nav class="sidepanel fixed-top" style="z-index: 10000;">
                    {{-- <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"
                        style="font-size: 35px; color: #000; position: absolute; top: 0px; right: 0px;">&times;</a> --}}

                    <div class="user mt-5 d-flex justify-content-center" style="margin: 0 auto; text-align: center; ">
                        <div class="d-flex flex-column">
                            @if ( \App\Instructors::where('email',
                            Auth::user()->email)->value('profile_pics') != "")
                            <div class="d-flex justify-content-center">
                                <img src="
                                    {{ asset( \App\Instructors::where('email', Auth::user()->email)->value('profile_pics') )}} "
                                    class=" img-fluid" alt="" id="pics"
                                    style="width: 70px; height: 70px; border-radius: 50%; object-fit: cover;">

                            </div>
                            @else
                            <div class="d-flex justify-content-center">

                                <img src="{{asset('images/profile_avater.png')}}" class="img-fluid " alt=""
                                    style="width: 70px; height: 70px; object-fit: cover;">
                            </div>
                            @endif
                            <div class=" mt-2" style="font-size: 18px;">
                                {{\App\Instructors::where('email', Auth::user()->email)->value('first_name')}}
                                {{\App\Instructors::where('email', Auth::user()->email)->value('last_name')}}
                            </div>

                            <div>
                                Username: {{Auth::user()->username}}
                            </div>
                        </div>
                    </div>
                    <div class="side-menu mt-3 pt-5">
                        <div class="mobile-side-content">
                            {{-- <a href="{{route('student.dashboard')}}">Dashboard</a> --}}
                            <a href="{{url("instructor/dashboard")}}"> <i class="fas fa-tachometer-alt"></i>
                                Dasboard</a>

                            <a href="{{route('instructor.upload.video')}}"> <i class="fas fa-video"></i>Upload Video</a>

                            <a href="{{url("instructor/videos")}}"> <i class="fa fa-video"></i> Videos</a>


                            <a href="{{route('instructor.profile')}}"> <i class="fa fa-user"></i>
                                Profile</a>

                            <a href="{{route('instructor.change-password')}}"> <i class="fas fa-lock"></i>Change
                                Password</a>
                            <a href="{{route('instructor.logout')}}"> <i class="fas fa-power-off"></i>Logout</a>
                        </div>

                    </div>
                </nav>
            </div>
        </div>
        @if (Session::has('token'))
        <input type="hidden" id="token" value="{{Session::get('token')}}" id="">
        @endif
        <div class="row">
            <div class="col-md-3 no-padding no-margin" style="max-width: 20%;">
                <div class="side-bar">
                    <div class="side-content">
                        <a href="{{url("instructor/dashboard")}}"> <i class="fa fa-tachometer-alt"></i> Dashboard</a>
                        <a href="{{url("instructor/videos")}}"> <i class="fa fa-video"></i> Videos</a>
                        <a href="{{route('instructor.upload.video')}}"> <i class="fas fa-video"></i>Upload Video</a>

                    </div>
                </div>
            </div>
            @yield('content')
        </div>
    </div>
    <script src="{{asset('libraries/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('libraries/javascript/login.js')}}"></script>
    <script src="{{asset('libraries/javascript/signup.js')}}"></script>
    <script src="{{asset('libraries/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{asset('libraries/datatables/datatables/js/jquery.dataTables.js')}}"></script>

    <script>
        const menuBtn = $("#menu-btn");
        menuBtn.click(function () {
            $(".sidepanel").toggleClass("menu-open");
            const show = $(".menu-open");
        })
        $("#filter-section").hide();
        $("#filter").on("click", function () {
            $("#filter-section").slideToggle("slow");
        });
            $('#videos').DataTable();
        setTimeout(function () {
            $(".alert").slideUp({
                'duration': 2000
            }, function () {});
        }, 2000);

        $("#departmental").click(function () {
            $(".no-display-dept").css({"display": "block"});
            $(".no-display-gen").css({"display": "none"});

            $(".ind-course").css({"display": "block"});
            $(".all-course").css({"display": "none"});
        });
        $("#general").click(function () {
            $(".no-display-gen").css({"display": "block"});
            $(".no-display-dept").css({"display": "none"});
            $(".all-course").css({"display": "block"});
            $(".ind-course").css({"display": "none"});

        });

    </script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
</body>

</html>
