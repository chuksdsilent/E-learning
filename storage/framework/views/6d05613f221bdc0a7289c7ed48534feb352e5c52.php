<div class="col-md-12">


<div class="form-group">
    <label for="class">Class</label>
    <select name="class" id="class" class="form-control">
        <option value="">Select a Class</option>
        <option value="1">JSS1</option>
        <option value="2">JSS2</option>
        <option value="3">JSS3</option>
        <option value="4">SS1</option>
        <option value="5">SS2</option>
        <option value="6">SS3</option>
    </select>
    <br />
    <small id="class-error" class="text-danger"></small>
</div>
<div class="form-group">
    <label for="class">Subject</label>
    <select name="subject" id="subject" class="form-control">
        <option value="">Select a Subject</option>
        <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($subject->sub_id); ?>"><?php echo e($subject->name); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <br />
    <small id="subject-error" class="text-danger"></small>
</div>
<div class="form-group">
    <label for="title">Topic</label>
    <input type="text" name="title" id="sectitle" class="form-control">
    <br />
    <small id="title-error" class="text-danger"></small>
</div>
<div class="form-group">
    <label for="description">Overview</label>
    <textarea name="overview" id="overview" id="" cols="30" rows="10" class="w-100"></textarea>
    <br />
    <small id="overview-error" class="text-danger"></small>
</div>






<div class="form-group">
    <label for="">Upload Video</label> <br />
    <input type="file" id="sec-video" class="sec-video">
    <br />
    <small id="sec-video-error" class="text-danger"></small>
</div>
<div class="form-group">
    <button type="submit" id="secsubmit" class="btn btn-primary btn-block">
        Upload
    </button>
</div>

</div>

<script src="<?php echo e(asset('js/uploadSecVideo.js')); ?>"></script>
<?php /**PATH C:\xampp\htdocs\felken\resources\views/instructor/cards/secCard.blade.php ENDPATH**/ ?>