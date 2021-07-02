<div class="login-wrappe">
    <div class="containe ">
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
                                    <div class="form-group col-md-12 col-12">
                                        <label for="">Phone Number</label>
                                        <input type="text" name="phone" id="phone" class="form-control"
                                               value="{{ $item->phone != "" ? $item->phone :  old('phone')}}">
                                        <small class="text-danger"
                                               id="phone_error">{{ $errors->first('phone') }}</small>
                                    </div>
                                </div>
                            @endforeach
                            <?php $options = Auth::user()->institution; ?>

                            @if($options == "sec")
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label for="">School Name</label>
                                        <input type="text" name="school_name"
                                               value="{{ $item->school_name != "" ? $item->school_name : old('school_name')}}"
                                               id="profile_school_name" class="form-control" data-id="school_name">
                                        <small class="text-danger"
                                               id="fac_id_error"></small>
                                    </div>
                                    <div class="col-md-6 col-12 col-lg-6 col-xs-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="">Class</label>
                                            <select name="class" id="profile_class" class="form-control dept_id">
                                                <option value="">Select Class</option>
                                                <option value="1">JSS1</option>
                                                <option value="2">JS2</option>
                                                <option value="3">JS3</option>
                                                <option value="4">SS1</option>
                                                <option value="5">SS2</option>
                                                <option value="6">SS3</option>
                                            </select>
                                            <small class="text-danger"
                                                   id="dept_id_error">{{ $errors->first('department') }}</small>
                                        </div>
                                    </div>
                                </div>
                            @elseif($options == "uni")
                                <div class="row">
                                    <div class="col-md-12 col-12 col-lg-12 col-xs-12 col-sm-12">
                                        <div class="form-group">
                                            <label for="">Universities</label>
                                            <select name="university" id="course_uni_id" class="form-control">
                                                <option value="">Select University</option>
                                                @foreach ($universities as $item)
                                                    <option value="{{$item->uni_id }}">
                                                        {{$item->name}}
                                                    </option>
                                                @endforeach
                                            </select>
                                                <small class="text-danger" id="uni_error"></small>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-12 col-lg-6 col-xs-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="">Faculty</label>
                                            <select name="faculty" id="course_fac_id" class="form-control">
                                                <option value="">Select Faculty</option>
                                            </select>
                                            <small class="text-danger"
                                                   id="fac_id_error"></small>
                                        </div>
                                        <small class="text-danger"></small>
                                    </div>
                                    <div class="col-md-6 col-12 col-lg-6 col-xs-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="">Department</label>
                                            <select name="dept_id" id="course_dept_id" class="form-control dept_id">
                                                <option value="">Select Department</option>
                                            </select>
                                            <small class="text-danger"
                                                   id="dept_id_error">{{ $errors->first('department') }}</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 col-12 col-lg-12 col-xs-12 col-sm-12">
                                        <div class="form-group">
                                            <label for="">Level</label>
                                            <select name="level" id="profile_level" class="form-control">
                                                <option value="">Select Level</option>
                                                <option value="1">100</option>
                                                <option value="2">200</option>
                                                <option value="3">300</option>
                                                <option value="4">400</option>
                                                <option value="5">500</option>
                                            </select>
                                            @if ($errors->has('university'))
                                                <small class="text-danger">{{ $errors->first('university') }}</small>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            @elseif($options == "others")

                                <div class="row">
                                    <div class="col-md-6 col-12 col-lg-6 col-xs-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="">Institution</label>
                                            <select name="institution" id="profile_school" class="form-control">
                                                <option value="">Select Institution</option>
                                                @foreach ($institutions as $item)
                                                    <option value="{{$item->institution_id }}"
                                                            name="institution">{{$item->institution_name}}</option>
                                                @endforeach
                                            </select>
                                            <small class="text-danger"
                                                   id="fac_id_error"></small>
                                        </div>
                                        <small class="text-danger">{{ $errors->first('faculty') }}</small>
                                    </div>
                                    <div class="col-md-6 col-12 col-lg-6 col-xs-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="">Level</label>
                                            <select name="level" id="profile_level" class="form-control">
                                                <option value="">Select Level</option>
                                            </select>
                                            <small class="text-danger"
                                                   id="dept_id_error">{{ $errors->first('department') }}</small>
                                        </div>
                                    </div>
                                </div>

                            @endif
                            <div class="form-group">
                                <button type="button" class="btn btn-primary mt-3 btn-block" id="profile_updates">
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
<input type="hidden" id="options" value="{{Auth::user()->institution}}">

<script src="{{asset('libraries/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('libraries/axios/axios.js')}}"></script>
<script src="{{asset('libraries/axios/globalValues.js')}}"></script>
<script src="{{asset('libraries/sweetalert/sweetalert2.min.js')}}"></script>
<script src="{{asset('libraries/js/levels.js')}}"></script>
<script src="{{asset('libraries/js/admin_course.js')}}"></script>

<script>

    $("#fac_id").change(function () {
        console.log($(this).val());
    });
    $("#profile_updates").on('click', function () {
        $("#profile_updates").html('<span class="spinner-border spinner-border-sm  text-dark" role="status" aria-hidden="true"></span><span class="sr-only"></span> <span style="margin-left: 3px; color: black;">Loading...</span>');

        const first_name = $("#first_name");
        const last_name = $("#last_name");
        const phone = $("#phone");
        const uni = $("#course_uni_id");
        const level = $("#profile_level");


        if ($("#options").val() === "uni") {

            const fac_id = $("#course_fac_id");
            const dept_id = $("#course_dept_id")
            updateProfile(first_name, last_name, phone, fac_id, dept_id)
        } else if ($("#options").val() === "others") {
            const profile_school = $("#profile_school");
            const profile_level = $("#profile_level");
            updateProfile(first_name, last_name, phone, profile_school, profile_level)
        } else if ($("#options").val() === "sec") {
            const profile_school_name = $("#profile_school_name");
            const profile_class = $("#profile_class");
            updateProfile(first_name, last_name, phone, profile_school_name, profile_class)
        }

    })

    var updateProfile = (first_name, last_name, phone, fac_id, dept_id) => {

        const uni = $("#course_uni_id");
        const level = $("#profile_level");

        const first_name_error = $("#first_name_error");
        const last_name_error = $("#last_name_error");
        const phone_error = $("#phone_error");
        const display_id_error = $("#display-name_error");

        ;
        const fac_id_error = $("#fac_id_error");
        const dept_id_error = $("#dept_id_error");
        const uni_error = $("#uni-error");


        $("input[type=text]").keydown(function () {
            first_name_error.text("");
            last_name_error.text("");
            phone_error.text("");
        });

        $("#course_dept_id").change(function () {
            fac_id_error.text("");
        });

        $("#course_dept_id").change(function () {
            dept_id_error.text("");
        });
        $("#profile_school_name").change(function () {
            fac_id_error.text("");
        })

        $("#profile_level").change(function () {
            dept_id_error.text("");

        })
        $("#course-error").change(function () {
            uni_error.text("");
        })

        $("#profile_school")
        let data = new FormData();
        data.append('first_name', first_name.val());
        data.append('_method', 'patch');
        data.append('last_name', last_name.val());
        data.append('phone', phone.val());
        data.append('fac_id', fac_id.val());
        data.append('dept_id', dept_id.val());

        axios.post('/update-student-info', data, {
            "x-csrf-token": $("[name=_token]").val(),
            'content-type': 'multipart/form-data'
        })
            .then(response => {
                if (response.status === 200) {
                    Swal.fire({
                        title: 'Information Updated',
                        text: '',
                        icon: 'success',
                        confirmButtonText: 'continue',
                        allowOutsideClick: false
                    })
                    $("#profile").val("");
                    $("#update").text("Update");

                }
            }).catch(error => {

            if(error.response.data.errors.first_name){
                first_name_error.text(error.response.data.errors.first_name[0]);
            }else if(error.response.data.errors.last_name){
                last_name_error.text(error.response.data.errors.last_name[0]);
            }else if(error.response.data.errors.phone){
                phone_error.text(error.response.data.errors.phone[0]);
            }else if(error.response.data.errors.fac_id){
                fac_id_error.text(error.response.data.errors.fac_id[0]);
            }else if(error.response.data.errors.dept_id){
                dept_id_error.text(error.response.data.errors.dept_id[0]);
            }else if(error.response.data.errors.uni){
                uni_error.text(error.response.data.errors.uni[0]);
            }

        }).finally(() => {
            $("#profile_updates").html('Update');

        });

        $("#profile_updates").html('Update');

    }
    $("#course_fac_id").on('change', function () {
        let fac = $(this).val();
        let dept = $("#course_dept_id");
        let options;
        getDepartments(fac, dept, options);
    })

    var getDepartments = (fac, dept, options) => {
        //Make a request for a user with a given ID
        if (fac !== "") {
            dept.empty();
            dept.append("<option id='loading'>Loading...</option>");
            axios({
                method: 'get',
                url: 'http://' + location.hostname + '/felken/departments/?fac_id=' + fac,
                responseType: 'application/json',
            })
                .then(function (response) {
                    // handle success
                    if (response.data.length > 0) {
                        options = "<option value=''>Select Department</options>";
                        response.data.forEach(element => {
                            options += "<option value=" + element.dept_id + ">" + element
                                    .name +
                                "</options>";
                        });
                        dept.empty();
                        dept.append(options);
                    } else {
                        console.log("nothing");
                        dept.empty();
                        options += "<option value=''>No Department Found</options>";
                        dept.append(options);
                    }
                    dept.empty();
                    dept.append(options);
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
