@extends('admin.partials.layout')
@section('content')
    <style>
        .card {
            height: auto !important;
        }
    </style>
    <div class="wrapper">
        <div class="create-school">
            <div class="container">
                @if(Session::has('sucess_msg'))
                    <div class="alert alert-success">{{Session::get('sucess_msg')}}</div>
                @endif
                <div class="card">
                    <h3> {{ $name }}</h3>
                    <hr>
                    <form action="{{ url('admin/create-other-institution-courses') }}" method="post">
                        @csrf
                        <input type="hidden" name="school_type" value="{{ $school_type }}">
                        <input type="hidden" name="noOfYears" value="{{$noOfYears}}">
                        <input type="hidden" name="name" value="{{$name}}">
                        @for($i=1; $i<= $noOfYears; $i++)
                            <label for="" class="ml-2">{{$i}}00 Level</label>
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

                        @endfor
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
