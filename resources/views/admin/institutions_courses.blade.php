@extends('admin.partials.layout')
@section('title', 'Universities')
@section('content')
    <div class="col-md-12">
        @if(Session::has('success_msg'))
        <div class="alert alert-success">{{Session::get('success_msg')}}</div>
        @endif
        <div class="card mt-4 px-3 py-3" style="overflow: auto;">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="mt-3 mx-5"> <i class="fas fa-school"></i>{{$institution}}</h3>
                </div>
                <div class="col-md-6" style="width: 100%;">
                    <div class="d-flex justify-content-end">
                        <div class="btn btn-primary mt-3"  data-toggle="modal" data-target="#topics">
                            Create Course
                        </div>
                    </div>
                    <form action="{{ url('admin/create-other-institution-courses') }}" method="post">
                        <input type="hidden" name="id" value="{{$inst_id}}">
                        <input type="hidden" name="update" value="Y">
                        @csrf
                        <div class="modal fade" id="topics" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLabel">Create Title</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">


                                        <div class="form-group">
                                            <label for="" class="ml-2">Course Codes</label>
                                            <input type="text" name="courses_codes[]" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="ml-2">Course Name</label>
                                            <input type="text" name="course_names[]" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="ml-2">Level</label>
                                            <input type="text" name="level[]" class="form-control">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel
                                        </button>
                                        <button type="submit" class="btn btn-primary">Create</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <hr />
            <table class="table table-striped" id="videos">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Institution Name</th>
                    <th>Level</th>
                    <th>Number of Topics</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php  $i=1; ?>
                    @foreach ($courses as $item)


                        <tr>
                            <th scope="row">{{ $i++ }}</th>
                            <td>
                                <a href="{{url('admin/institution/topic/'. $item->course_id)}}">({{$item->course_code}}) {{$item->course_name}}</a>
                            </td>
                            <td>{{$item->level}}</td>
                            <td>
                            {{\App\OtherInstitutionTopics::where('course_id', $item->course_id)->count()}}
                            <td>
                                <a href="{{url('admin/other-course/delete/'. $item->id)}}" class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#edit-{{$item->id}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <div class="modal fade" id="edit-{{$item->id}}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <form action="{{url('admin/institution/course/update/'. $item->course_id)}}" method="post">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="course_id" value="{{$item->course_id}}">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="exampleModalLabel">Edit Institution</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Name</label>
                                                        <input type="text" value="{{$item->course_name}}" name="name"
                                                               id="secondary-school" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Level</label>
                                                        <input type="text" value="{{$item->level}}" name="level"
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
