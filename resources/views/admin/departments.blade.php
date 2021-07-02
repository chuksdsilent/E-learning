@extends('admin.partials.layout')
@section('title', 'Deparments')
@section('content')
<div class="col-md-12">
    <div class="card mt-4 px-3 py-3" style="overflow: auto;">
        <div class="row">
            <div class="col-md-6">
                <h3 class="mt-3 mx-5"> <i class="fas fa-school"></i> Deparments</h4>
                </h3>
            </div>
            <div class="col-md-6 d-flex flex-row-reverse">
                <button class="btn header-btn" data-toggle="modal" data-target="#create-department">
                    Create Department
                </button>
            </div>
        </div>

        <hr />
        <form action="{{route('admin.department.create')}}" method="post">
            @csrf()
            <div class="modal fade" id="create-department" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="exampleModalLabel">Create Department</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="universities">Universities</label>
                                <select name="uni_id" id="uni" class="form-control">
                                    <option value="">Select University</option>
                                    @foreach ($universities as $item)
                                    <option value="{{$item->uni_id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="universities">Faculties</label>
                                <select name="fac_id" id="fac_id" class="form-control">
                                    <option>Select Faculty</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" id="notice" class="form-control">
                                <span id="show-notice" class="text-danger">Separate with commas</span>
                            </div>
                            <div class="form-group">
                                <label for="">Level</label>
                                <Select class="form-control" name="level">
                                    <option value="1">100</option>
                                    <option value="2">200</option>
                                    <option value="3">300</option>
                                    <option value="4">400</option>
                                    <option value="5">500</option>
                                    <option value="6">600</option>
                                    <option value="7">700</option>
                                </Select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        @if ($departments->count() > 0)
        <table class="table table-striped" id="videos">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Department Name</th>
                    <th>Number of Courses</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @if ($departments->count() > 0)
                @foreach ($departments as $department)
                <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>
                        <a href="{{url('admin/courses/'. $department->dept_id)}}">{{ $department->name }}</a>
                    </td>
                    <td>{{ $department->courses->count() }}</td>
                    <td>
                        <a href="#" class="btn btn-primary" data-toggle="modal"
                            data-target="#edit-{{$department->dept_id}}">
                            <i class="fa fa-edit"></i>
                        </a>
                        <div class="modal fade" id="edit-{{$department->dept_id}}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">

                            <form action="{{url('admin/departments/update/'.$department->dept_id)}}" method="post">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="fac_id" value="{{$department->fac_id}}">
                                <input type="hidden" name="uni_id" value="{{$department->uni_id}}">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel">Edit Department</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                                <div class="form-group">
                                                    <label for="">Name</label>
                                                    <input type="text" name="name" id="" value="{{ $department->name }}"
                                                        class="form-control">
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

                        <a href="#" class="btn btn-danger" data-toggle="modal"
                            data-target="#delete-{{$department->dept_id}}">
                            <i class="fa fa-trash"></i>
                        </a>
                        <form action="{{url('admin/departments/delete/'. $department->dept_id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <div class="modal fade" id="delete-{{$department->dept_id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            </div>
                        </form>
                    </td>
                </tr>

                @endforeach

                @else
                <td colspan="4">
                    @include('admin.partials.no_record')
                </td>
                @endif
            </tbody>
        </table>
        @else
        @include('admin.partials.no_record')
        @endif
        </tbody>
        </table>
    </div>
</div>

@endsection
