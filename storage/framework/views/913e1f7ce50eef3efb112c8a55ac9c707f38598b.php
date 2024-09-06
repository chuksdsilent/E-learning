
<?php $__env->startSection('content'); ?>
<style>
    .learn-with {
        background-image: url("<?php echo e(asset('images/bannersbg.png')); ?> ");
        background-repeat: no-repeat;
        height: 500px;
    }

    @media  screen and (max-width: 700px) {
        .learn-with {
            background-image: url("<?php echo e(asset('images/mobile_captivating.png')); ?> ");
            background-repeat: no-repeat;
            height: 300px;
        }
    }
</style>
<div class="wrapper" style="margin: auto; min-width: 100%; display: inline-block;">

    <div class="index">
        <div>
            <div class=" d-flex justify-content-center">
                <div class="master">
                    <div class="containe">
                        <h1 class="slider-text d-block mx-3" data-aos="fade-down">
                            <span class="" style="color: black;">...master classroom <br> theories from the <br> comfort
                                of your gadget</span>
                        </h1>
                    </div>
                    <hr style="background-color: white; height: 2px;">
                    <div class="d-block  d-flex justify-content-end mr-3 ml-3">
                        <a href="<?php echo e(url('signup/form')); ?>" class="btn btn-primary join-us" data-aos="fade-right">
                            Register
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center mt-5">
        <div class="access car" style="max-width: 70%; " data-aos="slide-up" data-aos-duration="1000">
            <h3 class="text-center get-access">...Get Access to Professional Tutors</h3>
            <span style="font-size: 18px;">
            </span>
        </div>
    </div>

    <div class="why-choose-us">
        <div class="row">
            <div class="col-md-12 col-12 no-padding no-margin">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="provide-section" data-aos="slide-down">
                        with <br/>
                        Captivating Learning Experience
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-12 no-margin no-padding">
            <div class="learn-with">

                <div class="experience">
                    <header class="captivating" data-aos="slide-right">
                        <span>
                            Learn with <br>
                            Comfort
                        </span>
                    </header>
                </div>
                <a href="<?php echo e(url('signup/form')); ?> " style="width: 150px;" class="btn btn-primary">
                    Join Us
                </a>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/index.blade.php ENDPATH**/ ?>