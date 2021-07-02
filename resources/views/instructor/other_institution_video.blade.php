@extends('instructor.partials.layout')
@section('title', 'Videos')
@section('content')
    <div class="col-md-9">
        <div class="ca">
            <div class="card mt-4 px-3 py-3" style="overflow: auto;">
                <h3 class="mt-3 mx-5"> <i class="fas fa-video"></i>Other Institution Videos</h3>
                <hr />
                <div class="table">
                    <table class="table table-striped hover" id="videos">
                        <thead>
                        <th>S/N</th>
                        <th>Institution</th>
                        <th>Title</th>
                        <th>Total Views</th>
                        <th>Total Likes</th>
                        <th>Total Dislikes</th>
                        <th>Date Posted</th>
                        </thead>
                        <tbody>
                        <?php $i=1; ?>
                        @foreach ($otherInsVideos as $item)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{ \App\OtherInstitutions::where('institution_id', $item->institution_id)->value('institution_name') }}</td>
                                <td> <a href="{{url('admin/video/'. $item->vid_id. '?options=sec')}}">{{$item->title}}</a> </td>
                                <td>{{ \App\OtherInstitutionViewsLikes::where('vid_id', $item->vid_id)->where('views', 1)->count() }}
                                </td>
                                <td>{{ \App\OtherInstitutionViewsLikes::where('vid_id', $item->vid_id)->where('thumbs_up', 1)->count() }}
                                </td>
                                <td>{{ \App\OtherInstitutionViewsLikes::where('vid_id', $item->vid_id)->where('thumbs_down', 1)->count() }}
                                </td>
                                <td> {{\ Carbon\Carbon::parse($item->created_at)->format("d M, Y") }} </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
