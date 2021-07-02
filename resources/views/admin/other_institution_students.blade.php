@extends('admin.partials.layout')
@section('title', 'Students')
@section('content')
    <div class="col-md-12">
        <div class="ca">
            <div class="card mt-4 px-3 py-3" style="overflow: auto;">
                <h3 class="mt-3 mx-5"> <i class="fas fa-user-friends"></i>Other Institution Students</h3>
                <hr />
                <div class="table">
                    <table class="table table-striped" id="videos">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Username </th>
                            <th scope="col">Name </th>
                            <th scope="col">Email </th>
                            <th scope="col">Phone </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=1; ?>
                        @foreach ($students as $item)
                            <tr>
                                <th scope="row">{{$i++}}</th>
                                <td>
                                    <a href="">{{$item->username}}</a>
                                </td>
                                <td>
                                    <a href="">{{$item->first_name}} {{$item->last_name}}</a>
                                </td>
                                <td>
                                    <a href="">{{$item->email}}</a>
                                </td>
                                <td>
                                    <a href="">{{$item->phone}}</a>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection
