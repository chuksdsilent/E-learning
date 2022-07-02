<?php $__env->startSection('title', 'Videos'); ?>
<?php $__env->startSection('content'); ?>
<style>
    tr td {
        font-size: 14px;
    }

</style>
<div class="col-md-9" style="min-width: 80%;">
    <div class="card mt-4 px-3 py-3" style="overflow: auto;">
        <h3 class="mt-3 mx-5"> <i class="fas fa-video"></i>Videos</h3>
        <hr />
        <div class="table">
            <table class="table table-striped hover" id="videos">
                <thead>
                    <th>S/N</th>
                    <th>Title</th>
                    <th>Course</th>
                    <th>Subject</th>
                    <th>Total Views</th>
                    <th>Published</th>
                </thead>
                <tbody>
                    <?php $i=1; ?>
                    <?php $__currentLoopData = $videost; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($i++); ?></td>
                        <td>

                            <?php if($item->status == "U"): ?>
                                <a href="<?php echo e(url('instructor/video/'. $item->vid_id)); ?>?options=uni"><?php echo e($item->title); ?></a>

                            <?php elseif($item->status == "O"): ?>
                                <a href="<?php echo e(url('instructor/video/'. $item->vid_id)); ?>?options=others"><?php echo e($item->title); ?></a>

                            <?php elseif($item->status == "S"): ?>
                                <a href="<?php echo e(url('instructor/video/'. $item->vid_id)); ?>?options=sec"><?php echo e($item->title); ?></a>

                            <?php endif; ?>
                        </td>
                        <td>

                            <?php if($item->status == "U"): ?>
                                <?php echo e(\App\Courses::where('course_id', $item->course_id)->value('name')); ?>


                            <?php elseif($item->status == "O"): ?>
                                <?php echo e(\App\OtherInstitutionCourses::where('course_id', $item->course_id)->value('course_name')); ?>

                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($item->status == "S"): ?>
                                <?php echo e(\App\Subjects::where('sub_id', $item->subject_id)->value('name')); ?>


                            <?php endif; ?>
                        </td>
                        <td><?php echo e(\App\VideoViewsLikes::where('vid_id', $item->vid_id)->where('views', 1)->count()); ?></td>
                        <td>
                            <?php echo $item->publish == 1 ? "<i class='fas fa-check'></i>" : "No"; ?>

                        </td>



                    </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>

        </div>

    </div>
</div>
</div>
<script src="<?php echo e(asset('libraries/jquery-3.4.1.min.js')); ?>"></script>

<script>
    $(document).ready(function () {
        $("#myTab a").click(function (e) {
            e.preventDefault();
            $(this).tab('show');
        });
    });
    $(".nav-tabs li").hover(
        function () {
            $(this).addClass('active');
        }
    );
    $(".nav-tabs li").mouseout(
        function () {
            $(this).removeClass('active');
        }
    );

    $(".nav-tabs li").click(
        function () {
            $(".nav-tabs li").removeClass('active-border');
            $(this).addClass('active-border');
        }
    );

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('instructor.partials.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\felken\resources\views/instructor/videos.blade.php ENDPATH**/ ?>