@extends('student.partials.layout')
@section('title', 'Recent Videos')
@section('content')
    <style>
        .wrapper-searched-videos,
        .wrapper-searched-videos h6 {
            font-size: 13px;
        }
         img{
             height: 150px;
             width: 100%;
             object-fit: cover;
         }
    </style>
    <div class="wrapper-searched-videos ml-5 mr-5 mt-4">
        <h4>Recent Videos</h4>
        <div class="search-videos">
            <?php $options = Auth::user()->institution; ?>

                
                    @if(count($likedCourses) > 0)

                    @foreach ($likedCourses as $item)
                    <a href="{{url('student/video/'. $item->vid_id)}}" style="color: black; display: block">
                        <div class="row">
                            <div class="col-md-3 col-6 col-sm-3 col-lg-3 col-xs-3 no-padding no-margin ">
                                <img src="{{asset('images/ones.png')}}" class="card-img-top mt-3" alt="No Video">
                            </div>
                            <div class="col-md-9 col-6 col-sm-9 col-lg-9 col-xs-9 pt-4">
                                <h4>{{$item->title}}</h4>
                                <h6>{{\App\User::where('email', $item->instructor_email)->value('username')}} |
                                    {{\Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</h6>
                                <p>{{ \App\VideoViewsLikes::where('vid_id', $item->vid_id)->where('thumbs_up', 1)->count()}}
                                    likes
                                    {{ \App\VideoViewsLikes::where('vid_id', $item->vid_id)->where('views', 1)->count()}}
                                    views</p>
                                <p class="mt-3 desc">{{ substr($item->description, 0, 20) }}...</p>
                            </div>

                        </div>
                    </a>
                @endforeach

                    @else
                        @include('student.partials.not_found')
                    @endif
        </div>
    </div>
@endsection
