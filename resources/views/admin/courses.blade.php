@extends('admin.partials.layout')
@section('title', 'Universities')
@section('content')
<div class="col-md-12">
    <div class="card mt-4 px-3 py-3" style="overflow: auto;">
        <div class="row">
            <div class="col-md-6">
                <h3 class="mt-3 mx-5"> <i class="fas fa-school"></i> Courses</h4>
                </h3>
            </div>
            <div class="col-md-6 d-flex flex-row-reverse">
                <button class="btn header-btn" data-toggle="modal" data-target="#create-university">
                    Create Course
                </button>
            </div>
        </div>

        <hr />
        <div class="modal fade" id="create-university" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <form action="{{route('admin.courses.create')}}" method="post">
                @csrf
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="exampleModalLabel">Create Course</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">University</label>
                                <select name="uni_id" id="course_uni_id" class="form-control">
                                    <option value="">Select University</option>
                                    @foreach ($universities as $item)
                                    <option value="{{$item->uni_id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Faculty</label>
                                <select name="fac_id" id="course_fac_id" class="form-control">
                                    <option value="">Select Faculty</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="dept_id">Department</label>
                                <select name="dept_id" id="course_dept_id" class="form-control">
                                    <option value="">Select Department</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Level</label>
                                <select name="level" id="level" class="form-control">
                                    <option value="">Select Level</option>
                                    <option value="1">100</option>
                                    <option value="2">200</option>
                                    <option value="3">300</option>
                                    <option value="4">400</option>
                                    <option value="5">500</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="dept_id">Course Code</label>
                                <input type="text" name="course_code" id="notice" class="form-control">
                                <span class="text-danger" id="show-notice">Separate with commas</span>
                            </div>
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" id="notice" class="form-control">
                                <span class="text-danger" id="code-notice">Course Code and Course Name must be equal</span>

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
                    <th scope="col">Course Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i= 1; ?>

                @foreach ($courses as $course)
                <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>
                        <a href="{{ url('admin/topics/'.$course->course_id)}}">{{$course->name}}</a>
                    </td>
                    <td>
                        <a href="#" class="btn btn-primary" data-toggle="modal"
                            data-target="#edit-{{$course->course_id}}">
                            <i class="fa fa-edit"></i>
                        </a>
                        <div class="modal fade" id="edit-{{$course->course_id}}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <form action="{{url('admin/courses/update/'. $course->course_id)}}" method="post">
                                @method('PATCH')
                                @csrf
                                <input type="hidden" name="dept_id" value="{{$course->dept_id}}">
                                <input type="hidden" name="uni_id" value="{{$course->uni_id}}">
                                <input type="hidden" name="fac_id" value="{{$course->fac_id}}">
                                <input type="hidden" name="id" value="{{$course->id}}">
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
                                                <input type="text" name="name" value="{{$course->name}}"
                                                    id="secondary-school" class="form-control">
                                                <div class="form-group">
                                                    <label for="">Course Code</label>
                                                    <input type="text" name="course_code" value="{{$course->course_code}}"
                                                           id="secondary-school" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Level</label>
                                                    <select name="level" id="" class="form-control">
                                                        <option value="1">100</option>
                                                        <option value="2">200</option>
                                                        <option value="3">300</option>
                                                        <option value="4">400</option>
                                                        <option value="5">500</option>
                                                        <option value="6">600</option>
                                                        <option value="7">700</option>
                                                    </select>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </form>>
                        </div>
                        <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#delete">
                            <i class="fa fa-trash"></i>
                        </a>
                        <div class="modal fade" id="delete" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <form action="{{url('admin/courses/delete/'. $course->course_id)}}" method="post">
                                @method('DELETE')
                                @csrf
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
        </tbody>
        </table>
    </div>
</div>
</div>
@endsection
