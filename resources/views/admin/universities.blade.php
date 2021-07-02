@extends('admin.partials.layout')
@section('title', 'Universities')
@section('content')
<div class="col-md-12">
    <div class="card mt-4 px-3 py-3" style="overflow: auto;">
        <div class="row">
            <div class="col-md-6">
                <h3 class="mt-3 mx-5"> <i class="fas fa-school"></i> Universities</h3>
            </div>
            <div class="col-md-6 d-flex flex-row-reverse">
                <button class="btn header-btn" data-toggle="modal" data-target="#create-university">
                    Create University
                </button>
            </div>
        </div>

        <hr />
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
                                <input type="text" name="name" id="secondary-school" class="form-control">
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
        <table class="table table-striped" id="videos">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">University Name</th>
                    <th>Number of Faculties</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($universities->count() > 0)
                <?php  $i=1; ?>
                @foreach ($universities as $item)


                @csrf
                @method('PATCH')
                <input type="hidden" name="uni_id" value="{{$item->uni_id}}">
                <tr>
                    <th scope="row">{{ $i++ }}</th>
                    <td>
                        <a href="{{url('admin/faculties/'. $item->uni_id)}}">{{$item->name}}</a>
                    </td>
                    <td>
                        {{$item->faculties->count() }}
                    <td>
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#edit-{{$item->id}}">
                            <i class="fa fa-edit"></i>
                        </a>
                        <div class="modal fade" id="edit-{{$item->id}}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <form action="{{url('admin/universities/update/'. $item->uni_id)}}" method="post">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="uni_id" value="{{$item->uni_id}}">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel">Edit University</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Name</label>
                                                <input type="text" value="{{$item->name}}" name="name"
                                                    id="secondary-school" class="form-control">
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
{{--                        <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#delete">--}}
{{--                            <i class="fa fa-trash"></i>--}}
{{--                        </a>--}}
                        <form action="{{url('admin/universities/delete/'. $item->id)}}" method="post">
                            @method('DELETE')
                            @csrf
                            <div class="modal fade" id="delete" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="exampleModalLabel"> <i
                                                    class="fa fa-warning"></i> Delete</h4>
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
                @include('admin.partials.no_record')
                @endif
            </tbody>
        </table>
    </div>

</div>
</div>
@endsection
