
@extends('admin.partials.layout')
@section('content')

<h3>Dashboard</h3>
<div class="box-area">
    <div class="row">
        <div class="col-md-3 no-padding-left">
            <div class="dash-box bg-info">
                <div class="box-content ml-4 pt-3">
                    <h2>{{\App\Instructors::count()}}</h2>
                    <h6>Instructors</h6>
                </div>
                <a href="http://">More info <i class="far fa-arrow-alt-circle-right"></i></a>

            </div>
        </div>
        <div class="col-md-3 no-padding-left">
            <div class="dash-box bg-success">
                <div class="box-content  ml-4 pt-3">
                    <h2>{{\App\Students::count()}}</h2>
                    <h6>University Students</h6>
                </div>
                <a href="http://">More info
                    <i class="far fa-arrow-alt-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-md-3 no-padding-left">
            <div class="dash-box bg-danger">
                <div class="box-content ml-4 pt-3">
                    <h2>{{\App\Subjects::count()}}</h2>
                    <h6>Subjects</h6>
                </div>
                <a href="http://">More info <i class="far fa-arrow-alt-circle-right"></i></a>
            </div>
        </div>
        <div class="col-md-3 no-padding-left">
            <div class="dash-box bg-warning">
                <div class="box-content ml-4 pt-3">
                    <h2>{{\App\Universities::count()}}</h2>
                    <h6>Universites</h6>
                </div>
                <a href="http://">More info <i class="far fa-arrow-alt-circle-right"></i></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 no-padding-left">
            <div class="dash-box bg-show">
                <div class="box-content ml-4 pt-3">
                    <h2>{{\App\Faculties::count()}}</h2>
                    <h6>Facultiess</h6>
                </div>
                <a href="http://">More info <i class="far fa-arrow-alt-circle-right"></i></a>
            </div>
        </div>
        <div class="col-md-3 no-padding-left">
            <div class="dash-box bg-d">
                <div class="box-content  ml-4 pt-3">
                    <h2>{{\App\Departments::count()}}</h2>
                    <h6>Departments</h6>
                </div>
                <a href="http://">More info <i class="far fa-arrow-alt-circle-right"></i></a>

            </div>
        </div>
        <div class="col-md-3 no-padding-left">
            <div class="dash-box bg-warning">
                <div class="box-content ml-4 pt-3">
                    <h2>{{\App\Courses::count()}}</h2>
                    <h6>Courses</h6>
                </div>
                <a href="http://">More info <i class="far fa-arrow-alt-circle-right"></i></a>
            </div>
        </div>
        <div class="col-md-3 no-padding-left">
            <div class="dash-box bg-t">
                <div class="box-content ml-4 pt-3">
                    <h2>{{\App\Topics::count()}}</h2>
                    <h6>Topics</h6>
                </div>
                <a href="http://">More info <i class="far fa-arrow-alt-circle-right"></i></a>
            </div>
        </div>
    </div>
</div>
<div class="box-area">
    <div class="row">
        <div class="col-md-3 no-padding-left">
            <div class="dash-box bg-info">
                <div class="box-content ml-4 pt-3">
                    <h2>{{\App\Videos::where('status', 'U')->count()}}</h2>
                    <h6>University Videos</h6>
                </div>
                <a href="http://">More info <i class="far fa-arrow-alt-circle-right"></i></a>
            </div>
        </div>
        <div class="col-md-3 no-padding-left">
            <div class="dash-box bg-success">
                <div class="box-content  ml-4 pt-3">
                    <h2>{{\App\VideoViewsLikes::where('views', 1)->count()}}</h2>
                    <h6>Views</h6>
                </div>
                <a href="http://">More info
                    <i class="far fa-arrow-alt-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-md-3 no-padding-left">
            <div class="dash-box bg-danger">
                <div class="box-content ml-4 pt-3">
                    <h2>{{\App\VideoViewsLikes::where('thumbs_up', 1)->count()}}</h2>
                    <h6>Likes</h6>
                </div>
                <a href="http://">More info <i class="far fa-arrow-alt-circle-right"></i></a>
            </div>
        </div>
        <div class="col-md-3 no-padding-left">
            <div class="dash-box bg-warning">
                <div class="box-content ml-4 pt-3">
                    <h2>{{\App\VideoViewsLikes::where('thumbs_down', 1)->count()}}</h2>
                    <h6>Dislikes</h6>
                </div>
                <a href="http://">More info <i class="far fa-arrow-alt-circle-right"></i></a>
            </div>
        </div>
    </div>
    <div class="box-area">
        <div class="row">
            <div class="col-md-3 no-padding-left">
                <div class="dash-box  bg-t">
                    <div class="box-content ml-4 pt-3">
                        <h2>{{\App\Videos::where('status', 'S')->count()}}</h2>
                        <h6>Secondary School Videos</h6>
                    </div>
                    <a href="http://">More info <i class="far fa-arrow-alt-circle-right"></i></a>

                </div>
            </div>
            <div class="col-md-3 no-padding-left">
                <div class="dash-box bg-show">
                    <div class="box-content  ml-4 pt-3">
                        <h2>{{\App\SecVideoViewsLikes::where('thumbs_up', 1)->count()}}</h2>
                        <h6>Secondary School Likes</h6>
                    </div>
                    <a href="http://">More info
                        <i class="far fa-arrow-alt-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-3 no-padding-left">
                <div class="dash-box bg-danger">
                    <div class="box-content ml-4 pt-3">
                        <h2>{{\App\SecVideoViewsLikes::where('thumbs_down', 1)->count()}}</h2>
                        <h6>Secondary School dislikes</h6>
                    </div>
                    <a href="http://">More info <i class="far fa-arrow-alt-circle-right"></i></a>
                </div>
            </div>
            <div class="col-md-3 no-padding-left">
                <div class="dash-box  bg-d">
                    <div class="box-content ml-4 pt-3">
                        <h2>{{\App\SecVideoViewsLikes::where('views', 1)->count()}}</h2>
                        <h6>Secondary School views</h6>
                    </div>
                    <a href="http://">More info <i class="far fa-arrow-alt-circle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="box-area">
            <div class="row">
                <div class="col-md-3 no-padding-left">
                    <div class="dash-box  bg-t">
                        <div class="box-content ml-4 pt-3">
                            <h2>{{\App\Video::where('status', 'O')->count()}}</h2>
                            <h6>Other School Videos</h6>
                        </div>
                        <a href="http://">More info <i class="far fa-arrow-alt-circle-right"></i></a>

                    </div>
                </div>
                <div class="col-md-3 no-padding-left">
                    <div class="dash-box bg-show">
                        <div class="box-content  ml-4 pt-3">
                            <h2>{{\App\OtherInstitutionViewsLikes::where('thumbs_up', 1)->count()}}</h2>
                            <h6>Other School Likes</h6>
                        </div>
                        <a href="http://">More info
                            <i class="far fa-arrow-alt-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 no-padding-left">
                    <div class="dash-box bg-danger">
                        <div class="box-content ml-4 pt-3">
                            <h2>{{\App\OtherInstitutionViewsLikes::where('thumbs_down', 1)->count()}}</h2>
                            <h6>Other School dislikes</h6>
                        </div>
                        <a href="http://">More info <i class="far fa-arrow-alt-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-md-3 no-padding-left">
                    <div class="dash-box  bg-d">
                        <div class="box-content ml-4 pt-3">
                            <h2>{{\App\OtherInstitutionViewsLikes::where('views', 1)->count()}}</h2>
                            <h6>Other School views</h6>
                        </div>
                        <a href="http://">More info <i class="far fa-arrow-alt-circle-right"></i></a>
                    </div>
                </div>
            </div>
    <section class="char">
        <div class="car">
            <div class="row">
                <div class="col-md-5 col-7">
                    <div class="card">
                        <h6 class="mx-5 pt-">Latest Instructors</h6>
                        <hr />
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card">
                        <h6>Latest Upload</h6>
                        <hr />
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Instructor</th>
                                    <th scope="col">View</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; ?>
                                @foreach ($videos as $item)
                                <tr>
                                    <th scope="row">{{$i++}}</th>
                                    <td>
                                        {{$item->title}}
                                    </td>
                                    <td>{{\App\Instructors::where('email', $item->email)->value('first_name')}}
                                        {{\App\Instructors::where('email', $item->email)->value('last_name')}}</td>
                                    <td>
                                        <a href="{{url('admin/video/'. $item->vid_id)}}"> <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
