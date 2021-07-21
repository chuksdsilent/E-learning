<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Learning - @yield('title')</title>
    <link rel="stylesheet" href="{{asset('libraries/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('/css/settings.css')}}">
    <link rel="stylesheet" href="{{asset('/css/switch.css')}}">
    <link rel="stylesheet" href="{{asset('libraries/animate/animate.min.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('libraries/fontawesome/css/all.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('libraries/fontawesome/css/fontawesome.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('libraries/customswitch/switch.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('libraries/toastify/toastify.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/css/instructor_desktop.css')}}">

    <style>
        #suggest {
            z-index: 1000;
        }

        #search_item,
        #suggest {
            width: 90%;
        }

        li.suggest-list>a:hover {
            background: #dddddd;
        }

        ul {
            margin: 0px;
            padding: 0px;
        }

        ul li>a {
            padding-left: 1rem;
        }

        #other-sch,
        #secondary,
        #university {
            display: none;
        }

        @media only screen and (max-width: 600px) {

            #search_item,
            #suggest {
                width: 80%;
            }

        }

    </style>
</head>

<body oncontextmenu="return false;">
    <div class="login-wrapper">
        <div class="row no-padding no-magin">
            <div class="col-md-12 no-padding no-magin">
                <nav class="navbar desktop navbar-expand-lg navbar-light bg-light fixed-top">
                    <div class="container">
                        <a class="navbar-brand" href="{{url('student/videos')}}">E-Learning</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="#"> <span class="sr-only">(current)</span></a>
                                </li>
                            </ul>
                            <ul class="nav profile my-2 my-lg-0 mr-5">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="profile-pics">
                                            <?php $institution = \Auth::user()->institution; ?>
                                            @switch($institution)
                                            @case("others")
                                            @if ( \App\OtherInstitutionStudents::where('email',
                                            Auth::user()->email)->value('profile_pics') != "")
                                            <img src=" {{ asset( \App\OtherInstitutionStudents::where('email', Auth::user()->email)->value('profile_pics') )}} "
                                                class="img-fluid mr-2" alt="" id="pics"
                                                style="width: 35px; height: 35px; border-radius: 50%; object-fit: cover;">
                                            @else
                                            <img src="{{asset('images/profile_avater.png')}}" class="img-fluid mr-2"
                                                alt="">
                                            @endif
                                            {{\App\OtherInstitutionStudents::where('email', Auth::user()->email)->value('first_name')}}
                                            {{\App\OtherInstitutionStudents::where('email', Auth::user()->email)->value('last_name')}}
                                            @break
                                            @case("uni")
                                            @if ( \App\Students::where('email',
                                            Auth::user()->email)->value('profile_pics') != "")
                                            <img src=" {{ asset( \App\Students::where('email', Auth::user()->email)->value('profile_pics') )}} "
                                                class="img-fluid mr-2" alt="" id="pics"
                                                style="width: 35px; height: 35px; border-radius: 50%; object-fit: cover;">
                                            @else
                                            <img src="{{asset('images/profile_avater.png')}}" class="img-fluid mr-2"
                                                alt="">
                                            @endif
                                            {{\App\Students::where('email', Auth::user()->email)->value('first_name')}}
                                            {{\App\Students::where('email', Auth::user()->email)->value('last_name')}}
                                            @break
                                            @case("sec")

                                            @if ( \App\SecStudents::where('email',
                                            Auth::user()->email)->value('profile_pics') != "")
                                            <img src=" {{ asset( \App\SecStudents::where('email', Auth::user()->email)->value('profile_pics') )}} "
                                                class="img-fluid mr-2" alt="" id="pics"
                                                style="width: 35px; height: 35px; border-radius: 50%; object-fit: cover;">
                                            @else
                                            <img src="{{asset('images/profile_avater.png')}}" class="img-fluid mr-2"
                                                alt="">
                                            @endif
                                            {{\App\SecStudents::where('email', Auth::user()->email)->value('first_name')}}
                                            {{\App\SecStudents::where('email', Auth::user()->email)->value('last_name')}}
                                            @break
                                            @endswitch
                                        </span>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{route('student.change-password')}}">Change
                                            Password</a>
                                        <a class="dropdown-item" href="{{route('student.profile')}}">Update
                                            Profile</a>
                                        <a class="dropdown-item" href="{{route('student.logout')}}">Logout</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
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

                    <style>
                        .avatar {
                            width: 150px;
                            height: 150px;
                            border-radius: 50%;
                            object-fit: cover;
                        }

                    </style>
                    <div class="user mt-5 d-flex justify-content-center" style="margin: 0 auto; text-align: center; ">
                        <div class="d-flex flex-column">
                            @switch($institution)
                            @case("others")
                            @if ( \App\OtherInstitutionStudents::where('email',
                            Auth::user()->email)->value('profile_pics') != "")
                            <img src=" {{ asset( \App\OtherInstitutionStudents::where('email', Auth::user()->email)->value('profile_pics') )}} "
                                class="img-fluid mr-2 avatar" alt="" id="pics" style="">
                            @else
                            <img src="{{asset('images/profile_avater.png')}}" class="img-fluid mr-2 avatar" alt="">
                            @endif
                            {{\App\OtherInstitutionStudents::where('email', Auth::user()->email)->value('first_name')}}
                            {{\App\OtherInstitutionStudents::where('email', Auth::user()->email)->value('last_name')}}
                            @break
                            @case("uni")
                            @if ( \App\Students::where('email',
                            Auth::user()->email)->value('profile_pics') != "")
                            <img src=" {{ asset( \App\Students::where('email', Auth::user()->email)->value('profile_pics') )}} "
                                class="img-fluid mr-2 avatar" alt="" id="pics">
                            @else
                            <img src="{{asset('images/profile_avater.png')}}" class="img-fluid mr-2 avatar" alt="">
                            @endif
                            {{\App\Students::where('email', Auth::user()->email)->value('first_name')}}
                            {{\App\Students::where('email', Auth::user()->email)->value('last_name')}}
                            @break
                            @case("sec")

                            @if ( \App\SecStudents::where('email',
                            Auth::user()->email)->value('profile_pics') != "")
                            <img src=" {{ asset( \App\SecStudents::where('email', Auth::user()->email)->value('profile_pics') )}} "
                                class="img-fluid mr-2 avatar" alt="" id="pics">
                            @else
                            <img src="{{asset('images/profile_avater.png')}}" class="img-fluid mr-2" alt="">
                            @endif
                            {{\App\SecStudents::where('email', Auth::user()->email)->value('first_name')}}
                            {{\App\SecStudents::where('email', Auth::user()->email)->value('last_name')}}
                            @break
                            @endswitch

                            <div style="font-size: 16px;" class="mt-1 ">
                                Username: {{Auth::user()->username}}
                            </div>
                        </div>
                    </div>
                    <div class="side-menu mt-3 pt-5">
                        <div class="mobile-side-content">
                            {{-- <a href="{{route('student.dashboard')}}">Dashboard</a> --}}
{{--                            <a href="{{route('student.trending')}}"> <i class="fas fa-poll"></i> Trending</a>--}}
                            {{-- <a href="{{route('student.subscriptions')}}">Subscriptions</a> --}}
                            <a href="{{route('student.recent-videos')}}"> <i class="fas fa-object-ungroup"></i> Recent
                                Videos</a>
                            {{-- <a href="{{route('student.history')}}">History</a> --}}

                            <a href="{{route('student.videos')}}"> <i class="fas fa-video"></i>Recommended Videos</a>
                            <a href="{{route('student.profile')}}">
                                <i class="fa fa-user"></i> Update
                                Profile</a>
                            <a href="{{route('student.change-password')}}"> <i class="fas fa-lock"></i>Change
                                Password</a>
                            <a href="{{route('student.logout')}}"> <i class="fas fa-power-off"></i>Logout</a>
                        </div>

                    </div>
                </nav>
            </div>
        </div>
        @if (Session::has('token'))
        <input type="hidden" id="token" value="{{Session::get('token')}}" id="">
        @endif
        <div class="row">
            <div class="col-md-2 no-padding no-magin">
                <div class="side-bar sticky-top" style="min-width: 16.666667%;">
                    <div >
                        <div class="side-content">
                            {{-- <a href="{{route('student.dashboard')}}">Dashboard</a> --}}
{{--                            <a href="{{route('student.trending')}}"> <i class="fas fa-poll mr-3"></i> Trending</a>--}}
                            {{-- <a href="{{route('student.subscriptions')}}">Subscriptions</a> --}}
                            <a href="{{route('student.recent-videos')}}"> <i class="fas fa-object-ungroup mr-3"></i>
                                Recent
                                Videos</a>
                            {{-- <a href="{{route('student.history')}}">History</a> --}}
                            <a href="{{route('student.videos')}}"> <i class="fas fa-video mr-3"></i>Recommended
                                Videos</a>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-10 mt-5" style="padding: 0px;">
                <div class="search">
                    <form method="GET" action="{{route('student.results')}}" class=" mt-5 ml-5">

                        <h5 class="">
                            <a href="javascript:;" style="color: black;" id="filter"> <i class="fa fa-cog"></i>
                                Filter</a>
                        </h5>
                        <div class="filter-section" id="filter-section">
                            <?php $institution = \Auth::user()->institution; ?>

                            <div class="form-group">

                                <select name="institution" id="institution-filter" class="form-control"
                                        style="width: 90%;">
                                    <option>Select Institution</option>
                                    <option value="uni">University</option>
                                    <option value="sec">Secondary School</option>
                                    <option value="others">Others</option>
                                </select>
                            </div>
                            <div id="university">
                                <div class="row">
                                    <div class="col-md-4 col-6 col-lg-4 col-sm-4 col-xs-6">
                                        <div class="form-group">
                                            <label for="">University</label>
                                            <select name="uni_id" id="uni_id" class="form-control">
                                                <option value="">Select University</option>
                                                @foreach ($universities as $item)
                                                    <option value="{{$item->uni_id}}">{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-md-4 col-6 col-lg-4 col-sm-4 col-xs-6">
                                        <label for="">Faculty</label>
                                        <select name="fac_id" id="fac_id" class="form-control">
                                            <option value="">Select Faculty</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 col-6 col-lg-4 col-sm-4 col-xs-6">
                                        <div class="form-group">
                                            <label for="dept_id">Department</label>
                                            <select name="dept_id" id="dept_id" class="form-control">
                                                <option value="">Select Department</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 col-6 col-lg-4 col-sm-4 col-xs-6">
                                        <div class="form-group">
                                            <label for="level_id">Level</label>
                                            <select name="level_id" id="level_id" class="form-control">
                                                <option value="">Select level</option>
                                                <option value="1">100</option>
                                                <option value="2">200</option>
                                                <option value="3">300</option>
                                                <option value="4">400</option>
                                                <option value="5">500</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-md-4 col-6 col-lg-4 col-sm-4 col-xs-6">
                                        <div class="form-group">
                                            <label for="semester_id">Semester</label>
                                            <select name="semester_id" id="semester_id" class="form-control">
                                                <option value="">Select Semester</option>
                                                <option value="1">First Semester</option>
                                                <option value="2">Second Semester</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div id="secondary">
                                <div class="row">
                                    <div class="col-md-4 col-6 col-lg-4 col-sm-4 col-xs-6">
                                        <label for="">Class</label>
                                        <select name="search_class_id" class="form-control">
                                            <option value="">Select Class</option>
                                            <option value="1">JS1</option>
                                            <option value="2">JS2</option>
                                            <option value="3">JS3</option>
                                            <option value="4">SS1</option>
                                            <option value="5">SS2</option>
                                            <option value="6">SS3</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4 col-6 col-lg-4 col-sm-4 col-xs-6">
                                        <label for="">Subject</label>
                                        <select name="search_sub_id" class="form-control">
                                            <option value="">Select subject</option>
                                            @foreach($subjects as $subject)
                                                <option value="{{$subject->sub_id}}">{{$subject->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div id="other-sch">
                                <div class="row">

                                    <div class="col-md-4 col-6 col-lg-4 col-sm-4 col-xs-6">
                                        <label for="">Institution</label>
                                        <select name="school" id="institution" class="form-control">
                                            <option value="">Select Institution</option>
                                            @foreach($otherInstitutions as $otherInstitution)
                                                <option value="{{$otherInstitution->institution_id}}">
                                                    {{$otherInstitution->institution_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4 col-6 col-lg-4 col-sm-4 col-xs-6">
                                        <label for="">Level</label>
                                        <select name="level" id="level" class="form-control">
                                            <option value="">Select Level</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 col-6 col-lg-4 col-sm-4 col-xs-6">
                                        <label for="">Course</label>
                                        <select name="course" id="course" class="form-control">
                                            <option value="">Select Course</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <hr />
                        </div>


                        <div class="form-group form-inline" style="min-width: 100%;">
                            <input type="text" name="search_item" autocomplete="off" id="search_item"
                                class="form-control" placeholder="" style="border-radius: 0px;"
                                aria-describedby="helpId">
                            <button class="btn btn-primary d-flex" id="search"
                                style="height: 40px; border-radius: 0px; padding: 8px 10px; "><i
                                    class="fa fa-search mt-2 mr-1" style="font-size: 20px; margin: 0px !important;"></i>
                                <span style="margin-top: 3px;"></span>
                            </button>
                        </div>
                    </form>
                </div>
                @yield('content')
            </div>
        </div>
    </div>
    <script src="{{asset('libraries/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('libraries/javascript/login.js')}}"></script>
    <script src="{{asset('libraries/javascript/signup.js')}}"></script>
    <script src="{{asset('libraries/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{asset('libraries/axios/axios.js')}}"></script>
    <script src="{{asset('libraries/axios/globalValues.js')}}"></script>
    <script src="{{asset('libraries/js/autocomplete.js')}}"></script>
    <script src="{{asset('js/courses.js')}}"></script>
    <script src="{{asset('libraries/js/other_institution_topics.js')}}"></script>

    <script>
        $("#institution-filter").change(function (e) {
            console.log($("#institution-filter").val());
            switch ($("#institution-filter").val()) {
                case "uni":
                    console.log("egwu gi na atum");
                    $("#university").css("display", "block");
                    $("#secondary").css("display", "none");
                    $("#other-sch").css("display", "none");
                    break;
                case "sec":
                    console.log("egwu gi na atum");
                    $("#university").css("display", "none");
                    $("#secondary").css("display", "block");
                    $("#other-sch").css("display", "none");
                    break;
                case "others":
                    console.log("egwu gi na atum");
                    $("#university").css("display", "none");
                    $("#secondary").css("display", "none");
                    $("#other-sch").css("display", "block");
                    break;
            }
        });
        const menuBtn = $("#menu-btn");
        menuBtn.click(function () {
            $(".sidepanel").toggleClass("menu-open");
            const show = $(".menu-open");
            // console.log(show);
            // if (show.length > 0) {

            //     window.onclick = function (e) {
            //         $(".sidepanel").removeClass("menu-open");
            //     }
            // }
        })
        $("#filter-section").hide();
        $("#filter").on("click", function () {
            $("#filter-section").slideToggle("slow");
        });

        setTimeout(function () {
            $(".alert").slideUp({
                'duration': 2000
            }, function () {});
        }, 2000);
        console.log();

        $(".filters").click(function () {
            alert($(this).text());
        })

    </script>
</body>

</html>
