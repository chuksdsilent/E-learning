document.getElementById("secsubmit").onclick = function () {
    console.log("maka gini");
    $("#secsubmit").html('<span class="spinner-border spinner-border-sm  text-dark" role="status" aria-hidden="true"></span><span class="sr-only"></span> <span style="margin-left: 3px; color: black;">Loading...<span id="percent"></span></span>');

    const secClass = $("#class");
    const subject = $("#subject");
    const title = $("#sectitle");

    const overview = $("#overview");
    // const photo = $("#cover-photo");
    const secVid = $("#sec-video");
    const user = $("#user_email");

    // const coverPhoto = document.getElementById("cover-photo").files[0];
    const secVideo = document.getElementById("sec-video").files[0];

    // Input values

    const class_id = secClass.val();
    const subject_id = subject.val();
    const title_id = title.val();

    const overview_id = overview.val();
    const user_email = user.val();

    const classError = $("#class-error");
    const subjectError = $("#subject-error");
    const titleError = $("#title-error");

    const overviewError = $("#overview-error");
    // const coverPhotoError = $("#cover-photo-error");
    const secVideoError = $("#sec-video-error");

    secClass.change(function () {
        classError.text("");
    });
    subject.change(function () {
        subjectError.text("");
    });
    title.keydown(function () {
        titleError.text("");
    });
    overview.keydown(function () {
        overviewError.text("");
    });
    // photo.change(function () {
    //     coverPhotoError.text("")
    // });
    secVid.change(function () {
        secVideoError.text("");
    });

    // if (typeof coverPhoto === 'undefined') {
    //     coverPhotoError.text("Select a File");
    //     activateSubmitBtn();
    // } else {
    // Get file extention
    // var coverExt = coverPhoto.name.substr((coverPhoto.name.lastIndexOf('.') + 1));
    // if (!(coverExt == "png" || coverExt == "jpeg" || coverExt == "gif" || coverExt == "jpg")) {
    //     // Check if the file is mp4
    //     coverPhotoError.text("Select a Picture");
    //     activateSubmitBtn();
    // } else {

    // check if file is empty
    if (typeof secVideo === 'undefined') {
        secVideoError.text("Please Select a file");
        activateSecSubmitBtn();
    } else {
        // Get file extention
        var ext = secVideo.name.substr((secVideo.name.lastIndexOf('.') + 1));
        if (ext !== "mp4") {
            // Check if the file is mp4
            secVideoError.text("File must be mp4 format");
            activateSubmitBtn();
            console.log("osina");
        } else {
            // Check if file size is greater than 20MB
            if (secVideo.size > 300000000) {
                secVideoError.text("File Must not be greater than 200MB")
                activateSecSubmitBtn();
                console.log("osinachi");

            } else {
                if (class_id === "") {
                    classError.text("*Class is Required");
                    activateSecSubmitBtn();
                    console.log("osina emma");

                } else {
                    if (subject_id === "") {
                        subjectError.text("*Subject is Required");
                        activateSecSubmitBtn();
                        console.log("osina manuela");

                    } else {
                        if (title_id === "") {
                            titleError.text("*Title is Required");
                            activateSecSubmitBtn();
                            console.log("osina ebube");

                        } else {

                            if (overview_id === "") {
                                overviewError.text("*Overview is Required");
                                activateSecSubmitBtn();
                                console.log("osina justina");

                            } else {
                                var config = {
                                    onUploadProgress: function (progressEvent) {
                                        var percentCompleted = Math.round((progressEvent.loaded * 100) / progressEvent.total);
                                        document.getElementById('percent').innerHTML = percentCompleted + "%";
                                    },

                                    "x-csrf-token": $("[name=_token]").val(),
                                    'content-type': 'multipart/form-data'
                                };
                                console.log('reached');
                                let data = new FormData();




                                // data.append('coverPhoto', coverPhoto, coverPhoto.name);
                                data.append('videoFile', secVideo, secVideo.name);
                                data.append('class', class_id);
                                data.append('subject_id', subject_id);
                                data.append('title', title_id);
                                data.append('description', overview_id);
                                data.append('user_email', user_email)
                                data.append('institution_id', "No Institution");
                                data.append('level',  "No Level");
                                data.append('course_id', "No Course");
                                data.append('semester', "No Sememster");
                                data.append('uni_id', "No Univeristy");
                                data.append('fac_id', "No Faculty");
                                data.append('dept_id', "No Department");
                                data.append('sec_id', "No Secondary School");
                                data.append('status', "S");



                                axios.post('/store-sec-video', data,config)
                                    .then(response => {
                                        console.log(response);
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

                                        activateSecSubmitBtn();

                                        clearInput(title, overview, secVideo)
                                    }).catch(response => {
                                        console.log(response)
                                    });
                            }
                        }
                    }

                }
                // }
                // }
            }
        }
    }
}

function activateSecSubmitBtn() {
    $("#secsubmit").html("<span>Upload</span>");
}

function clearInput(titles, desc, videoFiles) {

    titles.val("");
    desc.val("");
    videoFiles.val("");

}