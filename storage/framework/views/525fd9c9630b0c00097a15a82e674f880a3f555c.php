<?php $__env->startSection('title', 'Students'); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-md-12">
        <div class="ca">
            <div class="card mt-4 px-3 py-3" style="overflow: auto;">
                <h3 class="mt-3 mx-5"> <i class="fas fa-user-friends"></i>Secondary University Students</h3>
                <hr />
                <div class="table">
                    <table class="table table-striped" id="videos">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Username </th>
                            <th scope="col">Name </th>
                            <th scope="col">Email </th>
                            <th scope="col">Phone </th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; ?>
                            <?php $__currentLoopData = $sec_students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th scope="row"><?php echo e($i++); ?></th>
                                    <td>
                                        <a href=""><?php echo e($item->username); ?></a>
                                    </td>
                                    <td>
                                        <a href=""><?php echo e($item->first_name); ?> <?php echo e($item->last_name); ?></a>
                                    </td>
                                    <td>
                                        <a href=""><?php echo e($item->email); ?></a>
                                    </td>
                                    <td>
                                        <a href=""><?php echo e($item->phone); ?></a>
                                    </td>
                                </tr>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.partials.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\felken\resources\views/admin/sec_students.blade.php ENDPATH**/ ?>