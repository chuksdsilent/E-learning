<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo e(asset('libraries/bootstrap/bootstrap.css')); ?>">
    <title>Acadazone</title>
</head>
<body style="background-color: #f9f9f9;">
<div class="d-flex justify-content-center align-items-center" style="">
    <div style="border: 1px solid #ddd;  margin-top: 10%; padding: 2%; background-color: white;">
        <?php if(Session::has('msg')): ?>
            <div class="alert alert-success"><?php echo e(Session::get('msg')); ?></div>
        <?php endif; ?>
        <h1 class="mb-4" style="color: rgb(245, 157, 50) !important; ">Acadazone</h1>
            <hr />

            <div class="card">
                <div class="card-body" style="font-size: 16px;">
                    <h6>Email Confirmation</h6>
                    A verification code has been sent to <?php echo e(Session::get('email')); ?>.  <br>
                    <?php if(Session::has("codemsg")): ?>
                        <div class="alert alert-danger">
                            <?php echo e(Session::get("codemsg")); ?>

                        </div>
                    <?php endif; ?>
                    <form action="<?php echo e(url("/verify-code")); ?>" method="post">
                        <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token">
                        <div class="form-group">
                            <input type="text" name="code" class="form-control">
                        </div>
                        <input type="submit" value="Verify" cla="btn btn-primary">
                    </form>
                </div>

            <br />
            <a href="<?php echo e(url('resend-email')); ?>">Resend Email</a>
        </div>

    </div>
</div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\felken\resources\views/email_notification.blade.php ENDPATH**/ ?>