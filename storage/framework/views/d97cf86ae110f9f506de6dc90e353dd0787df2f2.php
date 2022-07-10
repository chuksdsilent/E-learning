<div class="col-md-12">

    <?php if(Session::has('msg')): ?>
    <?php $__env->startComponent('instructor.components.alert'); ?>
    <?php $__env->slot('class'); ?>
    <?php echo e(Session::get('class')); ?>

    <?php $__env->endSlot(); ?>
    <?php $__env->slot('msg'); ?>
    <?php echo e(Session::get('msg')); ?>.
    <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <?php endif; ?>
    <?php if($errors->first('video')): ?><small class="text-danger"><?php echo e($errors->first('video')); ?></small><?php endif; ?><small></small>
    <div class="content">
        <div class="card no-padding">
            

            <?php echo csrf_field(); ?>
            <div class="">
                <div class="form-group">
                    <label for="">Name</label>
                    <select name="institution_id" id="institution-name" class="form-control">
                        <option value="">Select School</option>
                        <?php $__currentLoopData = $otherInstitutions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $otherInstitution): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($otherInstitution->institution_id); ?>"><?php echo e($otherInstitution->institution_name); ?>

                        </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <small class="text-danger" id="uni-error"></small>
                </div>
                <div class="form-group">
                    <label for="">Level</label>
                    <select name="level" id="otherlevels" class="form-control">
                        <option value="">Select Level</option>
                    </select>
                    <small class="text-danger" id="fac-error"></small>
                </div>
                <div class="form-group">
                    <label for="">Course</label>
                    <select name="course_id" id="othercourse" class="form-control">
                        <option value="">Select Course</option>
                    </select>
                    <small class="text-danger" id="course-error"></small>

                </div>
                <div class="form-group">
                    <label for="">Semester</label>
                    <select id="othersemester" name="semester" class="form-control">
                        <option value="">Select Semester</option>
                        <option value="1">First Semester</option>
                        <option value="2">Second Semester</option>
                    </select>
                    <small class="text-danger" id="semester-error"></small>

                </div>
                
                
                
                
                
                

                
                <div class="form-group">
                    <label for="">Topic</label>
                    <input type="text"  id="othertitle" class="form-control" name="title">
                    <small class="text-danger" id="title-error"></small>
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="description" id="descript" cols="30" rows="10" class="w-100"></textarea>
                    <small class="text-danger" id="desc-error"></small>
                </div>
                
                
                
                
                
                
                
                <div class="form-group">
                    <label for="">Upload Video</label> <br />
                    <input type="file" name="videoFile" id="othervideoFile">
                    
                    <div>
                        <small class="text-danger" id="file-error"></small>
                    </div>
                </div>
            </div>
            <ul id="filelist"></ul>
            <br />
            <br />
            <pre id="console"></pre>
            <div class="form-group">
                <button type="submit" class="btn btn-block btn-primary" id="submitinstitution">
                    Submit
                </button>
                
            </div>
        </div>

    </div>
</div>

<script src="<?php echo e(asset('libraries/js/upload_institution_video.js')); ?>"></script>
<script src="<?php echo e(asset('libraries/js/other_institution_video.js')); ?>"></script>
<?php /**PATH C:\xampp\htdocs\felken\resources\views/instructor/cards/otherCard.blade.php ENDPATH**/ ?>