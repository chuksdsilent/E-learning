<?php $__env->startSection('title', 'Update Profile'); ?>
<?php $__env->startSection('content'); ?>
<style>
    .profile-wrapper a {
        display: block;
        font-size: 18px;
    }

    .profile-wrapper a:hover {
        color: gold;
    }

</style>
<div class="col-md-12">
    <div class="profile-wrapper">
        <div class="container  d-flex justify-content-center">
            <div class=" card px-3 mt-5" style="min-width: 100%">
                <h4 class="my-4 mx-5">
                    Profile Update
                </h4>
                <hr class="no-margin" />

                <div class="row">
                    <div class="col-md-3 no-padding no-margin" style="border-right: 1px solid #000; overflow: auto">

                        <a href="#" id="profile-link" data-id="profile-pics" class="my-4 ml-3">Profile Picture</a>
                        <a href="" id="profile-link" data-id="user-info" class="my-4 ml-3">User Info</a>
                    </div>
                    <div class="col-md-9 col-12">
                        <div id="display-content">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo e(asset('libraries/jquery-3.4.1.min.js')); ?>"></script>
<script>
    $("#display-content").load("/student/profile-pic");
    $("a#profile-link").click(function (e) {
        e.preventDefault();
        if ($(this).text() === "Profile Picture") {
            $("#display-content").load("/felken/student/");
        } else if ($(this).text() === "User Info") {
            $("#display-content").load("/felken/student/show-info");
        }
    });

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('student.partials.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\felken\resources\views/student/profile.blade.php ENDPATH**/ ?>