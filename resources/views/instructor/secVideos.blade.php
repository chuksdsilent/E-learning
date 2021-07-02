@extends('instructor.partials.layout')
@section('title', 'Sec. Videos')
@section('content')
    <style>
        tr td {
            font-size: 14px;
        }

        a:hover {
            font-size: 10 pxx;

            color: gold;
        }
    </style>
    <div class="col-md-9"  style="min-width: 80%;">
        <div class="card mt-4 px-3 py-3" style="overflow: auto;">
            <h3 class="mt-3 mx-5"><i class="fas fa-video"></i> Secondary School Videos</h3>
            <hr/>
            <div class="table">
                <table class="table table-striped hover" id="videos">
                    <thead>
                    <th>S/N</th>
                    <th>Title</th>
                    <th>Total Views</th>
                    <th>Total Likes</th>
                    <th>Total Dislikes</th>
                    <th>Published</th>
                    <th>Date Posted</th>
                    <th>View</th>
                    <th>Actions</th>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>
                    @foreach ($videost as $item)
                        <tr>
                            <td>{{$i++}}</td>
                            <td><a href="{{url('instructor/video/'. $item->vid_id .'?options=sec')}}">{{$item->title}}</a></td>
                            <td>{{ \App\VideoViewsLikes::where('vid_id', $item->vid_id)->where('views', 1)->count() }}</td>
                            <td>{{ \App\VideoViewsLikes::where('vid_id', $item->vid_id)->where('thumbs_up', 1)->count() }}
                            </td>
                            <td>{{ \App\VideoViewsLikes::where('vid_id', $item->vid_id)->where('thumbs_down', 1)->count() }}
                            </td>
                            <td>
                                {!! $item->publish == 1 ? "<i class='fas fa-check'></i>" : "No" !!}
                            </td>
                            <td> {{\ Carbon\Carbon::parse($item->created_at)->format("d M, Y") }} </td>
                            <td><a href="{{url('instructor/video/'. $item->vid_id .'?options=sec')}}"> <i class="fas fa-eye"></i></td>
                            <td>
                                <a href="{{url('instructor/video/edit/'.$item->vid_id .'?options=sec')}}"><i class="fa fa-edit"></i></a>
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>

            </div>

        </div>
@endsection
