<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('content'); ?>
    <style>
        h2 {
            padding: 0px;
        }
    </style>
    <div class="col-md-9 main-content py-5 px-3" style="padding-top: 10px !important;">
        <div class="dashboard">

            <h3 class="mb-4">Dashboard</h3>
            <div class="box-area">
                <?php if(\App\Videos::where('instructor_email', Auth::user()->email)->where('status', 'U')->count() > 0): ?>

                    <div class="row">
                        <div class="col-md-3 no-padding-left">
                            <a href="<?php echo e(url('instructor/university/videos')); ?>">
                                <div class="dash-box bg-warning">
                                    <div class="box-content ml-4 pt-3">
                                        <h2>
                                            <?php echo e(\App\Videos::where('instructor_email', Auth::user()->email)->where('status', "U")->count()); ?>

                                        </h2>
                                        <h6>University Videos</h6>
                                    </div>

                                </div>

                            </a>
                        </div>
                        <div class="col-md-3 no-padding-left">
                            <a href="<?php echo e(url('instructor/university/videos')); ?>">
                                <div class="dash-box bg-show">
                                    <div class="box-content ml-4 pt-3">
                                        <h2><?php echo e(\App\Videos::leftJoin('video_views_likes', 'videos.vid_id', '=', 'video_views_likes.vid_id')->where('videos.instructor_email', Auth::user()->email)->where('video_views_likes.thumbs_down', 1)->count()); ?>

                                        </h2>
                                        <h6> University Dislikes</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3 no-padding-left">
                            <a href="<?php echo e(url('instructor/university/videos')); ?>">
                                <div class="dash-box bg-danger">
                                    <div class="box-content ml-4 pt-3">
                                        <h2><?php echo e(\App\Videos::leftJoin('video_views_likes', 'videos.vid_id', '=', 'video_views_likes.vid_id')->where('videos.instructor_email', Auth::user()->email)->where('video_views_likes.thumbs_up', 1)->count()); ?>

                                        </h2>
                                        <h6> University Likes</h6>
                                    </div>

                                </div>
                            </a>
                        </div>
                        <div class="col-md-3 no-padding-left">
                            <a href="<?php echo e(url('instructor/university/videos')); ?>">
                                <div class="dash-box"  style="background-color: #a67493">
                                    <div class="box-content ml-4 pt-3">
                                        <h2><?php echo e(\App\Videos::leftJoin('video_views_likes', 'videos.vid_id', '=', 'video_views_likes.vid_id')->where('videos.instructor_email', Auth::user()->email)->where('video_views_likes.views', 1)->count()); ?>

                                            <h6> Uni. Views</h6>
                                        </h2>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if(\App\Videos::where('instructor_email', Auth::user()->email)->where('status', 'S')->count() > 0): ?>
                    <div class="row">

                        <div class="col-md-3 no-padding-left">
                            <a href="<?php echo e(url('instructor/secondary-school/videos')); ?>">
                                <div class="dash-box bg-info">
                                    <div class="box-content ml-4 pt-3">
                                        <h2>  <?php echo e(\App\Videos::where('instructor_email', Auth::user()->email)->where('status', "S")->count()); ?></h2>
                                        <h6>Sec. Sch Videos</h6>
                                    </div>

                                </div>
                            </a>
                        </div>
                        <div class="col-md-3 no-padding-left">
                            <a href="<?php echo e(url('instructor/secondary-school/videos')); ?>">
                                <div class="dash-box" style="background-color: #2c9c1e">
                                    <div class="box-content ml-4 pt-3">
                                        <h2><?php echo e(\App\Videos::leftJoin('sec_video_views_likes', 'videos.vid_id', '=', 'sec_video_views_likes.vid_id')->where('videos.status', "S")->where('videos.instructor_email', Auth::user()->email)->where('sec_video_views_likes.thumbs_up', 1)->count()); ?>

                                        </h2>
                                        <h6> Sec. Sch. Dislikes</h6>
                                    </div>

                                </div>
                            </a>
                        </div>
                        <div class="col-md-3 no-padding-left">
                            <a href="<?php echo e(url('instructor/secondary-school/videos')); ?>">
                                <div class="dash-box bg-info">
                                    <div class="box-content ml-4 pt-3">
                                        <h2>
                                            <h2><?php echo e(\App\Videos::leftJoin('sec_video_views_likes', 'videos.vid_id', '=', 'sec_video_views_likes.vid_id')->where('videos.status', "S")->where('videos.instructor_email', Auth::user()->email)->where('sec_video_views_likes.thumbs_down', 1)->count()); ?>

                                            </h2>
                                            <h6> Sec. Sch. Likes</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3 no-padding-left">
                            <a href="<?php echo e(url('instructor/secondary-school/videos')); ?>">
                                <div class="dash-box bg-warning">
                                    <div class="box-content ml-4 pt-3">
                                        <h2><?php echo e(\App\Videos::leftJoin('sec_video_views_likes', 'videos.vid_id', '=', 'sec_video_views_likes.vid_id')->where('videos.status', "S")->where('videos.instructor_email', Auth::user()->email)->where('sec_video_views_likes.views', 1)->count()); ?>

                                            <h6> Sec. Sch. Views</h6>
                                        </h2>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if(\App\Videos::where('instructor_email', Auth::user()->email)->where('status', 'O')->count() > 0): ?>
                    <div class="row">
                        <div class="col-md-3 no-padding-left">
                            <a href="<?php echo e(url('instructor/other-institutions/videos')); ?>">
                                <div class="dash-box" style="background-color: #a67493">
                                    <div class="box-content ml-4 pt-3">
                                       <h2><?php echo e(\App\Videos::where('instructor_email', Auth::user()->email)->where('status', "O")->count()); ?></h2>
                                        <h6>Other Schools Videos</h6>
                                    </div>

                                </div>
                            </a>
                        </div>
                        <div class="col-md-3 no-padding-left">
                            <div class="dash-box" style="background-color: #3da699">
                                <a href="<?php echo e(url('instructor/other-institutions/videos')); ?>">
                                    <div class="box-content ml-4 pt-3">
                                            <h2><?php echo e(\App\Videos::leftJoin('other_institution_views_likes', 'videos.vid_id', '=', 'other_institution_views_likes.vid_id')->where('videos.status', 'O')->where('videos.instructor_email', Auth::user()->email)->where('other_institution_views_likes.thumbs_up', 1)->count()); ?>

                                            </h2>
                                            <h6> Other Schools Likes </h6>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 no-padding-left">
                            <div class="dash-box" style="background-color: #9c7328">
                                <a href="<?php echo e(url('instructor/other-institutions/videos')); ?>">
                                    <div class="box-content ml-4 pt-3">
                                        <h2><?php echo e(\App\Videos::leftJoin('other_institution_views_likes', 'videos.vid_id', '=', 'other_institution_views_likes.vid_id')->where('videos.status', 'O')->where('videos.instructor_email', Auth::user()->email)->where('other_institution_views_likes.thumbs_down', 1)->count()); ?>

                                        </h2>
                                        <h6> Other Schools Dislikes</h6>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 no-padding-left">
                            <div class="dash-box" style="background-color: #2c9c1e">
                                <a href="<?php echo e(url('instructor/other-institutions/videos')); ?>">
                                    <div class="box-content ml-4 pt-3">
                                        <h2><?php echo e(\App\Videos::leftJoin('other_institution_views_likes', 'videos.vid_id', '=', 'other_institution_views_likes.vid_id')->where('videos.status', 'O')->where('videos.instructor_email', Auth::user()->email)->where('other_institution_views_likes.views', 1)->count()); ?>

                                            <h6> Other Schools Views</h6>
                                        </h2>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('instructor.partials.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\felken\resources\views/instructor/dashboard.blade.php ENDPATH**/ ?>