@extends('instructor.partials.layout')
@section('title', 'Videos')
@section('content')
<style>
    tr td {
        font-size: 14px;
    }

</style>
<div class="col-md-9" style="min-width: 80%;">
    <div class="card mt-4 px-3 py-3" style="overflow: auto;">
        <h3 class="mt-3 mx-5"> <i class="fas fa-video"></i>Videos</h3>
        <hr />
        <div class="table">
            <table class="table table-striped hover" id="videos">
                <thead>
                    <th>S/N</th>
                    <th>Title</th>
                    <th>Course</th>
                    <th>Subject</th>
                    <th>Total Views</th>
                    <th>Published</th>
                </thead>
                <tbody>
                    <?php $i=1; ?>
                    @foreach ($videost as $item)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>

                            @if($item->status == "U")
                                <a href="{{url('instructor/video/'. $item->vid_id)}}?options=uni">{{$item->title}}</a>

                            @elseif($item->status == "O")
                                <a href="{{url('instructor/video/'. $item->vid_id)}}?options=others">{{$item->title}}</a>

                            @elseif($item->status == "S")
                                <a href="{{url('instructor/video/'. $item->vid_id)}}?options=sec">{{$item->title}}</a>

                            @endif
                        </td>
                        <td>

                            @if($item->status == "U")
                                {{\App\Courses::where('course_id', $item->course_id)->value('name')}}

                            @elseif($item->status == "O")
                                {{\App\OtherInstitutionCourses::where('course_id', $item->course_id)->value('course_name')}}
                            @endif
                        </td>
                        <td>
                            @if($item->status == "S")
                                {{\App\Subjects::where('sub_id', $item->subject_id)->value('name')}}

                            @endif
                        </td>
                        <td>{{ \App\VideoViewsLikes::where('vid_id', $item->vid_id)->where('views', 1)->count() }}</td>
                        <td>
                            {!! $item->publish == 1 ? "<i class='fas fa-check'></i>" : "No" !!}
                        </td>
{{--                        <td>--}}
{{--                            <a href="{{url('instructor/video/edit/'.$item->vid_id)}}"><i class="fa fa-edit"></i></a>--}}
{{--                        </td>--}}
                    </tr>

                    @endforeach
                </tbody>
            </table>

        </div>

    </div>
</div>
</div>
<script src="{{asset('libraries/jquery-3.4.1.min.js')}}"></script>

<script>
    $(document).ready(function () {
        $("#myTab a").click(function (e) {
            e.preventDefault();
            $(this).tab('show');
        });
    });
    $(".nav-tabs li").hover(
        function () {
            $(this).addClass('active');
        }
    );
    $(".nav-tabs li").mouseout(
        function () {
            $(this).removeClass('active');
        }
    );

    $(".nav-tabs li").click(
        function () {
            $(".nav-tabs li").removeClass('active-border');
            $(this).addClass('active-border');
        }
    );

</script>
@endsection
