$("#uni-submit").html("<span>Submit</span>");

document.getElementById('uni-submit').onclick = function () {
    $("#uni-submit").html('<span class="spinner-border spinner-border-sm  text-dark" role="status" aria-hidden="true"></span><span class="sr-only"></span> <span style="margin-left: 3px; color: black;">Loading...<span id="percent"></span></span>');


    let videoFile = document.getElementById("videoFile").files[0]

    // console.log(photoWidth, photoHeight);
    // Varialbles
    var fac = $('#fac_id');
    var dept = $('#dept_id');
    var course = $('#course_id');
    var level = $('#level');
    var semester = $('#semester');
    // var topic = $('#topic_id');
    var titles = $('#title');
    var desc = $('#description');
    // var coverPhoto = $('#coverPhoto');
    var gencourse = $("#gen-dep");
    var allcourses = $("#gencours");

    // Input values
    var uni_id = $('#uni').val();
    var fac_id = fac.val();
    var dept_id = dept.val();
    var course_id = course.val();
    var level_id = level.val();
    var semesters_id = semester.val();
    // var topic_id = topic.val();
    var title = titles.val();
    var description = desc.val();
    var gencourses = gencourse.val();
    var allcourse = allcourses.val();


    // Errors
    var fileError = $("#file-error");
    var facError = $("#fac-error");
    var deptError = $("#dept-error");
    var courseError = $("#course-error");
    var levelError = $("#level-error");
    var semesterError = $("#semester-error");
    // var topicError = $("#topic-error");
    var titleError = $("#title-error");
    var descError = $("#desc-error");
    // var photoError = $("#photo-error");


    // Clear error
    fac.on('change', function () {
        facError.text("");
    });
    dept.on('change', function () {
        deptError.text("");
    });
    course.on('change', function () {
        courseError.text("");
    });
    level.on('change', function () {
        courseError.text("");
    });
    semester.on('change', function () {
        courseError.text("");
    });
    // topic.on('change', function () {
    //     topicError.text("");
    // });
    titles.keydown(function (e) {
        titleError.text("");
    })
    desc.keyup(function (e) {
        descError.text("");
    })
    // coverPhoto.on('change', function () {
    //     photoError.text("");
    // });
    // Get the video file
    fileError.text("");
    console.log("sweet");

    // check if file is empty
    if (typeof videoFile === 'undefined') {
        fileError.text("Please Select a file");
        activateSubmit();

    } else {
        console.log("sessula");


        // if (typeof cover_photo === 'undefined') {
        //     photoError.text("Please select a file");
        //     activateSubmitBtn();
        //
        // } else {
        // Get file extention
        var ext = videoFile.name.substr((videoFile.name.lastIndexOf('.') + 1));
        console.log("sweet rita");
        if (ext !== "mp4") {
            // Check if the file is mp4
            fileError.text("File must be mp4 format");
            activateSubmit();
        } else {
            // Check if file size is greater than 300MB
            if (videoFile.size > 300000000) {
                fileError.text("File Must not be greater than 3000MB")
                activateSubmit();

            } else {

                // Get file extention
                // var coverExt = cover_photo.name.substr((cover_photo.name.lastIndexOf('.') + 1));
                // if (!(coverExt == "png" || coverExt == "jpeg" || coverExt == "gif" || coverExt == "jpg")) {
                //     // Check if the file is mp4
                //     photoError.text("Select a Picture");
                //     activateSubmitBtn();
                // } else {
                //
                //     if (photoHeight > photoWidth) {
                //         photoError.text("Height must be less than the width and width should be greateer than 300px");
                //     } else {

                // Check if select and input is empty

                if (fac_id === "") {
                    facError.text("Select Faculty");
                    activateSubmit();
                } else {

                    if (title === "") {
                        $("#title-error").text("Enter Title");
                        activateSubmit();

                    } else {
                        if (description === "") {
                            $("#desc-error").text("Enter Description");
                            activateSubmit();

                        } else {
                            if (level_id === "") {
                                levelError.text("Select Level");
                                activateSubmit();

                            } else {

                                if (semesters_id === "") {
                                    semesterError.text("Select Semester");
                                    activateSubmit();
                                } else {

                                    var config = {
                                        onUploadProgress: function (progressEvent) {
                                            var percentCompleted = Math.round((progressEvent.loaded * 100) / progressEvent.total);
                                            document.getElementById('percent').innerHTML = percentCompleted + "%";
                                        },

                                        "x-csrf-token": $("[name=_token]").val(),
                                        'content-type': 'multipart/form-data'
                                    };
                                    // Upload video and record on the database
                                    let data = new FormData();
                                    data.append('videoFile', videoFile, videoFile.name);
                                    data.append('institution_id', "No Institution");
                                    data.append('level', level_id);
                                    data.append('course_id', course_id);
                                    data.append('semester', semesters_id);
                                    data.append('title', title);
                                    data.append('description', description);
                                    data.append('status', "O");
                                    data.append('fac_id', fac_id);
                                    data.append('dept_id', dept_id);
                                    data.append('subject_id', "No Subject");
                                    data.append('class', "No Class");
                                    data.append('subject_id', "No Subject");
                                    data.append('status', "U");
                                    data.append('gencourse', gencourses);
                                    data.append("allcourses", allcourse);
                                    axios.post('/store-video', data, config)
                                        .then(response => {
                                            console.log(response);
                                            Swal.fire({
                                                title: 'Video Uploaded',
                                                text: '',
                                                icon: 'success',
                                                confirmButtonText: 'continue',
                                                allowOutsideClick: false
                                            });

                                            Swal.fire({
                                                title: 'Video Uploaded',
                                                text: '',
                                                icon: 'success',
                                                confirmButtonText: 'continue',
                                                allowOutsideClick: false
                                            });


                                            gencourse.find('option')
                                                .remove()
                                                .end();

                                            allcourses.find('option')
                                                .remove()
                                                .end();


                                            console.log(response.data.vid_id)
                                            document.getElementById("span_vid_id").innerText = response.data.vid_id;
                                            document.getElementById("link").style.display = "block";
                                            window.scrollTo(0, 0);
                                            activateSubmit();
                                            clearInput(fac, dept, course, titles, desc, videoFile)
                                        }).catch(response => {
                                        console.log(response)
                                        if (error.response.data.errors.first_name) {
                                            first_name_error.text(error.response.data.errors.first_name[0]);
                                        }
                                    }).finally(() => {
                                        activateSubmitBtn()

                                    });
                                }
                            }
                        }
                    }
                }

            }
        }
    }
    // }

    // }
    // }
};

function activateSubmit() {
    console.log("show submit");
    $("#uni-submit").html("<span>Submit</span>");
}

function clearInput(fac, dept, course, titles, desc, videoFiles) {
    fac.empty();
    fac.html("<option value=''> Select Faculty</option>");
    dept.empty();
    dept.html("<option value=''> Select Department</option>");
    course.empty();
    course.html("<option value=''> Select Course</option>");
    topic.empty();
    topic.html("<option value=''> Select Topic</option>");
    titles.val("");
    desc.val("");
    videoFiles.val("");

}
