<div class="wrapper">
    <div class="container  d-flex justify-content-center">
    <div class=" py-5 px-3 mt-5">
        <div>

            <div id="display" class="d-flex justify-content-center">
                <?php $options = Auth::user()->institution; ?>
                    @if($options == "sec")

                        @if ( \App\SecStudents::where('email', Auth::user()->email)->value('profile_pics') != "")

                            <img src=" {{ asset( \App\SecStudents::where('email', Auth::user()->email)->value('profile_pics'))}}"
                                 class="img-fluid " alt="" id="inner_pics"
                                 style="width: 150px; height: 150px; border-radius: 50%; object-fit: cover;">
                        @else

                            <i class="fas fa-user-circle text-center"
                               style="font-size: 150px; text-align: center; min-width: 100%;"></i>
                        @endif
                    @elseif($options == "uni")
                        @if ( \App\Students::where('email', Auth::user()->email)->value('profile_pics') != "")
                            <img src=" {{ asset( \App\Students::where('email', Auth::user()->email)->value('profile_pics') )}} "
                                 class="img-fluid " alt="" id="inner_pics"
                                 style="width: 150px; height: 150px; border-radius: 50%; object-fit: cover;">
                        @else

                            <i class="fas fa-user-circle text-center"
                               style="font-size: 150px; text-align: center; min-width: 100%;"></i>
                        @endif
                    @elseif($options == "others")
                        @if ( \App\OtherInstitutionStudents::where('email', Auth::user()->email)->value('profile_pics') != "")
                            <img src=" {{ asset( \App\OtherInstitutionStudents::where('email', Auth::user()->email)->value('profile_pics') )}}"
                                 class="img-fluid " alt="" id="inner_pics"
                                 style="width: 150px; height: 150px; border-radius: 50%; object-fit: cover;">
                        @else

                            <i class="fas fa-user-circle text-center"
                               style="font-size: 150px; text-align: center; min-width: 100%;"></i>
                        @endif
                    @endif

            </div>
            <div class="d-flex justify-content-center">
                <form action="">
                    <input type="hidden" name="" id="user-email" value="{{Auth::user()->email}}">
                    <input type="file" name="profile_pics" id="profile" class="ml-5 mt-4">
                    <div class="text-center">
                        <small id="error-image" class="text-danger"></small>
                        <small id="error-size"></small>

                    </div>
                </form>
            </div>
            <div class="d-flex mt-5">
                <a class="btn btn-primary btn-block" id="update">Update</a>

            </div>

        </div>
    </div>
</div>

<script src="{{asset('libraries/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('libraries/axios/axios.js')}}"></script>
<script src="{{asset('libraries/axios/globalValues.js')}}"></script>
<script src="{{asset('libraries/sweetalert/sweetalert2.min.js')}}"></script>
<script>
    $("#profile").on('change', function () {
        console.log(document.getElementById("profile").files[0]);
        var img_type = document.getElementById("profile").files[0].type;
        var img_size = document.getElementById("profile").files[0].size;
        console.log(img_type);
        if ((img_type === "image/png") || (img_type === "image/jpeg") || (img_type === "image/jpg") || (
            img_type === "image/gif")) {
            if (img_size <= 3000000) {
                $("#display").html(
                    '<img src="#" class="img-fluid " alt="" id="inner_pics" style="width: 150px; height: 150px; border-radius: 50%; object-fit: cover;">'
                );
                if (this.files && this.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#pics').attr('src', e.target.result);
                        $('#inner_pics').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(this.files[0]);
                }

            } else {
                $("#error-image").text("File Must be a less than 3MB");

            }
        } else {
            $("#error-image").text("File Must be a picture");
        }

    });

    $("#update").on('click', function () {
        const userEmail = $("#user-email").val();
        let profilePics = document.getElementById("profile").files[0];
        if (typeof profilePics !== 'undefined') {
            $("#update").text("Updating...");
            let data = new FormData();
            data.append('profilePics', profilePics, profilePics.name);
            data.append('userEmail', userEmail);
            console.log('show')
            axios.post('/upload-student-profile-pics', data, {
                "x-csrf-token": $("[name=_token]").val(),
                'content-type': 'multipart/form-data'
            })
                .then(response => {
                    if (response.status === 200) {

                        Swal.fire({
                            title: 'Profile Updated',
                            text: '',
                            icon: 'success',
                            confirmButtonText: 'continue',
                            allowOutsideClick: false
                        })
                        $("#update").text("Update");
                        $("#profile").val("");

                        // location.href = "/felken/instructor/dashboard";
                    }
                }).catch(error => {
                console.log(error)
            });
        }
    })

</script>
