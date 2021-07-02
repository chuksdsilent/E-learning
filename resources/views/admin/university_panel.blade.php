@extends('admin.partials.layout')
@section('content')
    <div class="wrapper">
        <div class="create-school">
            <div class="container">
                @if ($errors->has('name'))
                    <div class="alert alert-danger">
                        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                        {{ $errors->first('name') }}</div>
                @endif
                @if (Session::has('sucess_msg'))
                    <div class="alert alert-success">
                        <i class="fa fa-check-circle" aria-hidden="true"></i>
                        {{ Session::get('sucess_msg')}}</div>
                @endif
                <h1>Create</h1>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card no-padding">
                            <a href="#" data-toggle="modal" data-target="#create-university">
                                <img src="{{asset('images/sitting.jpg')}}" alt="">
                                <h5>Universities</h5>
                            </a>
                        </div>
                    </div>
                    <form action="{{route('admin.university.create')}}" method="post">
                        @csrf
                        <div class="modal fade" id="create-university" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLabel">Create University</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="">Name</label>
                                            <input type="text" name="name" id="university" class="form-control">
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
                    <div class="col-md-6">
                        <div class="card no-padding">
                            <a href="#" data-toggle="modal" data-target="#create-faculty">
                                <img src="{{asset('images/sitting.jpg')}}" alt="">
                                <h5>Faculties</h5>
                            </a>
                        </div>
                    </div>
                    <form action="{{route('admin.faculties.create')}}" method="post">
                        @csrf()
                        <div class="modal fade" id="create-faculty" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLabel">Create Faculty</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="universities">Create Faculty</label>
                                            <select name="uni_id" id="universities" class="form-control">
                                                <option value="">Select University</option>
                                                @foreach ($universities as $university)
                                                    <option value="{{$university->uni_id}}"
                                                            name="uni_id">{{$university->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Name</label>
                                            <input type="text" name="name" class="form-control" id="notice">
                                            <span class="text-danger" id="show-notice">Separate with commas</span>
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
                <div class="row mt-5">
                    <div class="col-md-6">
                        <div class="card no-padding">
                            <a href="#" data-toggle="modal" data-target="#create-department">
                                <img src="{{asset('images/sitting.jpg')}}" alt="">
                                <h5>Departments</h5>
                            </a>
                        </div>
                    </div>
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
                                            <label for="">Level</label>
                                            <Select class="form-control" name="level">
                                                <option value="1">100</option>
                                                <option value="2">200</option>
                                                <option value="3">300</option>
                                                <option value="4">400</option>
                                                <option value="5">500</option>
                                                <option value="6">700</option>
                                                <option value="7">700</option>
                                            </Select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Name</label>
                                            <input type="text" name="name" id="notice" class="form-control">
                                            <span id="show-notice" class="text-danger">Separate with commas</span>
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
                    <div class="col-md-6">
                        <div class="card no-padding">
                            <a href="#" data-toggle="modal" data-target="#create-course">
                                <img src="{{asset('images/sitting.jpg')}}" alt="">
                                <h5>Courses</h5>
                            </a>

                            <div class="modal fade" id="create-course" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel"
                                 aria-hidden="true">
                                <form action="{{route('admin.courses.create')}}" method="post">
                                    @csrf
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel">Create Course</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
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
                                                        <option value="6">600</option>
                                                        <option value="7">700</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="dept_id">Course Code</label>
                                                    <input type="text" name="course_code" id="notice"
                                                           class="form-control">
                                                    <span class="text-danger"
                                                          id="show-notice">Separate with commas</span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Name</label>
                                                    <input type="text" name="name" id="notice" class="form-control">
                                                    <span class="text-danger" id="code-notice">Course Code and Course Name must be equal</span>

                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                    Cancel
                                                </button>
                                                <button type="submit" class="btn btn-primary">Create</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-6">
                        <div class="card no-padding">
                            <a href="#" data-toggle="modal" data-target="#create-topic">
                                <img src="{{asset('images/sitting.jpg')}}" alt="">
                                <h5>Title</h5>
                            </a>
                        </div>

                        <div class="modal fade" id="create-topic" tabindex="-1" role="dialog"
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
                                                <select name="uni_id" id="topic_uni_id" class="form-control">
                                                    <option value="">Select University</option>
                                                    @foreach ($universities as $item)
                                                        <option value="{{$item->uni_id}}">{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Faculty</label>
                                                <select name="fac_id" id="topic_fac_id" class="form-control">
                                                    <option value="">Select Faculty</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="dept_id">Department</label>
                                                <select name="dept_id" id="topic_dept_id" class="form-control">
                                                    <option value="">Select Department</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="dept_id">Courses</label>
                                                <select name="course_id" id="topic_course_id" class="form-control">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
