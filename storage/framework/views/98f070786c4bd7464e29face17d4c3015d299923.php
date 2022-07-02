<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" rel="stylesheet" />
<div class="col-md-12">
    <style>
        .no-display-gen,.no-display-dept, .ind-course, .all-course{
            display: none;
        }
    </style>
    <div class="form-group">

        <input type="hidden" name="general" id="departmental" value="departmental">
    </div>










    <div class="form-group">
        <label for="">Faculty</label>
        <select name="fac_id" id="fac_id" class="form-control">
            <option value="">Select Faculty</option>
            <?php $__currentLoopData = $faculties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faculty): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($faculty->fac_id); ?>"><?php echo e($faculty->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <small class="text-danger" id="fac-error"></small>
    </div>
    <div class="form-group no-display-gen">
        <label for="">Departments</label>
        <select class="js-example-basic-single form-control" name="state" id="gen-dep"  multiple="multiple" style="width: 100%%">
            <?php $__currentLoopData = $depts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dept): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($dept->dept_id); ?>" selected><?php echo e($dept->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <span style="color: red; font-size: 12px;">Select all the departments that offers this course.</span>
    </div>
    <div class="form-group ">
        <label for="">Department</label>
        <select name="dept_id" id="dept_id" class="form-control dept_id">
            <option value="">Select Department</option>
        </select>
        <small class="text-danger" id="dept-error"></small>
    </div>
    <div class="form-group">
        <label for="">level</label>
        <select id="level" class="form-control">
            <option value="">Select Level</option>
            <option value="100">100</option>
            <option value="200">200</option>
            <option value="300">300</option>
            <option value="400">400</option>
            <option value="500">500</option>
        </select>
        <small class="text-danger" id="level-error"></small>

    </div>
    <div class="form-group">
        <label for="">Course</label>
        <select name="course_id" id="course_id" class="form-control">
            <option value="">Select Course</option>
        </select>
        <small class="text-danger" id="course-error"></small>

    </div>
    <div class="form-group all-course">
    <label for="">Courses</label>
        <select class="js-example-basic-single form-control" id="gencours" name="state" style="width: 100%;">
            <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dept): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($dept->course_id); ?>"><?php echo e($dept->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class="form-group">
        <label for="">Semester</label>
        <select id="semester" class="form-control">
            <option value="">Select Semester</option>
            <option value="1">First Semester</option>
            <option value="2">Second Semester</option>
        </select>
        <small class="text-danger" id="semester-error"></small>

    </div>
    <!-- <div class="form-group">
        <label for="">Title</label>
        <select name="topic_id" id="topic_id" class="form-control">
            <option value="">Select Topic</option>
        </select>
        <small class="text-danger" id="topic-error"></small>

    </div> -->
    <div class="form-group">
        <label for="">Topic</label>
        <input type="text" id="title" class="form-control" name="title">
        <small class="text-danger" id="title-error"></small>
    </div>
    <div class="form-group">
        <label for="">Description</label>
        <textarea name="description" id="description" cols="30" rows="10" class="w-100"></textarea>
        <small class="text-danger" id="desc-error"></small>
    </div>
    
    
    
    
    
    
    
    <div class="form-group">
        <label for="">Upload Video</label> <br />
        <input type="file" name="videoFile" id="videoFile">
        
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
    <button type="submit" class="btn btn-block btn-primary" id="uni-submit">
        Submit
    </button>
    
</div>
<script !src="">
</script>
<script src="<?php echo e(asset('libraries/jquery-3.4.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/create_video.js')); ?>"></script>
<script src="<?php echo e(asset('js/upload_video.js')); ?>"></script>
<script src="<?php echo e(asset('libraries/plupload/js/plupload.full.min.js')); ?>"></script>
<script src="<?php echo e(asset('libraries/sweetalert/sweetalert2.min.js')); ?>"></script>
<script src="<?php echo e(asset('libraries/sweetalert/polyfill.js')); ?>"></script>
<?php /**PATH C:\xampp\htdocs\felken\resources\views/instructor/cards/universityCard.blade.php ENDPATH**/ ?>