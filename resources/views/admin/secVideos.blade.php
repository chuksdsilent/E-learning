@extends('admin.partials.layout')
@section('title', 'Videos')
@section('content')
    <div class="col-md-12">
        <div class="ca">
            <div class="card mt-4 px-3 py-3" style="overflow: auto;">
                <h3 class="mt-3 mx-5"> <i class="fas fa-video"></i>Secondary School Videos</h3>
                <hr />
                <div class="table">
                    <table class="table table-striped hover" id="videos">
                        <thead>
                        <th>S/N</th>
                        <th>Title</th>
                        <th>Total Views</th>
                        <th>Total Likes</th>
                        <th>Total Dislikes</th>
                        <th>Date Posted</th>
                        <th>Action</th>
                        </thead>
                        <tbody>
                        <?php $i=1; ?>
                        @foreach ($videost as $item)
                            <tr>
                                <td>{{$i++}}</td>
                                <td> <a href="{{url('admin/video/'. $item->vid_id. '?options=sec')}}">{{$item->title}}</a> </td>
                                <td>{{ \App\SecVideoViewsLikes::where('vid_id', $item->vid_id)->where('views', 1)->count() }}
                                </td>
                                <td>{{ \App\SecVideoViewsLikes::where('vid_id', $item->vid_id)->where('thumbs_up', 1)->count() }}
                                </td>
                                <td>{{ \App\SecVideoViewsLikes::where('vid_id', $item->vid_id)->where('thumbs_down', 1)->count() }}
                                </td>
                                <td> {{\ Carbon\Carbon::parse($item->created_at)->format("d M, Y") }} </td>
                                <td>

                                    <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$item->id}}">
                                        Delete
                                    </a>
                                    <div class="modal fade" id="delete{{$item->id}}" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <form action="{{url('admin/videos/delete/'. $item->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="exampleModalLabel"> <i
                                                                class="fa fa-warning"></i>
                                                            Delete</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to delete?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default"
                                                                data-dismiss="modal">Cancel</button>
                                                        <a href="{{url('admin/videos/delete/'. $item->id)."?vid_path=".$item->vid_path."&vid_id=".$item->vid_id."&status=".$item->status}}" class="btn btn-danger">Delete</a>
                                                    </div>
                                                </div>
                                            </div>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
