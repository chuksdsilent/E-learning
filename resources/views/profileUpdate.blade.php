@extends('instructor.partials.layout')
@section('title', 'Dashboard')
@section('content')
<div class="col-md-10">
    <div class="wrapper">
        <div class="container  d-flex justify-content-center" ">
                    <div class=" card py-5 px-3 mt-5 style="max-width: 450px;">
            <div>

                <i class="fas fa-user-circle text-center"
                    style="font-size: 150px; text-align: center; min-width: 700px;"></i>
                <p class="text-center mt-3">Upload Picture</p>

                <div class="d-flex justify-content-center">
                    <form action="">
                        <input type="text" name="" id="user-email" value="{{Auth::user()->email}}">
                        <input type="file" name="profile_pics" id="profile_pics" class="ml-5">

                    </form>
                </div>
                <div class="d-flex mt-5">
                    <a class="btn btn-default btn-block mr-2" href="  {{url('instructor/dashboard')}} ">Skip</a>
                    <a class="btn btn-primary btn-block" id="continue">Continue</a>

                </div>

            </div>
        </div>
    </div>

</div>

<script src="{{asset('libraries/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('libraries/axios/axios.js')}}"></script>
<script src="{{asset('libraries/axios/globalValues.js')}}"></script>
<script>
    console.log();
    console.log(location.hostname);
    console.log(document.domain);
    $("#continue").on('click', function () {
        const userEmail = $("#user-email").val();
        let profilePics = document.getElementById("profile_pics").files[0];
        if (typeof profilePics !== 'undefined') {
            let data = new FormData();
            data.append('profilePics', profilePics, profilePics.name);
            data.append('userEmail', userEmail);
            console.log('show')
            axios.post('/upload-profile-pics', data, {
                    "x-csrf-token": $("[name=_token]").val(),
                    'content-type': 'multipart/form-data'
                })
                .then(response => {
                    if (response.status === 200) {
                        alert('Profile Updated');
                        location.href = "/felken/instructor/dashboard";
                    }
                }).catch(error => {
                    console.log(error)
                });
        }
    });
</script>
@endsection
