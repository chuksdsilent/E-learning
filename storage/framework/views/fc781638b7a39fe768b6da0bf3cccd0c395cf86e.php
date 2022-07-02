<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Learning</title>
    <link rel="stylesheet" href="<?php echo e(asset('libraries/bootstrap/bootstrap.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/settings.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('libraries/animate/animate.min.css')); ?>">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/signup.css')); ?>">

    <style>
        .login-bg {
            background-image: url("<?php echo e(asset('images/instructoz.png')); ?> ");
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

    </style>
</head>

<body class="login-bg">
    <div class="login-wrapper">
        <div class="navbar navbar-expand-lg navbar-light">
            <nav class="container">
                <a class="navbar-brand" href="#">E-Learning</a>
            </nav>
        </div>
        <div class="container sign-up-form">
            <div class="row  d-flex justify-content-center my-4">
                <div class="col-md-12 col-12">
                    <div class="container">

                        <?php if(Session::has('errmsg')): ?>
                        <?php $__env->startComponent('instructor.components.alert'); ?>
                        <?php $__env->slot('class'); ?>
                        <?php echo e(Session::get('class')); ?>

                        <?php $__env->endSlot(); ?>
                        <?php $__env->slot('msg'); ?>
                        <?php echo e(Session::get('errmsg')); ?>.
                        <?php $__env->endSlot(); ?>
                        <?php echo $__env->renderComponent(); ?>
                        <?php endif; ?>
                        <div class="card mt-3" id="sign-up-form">
                            <h2 class=" px-3">Login</h2>
                            <hr />

                            <form action="<?php echo e(url('instructor/login')); ?>" method="post">
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                <input type="hidden" name="role" value="I">
                                <div class="row">
                                    <div class="form-group col-md-12 col-12">
                                        <label for="">Email</label>
                                        <input type="text" name="email" value="<?php echo e(old('email')); ?>" id="first_name"
                                            class="form-control">
                                        <?php if($errors->has('email')): ?>
                                        <small class="text-danger"><?php echo e($errors->first('email')); ?></small>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group  col-md-12 col-12">
                                        <label for="">Password</label>
                                        <input type="password" name="password" class="form-control">
                                        <?php if($errors->has('password')): ?>
                                        <small class="text-danger"><?php echo e($errors->first('password')); ?></small>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary mt-3 btn-block">
                                        Login
                                    </button>
                                </div>
                                You dont have account yet &nbsp; <a href=" <?php echo e(url('signup/form')); ?> ">Sign
                                    up</a>
                                <br>
                                <a href="<?php echo e(url('/enter-email')); ?>">Forget Password</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="<?php echo e(asset('libraries/jquery-3.4.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('libraries/javascript/login.js')); ?>"></script>
    <script src="<?php echo e(asset('libraries/javascript/signup.js')); ?>"></script>

    <script src="<?php echo e(asset('libraries/bootstrap/bootstrap.min.js')); ?>"></script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\felken\resources\views/instructor/login.blade.php ENDPATH**/ ?>