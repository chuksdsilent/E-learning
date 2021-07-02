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
                @if (Session::has('success_msg'))
                    <div class="alert alert-success">
                        <i class="fa fa-check-circle" aria-hidden="true"></i>
                        {{ Session::get('success_msg')}}</div>
                @endif
                <h1>Create</h1>

                <div class="row mt-5">
                    <div class="col-md-6">
                        <div class="card no-padding">
                            <a href="#" data-toggle="modal" data-target="#create-others">
                                <img src="{{asset('images/sitting.jpg')}}" alt="">
                                <h5>Institution</h5>
                            </a>
                        </div>
                    </div>
                    <form action="{{route('admin.others.create')}}" method="get">
                        <input type="hidden" name="update" value="n">
                        @csrf
                        <div class="modal fade" id="create-others" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLabel">Create Institution</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="">Name</label>
                                            <input type="text" name="name" id="university" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">No of Years</label>
                                            <input type="text" name="no_of_years" class="form-control">
                                        </div>
                                        <div class="row">
                                            <span class="mr-2" style="font-size: 12px;">Have you created school </span><a href="{{url('admin/update-others')}}" style="font-size: 12px; color: black;">Click here</a>
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
        </div>
    </div>
@endsection
