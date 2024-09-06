<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Acadazone</title>
    <link rel="stylesheet" href="<?php echo e(asset('libraries/bootstrap/bootstrap.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/settings.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/client.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('libraries/animate/animate.min.css')); ?>">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bebas+Neue|Roboto+Condensed&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Mono|Ubuntu+Mono&display=swap" rel="stylesheet">
</head>
<style>

    body {
        font-size: 16px;
    }
    h5{
        font-weight: 600;
    }
</style>
<body>

<div class="nav-wrapper">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="#">Acadazone</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false"
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
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(url('login')); ?>" id="login">
                            Login
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
<div class="container my-5">
    <div class="card" style="text-align: justify;">
        <h2 style="border-bottom: 1px solid #f9f9f9;">About us</h2>
        <hr />
        <h5>Our Mission</h5>
        <p>
            To create an online community with unlimited access to the best quality tutors and contents developed in alignment with the user's academic curriculum, where students can flourish by learning vast and on own terms.
        </p>
        <h5>Our Vision</h5>
        <p>
            To become Africa's leading learning platform with up-to-date database of standard lectures and notes on all academic syllabuses.

        </p>
        <h5>What we do</h5>
        <p>
            Acadazone is an online lecture portal from Nigeria. We offer comprehensive and affordable online classes to the African students with strict adherence to their academic curriculum.


            <br/>
        <p>
            Acadazone aims to cultivate the zeal for continuous and in-depth learning and improvement in the African students by granting him/her access to a platform where he/she can learn about the same topics and subjects from different instructors at his/her own pace from the comfort of his gadget. This ease of access to, and availability of different sources will open the learners' mind to different approaches to solving the same problems thus promoting understanding and creativity.

        </p>
        <p>

            Schools, therefore, have a unique opportunity to showcase their teaching talents by getting on-board the acadazone platform, and widening the horizons of their subjects by encouraging them to explore the community beyond the confines of their own contents on the platform.


        </p>
        <p>
            Acadazone is not just about offering content, it is about setting standards.
        </p>
    </div>
        </p>
    </div>
</div>
<footer style="color: white; background-color: #2f2f2f;">
    <h6 class="text-center py-3" style="margin: 0px;">
        Copyright 2020 Acadazone. All Right Reserved.
    </h6>

</footer>
</body>
</html>
<?php /**PATH /var/www/resources/views/our_story.blade.php ENDPATH**/ ?>