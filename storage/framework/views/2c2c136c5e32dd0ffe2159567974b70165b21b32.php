<?php $__env->startSection('title', 'Change Password'); ?>
<?php $__env->startSection('content'); ?>
<div class="col-md-9">
    <div class="d-flex justify-content-center mt-5">
        <div class="change-password">
            <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php if($errors->first('old_password')): ?><li> <?php echo e($errors->first('old_password')); ?> </li><?php endif; ?>
                    <?php if($errors->first('new_password')): ?> <li><?php echo e($errors->first('new_password')); ?> </li><?php endif; ?>
                    <?php if($errors->first('confirm_password')): ?> <li><?php echo e($errors->first('confirm_password')); ?> </li><?php endif; ?>

                </ul>
            </div>
            <?php endif; ?>
            <?php if(Session::has('sucess_msg')): ?>
            <div class="alert alert-success">
                <i class="fa fa-check-circle" aria-hidden="true"></i>
                <?php echo e(Session::get('sucess_msg')); ?>

            </div>
            <?php endif; ?>
            <?php if(Session::has('err_msg')): ?>
            <div class="alert alert-danger">
                <i class="fa fa-warning-triangle" aria-hidden="true"></i>
                <?php echo e(Session::get('err_msg')); ?>

            </div>
            <?php endif; ?>
            <div class="card px-3 py-3">
                <h3>Change Password</h3>
                <hr />
                <form action="<?php echo e(route('update-password')); ?>" method="POST">
                    <?php echo method_field('patch'); ?>
                    <?php echo e(method_field('PATCH')); ?>

                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="">Old Password</label>
                        <input type="password" name="old_password" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">New Password</label>
                        <input type="password" name="new_password" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Confirm Password</label>
                        <input type="password" name="confirm_password" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Change Password" class="btn btn-block btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(Auth::user()->role=="A"? 'admin.partials.layout' : 'instructor.partials.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\felken\resources\views/change_password.blade.php ENDPATH**/ ?>