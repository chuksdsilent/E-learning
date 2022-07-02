<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Learning</title>

    <link rel="stylesheet" href="<?php echo e(asset('libraries/bootstrap/bootstrap.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/settings.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/client.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('libraries/aos/aos.css')); ?>">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bebas+Neue|Roboto+Condensed&display=swap" rel="stylesheet">
    <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<style>
    body {
        font-family: 'Roboto Condensed', sans-serif;
        background-color: #f9f9f9;
    }
</style>

<body style="background: white;">
    <div class="nav-wrapper">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">E-Learning</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto ">
                    </ul>
                    <ul class="navbar-nav inline">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(url('signup/form')); ?>" id="signup">
                                Register
                            </a>
                        </li>
                        <li class="nav-i
                    tem">
                            <a class="nav-link" href="<?php echo e(url('login')); ?>" id="login">
                                Login
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <?php echo $__env->yieldContent('content'); ?>

    <footer style="padding: 10px 0px 20px 0px; color: white; background-color: #2f2f2f;">
        <div class="container py-3">
            <div class="row">
                <div class="col-md-3 col-3">
                    <h4>Explore</h4>
                    <a href="<?php echo e(url('/')); ?>">Home</a>
                    <a href="<?php echo e(url('about-us')); ?>">About Us</a>
                </div>
                <div class="col-md-3 col-3">
                    <h4>Contact Us</h4>
                    <a href="<?php echo e(url('/send-mail')); ?>"> Info@acadazone.com </a>
                </div>
                <div class="col-md-3 col-3">
                    <h4>Follow</h4>
                </div>
                <div class="col-md-3 col-3">
                    <h4>Legal</h4>
                    <a href="<?php echo e(url('/terms-and-conditions')); ?>">Terms of Service</a>
                    <a href="">Privacy Policy</a>
                </div>
            </div>

        </div>

    </footer>
    </div>
    <div class="copyright">
        <h6 class="">
            Copyright 2020 Acadazone. All Right Reserved.
        </h6>
    </div>
    <script src="<?php echo e(asset('libraries/jquery-3.4.1.min.js')); ?>"></script>
    

    <script src="<?php echo e(asset('libraries/bootstrap/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('libraries/aos/aos.js')); ?>"></script>
    <script>
        AOS.init();

        // You can also pass an optional settings object
        // below listed default settings
        AOS.init({
            // Global settings:
            disable: false, // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
            startEvent: 'DOMContentLoaded', // name of the event dispatched on the document, that AOS should initialize on
            initClassName: 'aos-init', // class applied after initialization
            animatedClassName: 'aos-animate', // class applied on animation
            useClassNames: false, // if true, will add content of `data-aos` as classes on scroll
            disableMutationObserver: false, // disables automatic mutations' detections (advanced)
            debounceDelay: 50, // the delay on debounce used while resizing window (advanced)
            throttleDelay: 99, // the delay on throttle used while scrolling the page (advanced)


            // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
            offset: 120, // offset (in px) from the original trigger point
            delay: 0, // values from 0 to 3000, with step 50ms
            duration: 1000, // values from 0 to 3000, with step 50ms
            easing: 'ease', // default easing for AOS animations
            once: false, // whether animation should happen only once - while scrolling down
            mirror: false, // whether elements should animate out while scrolling past them
            anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation

        });

    </script>
</body>

</html><?php /**PATH C:\xampp\htdocs\felken\resources\views/layout.blade.php ENDPATH**/ ?>