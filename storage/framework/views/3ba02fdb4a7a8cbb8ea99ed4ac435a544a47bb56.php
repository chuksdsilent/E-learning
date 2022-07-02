<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('content'); ?>
<div class="col-md-9 mt-5">
    <div class="container">
        <style>
            #link{
                display: none;
                padding: 10px 0px 10px 40px;
                background-color: #0c5460;
                color: #FFFFFF;
                margin-bottom: 10px;
            }
        </style>
        <div id="link">
            https://acadazone.com/student/video/<span id="span_vid_id"></span>
        </div>
        <?php if($errors->first('video')): ?><small
            class="text-danger"><?php echo e($errors->first('video')); ?></small><?php endif; ?><small></small>
        <div class="content">
            <div class="card no-padding">
                <h2>Upload Video</h2>
                <hr />

                <?php echo csrf_field(); ?>
                <style>
                    #uniCard, #secCard, #otherCard{
                        display: none;
                    }
                </style>
                <div class="col-md-12">

                    <div class="form-group">
                        <label for="">Select Institution</label>
                        <select name="" id="choose-institution" class="form-control">
                            <option value="">Select institution</option>
                            <option value="uni">University</option>
                            <option value="sec">Secondary</option>
                            <option value="others">Others</option>
                        </select>
                </div>

                </div>

                <div class="d-flex justify-content-center">
                    <div class="loader"></div>

                </div>
                <div id="uniCard">
                    <?php echo $__env->make("instructor.cards.universityCard", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div id="secCard">
                    <?php echo $__env->make("instructor.cards.secCard", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div id="otherCard">
                    <?php echo $__env->make("instructor.cards.otherCard", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
<style>
    .loader {
        border: 16px solid #f3f3f3;
        border-radius: 50%;
        border-top: 16px solid blue;
        border-bottom: 16px solid blue;
        width: 120px;
        height: 120px;
        -webkit-animation: spin 2s linear infinite;
        animation: spin 2s linear infinite;
        display: none;
        margin: 1.5rem 0rem;
    }

    @-webkit-keyframes spin {
        0% { -webkit-transform: rotate(0deg); }
        100% { -webkit-transform: rotate(360deg); }
    }

    @keyframes  spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>
<script>
    console.log($("#token").val());
    $("#choose-institution").change(function (e) {
        console.log($("#choose-institution").val());
        $(".loader").css("display", "block");
        $("#secCard").css("display", "none");
        $("#uniCard").css("display", "none");
        $("#otherCard").css("display", "none");

        switch ($("#choose-institution").val()) {
            case "uni":
                $(".loader").css("display", "none");
                $("#uniCard").css("display", "block");
                $("#secCard").css("display", "none");
                $("#otherCard").css("display", "none");
                break;
            case "sec":
                $(".loader").css("display", "none");
                $("#uniCard").css("display", "none");
                $("#secCard").css("display", "block");
                $("#otherCard").css("display", "none");
                break;
            case "others":
                $(".loader").css("display", "none");
                $("#uniCard").css("display", "none");
                $("#secCard").css("display", "none");
                $("#otherCard").css("display", "block");
                break;
        }
    });
</script>

<script src="<?php echo e(asset('libraries/axios/axios.js')); ?>"></script>
<script src="<?php echo e(asset('libraries/axios/globalValues.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('instructor.partials.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\felken\resources\views/instructor/video/create.blade.php ENDPATH**/ ?>