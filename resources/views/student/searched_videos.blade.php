@extends('student.partials.layout')
@section('title', 'Searched Videos')
@section('content')
    <style>
        .wrapper-searched-videos, .wrapper-searched-videos h6 {
            font-size: 13px;
        }
    </style>
    <div class="wrapper-searched-videos ml-5 mr-5 mt-4">

        <div class="search-videos">
            @if(count($searchedCourses) > 0)
            @foreach ($searchedCourses as $item)
                <a href="{{url('student/video/'. $item->vid_id . '?options=uni')}}"
                   style="color: black; display: block">
                    <div class="row">
                        <div class="col-md-3 col-6 col-sm-3 col-lg-3 col-xs-3 no-padding no-margin ">
                            <?php $options = Auth::user()->institution; ?>
                            @switch($options)
                                @case("others")
                                <img
{{--                                    src="{{asset('myapp/storage/'. \App\OtherInstitutionVideos::where('vid_id',  $item->vid_id)->value('cover_photo')) }}"--}}
                                    src="{{asset('images/ones.png') }}"
style="height: 150px; object-fit: cover"

                                    class="card-img-top mt-3" alt="No Video">
                                @break
                                @case("sec")

                                    <img
{{--                                        src="{{asset('myapp/storage/'. \App\SecVideos::where('vid_id',  $item->vid_id)->value('coverPhoto')) }}"--}}
                                    src="{{asset('images/ones.png') }}"
style="height: 150px; object-fit: cover"

                                    class="card-img-top mt-3" alt="No Video">
                                @break
                                @case("uni")
                                <img
                                    src="{{asset('images/ones.png') }}"
                                    style="height: 150px; object-fit: cover"
{{--                                    src="{{asset('myapp/storage/'. \App\Videos::where('vid_id',  $item->vid_id)->value('cover_photo')) }}"--}}
                                class="card-img-top mt-3" alt="No Video">
                                @break
                            @endswitch
                        </div>
                        <div class="col-md-9 col-6 col-sm-9 col-lg-9 col-xs-9 pt-4">
                            <h4>{{$item->title}}</h4>
                            <h6>{{\App\User::where('email', $item->instructor_email)->value('username')}}
                                | {{\Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</h6>
                            @switch($options)
                                @case("others")

                                <p>{{ \App\OtherInstitutionViewsLikes::where('vid_id', $item->vid_id)->where('thumbs_up', 1)->count()}}
                                    likes
                                    {{ \App\OtherInstitutionViewsLikes::where('vid_id', $item->vid_id)->where('views', 1)->count()}}
                                    views</p>
                                @break
                                @case("sec")

                                <p>{{ \App\SecVideoViewsLikes::where('vid_id', $item->vid_id)->where('thumbs_up', 1)->count()}}
                                    likes
                                    {{ \App\SecVideoViewsLikes::where('vid_id', $item->vid_id)->where('views', 1)->count()}}
                                    views</p>
                                @break
                                @case("uni")

                                <p>{{ \App\VideoViewsLikes::where('vid_id', $item->vid_id)->where('thumbs_up', 1)->count()}}
                                    likes
                                    {{ \App\VideoViewsLikes::where('vid_id', $item->vid_id)->where('views', 1)->count()}}
                                    views</p>
                                @break
                            @endswitch


                            <p class="mt-3 desc">{{ substr($item->description, 0, 150) }}...</p>
                        </div>

                    </div>
                </a>
            @endforeach
            @else
                <h2 style="text-align: center; font-size: 50px;">
                    !No Result(s) Found
                </h2>
            @endif
        </div>
    </div>
@endsection
