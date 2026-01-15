

<?php $__env->startSection('content'); ?>

<h1>Assign Bed to Patient</h1>

<form action="<?php echo e(route('assign-bed-to-patient-submit')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <div>
        <label for="bed_id">Bed:</label>
        <select name="bed_id" id="bed_id">
            <?php $__currentLoopData = $beds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bed): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($bed->id); ?>"><?php echo e($bed->id); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>

    <div>
        <label for="patient_id">Patient:</label>
        <select name="patient_id" id="patient_id">
            <?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($patient->id); ?>"><?php echo e($patient->id); ?>: <?php echo e($patient->first_name); ?> <?php echo e($patient->last_name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>

    <div>
        <label for="occupied">Occupied:</label>
        <input type="text" name="occupied" id="occupied">
    </div>

    <button type="submit">Assign Bed to Patient</button>
</form>


<a href="/beds"  class="btn btn-primary mt-3 wow zoomIn"><- Back to all beds </a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\MyDoc\laravel-ehr-system\resources\views/assign/bed-to-patient.blade.php ENDPATH**/ ?>