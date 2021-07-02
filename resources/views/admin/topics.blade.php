@extends('admin.partials.layout')
@section('title', 'Topics')
@section('content')
    <div class="col-md-12">
        <div class="card mt-4 px-3 py-3" style="overflow: auto;">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="mt-3 mx-5"><i class="fas fa-school"></i> Topics</h4>
                    </h3>
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
                <form action="{{route('admin.topics.create')}}" method="post">
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
                                    <label for="">University</label>
                                    <select name="uni_id" id="uni_id" class="form-control">
                                        <option value="">Select University</option>
                                        @foreach ($universities as $item)
                                            <option value="{{$item->uni_id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Faculty</label>
                                    <select name="fac_id" id="fac_id" class="form-control">
                                        <option value="">Select Faculty</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="dept_id">Department</label>
                                    <select name="dept_id" id="dept_id" class="form-control">
                                        <option value="">Select Department</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="dept_id">Courses</label>
                                    <select name="course_id" id="course_id" class="form-control">
                                        <option value="">Select Course</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" name="name" id="notice" class="form-control">
                                    <span id="show-notice" class="text-danger">Separate with commas</span>
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
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1; ?>
                @if ($courses->count() > 0)
                    @foreach ($topics as $topic)
                        <tr>
                            <th scope="row">{{$i++}}</th>
                            <td>
                                {{$topic->name}}
                            </td>
                            <td>
                                <a href="#" class="btn btn-primary" data-toggle="modal"
                                   data-target="#edit-{{$topic->course_id}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <div class="modal fade" id="edit-{{$topic->course_id}}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <form action="{{url('admin/courses/update/'. $topic->course_id)}}" method="post">
                                        @method('PATCH')
                                        @csrf
                                        <input type="hidden" name="dept_id" value="{{$topic->dept_id}}">
                                        <input type="hidden" name="course_id" value="{{$topic->course_id}}">
                                        <input type="hidden" name="uni_id" value="{{$topic->uni_id}}">
                                        <input type="hidden" name="fac_id" value="{{$topic->fac_id}}">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="exampleModalLabel">Edit Course</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Name</label>
                                                        <input type="text" name="name" value="{{$topic->name}}"
                                                               id="secondary-school" class="form-control">
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
                                    >
                                </div>
                                <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#delete">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <div class="modal fade" id="delete" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <form action="{{url('admin/courses/delete/'. $topic->course_id)}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="exampleModalLabel"><i
                                                            class="fa fa-warning"></i> Delete</h4>
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
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            @include('admin.partials.no_record')
            @endif
            </tbody>
            </table>
        </div>

    </div>

    </div>
    <script src="{{asset('libraries/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('libraries/axios/axios.js')}}"></script>
    <script src="{{asset('libraries/axios/globalValues.js')}}"></script>
    <script src="{{asset('js/courses.js')}}"></script>
@endsection
