<?php $__env->startSection('title', 'Videos'); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-md-12">
        <div class="ca">
            <div class="card mt-4 px-3 py-3" style="overflow: auto;">
                <h3 class="mt-3 mx-5"> <i class="fas fa-video"></i>Secondary School Videos</h3>
                <hr />
                <div class="table">
                    <table class="table table-striped hover" id="videos">
                        <thead>
                        <th>S/N</th>
                        <th>Title</th>
                        <th>Total Views</th>
                        <th>Total Likes</th>
                        <th>Total Dislikes</th>
                        <th>Date Posted</th>
                        <th>Action</th>
                        </thead>
                        <tbody>
                        <?php $i=1; ?>
                        <?php $__currentLoopData = $videost; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($i++); ?></td>
                                <td> <a href="<?php echo e(url('admin/video/'. $item->vid_id. '?options=sec')); ?>"><?php echo e($item->title); ?></a> </td>
                                <td><?php echo e(\App\SecVideoViewsLikes::where('vid_id', $item->vid_id)->where('views', 1)->count()); ?>

                                </td>
                                <td><?php echo e(\App\SecVideoViewsLikes::where('vid_id', $item->vid_id)->where('thumbs_up', 1)->count()); ?>

                                </td>
                                <td><?php echo e(\App\SecVideoViewsLikes::where('vid_id', $item->vid_id)->where('thumbs_down', 1)->count()); ?>

                                </td>
                                <td> <?php echo e(\ Carbon\Carbon::parse($item->created_at)->format("d M, Y")); ?> </td>
                                <td>

                                    <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#delete<?php echo e($item->id); ?>">
                                        Delete
                                    </a>
                                    <div class="modal fade" id="delete<?php echo e($item->id); ?>" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <form action="<?php echo e(url('admin/videos/delete/'. $item->id)); ?>">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="exampleModalLabel"> <i
                                                                class="fa fa-warning"></i>
                                                            Delete</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to delete?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default"
                                                                data-dismiss="modal">Cancel</button>
                                                        <a href="<?php echo e(url('admin/videos/delete/'. $item->id)."?vid_path=".$item->vid_path."&vid_id=".$item->vid_id."&status=".$item->status); ?>" class="btn btn-danger">Delete</a>
                                                    </div>
                                                </div>
                                            </div>

                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.partials.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\felken\resources\views/admin/secVideos.blade.php ENDPATH**/ ?>