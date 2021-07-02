<div class="login-wrappe">
    <div class="containe">
        <div class="row justify-content-center my-4">
            <div class="col-md-12 col-12">
                <div class="container">
                    <div class=" mt-3" id="sign-up-for">
                        <h4 class="py-2 px-3 text-center">User Information</h4>
                        <form action="{{url('user/signup')}}" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            @foreach ($user as $item)
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label for="">First Name</label>
                                    <input type="text" name="first_name"
                                        value="{{ $item->first_name != "" ? $item->first_name : old('first_name')}}"
                                        id="first_name" class="form-control" data-id="first_name">
                                    <small class="text-danger"
                                        id="first_name_error">{{ $errors->first('first_name') }}</small>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="">Last Name</label>
                                    <input type="text" name="last_name" id="last_name"
                                        value="{{ $item->last_name != "" ? $item->last_name : old('last_name')}}"
                                        class="form-control">
                                    <small class="text-danger"
                                        id="last_name_error">{{ $errors->first('last_name') }}</small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label for="">Phone Number</label>
                                    <input type="text" name="phone" id="phone" class="form-control"
                                        value="{{ $item->phone != "" ? $item->phone :  old('phone')}}">
                                    <small class="text-danger" id="phone_error">{{ $errors->first('phone') }}</small>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="">Display Name</label>
                                    <input type="text" name="display_name"
                                        value="{{ $item->display_name != "" ? $item->display_name :  old('display_name') }}"
                                        id="display-name" class="form-control">
                                    <small class="text-danger"
                                        id="display_name_error">{{$errors->first('display_name') }}</small>
                                </div>
                            </div>
                            @endforeach
                            <div class="row">
                                <div class="col-md-6 col-12 col-lg-6 col-xs-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="">Faculty</label>
                                        <select name="faculty" id="fac_id" class="form-control">
                                            <option value="">Select Faculty</option>
                                            @foreach ($faculties as $item)
                                            <option value=" {{$item->fac_id }} " name="faculty" id="faculty">
                                                {{$item->name}}
                                            </option>
                                            @endforeach
                                        </select>
                                        <small class="text-danger"
                                            id="fac_id_error">{{ $errors->first('faculty') }}</small>
                                    </div>
                                    <small class="text-danger">{{ $errors->first('faculty') }}</small>
                                </div>
                                <div class="col-md-6 col-12 col-lg-6 col-xs-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="">Department</label>
                                        <select name="dept_id" id="department" class="form-control dept_id">
                                            <option value="">Select Department</option>
                                        </select>
                                        <small class="text-danger"
                                            id="dept_id_error">{{ $errors->first('department') }}</small>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-primary mt-3 btn-block" id="update">
                                    Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<script src="{{asset('libraries/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('libraries/axios/axios.js')}}"></script>
<script src="{{asset('libraries/axios/globalValues.js')}}"></script>
<script src="{{asset('libraries/js/get_Department.js')}}"></script>
<script src="{{asset('libraries/sweetalert/sweetalert2.min.js')}}"></script>
<script src="{{asset('libraries/sweetalert/pollyfill.js')}}"></script>

<script>
    $("#update").on('click', function () {

        const first_name = $("#first_name");
        const last_name = $("#last_name");
        const phone = $("#phone");
        const fac_id = $("#fac_id");
        const dept_id = $("#department");
        const display_id = $("#display-name");

        const first_name_error = $("#first_name_error");
        const last_name_error = $("#last_name_error");
        const phone_error = $("#phone_error");
        const fac_id_error = $("#fac_id_error");
        const dept_id_error = $("#dept_id_error");
        const display_id_error = $("#display-name_error");

        $("input[type=text]").keydown(function () {
            first_name_error.text("");
            last_name_error.text("");
            phone_error.text("");
            fac_id_error.text("");
            dept_id_error.text("");
            display_id_error.text("");
        })


        if (first_name.val() !== "") {
            if (last_name.val() !== "") {
                if (phone.val() !== "") {
                    if (fac_id.val() !== "") {
                        if (dept_id.val() !== "") {
                            if (display_id.val() !== "") {
                                $("#update").text("Updating...");
                                let data = new FormData();
                                data.append('first_name', first_name.val());
                                data.append('_method', 'patch');
                                data.append('last_name', last_name.val());
                                data.append('phone', phone.val());
                                data.append('fac_id', fac_id.val());
                                data.append('dept_id', dept_id.val());
                                data.append('display_name', display_id.val());

                                axios.post('/update-instructor-info', data, {
                                        "x-csrf-token": $("[name=_token]").val(),
                                        'content-type': 'multipart/form-data'
                                    })
                                    .then(response => {

                                        Swal.fire({
                                            title: 'Information Updated',
                                            text: '',
                                            icon: 'success',
                                            confirmButtonText: 'continue',
                                            allowOutsideClick: false
                                        })
                                        $("#profile").val("");
                                        $("#update").text("Update");


                                    }).catch(error => {
                                        console.log(error)
                                    });

                            } else {
                                display_id_error.text("*Display Name is required");
                            }
                        } else {
                            dept_id_error.text("*Department is required");
                        }
                    } else {
                        fac_id_error.text("*Faculty is required");
                    }

                } else {
                    phone_error.text("*Phone is required");
                }

            } else {
                last_name_error.text("*Last Name is required");
            }

        } else {
            first_name_error.text("*First Name is required");
        }
    })

</script>
