@extends('instructor.partials.layout')
@section('title', 'Videos')
@section('content')

    <style>
        img {
            height: 70px;
            width: 100%;
            object-fit: cover;
        }
        video::-internal-media-controls-download-button {
            display:none;
        }

        video::-webkit-media-controls-enclosure {
            overflow:hidden;
        }

        video::-webkit-media-controls-panel {
            width: calc(100% + 30px); /* Adjust as needed */
        }

    </style>
    <div class="col-md-9 no-padding no-margin"  style="min-width: 80%;">
        <div class="black-background set-height">
            <div class="row py-5">
                @if($options == "others")
                    <div class="col-md-8 col-12 col-sm-12 col-xs-12 col-lg-8">
                        <video controls>
                            <source
                                src="{{asset('myapp/storage/'. \App\Videos::where('vid_id', $vid_id)->value('vid_path'))}}"
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
                                class="mr-4">Views: {{\App\OtherInstitutionViewsLikes::where('views', 1)->where('vid_id', $vid_id)->count()}}</span>
                            <span
                                class="mr-4">Likes: {{\App\OtherInstitutionViewsLikes::where('thumbs_up', 1)->where('vid_id', $vid_id)->count()}}</span>
                            <span
                                class="mr-4">Dislikes: {{\App\OtherInstitutionViewsLikes::where('thumbs_down', 1)->where('vid_id', $vid_id)->count()}}</span>
                            <div>

                            </div>

                            <input type="text" id="link2" class="form-control mt-3" value = "https://acadazone.com/student/video/{{$vid_id}}" />
                            <button type="button" class="btn btn-primary mt-2" id="copy2">
                                Copy Video Link
                            </button>

                            <script>
                                var copyText2 = document.getElementById("copy2");
                                copyText2.addEventListener("click", function () {
                                    var copyText2 = document.getElementById("link2");
                                    var textArea2 = document.createElement("textarea");
                                    textArea2.value = copyText2.value;
                                    document.body.appendChild(textArea2);
                                    textArea2.select();
                                    document.execCommand("Copy");
                                    textArea2.remove();
                                    alert("Link Copied")
                                }, false);
                            </script>
                            @elseif($options == "sec")
                                <div class="col-md-8 col-12 col-sm-12 col-xs-12 col-lg-8">
                                    <video controls>
                                        <source
                                            src="{{asset('myapp/storage/'. \App\Videos::where('vid_id', $vid_id)->value('vid_path'))}}"
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

                                        <input type="text" id="link" class="form-control mt-3" value = "https://acadazone.com/student/video/{{$vid_id}}" />


                                        <button type="button" class="btn btn-primary mt-2" id="copy">
                                            Copy Video Link
                                        </button>

                                        <script>
                                            var copyText = document.getElementById("copy");
                                            copyText.addEventListener("click", function () {
                                                var copyText = document.getElementById("link");
                                                var textArea = document.createElement("textarea");

                                                textArea.value = copyText.value;
                                                document.body.appendChild(textArea);
                                                textArea.select();
                                                document.execCommand("Copy");
                                                textArea.remove();
                                                alert("Link Copied")
                                            }, false);
                                        </script>
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
                                                <h5 class="mt-5">Title</h5>
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

                                            <input type="text" id="link1" class="form-control mt-3" value = "https://acadazone.com/student/video/{{$vid_id}}" />
                                            <button type="button" class="btn btn-primary mt-2" id="copy1">
                                                Copy Video Link
                                            </button>

                                            <script>
                                                var copyText1 = document.getElementById("copy1");
                                                copyText1.addEventListener("click", function () {
                                                    var copyText1 = document.getElementById("link1");
                                                    var textArea1 = document.createElement("textarea");
                                                    textArea1.value = copyText1.value;
                                                    document.body.appendChild(textArea1);
                                                    textArea1.select();
                                                    document.execCommand("Copy");
                                                    textArea1.remove();
                                                    alert("Link Copied")
                                                }, false);
                                            </script>

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
