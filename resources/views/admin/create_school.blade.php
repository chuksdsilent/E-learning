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
                            <a href="{{route('admin.university.panel')}}">
                                <img src="{{asset('images/sitting.jpg')}}" alt="">
                                <h5>University</h5>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card no-padding">
                            <a href="#" data-toggle="modal" data-target="#secondary-school">
                                <img src="{{asset('images/sitting.jpg')}}" alt="">
                                <h5>Secondary School</h5>
                            </a>
                        </div>
                    </div>
                    <form action="{{route('admin.secondary.create')}}" method="post">
                        @csrf
                        <div class="modal fade" id="secondary-school" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLabel">Create Secondary School</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="">Name</label>
                                            <input type="text" name="name" id="secondary-school" class="form-control">
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
                            <a href="{{route('admin.institution.panel')}}">
                                <img src="{{asset('images/sitting.jpg')}}" alt="">
                                <h5>Other Institutions</h5>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
