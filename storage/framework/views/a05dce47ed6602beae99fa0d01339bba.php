

<?php $__env->startSection('content'); ?>

<h1>Assign Nurse to Patient</h1>

<form action="<?php echo e(route('assign-nurse-to-patient-submit')); ?>" method="POST">
    <?php echo csrf_field(); ?>

    <div>
        <label for="nurse_id">Nurse:</label>
        <select name="nurse_id" id="nurse_id">
            <?php $__currentLoopData = $nurses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nurse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($nurse->id); ?>"><?php echo e($nurse->id); ?>:<?php echo e($nurse->first_name); ?> <?php echo e($nurse->last_name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>

                 <label for="active">Active:</label>
                <input type="text" name="active" id="active" >

    <div>
        <label for="patient_id">Patient:</label>
        <select name="patient_id" id="patient_id">
            <?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($patient->id); ?>"><?php echo e($patient->id); ?>:<?php echo e($patient->first_name); ?> <?php echo e($patient->first_name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>

    <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
        <label for="date_assigned">Date assigned:</label>
        <input type="date" class="form-control" name="date_assigned" id="date_assigned" placeholder="yyyy-mm-dd" required>
    </div>

    <button type="submit">Assign Nurse to Patient</button>
</form>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\MyDoc\laravel-ehr-system\resources\views/assign/assign-nurse-to-patient.blade.php ENDPATH**/ ?>