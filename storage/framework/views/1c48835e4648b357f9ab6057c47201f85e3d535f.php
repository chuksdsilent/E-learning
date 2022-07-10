<?php $__env->startSection('title', 'videos'); ?>
<?php $__env->startSection('content'); ?>
    <style>
        img{
            height: 150px;
            width: 100%;
            object-fit: cover;

        }
    </style>
    <div class="student-videos-wrapper mt-3 mx-5">
        <h5 class="mt-5">Recommended Videos</h5>
        <?php $institution = Auth::user()->institution; ?>

            <?php switch($institution):
                case ("uni"): ?>
                <?php $__currentLoopData = $rec_videos->chunk(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chunk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row mt-4">
                        <?php $__currentLoopData = $chunk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-3 col-12" style="padding: 5px;">
                                <div class="card">
                                    <a href="<?php echo e(url('/student/video/'. $video->vid_id . '?options=uni')); ?>">
                                        <img src="<?php echo e(asset('images/ones.png')); ?>" class="card-img-top"
                                             
                                             alt="No Video">
                                        <div class="card-body">
                                            <h6 class="card-title">
                                                <div class="row ml-3 mb-3 pt-3">
                                                    <img
                                                        src="<?php echo e(asset(\App\Instructors::where('email', $video->instructor_email)->value('profile_pics'))); ?>"
                                                        class=" mr-3" alt=""
                                                        style="border-radius:50%;  width: 50px; height:50px;">
                                                    <div class="d-flex flex-column mt-2">
                                                        <h6 class="no-padding">
                                                            <?php echo e(\App\Instructors::where('email', $video->instructor_email)->value('username')); ?>

                                                        </h6>
                                                        <p class="mt-1">
                                                            <?php echo e(substr($video->title, 0, 15)); ?>...
                                                        </p>

                                                    </div>
                                                </div>
                                            </h6>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php break; ?>
                <?php case ("sec"): ?>
                <?php $__currentLoopData = $rec_videos->chunk(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chunk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row mt-4">
                        <?php $__currentLoopData = $chunk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-3 col-12" style="padding: 5px;">
                                <div class="card">
                                    <a href="<?php echo e(url('/student/video/'. $video->vid_id . '?options=uni')); ?>">
                                        <img src="<?php echo e(asset("images/logo.png")); ?>" class="card-img-top"  alt="No Video">


                                        
                                        <div class="card-body">
                                            <h6 class="card-title">
                                                <div class="row ml-3 mb-3 pt-3">
                                                    <img
                                                        src="<?php echo e(asset(\App\Instructors::where('email', $video->instructor_email)->value('profile_pics'))); ?>"
                                                        class=" mr-3" alt=""
                                                        style="border-radius:50%;  width: 50px; height:50px;">
                                                    <div class="d-flex flex-column mt-2">
                                                        <h6 class="no-padding">
                                                            <?php echo e(\App\Instructors::where('email', $video->instructor_email)->value('username')); ?>

                                                        </h6>
                                                        <p class="mt-1">
                                                            <?php echo e(substr($video->title, 0, 15)); ?>...
                                                        </p>
                                                    </div>
                                                </div>
                                            </h6>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php break; ?>
                <?php case ("others"): ?>
                <?php $__currentLoopData = $rec_videos->chunk(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chunk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row mt-4">
                        <?php $__currentLoopData = $chunk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-3 col-12" style="padding: 5px;">
                                <div class="card">
                                    <a href="<?php echo e(url('/student/video/'. $video->vid_id . '?options=uni')); ?>">
                                        
                                        <img src="<?php echo e(asset('images/logo.png')); ?>" class="card-img-top" alt="No Video">
                                        <div class="card-body">
                                            <h6 class="card-title">
                                                <div class="row ml-3 mb-3 pt-3">
                                                    <img
                                                        src="<?php echo e(asset(\App\Instructors::where('email', $video->instructor_email)->value('profile_pics'))); ?>"
                                                        class=" mr-3" alt=""
                                                        style="border-radius:50%;  width: 50px; height:50px;">
                                                    <div class="d-flex flex-column mt-2">
                                                        <h6 class="no-padding">
                                                            <?php echo e(\App\Instructors::where('email', $video->instructor_email)->value('username')); ?>

                                                        </h6>
                                                        <p class="mt-1">
                                                            <?php echo e(substr($video->title, 0, 15)); ?>...
                                                        </p>
                                                    </div>
                                                </div>
                                            </h6>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php break; ?>
            <?php endswitch; ?>
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('student.partials.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\felken\resources\views/student/videos.blade.php ENDPATH**/ ?>