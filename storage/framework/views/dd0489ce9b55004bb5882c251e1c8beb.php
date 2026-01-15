



<?php $__env->startSection('content'); ?>

<h1>Assign Doctor to Patient</h1>

<form action="<?php echo e(route('assign-doctor-submit')); ?>" method="POST">
   <?php echo csrf_field(); ?>
        <label for="doctor_id">Select Doctor:</label>
        <select name="doctor_id" id="doctor_id">
            <?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($doctor->id); ?>"><?php echo e($doctor->id); ?>: <?php echo e($doctor->first_name); ?> <?php echo e($doctor->last_name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <br><br>
        <label for="patient_id">Select Patient:</label>
        <select name="patient_id" id="patient_id">
            <?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($patient->id); ?>"><?php echo e($patient->id); ?>: <?php echo e($patient->first_name); ?> <?php echo e($patient->last_name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <br><br>
        <div>
                <label for="active">Active:</label>
                <input type="text" name="active" id="active" >
        </div>
        <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <label for="disease">Disease:</label>
            <input type="text" name="disease" id="disease">
            <br><br>
        </div>

        <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <label for="date_assigned">Date Assigned:</label>
            <input type="date" name="date_assigned" id="date_assigned" placeholder="yyyy-mm-dd" required>
            <br><br>
        </div>
        <button type="submit"> Doctor to Patient</button>
    </form>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\MyDoc\laravel-ehr-system\resources\views/assign/assign-doctor.blade.php ENDPATH**/ ?>