@extends('admin.partials.layout')
@section('title', 'Deparments')
@section('content')
<div class="wrapper">
    <div class="container">
        <div class="card card-modify" style="overflow: auto;">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="text-white">Secondary Schools</h4>
                    </div>
                    <div class="col-md-6 d-flex flex-row-reverse">
                        <button class="btn header-btn-primary"  data-toggle="modal" data-target="#create-faculty">
                            Create School
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="create-faculty" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form action="{{url('admin/subjects')}}">
                    @csrf
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="exampleModalLabel">Create Subject</h4>
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
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary">Create</button>
                        </div>
                        </div>
                    </div>                
                </form>
            </div>                
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Subject Name</th>
                    <th scope="col">Number of Videos</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row">1</th>
                    <td>
                        
                    </td>
                    <td>4</td>
                    <td>                        
                    <a href="#" class="btn btn-primary"   data-toggle="modal" data-target="#edit">
                            <i class="fa fa-edit"></i>
                        </a>                            
                        <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <form action="{{url('admin/subjects/update')}}">
                                @csrf
                                @method('PATCH')
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="exampleModalLabel">Edit School Name</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Name</label>
                                            <input type="text" name="name" id="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-primary">Update</button>
                                    </div>
                                    </div>
                                </div>
                            </form>
                        </div>            
                        <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#delete">
                            <i class="fa fa-trash"></i>
                        </a>                            
                        <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <form action="{{url('admin/subjects/delete')}}">
                                @csrf
                                @method('DELETE')
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
                            
                            </form>
                        </div>         
                    </td>
                    </tr>
                    <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>3</td>
                    <td>@fat</td>
                    </tr>
                    <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>1</td>
                    <td>@twitter</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection