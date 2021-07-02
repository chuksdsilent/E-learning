@extends('student.partials.layout')
@section('title', 'Trending')
@section('content')
    <style>
        img{
            height: 150px;
            width: 100%;
            object-fit: cover;
        }
    </style>
<div class="col-md-12 trending" style="padding: 0px;">
    <div class="student-videos-wrapper mx-3">
        <h2 class="mb-3">
            Trending
        </h2>

    </div>
    <?php $options = Auth::user()->institution; ?>

    @switch($options)
        @case("others")
        @foreach($rec_videos->chunk(4) as $chunk)
            <div class="row mt-4 ml-5">
                @foreach($chunk as $video)
                    <div class="col-md-3 col-12" style="padding: 5px;">
                        <div class="card">
                            <a href="{{url('/student/video/'. $video->vid_id)}}">

                                <img src="{{asset('myapp/storage/'. $video->cover_photo)}}" class="card-img-top" alt="No Video">
                                <div class="card-body">
                                    <div class="row my-3">
                                        <img src="{{asset($video->profile_pics)}}" class="mx-3" alt=""
                                             style="border-radius:50%;  width: 50px; height:50px;">
                                        <div class="d-flex flex-column pt-1">
                                            <h6 class="no-padding no-margin title">
                                                {{\App\Instructors::where('email', $video->instructor_email)->value('username')}}
                                            </h6>
                                            <p class="mt-1">
                                                {{ $video->title}}
                                            </p>

                                        </div>
                                    </div>
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
            <div class="row mt-4 ml-5">
                @foreach($chunk as $video)
                    <div class="col-md-3 col-12" style="padding: 5px;">
                        <div class="card">
                            <a href="{{url('/student/video/'. $video->vid_id)}}">
                                <img src="{{asset('myapp/storage/'. $video->coverPhoto)}}" class="card-img-top" alt="No Video">
                                <div class="card-body">
                                    <div class="row my-3">
                                        <img src="{{asset($video->profile_pics)}}" class="mx-3" alt=""
                                             style="border-radius:50%;  width: 50px; height:50px;">
                                        <div class="d-flex flex-column pt-1">
                                            <h6 class="no-padding no-margin title">
                                                {{\App\Instructors::where('email', $video->instructor_email)->value('username')}}
                                            </h6>
                                            <p class="mt-1">
                                                {{ $video->title}}
                                            </p>

                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
        @break
        @case("uni")
        @foreach($rec_videos->chunk(4) as $chunk)
            <div class="row mt-4 ml-5">
                @foreach($chunk as $video)
                    <div class="col-md-3 col-12" style="padding: 5px;">
                        <div class="card">
                            <a href="{{url('/student/video/'. $video->vid_id)}}">
                                <img src="{{asset('myapp/storage/'. $video->cover_photo)}}" class="card-img-top" alt="No Video">
                                <div class="card-body">
                                    <div class="row my-3">
                                        <img src="{{asset($video->profile_pics)}}" class="mx-3" alt=""
                                             style="border-radius:50%;  width: 50px; height:50px;">
                                        <div class="d-flex flex-column pt-1">
                                            <h6 class="no-padding no-margin title">
                                                {{\App\Instructors::where('email', $video->instructor_email)->value('username')}}
                                            </h6>
                                            <p class="mt-1">
                                                {{ $video->title}}
                                            </p>

                                        </div>
                                    </div>
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
