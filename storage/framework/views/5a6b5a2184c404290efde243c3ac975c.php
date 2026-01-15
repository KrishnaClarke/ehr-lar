

<?php $__env->startSection('content'); ?>

<h1>Update Patient to Doctor</h1>

<form action="<?php echo e(route('update-doc-submit')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>

    <div>
        <label for="patient_id">Patient:</label>
        <select name="patient_id" id="patient_id">
            <?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($patient->id); ?>">
                    <?php echo e($patient->id); ?>: <?php echo e($patient->first_name); ?> <?php echo e($patient->last_name); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>

    <div>
        <label for="doctor_id">Doctor:</label>
        <select name="doctor_id" id="doctor_id">
            <?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($doctor->id); ?>" >
                    <?php echo e($doctor->id); ?>: <?php echo e($doctor->first_name); ?> <?php echo e($doctor->last_name); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>

    <div>
        <label for="active">Active:</label>
        <input type="text" name="active" id="active" >
    </div>

 

    <div>
        <label for="date_unassigned">Date Unassigned:</label>
        <input type="date" name="date_unassigned" id="date_unassigned" placeholder="yyyy-mm-dd" required >
    </div>

    <button type="submit">Update Patient to Patient</button>
</form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\MyDoc\laravel-ehr-system\resources\views/update/update-doc.blade.php ENDPATH**/ ?>