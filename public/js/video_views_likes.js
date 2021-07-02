    
        const vid_id = $("#vid-id").val();
        const user_email = $("#user-email").val();
        const options = $("#options").val();
        const data = new FormData();

        // Append Data
        data.append('vid_id', vid_id);
        data.append('user_email', user_email);
        data.append('options', options);

        $("#comment").on("click", function(){
            
        })

        const video = document.getElementById("video");
        video.ontimeupdate = function(){
            console.log(video.currentTime);
            const sec =  parseInt(video.currentTime % 60)
            if(sec == 5){
                uploadViews(vid_id, user_email, data);
            }
        }


        const thumbs_up = $("#thumbs-up");
        thumbs_up.click(function(e){
        uploadThumbsUp(vid_id, user_email, data)
       });
       const thumbs_down = $("#thumbs-down");
       thumbs_down.click(function(e){
        uploadThumbsDown(vid_id, user_email, data)
       });


       function uploadThumbsUp(vid_id, user_email, $data){
        thumbs_down.removeClass('change-color');
        thumbs_up.addClass('change-color');
            if(vid_id !== ""){

                axios.post('video-thumbs-up', data, { "x-csrf-token" : $("[name=_token]").val()})
                .then(function (response) {
                    console.log(response.data.thumbs_up);
                    $("#show-thumbs-up").text(response.data.thumbs_up);
                    $("#show-thumbs-down").text(response.data.thumbs_down);

                })
                .catch(function (error) {
                    if(error.response.status === 401){
                        console.log("Unauthorized Access");
                    }
                    Toastify({
                        text: "Network Error. Try Again",
                        duration: 3000,
                        gravity: "bottom", // `top` or `bottom`
                        position: 'left', // `left`, `center` or `right`
                        backgroundColor: "grey",
                        stopOnFocus: true, // Prevents dismissing of toast on hover
                    }).showToast();
                })
                .finally(function () {
                    // always executed
                });
            }
       }

       function uploadThumbsDown(vid_id, user_email, $data){
        thumbs_down.addClass('change-color');
        thumbs_up.removeClass('change-color');
            if(vid_id !== ""){
                axios.post('video-thumbs-down', data, { "x-csrf-token" : $("[name=_token]").val()})
                .then(function (response) {
                    $("#show-thumbs-up").text(response.data.thumbs_up);
                    $("#show-thumbs-down").text(response.data.thumbs_down);
                })
                .catch(function (error) {
                    if(error.response.status === 401){
                        console.log("Unauthorized Access");
                    }
                    
                    Toastify({
                        text: "Network Error. Try Again",
                        duration: 3000,
                        gravity: "bottom", // `top` or `bottom`
                        position: 'left', // `left`, `center` or `right`
                        backgroundColor: "grey",
                        stopOnFocus: true, // Prevents dismissing of toast on hover
                    }).showToast();
                })
                .finally(function () {
                    // always executed
                });
            }
       }
       function uploadViews(vid_id, user_email, data){
        
        axios.post('video-views', data, { "x-csrf-token" : $("[name=_token]").val()})
            .then(function (response) {

            })
            .catch(function (error) {
                if(error.response.status === 401){
                    console.log("Unauthorized Access");
                    Toastify({
                        text: "Network Error. Try Again",
                        duration: 3000,
                        gravity: "bottom", // `top` or `bottom`
                        position: 'left', // `left`, `center` or `right`
                        backgroundColor: "grey",
                        stopOnFocus: true, // Prevents dismissing of toast on hover
                    }).showToast();
                }
            })
            .finally(function () {
                // always executed
            });
       }