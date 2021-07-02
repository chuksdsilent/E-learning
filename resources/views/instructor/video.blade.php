@extends('instructor.partials.layout')
@section('title', 'Videos')
@section('content')
    <div class="col-md-9 no-padding no-margin"  style="min-width: 80%;">
        <div class="black-background set-height">
            <div class="row py-5">
                @if($options == "others")
                    <div class="col-md-8 col-12 col-sm-12 col-xs-12 col-lg-8">
                        <video controls>
                            <source
                                src="{{asset('myapp/storage/'. \App\Videos::where('vid_id', $vid_id)->value('video_path'))}}"
                                type="video/mp4">
                            <source src="movie.ogg" type="video/ogg">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    <div class="col-md-4 col-12 col-sm-12 col-xs-12 col-lg-4">
                        <h5 class="mt-5">Title</h4>
                            <h6>{{ \App\Videos::where('vid_id', $vid_id)->value('title')}}</h6>
                            <h5 class="mt-4">Overview</h5>
                            <h6 class="mb-5">{{ \App\Videos::where('vid_id', $vid_id)->value('description')}}</h6>

                            <span
                                class="mr-4">Views: {{\App\Videos::where('views', 1)->where('vid_id', $vid_id)->count()}}</span>
                            <span
                                class="mr-4">Likes: {{\App\OtherInstitutionViewsLikes::where('thumbs_up', 1)->where('vid_id', $vid_id)->count()}}</span>
                            <span
                                class="mr-4">Dislikes: {{\App\OtherInstitutionViewsLikes::where('thumbs_down', 1)->where('vid_id', $vid_id)->count()}}</span>

                            @elseif($options == "sec")
                                <div class="col-md-8 col-12 col-sm-12 col-xs-12 col-lg-8">
                                    <video controls>
                                        <source
                                            src="{{asset('myapp/storage/'. \App\Videos::where('vid_id', $vid_id)->value('secVideos'))}}"
                                            type="video/mp4">
                                        <source src="movie.ogg" type="video/ogg">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                                <div class="col-md-4 col-12 col-sm-12 col-xs-12 col-lg-4">
                                    <h5 class="mt-5">Title</h4>
                                        <h6>{{ \App\Videos::where('vid_id', $vid_id)->value('title')}}</h6>
                                        <h5 class="mt-4">Overview</h5>
                                        <h6 class="mb-5">{{ \App\Videos::where('vid_id', $vid_id)->value('description')}}</h6>

                                        <span
                                            class="mr-4">Views: {{\App\SecVideoViewsLikes::where('views', 1)->where('vid_id', $vid_id)->count()}}</span>
                                        <span
                                            class="mr-4">Likes: {{\App\SecVideoViewsLikes::where('thumbs_up', 1)->where('vid_id', $vid_id)->count()}}</span>
                                        <span
                                            class="mr-4">Dislikes: {{\App\SecVideoViewsLikes::where('thumbs_down', 1)->where('vid_id', $vid_id)->count()}}</span>
                                        @else
                                            <div class="col-md-8 col-12 col-sm-12 col-xs-12 col-lg-8">
                                                <video controls>
                                                    <source
                                                        src="{{asset('myapp/storage/'. \App\Video::where('vid_id', $vid_id)->value('vid_path'))}}"
                                                        type="video/mp4">
                                                    <source src="movie.ogg" type="video/ogg">
                                                    Your browser does not support the video tag.
                                                </video>
                                            </div>
                                            <div class="col-md-4 col-12 col-sm-12 col-xs-12 col-lg-4">
                                                <h5 class="mt-5">Title</h4>
                                                    <h6>{{ \App\Videos::where('vid_id', $vid_id)->value('title')}}</h6>
                                                    <h5 class="mt-4">Overview</h5>
                                                    <h6 class="mb-5">{{ \App\Videos::where('vid_id', $vid_id)->value('description')}}</h6>
                                                    <span
                                                        class="mr-4">Views: {{\App\VideoViewsLikes::where('views', 1)->where('vid_id', $vid_id)->count()}}</span>
                                                    <span
                                                        class="mr-4">Likes: {{\App\VideoViewsLikes::where('thumbs_up', 1)->where('vid_id', $vid_id)->count()}}</span>
                                                    <span
                                                        class="mr-4">Dislikes: {{\App\VideoViewsLikes::where('thumbs_down', 1)->where('vid_id', $vid_id)->count()}}</span>
                                            </div>
                                    @endif
                                </div>
                    </div>
                    <div class="container-fluid mt-5 ml-3">
                        <h4>Comments</h4>
                        @foreach($videoComment as $comment)
                            <h6 class="mb-3">{{ $comment->comment }}</h6>
                        @endforeach
                    </div>
            </div>
@endsection
