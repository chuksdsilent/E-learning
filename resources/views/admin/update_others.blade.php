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
                <div class="card">
                    <h6>Create Institution</h6>
                    <hr>
                    <form action="{{route('admin.others.create')}}" method="post">
                        <input type="hidden" name="update" value="y">
                        @csrf
                            <div class="form-group">
                                <label for="">Institution</label>
                                <select name="institution_type_id" id="" class="form-control">
                                    <option value="">Select Institution</option>
                                    @foreach($institutions as $institution)
                                        <option value="{{$institution->institution_type_id}}">{{$institution->institution_type}}</option>
                                    @endforeach
                                </select>
                            </div>
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" id="university" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">No of Years</label>
                            <input type="text" name="no_of_years" class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
