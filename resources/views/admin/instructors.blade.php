@extends('admin.partials.layout')
@section('title', 'Instructors')
@section('content')
<div class="wrappe">
    <div class="contain">
        <div id="alert-container"></div>

        <div class="col-md-12">
            <div class="ca">
                <div class="card mt-4 px-3 py-3" style="overflow: auto;">
                    <h3 class="mt-3 mx-5"> <i class="fas fa-users"></i> Instructors</h3>
                    <hr />
                    <div class="table">
                        <table class="table table-striped" id="videos">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name </th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Phone </th>
                                    <th scope="col">Email </th>
                                    <th scope="col">Department </th>
                                    <th scope="col">Block</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($instructors->count() > 0)
                                <?php $i=0; ?>
                                @foreach ($instructors as $item)
                                <tr>
                                    <th scope="row">{{$i++}}</th>
                                    <td>
                                        {{$item->first_name}} {{$item->last_name}}
                                    </td>
                                    <td>
                                        {{$item->username}}
                                    </td>
                                    <td>
                                        {{$item->phone}}
                                    </td>
                                    <td>
                                        {{$item->email}}
                                    </td>
                                    <td>
                                        {{$item->department}}
                                    </td>
                                    <td>
                                        <label class="switch">
                                            <input type="checkbox" id="block-instructors" class="block-instructors"
                                                value="{{$item->username}}"
                                                {{ (\App\User::where('username', $item->username)->value('blocked') )== "Y" ? "checked" : "unchecked" }}>
                                            <span class="slider round"></span>
                                        </label>
                                        <div class="modal fade" id="delete" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="exampleModalLabel"> <i
                                                                class="fa fa-warning"></i> Alert</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to block the instructor?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">Cancel</button>
                                                        <button type="button" class="btn btn-danger">Block</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                @else

                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('libraries/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('libraries/axios/axios.js')}}"></script>
    <script src="{{asset('libraries/axios/globalValues.js')}}"></script>

    <script>
        $(".block-instructors").on('change', function (e) {
            if ($(this).is(':checked')) {
                $(this).attr('value');
                alert("Are you sure you want to block the instructor?");
                blockInstructor($(this).val());
            } else {
                $(this).attr('value');
                unBlockInstructor($(this).val());
            }
        });


        var blockInstructor = (user_id) => {
            //Make a request for a user with a given ID
            if (user_id !== "") {
                $("#alert-container").empty();
                $("#alert-container").append("<div class='alert alert-success'> Processing...</div>");
                axios({
                        method: 'patch',
                        url: 'instructors/block/' + user_id,
                        responseType: 'application/json',
                    })
                    .then(function (response) {
                        console.log(response);
                        $("#alert-container").empty();
                        if (response.status === 200) {
                            $("#alert-container").append(
                                "<div class='alert alert-success'><i class='fa fa-check-circle'></i> User blocked successfully</div>"
                            );
                        } else {
                            $("#alert-container").append(
                                "<div class='alert fa-exclamation-triangle'> Please Try Again </div>");
                        }
                    })
                    .catch(function (error) {
                        // handle error
                        console.log(error);
                        if (error.response.status === 401) {
                            console.log("Unauthorized Access");
                        }
                    })
                    .finally(function () {
                        // always executed
                    });

            }
        }

        var unBlockInstructor = (user_id) => {
            //Make a request for a user with a given ID
            if (user_id !== "") {
                $("#alert-container").empty();
                $("#alert-container").append("<div class='alert alert-success'> Processing...</div>");
                axios({
                        method: 'patch',
                        url: 'instructors/unblock/' + user_id,
                        responseType: 'application/json',
                    })
                    .then(function (response) {
                        $("#alert-container").empty();
                        if (response.status === 200) {
                            $("#alert-container").append(
                                "<div class='alert alert-success'><i class='fa fa-check-circle'></i> User unblocked successfully</div>"
                            );
                        } else {
                            $("#alert-container").append(
                                "<div class='alert fa-exclamation-triangle'> Please Try Again </div>");
                        }
                    })
                    .catch(function (error) {
                        // handle error
                        console.log(error);
                        if (error.response.status === 401) {
                            console.log("Unauthorized Access");
                        }
                    })
                    .finally(function () {
                        // always executed
                    });

            }
        }

    </script>
    @endsection
