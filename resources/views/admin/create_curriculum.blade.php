@extends('admin.partials.layout')
@section('title', 'Create Curriculum')
@section('content')
    <div class="wrapper">
        <div class="create-school">
            <div class="container">
                <h1>Create</h1>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <a href="#"  data-toggle="modal" data-target="#univeristy">
                                <img src="{{asset('images/sitting.jpg')}}" alt="">
                                <h5>Courses for University</h5>
                            </a>
                        </div>
                        <div class="modal fade" id="univeristy" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLabel">Create Course</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="" method="post">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="">Name</label>
                                                <input type="text" name="name" id="univeristy" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="">University</label>
                                                <select name="university" id="" class="form-control">
                                                    <option value="">----------------------------------Select--------------------------------------</option>
                                                    <option value=""></option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Faculty</label>
                                                <select name="university" id="" class="form-control">
                                                    <option value="">----------------------------------Select--------------------------------------</option>
                                                    <option value=""></option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Department</label>
                                                <select name="university" id="" class="form-control">
                                                    <option value="">----------------------------------Select--------------------------------------</option>
                                                    <option value=""></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary">Create</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <a href="#"  data-toggle="modal" data-target="#secondary-school">
                                <img src="{{asset('images/sitting.jpg')}}" alt="">
                                <h5>Subjects for Secondary School</h5>                                
                            </a>
                        </div>
                    </div>
                    <div class="modal fade" id="secondary-school" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="exampleModalLabel">Create Subject</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="" method="post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="">Name</label>
                                            <input type="text" name="name" id="secondary-school" class="form-control">
                                        </div>
                                         <div class="form-group">
                                             <label for="">Class</label>
                                             <select name="" id="" class="form-control">
                                                 <option value=""></option>
                                                 <option value=""></option>
                                             </select>
                                         </div>   
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Create</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection