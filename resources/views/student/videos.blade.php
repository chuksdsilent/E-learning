@extends('student.partials.layout')
@section('title', 'videos')
@section('content')
    <style>
        img{
            height: 150px;
            width: 100%;
            object-fit: cover;

        }
    </style>
    <div class="student-videos-wrapper mt-3 mx-5">
        <h5 class="mt-5">Recommended Videos</h5>
        <?php $institution = Auth::user()->institution; ?>

            @switch($institution)
                @case("uni")
                @foreach($rec_videos->chunk(4) as $chunk)
                    <div class="row mt-4">
                        @foreach($chunk as $video)
                            <div class="col-md-3 col-12" style="padding: 5px;">
                                <div class="card">
                                    <a href="{{url('/student/video/'. $video->vid_id . '?options=uni')}}">
                                        <img src="{{asset('images/ones.png')}}" class="card-img-top"
                                             {{--                                    <img src="{{asset('myapp/storage/'. $video->cover_photo)}}" class="card-img-top"--}}
                                             alt="No Video">
                                        <div class="card-body">
                                            <h6 class="card-title">
                                                <div class="row ml-3 mb-3 pt-3">
                                                    <img
                                                        src="{{asset(\App\Instructors::where('email', $video->instructor_email)->value('profile_pics'))}}"
                                                        class=" mr-3" alt=""
                                                        style="border-radius:50%;  width: 50px; height:50px;">
                                                    <div class="d-flex flex-column mt-2">
                                                        <h6 class="no-padding">
                                                            {{\App\Instructors::where('email', $video->instructor_email)->value('username')}}
                                                        </h6>
                                                        <p class="mt-1">
                                                            {{ substr($video->title, 0, 15)}}...
                                                        </p>

                                                    </div>
                                                </div>
                                            </h6>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
                @break
                @case("sec")
                @foreach($rec_videos->chunk(4) as $chunk)
                    <div class="row mt-4">
                        @foreach($chunk as $video)
                            <div class="col-md-3 col-12" style="padding: 5px;">
                                <div class="card">
                                    <a href="{{url('/student/video/'. $video->vid_id . '?options=uni')}}">
                                        <img src="{{asset("images/logo.png")}}" class="card-img-top"  alt="No Video">


                                        {{--                                    <img src="{{asset('myapp/storage/'. $video->coverPhoto)}}" class="card-img-top"--}}
                                        <div class="card-body">
                                            <h6 class="card-title">
                                                <div class="row ml-3 mb-3 pt-3">
                                                    <img
                                                        src="{{asset(\App\Instructors::where('email', $video->instructor_email)->value('profile_pics'))}}"
                                                        class=" mr-3" alt=""
                                                        style="border-radius:50%;  width: 50px; height:50px;">
                                                    <div class="d-flex flex-column mt-2">
                                                        <h6 class="no-padding">
                                                            {{\App\Instructors::where('email', $video->instructor_email)->value('username')}}
                                                        </h6>
                                                        <p class="mt-1">
                                                            {{ substr($video->title, 0, 15)}}...
                                                        </p>
                                                    </div>
                                                </div>
                                            </h6>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
                @break
                @case("others")
                @foreach($rec_videos->chunk(4) as $chunk)
                    <div class="row mt-4">
                        @foreach($chunk as $video)
                            <div class="col-md-3 col-12" style="padding: 5px;">
                                <div class="card">
                                    <a href="{{url('/student/video/'. $video->vid_id . '?options=uni')}}">
                                        {{--                                    <img src="{{asset('myapp/storage/'. $video->cover_photo)}}" class="card-img-top"--}}
                                        <img src="{{asset('images/logo.png')}}" class="card-img-top" alt="No Video">
                                        <div class="card-body">
                                            <h6 class="card-title">
                                                <div class="row ml-3 mb-3 pt-3">
                                                    <img
                                                        src="{{asset(\App\Instructors::where('email', $video->instructor_email)->value('profile_pics'))}}"
                                                        class=" mr-3" alt=""
                                                        style="border-radius:50%;  width: 50px; height:50px;">
                                                    <div class="d-flex flex-column mt-2">
                                                        <h6 class="no-padding">
                                                            {{\App\Instructors::where('email', $video->instructor_email)->value('username')}}
                                                        </h6>
                                                        <p class="mt-1">
                                                            {{ substr($video->title, 0, 15)}}...
                                                        </p>
                                                    </div>
                                                </div>
                                            </h6>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
                @break
            @endswitch
    </div>
    </div>
@endsection
