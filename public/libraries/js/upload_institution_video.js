

document.getElementById('submitinstitution').onclick = function () {

    // Activate Load spinner
    // $(this).prop("disabled", true);
    $("#submitinstitution").html('<span class="spinner-border spinner-border-sm  text-dark" role="status" aria-hidden="true"></span><span class="sr-only"></span> <span style="margin-left: 3px; color: black;">Uploading...<span id="percent"></span></span>');
    $("#submitinstitution").prop("disabled", true);

    let videoFile = document.getElementById("othervideoFile").files[0];
    // let cover_photo = document.getElementById("coverPhoto").files[0];

    let videoFiles = $("#othervideoFile");

    // console.log(photoWidth, photoHeight);
    // Varialbles
    let institution = $("#institution-name");
    let levels = $("#otherlevels");
    let course = $("#othercourse");
    let semester = $("#othersemester");
    // let topic = $("#topic");
    let titles = $('#othertitle');
    let desc = $('#descript');
    // let coverPhoto = $('#coverPhoto');


    // Input values
    let institution_value = institution.val();
    let other_level_value = levels.val();
    let course_id = course.val();
    let semesters_id = semester.val();
    // let topic_id = topic.val();
    let title = titles.val();
    let description =  desc.val();

    // Errors
    let fileError = $("#file-error");
    let facError = $("#fac-error");
    let courseError = $("#course-error");
    let levelError = $("#level-error");
    let semesterError = $("#semester-error");
    // let topicError = $("#topic-error");
    let titleError = $("#title-error");
    let descError = $("#desc-error");
    // let photoError = $("#photo-error");


    // Clear error
    levels.on('change', function () {
        facError.text("");
    });
    course.on('change', function () {
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




    // check if file is empty
    if (typeof videoFile === 'undefined') {
        fileError.text("Please Select a file");
        activateSubmitBtn();
        console.log("init show");
    } else {
        // if (typeof cover_photo === 'undefined') {
        //     photoError.text("Please select a file");
        //     activateSubmitBtn();
        //
        // } else {
        //     // Get file extention
        var ext = videoFile.name.substr((videoFile.name.lastIndexOf('.') + 1));
        if (ext !== "mp4") {
            // Check if the file is mp4
            fileError.text("File must be mp4 format");
            activateSubmitBtn();
            console.log("showso");
        } else {

            console.log(videoFile.size );
            // Check if file size is greater than 20MB
            if (videoFile.size > 300000000) {
                fileError.text("File Must not be greater than 20MB")
                activateSubmitBtn();
                console.log("showso me");

            } else {
                console.log("waiting...");

                // Get file extention
                // var coverExt = cover_photo.name.substr((cover_photo.name.lastIndexOf('.') + 1));
                // if (!(coverExt == "png" || coverExt == "jpeg" || coverExt == "gif" || coverExt == "jpg")) {
                //     // Check if the file is mp4
                //     photoError.text("Select a Picture");
                //     activateSubmitBtn();
                // } else {
                //
                //     if (photoHeight > photoWidth) {
                //         photoError.text("Height must be less than the width and width should be greater than 300px");
                //     } else {

                // Check if select and input is empey
                if (institution_value === "") {
                    $("#uni-error").text("Select Institution");
                    activateSubmitBtn();
                    console.log("showso ki");

                } else {
                    if (other_level_value === "") {

                        facError.text("Select Level");
                        activateSubmitBtn();
                        console.log("showso pi");

                    } else {
                        if (course_id === "") {
                            courseError.text("Select Course");
                            activateSubmitBtn();
                            console.log("showso ko");


                        } else {
                            // if (topic_id === "") {
                            //     topicError.text("Select Topic");
                            //     activateSubmitBtn();
                            //
                            // } else {
                            if (title === "") {
                                $("#title-error").text("Enter Title");
                                activateSubmitBtn();
                                console.log("showso ti");

                            } else {
                                if (description === "" || description == "undefined") {
                                    $("#desc-error").html("Enter Description");
                                    activateSubmitBtn();
                                    console.log("showso ah");

                                } else {
                                    if (other_level_value === "") {
                                        levelError.text("Select Level");
                                        activateSubmitBtn();
                                        console.log("showso kkum");

                                    } else {

                                        if (semesters_id === "") {
                                            semesterError.text("Select Semester");
                                            // activateSubmitBtn();
                                            console.log("showso yu");

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
                                            // data.append('cover_photo', cover_photo, cover_photo.name);
                                            data.append('videoFile', videoFile, videoFile.name);
                                            data.append('institution_id', institution_value);
                                            data.append('level', other_level_value);
                                            data.append('course_id', course_id);
                                            data.append('semester', semesters_id);
                                            data.append('title', title);
                                            data.append('description', description);
                                            data.append('status', "O");
                                            data.append('uni_id', "No University");
                                            data.append('fac_id', "No Faculty");
                                            data.append('dept_id', "No Department");
                                            data.append('subject_id', "No Subject");
                                            data.append('class', "No Class");
                                            data.append('subject_id', "No Subject");

                                            axios.post('/store-inst-video', data, config)
                                                .then(response => {
                                                    Swal.fire({
                                                        title: 'Video Uploaded',
                                                        text: '',
                                                        icon: 'success',
                                                        confirmButtonText: 'continue',
                                                        allowOutsideClick: false
                                                    });
                                                    console.log(response.data.vid_id)
                                                    document.getElementById("span_vid_id").innerText =response.data.vid_id;
                                                    document.getElementById("link").style.display = "block";
                                                    window.scrollTo(0, 0);

                                                    clearInput(institution, levels, course, titles, desc, videoFile)
                                                    activateSubmitBtn();
                                                }).catch(error => {
                                                alert(error)
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
        }
    }
    // }
    //         }
    //
    //     }
    // }
};

function activateSubmitBtn() {
    $("#submitinstitution").html("<span>Submit</span>");
    $("#submitinstitution").prop("disabled", false);

}

function clearInput(institution, level, course, titles, desc, videoFiles) {
    level.empty();
    level.html("<option value=''> Select Level</option>");
    course.empty();
    course.html("<option value=''> Select Course</option>");
    titles.val("");
    desc.val("");

}