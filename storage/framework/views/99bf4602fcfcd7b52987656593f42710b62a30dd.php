<?php $__env->startSection('title', 'Videos'); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-md-12 no-padding no-margin">
        <div class="black-background set-height">
            <div class="row py-5">
                <input type="hidden" name="options" id="options" value="<?php echo e($options); ?>">

                    <div class="col-md-8 col-12 col-sm-12 col-xs-12 col-lg-8">
                        <?php echo e(\App\Videos::where('vid_id', $vid_id)->value('vid_path')); ?>

                        <video controls class="w-100">
                            <source
                                src="<?php echo e(asset(\App\Videos::where('vid_id', $vid_id)->value('vid_path'))); ?>"
                                type="video/mp4">
                            <source src="movie.ogg" type="video/ogg">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    <input type="hidden" name="vid_id" id="vid_id" value="<?php echo e($vid_id); ?>">
                    <div class="col-md-4 col-12 col-sm-12 col-xs-12 col-lg-4">
                        <h5 class="mt-5">Title</h4>

                            <h6><?php echo e(\App\Videos::where('vid_id', $vid_id)->value('title')); ?></h6>
                            <h5 class="mt-4">Overview</h5>
                            <h6 class="mb-5"><?php echo e(\App\Videos::where('vid_id', $vid_id)->value('description')); ?></h6>
                            <span class="mr-4">Views:
                        <?php echo e(\App\SecVideoViewsLikes::where('views', 1)->where('vid_id', $vid_id)->count()); ?></span>
                            <span class="mr-4">Likes:
                        <?php echo e(\App\SecVideoViewsLikes::where('thumbs_up', 1)->where('vid_id', $vid_id)->count()); ?></span>
                            <span class="mr-4">Dislikes:
                        <?php echo e(\App\SecVideoViewsLikes::where('thumbs_down', 1)->where('vid_id', $vid_id)->count()); ?></span>
                            <div class="d-flex">
                                <h5 class="mt-4 mr-4">
                                    Publish
                                </h5>
                                <h5 class="mt-3">
                                    <label class="switch">
                                        <input type="checkbox" id="publish" class="block-instructors"
                                               value="<?php echo e(\App\Videos::where('vid_id', $vid_id)->value('publish')); ?>"
                                            <?php echo e((\App\Videos::where('vid_id', $vid_id)->value('publish') )== "1" ? "checked" : "unchecked"); ?>>
                                        <span class="slider round"></span>
                                    </label>
                                </h5>
                            </div>
                        </h5>

                    </div>
            </div>
        </div>
    </div>
    <script src="<?php echo e(asset('libraries/jquery-3.4.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('libraries/axios/axios.js')); ?>"></script>
    <script src="<?php echo e(asset('libraries/axios/globalValues.js')); ?>"></script>
    <script>
        $("#publish").click(function () {

            var pusblish = $("#publish").val();
            const vid_id = $("#vid_id").val();
            const options = $("#options").val();

            const data = new FormData();
            data.append('publish', pusblish);
            data.append('vid_id', vid_id);
            data.append('options', options);

            axios.post('/publish-video', data, {
                "x-csrf-token": $("[name=_token]").val(),
                'content-type': 'multipart/form-data'
            })
                .then(response => {
                    console.log(response);
                }).catch(response => {
                console.log(response)
            });

        })

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.partials.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\felken\resources\views/admin/video.blade.php ENDPATH**/ ?>