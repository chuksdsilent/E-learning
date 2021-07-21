<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Learning - @yield('title')</title>
    <link rel="stylesheet" href="{{asset('libraries/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('/css/settings.css')}}">
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


</head>
<style>
    i {
        margin-right: 10px;
    }

    a {
        font-size: 14px;
    }

</style>

<body>
<div class="login-wrapper">
    <div class="row no-padding no-magin">
        <div class="col-md-2 no-padding no-magin">
            <div class="side-bar">
                <div class="side-content">
                    <a href="{{route('admin.dashboard')}}"> <i class="fas fa-tachometer-alt"></i> Dashboard</a>
                    <a href="{{route('admin.payments')}}"> <i class="fas fa-plus-circle"></i> Payments</a>
                    <a href="{{route('admin.create-school')}}"> <i class="fas fa-plus-circle"></i> Create</a>
                    <a href="{{route('admin.institutions')}}"> <i class="fas fa-school"></i> Institutions</a>
                    <a href="{{route('admin.instructors')}}"> <i class="fas fa-users"></i> Instructors</a>
                    <a href="{{route('admin.subjects')}}"> <i class="fas fa-book"></i> Subjects</a>
                    <a href="{{route('admin.students')}}"> <i class="fas fa-user-friends"></i> Students</a>
                    <a href="{{route('admin.sec.students')}}"> <i class="fas fa-user-friends"></i> Sec. Students</a>
                    <a href="{{route('admin.other-students')}}"> <i class="fas fa-user-friends"></i> other Inst. Students</a>
                    <a href="{{route('admin.videos')}}"> <i class="fas fa-video"></i> Uni. Videos</a>
                    <a href="{{route('admin.sec-videos')}}"> <i class="fas fa-video"></i> Sec. Sch. Videos</a>
                    <a href="{{route('admin.other.videos')}}"> <i class="fas fa-video"></i> Other inst. Videos</a>
                </div>
            </div>
        </div>
        <div class="col-md-10 no-padding no-magin">
            <div class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <a class="navbar-brand" href="#">E-Learning</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <ul class="navbar-nav mr-3">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="profile-pics">
                                        <img src="{{asset('images/profile_avater.png')}}" class="img-fluid mr-2" alt="">
                                        Admin
                                    </span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('admin.change-password')}}">Change
                                    Password</a>
                                <a class="dropdown-item" href="{{route('admin.logout')}}">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            @if (Session::has('token'))
                <input type="hidden" id="token" value="{{Session::get('token')}}" id="">
            @endif
            <div class="main-content px-3 py-3">
                @yield('content')
            </div>
        </div>
    </div>
</div>
<script src="{{asset('libraries/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('libraries/javascript/login.js')}}"></script>
<script src="{{asset('libraries/javascript/signup.js')}}"></script>
<script src="{{asset('libraries/bootstrap/bootstrap.min.js')}}"></script>
<script src="{{asset('libraries/datatables/datatables/js/jquery.dataTables.js')}}"></script>
<script src="{{asset('libraries/axios/axios.js')}}"></script>
<script src="{{asset('libraries/axios/globalValues.js')}}"></script>
<script src="{{asset('js/create_video.js')}}"></script>
<script src="{{asset('libraries/js/notice.js')}}"></script>
<script src="{{asset('libraries/js/admin_course.js')}}"></script>
<script src="{{asset('libraries/js/topic.js')}}"></script>
<script src="{{asset('libraries/js/other_institution_topics.js')}}"></script>
<script src="{{asset('libraries/js/levels.js')}}"></script>

<script>
    $(document).ready(function () {
        $('#videos').DataTable();
    });
    setTimeout(function () {
        $(".alert").slideUp({
            'duration': 2000
        }, function () {
        });
    }, 2000);
</script>
</body>

</html>
