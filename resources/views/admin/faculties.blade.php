@extends('admin.partials.layout')
@section('title', 'Faculties')
@section('content')
<div class="col-md-12">
    <div class="card mt-4 px-3 py-3" style="overflow: auto;">
        <div class="row">
            <div class="col-md-6">
                <h3 class="mt-3 mx-5"> <i class="fas fa-school"></i> Faculties</h4>
                </h3>
            </div>
            <div class="col-md-6 d-flex flex-row-reverse">
                <button class="btn header-btn mt-3" data-toggle="modal" data-target="#create-faculty">
                    Create Faculty
                </button>
            </div>
        </div>
        <form action="{{route('admin.faculties.create')}}" method="post">
            @csrf()
            <div class="modal fade" id="create-faculty" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                                <label for="universities">Universities</label>
                                <select name="uni_id" id="universities" class="form-control">
                                    <option value="">Select University</option>
                                    @foreach ($universities as $university)
                                    <option value="{{$university->uni_id}}" name="uni_id">{{$university->name}}</option>
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
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        @if ($faculties->count() > 0)
        <table class="table table-striped" id="videos">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Faculty Name</th>
                    <th>Number of Departments</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i= 1; ?>
                @foreach ($faculties as $item)
                <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>
                        <a href="{{url('admin/departments/'. $item->fac_id)}}"> {{$item->name}} </a>
                    </td>
                    <td>{{$item->departments->count()}} </td>
                    <td>
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#edit-{{$item->fac_id}}">
                            <i class="fa fa-edit"></i>
                        </a>
                        <div class="modal fade" id="edit-{{$item->fac_id}}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <form action="{{url('admin/faculties/update/'. $item->fac_id)}}" method="post">
                                @csrf
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="exampleModalLabel">Update Faculty</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="universities">Universities</label>
                                                <select name="uni_id" id="universities" class="form-control">
                                                    <option value="">Select University</option>
                                                    @foreach ($universities as $university)
                                                    <option value="{{$university->uni_id}}"
                                                        {{ ($university->uni_id == $item->uni_id) ? 'selected': ''}}
                                                        name="uni_id">{{$university->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Name</label>
                                                <input type="text" name="name" value="{{ $item->name }}"
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
                        <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#delete-{{$item->id}}">
                            <i class="fa fa-trash"></i>
                        </a>
                        <form action="{{url('admin/faculties/delete/'. $item->fac_id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <div class="modal fade" id="delete-{{$item->id}}" tabindex="-1" role="dialog"
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
            </tbody>
        </table>
        @else
        @include('admin.partials.no_record')
        @endif
        </tbody>
        </table>
    </div>

</div>
</div>

@endsection
