@extends('admin.partials.layout')
@section('title', 'Subjects')
@section('content')
    <div class="col-md-12">
        <div class="card mt-4 px-3 py-3" style="overflow: auto;">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="mt-3 mx-5"><i class="fas fa-book"></i> Topics</h3>
                </div>
                <div class="col-md-6 d-flex flex-row-reverse">
                    <button class="btn header-btn-primary" data-toggle="modal" data-target="#create-university">
                        Create Topic
                    </button>
                </div>
            </div>

            <hr/>
            <div class="modal fade" id="create-university" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <form action="{{url('admin/create-topic')}}" method="post">
                    @csrf
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLabel">Create Topic</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="subject">Subject</label>
                                    <select name="sub_id" id="" class="form-control">
                                        @foreach($subjects as $subject)
                                            <option value="{{$subject->sub_id}}">{{$subject->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" name="topic_name" id="secondary-school" class="form-control">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <table class="table table-striped" id="videos">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Topics Name</th>
                    <th>Number of Videos</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php  $i = 1; ?>
                @foreach ($topics as $topic)
                    <tr>
                        <th scope="row">{{$i++}}</th>
                        <td>
                            {{$topic->topic_name}}
                        </td>
                        <td>4</td>
                        <td>
                            <a href="#" class="btn btn-primary" data-toggle="modal"
                               data-target="#edit-{{$topic->topic_id}}">
                                <i class="fa fa-edit"></i>
                            </a>
                            <div class="modal fade" id="edit-{{$topic->topic_id}}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <form action="{{url('admin/topic/update/'. $topic->topic_name)}}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="topic_id" value="{{$topic->topic_id}}">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="exampleModalLabel">Edit Topic</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Name</label>
                                                    <input type="text" name="name" value="{{$topic->topic_name}}" id=""
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                        data-dismiss="modal">Cancel
                                                </button>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            {{--                                <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#{{$topic->topic_id}}">--}}
                            {{--                                    <i class="fa fa-trash"></i>--}}
                            {{--                                </a>--}}
                            <div class="modal fade" id="{{$topic->topic_id}}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <form action="{{url('admin/subjects/delete/'. $topic->topic_id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel"><i
                                                        class="fa fa-warning"></i>
                                                    Delete</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default"
                                                        data-dismiss="modal">Cancel
                                                </button>
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
    </div>
@endsection
