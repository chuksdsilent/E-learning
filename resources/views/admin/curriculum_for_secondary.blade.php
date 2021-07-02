@extends('admin.partials.layout')
@section('title', 'Curriculum')
@section('content')
    <div class="wrapper">
        <div class="container">
            <div class="card card-modify" style="overflow: auto;">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="text-white">Curriculum For Secondary</h4>
                        </div>
                    </div>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name </th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th scope="row">1</th>
                        <td>
                            <a href="{{route('admin.faculties')}}">University of Nigeria Nsukka</a>
                        </td>
                        <td>
                            <a href="#" class="btn btn-primary"   data-toggle="modal" data-target="#edit">
                                <i class="fa fa-edit"></i>
                            </a>                            
                            <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="exampleModalLabel">Edit Curriculum</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="" method="post">
                                            <div class="form-group">
                                                <label for="">Name</label>
                                                <input type="text" name="name" id="secondary-school" class="form-control">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-primary">Update</button>
                                    </div>
                                    </div>
                                </div>
                            </div>            
                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#delete">
                                <i class="fa fa-trash"></i>
                            </a>                            
                            <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content"> 
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLabel"> <i class="fa fa-warning"></i> Delete</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-danger">Delete</button>
                                    </div>
                                    </div>
                                </div>
                            </div>            
                        </td>
                        </tr>
                        <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>@fat</td>
                        </tr>
                        <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>@twitter</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection