<?php $__env->startSection('title', 'Videos'); ?>
<?php $__env->startSection('content'); ?>
<style>
    img {
        height: 70px;
        width: 100%;
        object-fit: cover;
    }

    video::-internal-media-controls-download-button {
        display: none;
    }

    video::-webkit-media-controls-enclosure {
        overflow: hidden;
    }

    video::-webkit-media-controls-panel {
        width: calc(100% + 30px);
        /* Adjust as needed */
    }
</style>
<div class="col-md-12 no-padding no-margin">
    <div class="black-background set-height">
        <input type="hidden" name="text" id="options" value="<?php echo e($options); ?>">

        <input type="hidden" name="vid_id" id="vid-id" value="<?php echo e($vid_id); ?>">
        <input type="hidden" name="user_email" id="user-email" value="<?php echo e(Auth::user()->email); ?>">
        <h2 class="video-header"><?php echo e(\App\Videos::where('vid_id', $vid_id)->value('title')); ?></h2>
        <div class="row video pb-3 pt-5">
            <div class="col-md-12 ">

                <video controls id="video" autoplay controlsList="nodownload">

                    <source src="<?php echo e(asset(\App\Videos::where('vid_id', $vid_id)->value('vid_path'))); ?>"
                        type="video/mp4">
                    <source src="movie.ogg" type="video/ogg">

                </video>
                <div class="row likes">
                    <div class="mr-auto">
                        <h5 class="mt-4">
                            <?php
                                function thousandsCurrencyFormat($num)
                                {

                                    if ($num > 1000) {

                                        $x = round($num);
                                        $x_number_format = number_format($x);
                                        $x_array = explode(',', $x_number_format);
                                        $x_parts = array('k', 'm', 'b', 't');
                                        $x_count_parts = count($x_array) - 1;
                                        $x_display = $x;
                                        $x_display = $x_array[0] . ((int)$x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
                                        $x_display .= $x_parts[$x_count_parts - 1];
                                        return $x_display;
                                    }

                                    return $num;
                                }
                                if ($options == "sec")
                                    echo thousandsCurrencyFormat(\App\SecVideoViewsLikes::where('vid_id', $vid_id)->where('views', 1)->count());
                                elseif ($options == "uni")
                                    echo thousandsCurrencyFormat(\App\VideoViewsLikes::where('vid_id', $vid_id)->where('views', 1)->count());
                                elseif ($options == "others") {
                                    echo thousandsCurrencyFormat(\App\OtherInstitutionViewsLikes::where('vid_id', $vid_id)->where('views', 1)->count());
                                }
                                ?> Views
                        </h5>
                    </div>
                    <div class=" no-padding pt-4" style="margin-right: 15px;">
                        <a href="javascript:;" id="thumbs-up" class="text-white"><i class="fa fa-thumbs-up"></i>
                            <span id="show-thumbs-up">
                                <?php if($options == "sec"): ?>
                                <?php echo e(thousandsCurrencyFormat(\App\SecVideoViewsLikes::where('vid_id',$vid_id)->where('thumbs_up', 1)->count())); ?>

                                <?php elseif($options == "uni"): ?>
                                <?php echo e(thousandsCurrencyFormat(\App\VideoViewsLikes::where('vid_id',$vid_id)->where('thumbs_up', 1)->count())); ?>

                                <?php elseif($options = "others"): ?>
                                <?php echo e(thousandsCurrencyFormat(\App\OtherInstitutionViewsLikes::where('vid_id',$vid_id)->where('thumbs_up', 1)->count())); ?>


                                <?php endif; ?>
                            </span>
                        </a>
                    </div>
                    <div class=" no-padding pt-4 mr-2">
                        <a href="javascript:;" id="thumbs-down" class="text-white">
                            <i class="fa fa-thumbs-down"></i>
                        </a>
                        <span id="show-thumbs-down">
                            <?php if($options == "sec"): ?>
                            <?php echo e(thousandsCurrencyFormat(\App\SecVideoViewsLikes::where('vid_id',$vid_id)->where('thumbs_down', 1)->count())); ?>

                            <?php elseif($options == "uni"): ?>
                            <?php echo e(thousandsCurrencyFormat(\App\VideoViewsLikes::where('vid_id',$vid_id)->where('thumbs_down', 1)->count())); ?>

                            <?php elseif($options = "others"): ?>
                            <?php echo e(thousandsCurrencyFormat(\App\OtherInstitutionViewsLikes::where('vid_id',$vid_id)->where('thumbs_down', 1)->count())); ?>

                            <?php endif; ?>

                        </span>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-12">


            <div class="row">
                <div class="mr-4" style="max-width: 700px; !important">
                    <img src="<?php echo e(asset(\App\Instructors::where('email', $otherIns)->value('profile_pics') )); ?>"
                        class="img-fluid mt-5" style="border-radius:50%; object-fit:cover; width: 100px; height: 100px;"
                        alt="">
                </div>
                <div class="">
                    <div class="row">
                        <div class="mr-2 pt-3 no-padding no-margin">
                            <h4 class="mt-5 no-margin">
                                <?php echo e(\App\Instructors::where('email', $otherIns)->value('username')); ?>

                            </h4>
                        </div>
                        
                    </div>

                </div>
            </div>
            <h5 class="mt-4 pl-4 ">Overview</h5>
            <p class="pl-4">
                <?php echo e(\App\Videos::where('vid_id', $vid_id)->value('description')); ?>

            </p>
            <h5 class="pl-4"> <span id="count_comments"></span> Comments</h5>
            <div class="form-group pl-4""><input type=" text" name="" placeholder="Your Comment here..." id="comment"
                class="form-control"></div>
            <button class="ml-4 btn btn-primary" id="comment-btn">Comment</button>
            <div class="spinner-grow spinner-border-sm" id="spinner-grow" role="status">
                <span class="sr-only">Loading...</span>
            </div>
            <div id="content-comment"></div>

        </div>
    </div>
</div>

</div>
<input type="hidden" id="vid_id" value="<?php echo e($vid_id); ?>">
<script src="<?php echo e(asset('libraries/jquery-3.4.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('libraries/axios/axios.js')); ?>"></script>
<script src="<?php echo e(asset('libraries/toastify/toastify.js')); ?>"></script>
<script src="<?php echo e(asset('libraries/axios/globalValues.js')); ?>"></script>
<script src="<?php echo e(asset('js/video_views_likes.js')); ?>"></script>
<script>
    video.onplaying = function () {

            if(video.readyState > 0) {
                var minutes = parseInt(video.duration / 60, 10);
                var seconds = video.duration % 60;
                console.log(seconds);
            }
    };


    $("#spinner-grow").css({
        'display': 'none'
    });
    $("#comment-btn").on("click", function (e) {
        $("#spinner-grow").css({
            'display': 'inline-block'
        });

        const comment_vid_id = $('#vid-id').val();
        const comment_user_email = $('#user-email').val();
        const comment = $('#comment');
        const content_comment = $('#content-comment');
        const count_comments = $('#count_comments');
        const comment_data = new FormData();

        comment_data.append('vid_id', comment_vid_id);
        comment_data.append('user_email', comment_user_email);
        comment_data.append('comment', comment.val());

        uploadComment(comment_data, content_comment, comment, count_comments);
    });

    function uploadComment(data, content_comment, comment, count_comments) {

        axios.post('video-comments', data, {
                "x-csrf-token": $("[name=_token]").val()
            })
            .then(function (response) {
                if (response.data.uploaded === 'true') {
                    $("#spinner-grow").css({
                        'display': 'none'
                    });
                    content_comment.html(response.data.content);
                    count_comments.text(response.data.count_comments);
                    console.log(response.data.count_comments);
                    comment.val('');
                }
                comment.val('');
                Toastify({
                    text: "Comment Posted",
                    duration: 3000,
                    gravity: "bottom", // `top` or `bottom`
                    position: 'left', // `left`, `center` or `right`
                    backgroundColor: "grey",
                    stopOnFocus: true, // Prevents dismissing of toast on hover
                }).showToast();

            })
            .catch(function (error) {
                content_comment.val('');
                if (error.response.status === 401) {
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

    $('.like-comment').on("click",
    function likeComment(e){
        e.preventDefault();
        console.log("Waiting to see..");
        axios.post('video-comments', {}, {

        })
            .then(function (response) {


            })
            .catch(function (error) {

            })
            .finally(function () {
                // always executed
            });

    }
    );
    function getComment(data) {
    axios.post('video-comments', comment_data, {
        "x-csrf-token": $("[name=_token]").val()
    })
        .then(function (response) {
            if (response.data.uploaded === 'true') {
                $("#spinner-grow").css({
                    'display': 'none'
                });
                content_comment.html(response.data.content);
                count_comments.text(response.data.count_comments);
                console.log(response.data.count_comments);
                comment.val('');
            }
            comment.val('');

        })
        .catch(function (error) {
            content_comment.val('');
            if (error.response.status === 401) {
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

    const comment_vid_id = $('#vid-id').val();
    const comment_user_email = $('#user-email').val();
    const comment = $('#comment');
    const content_comment = $('#content-comment');
    const count_comments = $('#count_comments');
    const comment_data = new FormData();

    comment_data.append('vid_id', comment_vid_id);
    comment_data.append('user_email', comment_user_email);
    comment_data.append('comment', comment.val());

    getComment(comment_data, content_comment, comment, count_comments);
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('student.partials.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\felken\resources\views/student/video.blade.php ENDPATH**/ ?>