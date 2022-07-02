<?php $__env->startSection('title', 'Recent Videos'); ?>
<?php $__env->startSection('content'); ?>
    <style>
        .wrapper-searched-videos,
        .wrapper-searched-videos h6 {
            font-size: 13px;
        }
         img{
             height: 150px;
             width: 100%;
             object-fit: cover;
         }
    </style>
    <div class="wrapper-searched-videos ml-5 mr-5 mt-4">
        <h4>Recent Videos</h4>
        <div class="search-videos">
            <?php $options = Auth::user()->institution; ?>

                
                    <?php if(count($likedCourses) > 0): ?>

                    <?php $__currentLoopData = $likedCourses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(url('student/video/'. $item->vid_id)); ?>" style="color: black; display: block">
                        <div class="row">
                            <div class="col-md-3 col-6 col-sm-3 col-lg-3 col-xs-3 no-padding no-margin ">
                                <img src="<?php echo e(asset('images/ones.png')); ?>" class="card-img-top mt-3" alt="No Video">
                            </div>
                            <div class="col-md-9 col-6 col-sm-9 col-lg-9 col-xs-9 pt-4">
                                <h4><?php echo e($item->title); ?></h4>
                                <h6><?php echo e(\App\User::where('email', $item->instructor_email)->value('username')); ?> |
                                    <?php echo e(\Carbon\Carbon::parse($item->created_at)->diffForHumans()); ?></h6>
                                <p><?php echo e(\App\VideoViewsLikes::where('vid_id', $item->vid_id)->where('thumbs_up', 1)->count()); ?>

                                    likes
                                    <?php echo e(\App\VideoViewsLikes::where('vid_id', $item->vid_id)->where('views', 1)->count()); ?>

                                    views</p>
                                <p class="mt-3 desc"><?php echo e(substr($item->description, 0, 20)); ?>...</p>
                            </div>

                        </div>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php else: ?>
                        <?php echo $__env->make('student.partials.not_found', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('student.partials.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\felken\resources\views/student/liked_videos.blade.php ENDPATH**/ ?>