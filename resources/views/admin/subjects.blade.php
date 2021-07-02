@extends('admin.partials.layout')
@section('title', 'Subjects')
@section('content')
<div class="col-md-12">
    <div class="card mt-4 px-3 py-3" style="overflow: auto;">
        <div class="row">
            <div class="col-md-6">
                <h3 class="mt-3 mx-5"> <i class="fas fa-book"></i> Subjects</h3>
            </div>
            <div class="col-md-6 d-flex flex-row-reverse">
                <button class="btn header-btn-primary" data-toggle="modal" data-target="#create-university">
                    Create Subject
                </button>
            </div>
        </div>

        <hr />
        <div class="modal fade" id="create-university" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <form action="{{url('admin/subjects')}}" method="post">
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
                    <th scope="col">Subject Name</th>
                    <th>Number of Videos</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($subjects->count() > 0)
                <?php  $i= 1; ?>
                @foreach ($subjects as $subject)
                <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>
                        <a href="{{url('admin/subject/'. $subject->sub_id)}}">{{$subject->name}}</a>
                    </td>
                    <td>{{\App\Videos::where('status', 'S')->count()}}</td>
                    <td>
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#edit-{{$subject->name}}">
                            <i class="fa fa-edit"></i>
                        </a>
                        <div class="modal fade" id="edit-{{$subject->name}}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <form action="{{url('admin/subjects/update/'. $subject->sub_id)}}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="sub_id" value="{{$subject->sub_id}}">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel">Edit Subject</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Name</label>
                                                <input type="text" name="name" value="{{$subject->name}}" id=""
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
                        <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$subject->sub_id)}}">
                            <i class="fa fa-trash"></i>
                        </a>
                        <div class="modal fade" id="delete{{$subject->sub_id)}}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <form action="{{url('admin/subjects/delete/'. $subject->sub_id)}}" method="POST">
                                @csrf
                                @method('DELETE')
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
                    @endforeach
                </tr>
                @else
                <td colspan="4">
                    @include('admin.partials.no_record')
                </td>
                @endif
            </tbody>
        </table>
    </div>

</div>
</div>
@endsection
