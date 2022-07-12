<?php $__env->startSection('content'); ?>

<h3>Dashboard</h3>
<div class="box-area">
    <div class="row">
        <div class="col-md-3 no-padding-left">
            <div class="dash-box bg-info">
                <div class="box-content ml-4 pt-3">
                    <h2><?php echo e(\App\Instructors::count()); ?></h2>
                    <h6>Instructors</h6>
                </div>
                <a href="http://">More info <i class="far fa-arrow-alt-circle-right"></i></a>

            </div>
        </div>
        <div class="col-md-3 no-padding-left">
            <div class="dash-box bg-success">
                <div class="box-content  ml-4 pt-3">
                    <h2><?php echo e(\App\Students::count()); ?></h2>
                    <h6>University Students</h6>
                </div>
                <a href="http://">More info
                    <i class="far fa-arrow-alt-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-md-3 no-padding-left">
            <div class="dash-box bg-danger">
                <div class="box-content ml-4 pt-3">
                    <h2><?php echo e(\App\Subjects::count()); ?></h2>
                    <h6>Subjects</h6>
                </div>
                <a href="http://">More info <i class="far fa-arrow-alt-circle-right"></i></a>
            </div>
        </div>
        <div class="col-md-3 no-padding-left">
            <div class="dash-box bg-warning">
                <div class="box-content ml-4 pt-3">
                    <h2><?php echo e(\App\Universities::count()); ?></h2>
                    <h6>Universites</h6>
                </div>
                <a href="http://">More info <i class="far fa-arrow-alt-circle-right"></i></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 no-padding-left">
            <div class="dash-box bg-show">
                <div class="box-content ml-4 pt-3">
                    <h2><?php echo e(\App\Faculties::count()); ?></h2>
                    <h6>Facultiess</h6>
                </div>
                <a href="http://">More info <i class="far fa-arrow-alt-circle-right"></i></a>
            </div>
        </div>
        <div class="col-md-3 no-padding-left">
            <div class="dash-box bg-d">
                <div class="box-content  ml-4 pt-3">
                    <h2><?php echo e(\App\Departments::count()); ?></h2>
                    <h6>Departments</h6>
                </div>
                <a href="http://">More info <i class="far fa-arrow-alt-circle-right"></i></a>

            </div>
        </div>
        <div class="col-md-3 no-padding-left">
            <div class="dash-box bg-warning">
                <div class="box-content ml-4 pt-3">
                    <h2><?php echo e(\App\Courses::count()); ?></h2>
                    <h6>Courses</h6>
                </div>
                <a href="http://">More info <i class="far fa-arrow-alt-circle-right"></i></a>
            </div>
        </div>
        <div class="col-md-3 no-padding-left">
            <div class="dash-box bg-t">
                <div class="box-content ml-4 pt-3">
                    <h2><?php echo e(\App\Topics::count()); ?></h2>
                    <h6>Topics</h6>
                </div>
                <a href="http://">More info <i class="far fa-arrow-alt-circle-right"></i></a>
            </div>
        </div>
    </div>
</div>
<div class="box-area">
    <div class="row">
        <div class="col-md-3 no-padding-left">
            <div class="dash-box bg-info">
                <div class="box-content ml-4 pt-3">
                    <h2><?php echo e(\App\Videos::where('status', 'U')->count()); ?></h2>
                    <h6>University Videos</h6>
                </div>
                <a href="http://">More info <i class="far fa-arrow-alt-circle-right"></i></a>
            </div>
        </div>
        <div class="col-md-3 no-padding-left">
            <div class="dash-box bg-success">
                <div class="box-content  ml-4 pt-3">
                    <h2><?php echo e(\App\VideoViewsLikes::where('views', 1)->count()); ?></h2>
                    <h6>Views</h6>
                </div>
                <a href="http://">More info
                    <i class="far fa-arrow-alt-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-md-3 no-padding-left">
            <div class="dash-box bg-danger">
                <div class="box-content ml-4 pt-3">
                    <h2><?php echo e(\App\VideoViewsLikes::where('thumbs_up', 1)->count()); ?></h2>
                    <h6>Likes</h6>
                </div>
                <a href="http://">More info <i class="far fa-arrow-alt-circle-right"></i></a>
            </div>
        </div>
        <div class="col-md-3 no-padding-left">
            <div class="dash-box bg-warning">
                <div class="box-content ml-4 pt-3">
                    <h2><?php echo e(\App\VideoViewsLikes::where('thumbs_down', 1)->count()); ?></h2>
                    <h6>Dislikes</h6>
                </div>
                <a href="http://">More info <i class="far fa-arrow-alt-circle-right"></i></a>
            </div>
        </div>
    </div>
    <div class="box-area">
        <div class="row">
            <div class="col-md-3 no-padding-left">
                <div class="dash-box  bg-t">
                    <div class="box-content ml-4 pt-3">
                        <h2><?php echo e(\App\Videos::where('status', 'S')->count()); ?></h2>
                        <h6>Secondary School Videos</h6>
                    </div>
                    <a href="http://">More info <i class="far fa-arrow-alt-circle-right"></i></a>

                </div>
            </div>
            <div class="col-md-3 no-padding-left">
                <div class="dash-box bg-show">
                    <div class="box-content  ml-4 pt-3">
                        <h2><?php echo e(\App\SecVideoViewsLikes::where('thumbs_up', 1)->count()); ?></h2>
                        <h6>Secondary School Likes</h6>
                    </div>
                    <a href="http://">More info
                        <i class="far fa-arrow-alt-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-3 no-padding-left">
                <div class="dash-box bg-danger">
                    <div class="box-content ml-4 pt-3">
                        <h2><?php echo e(\App\SecVideoViewsLikes::where('thumbs_down', 1)->count()); ?></h2>
                        <h6>Secondary School dislikes</h6>
                    </div>
                    <a href="http://">More info <i class="far fa-arrow-alt-circle-right"></i></a>
                </div>
            </div>
            <div class="col-md-3 no-padding-left">
                <div class="dash-box  bg-d">
                    <div class="box-content ml-4 pt-3">
                        <h2><?php echo e(\App\SecVideoViewsLikes::where('views', 1)->count()); ?></h2>
                        <h6>Secondary School views</h6>
                    </div>
                    <a href="http://">More info <i class="far fa-arrow-alt-circle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="box-area">
            <div class="row">
                <div class="col-md-3 no-padding-left">
                    <div class="dash-box  bg-t">
                        <div class="box-content ml-4 pt-3">
                            <h2><?php echo e(\App\Video::where('status', 'O')->count()); ?></h2>
                            <h6>Other School Videos</h6>
                        </div>
                        <a href="http://">More info <i class="far fa-arrow-alt-circle-right"></i></a>

                    </div>
                </div>
                <div class="col-md-3 no-padding-left">
                    <div class="dash-box bg-show">
                        <div class="box-content  ml-4 pt-3">
                            <h2><?php echo e(\App\OtherInstitutionViewsLikes::where('thumbs_up', 1)->count()); ?></h2>
                            <h6>Other School Likes</h6>
                        </div>
                        <a href="http://">More info
                            <i class="far fa-arrow-alt-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 no-padding-left">
                    <div class="dash-box bg-danger">
                        <div class="box-content ml-4 pt-3">
                            <h2><?php echo e(\App\OtherInstitutionViewsLikes::where('thumbs_down', 1)->count()); ?></h2>
                            <h6>Other School dislikes</h6>
                        </div>
                        <a href="http://">More info <i class="far fa-arrow-alt-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-md-3 no-padding-left">
                    <div class="dash-box  bg-d">
                        <div class="box-content ml-4 pt-3">
                            <h2><?php echo e(\App\OtherInstitutionViewsLikes::where('views', 1)->count()); ?></h2>
                            <h6>Other School views</h6>
                        </div>
                        <a href="http://">More info <i class="far fa-arrow-alt-circle-right"></i></a>
                    </div>
                </div>
            </div>
    <section class="char">
        <div class="car">
            <div class="row">
                <div class="col-md-5 col-7">
                    <div class="card">
                        <h6 class="mx-5 pt-">Latest Instructors</h6>
                        <hr />
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card">
                        <h6>Latest Upload</h6>
                        <hr />
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Instructor</th>
                                    <th scope="col">View</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; ?>
                                <?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th scope="row"><?php echo e($i++); ?></th>
                                    <td>
                                        <?php echo e($item->title); ?>

                                    </td>
                                    <td><?php echo e(\App\Instructors::where('email', $item->email)->value('first_name')); ?>

                                        <?php echo e(\App\Instructors::where('email', $item->email)->value('last_name')); ?></td>
                                    <td>
                                        <a href="<?php echo e(url('admin/video/'. $item->vid_id)); ?>"> <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.partials.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\felken\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>