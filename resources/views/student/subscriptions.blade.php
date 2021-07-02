@extends('student.partials.layout')
@section('title', 'Subscriptions')
@section('content')
<div class="col-md-10" style="padding: 0px;">
    <div class="student-videos-wrapper mt-3 mx-3">
        <h2>Subscriptions</h2>
        @foreach($rec_videos->chunk(4) as $chunk)
            <div class="row mt-4">
                @foreach($chunk as $video)
                    <div class="col-md-3 col-12" style="padding: 5px;">
                        <div class="card">
                            <a href="{{url('/student/video/'. $video->vid_id)}}">
                                <img src="{{asset('images/sitting.jpg')}}" class="card-img-top" alt="No Video">
                                <div class="card-body">
                                    <h6 class="card-title">
                                        <div class="row">
                                            <div class="col-md-2 col-3 no-padding no-margin">
                                                <img src="{{asset('images/sitting.jpg')}}" class="no-padding no-margin mt-3"  alt="" style="border-radius:50%;  width: 50px; height:50px;">
                                            </div>
                                            <div class="col-md-10 col-9">
                                                <h6 class="no-padding">
                                                    {{ $video->title}}  
                                                </h6>                 
                                                <p class="mt-1">
                                                    {{\App\Instructors::where('user_id', $video->user_id)->value('acazone_name')}}
                                                </p>                   
                                                <p class="mt-1 mb-4">
                                                   1200k Views {{\Carbon\Carbon::parse($video->created_at)->diffforHumans()}}
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
    </div>

</div>
@endsection