@extends('admin.partials.layout')
@section('title', 'Title')
@section('content')
    <div class="col-md-12">
        @if(Session::has('success_msg'))
            <div class="alert alert-success"><i class="fa fa-tick-circle"></i> {{Session::get('success_msg')}}</div>
        @endif
        <div class="card mt-4 px-3 py-3" style="overflow: auto;">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="mt-3 mx-5"> <i class="fas fa-school"> {{$course_name}} </i></h3>
                </div>
            </div>

            <hr />
            <table class="table table-striped" id="videos">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php  $i=1; ?>
                @foreach ($topics as $item)
                    <tr>
                        <th scope="row">{{ $i++ }}</th>
                        <td>
                            <a href="{{url('admin/institution/topic/'. $item->topic_id)}}">{{$item->name}}</a>
                        </td>
                        <td>
                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#edit-{{$item->id}}">
                                <i class="fa fa-edit"></i>
                            </a>
                            <div class="modal fade" id="edit-{{$item->id}}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <form action="{{url('admin/institution/topic/update/'. $item->topic_id)}}" method="post">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="topic_id" value="{{$item->topic_id}}">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="exampleModalLabel">Edit Title</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Name</label>
                                                    <input type="text" value="{{$item->name}}" name="name"
                                                           id="secondary-school" class="form-control">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                        data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            {{--                                <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#delete">--}}
                            {{--                                    <i class="fa fa-trash"></i>--}}
                            {{--                                </a>--}}
                            <form action="{{url('admin/universities/delete/'. $item->id)}}" method="post">
                                @method('DELETE')
                                @csrf
                                <div class="modal fade" id="delete" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel"> <i
                                                        class="fa fa-warning"></i> Delete</h4>
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
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
    </div>
@endsection
