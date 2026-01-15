

<?php $__env->startSection('content'); ?>

<div>
    <h1>Patient Name - <?php echo e($patient->first_name); ?> <?php echo e($patient->last_name); ?></h1>
    <p class="text-xl mb-0">Date of Birth - <?php echo e($patient->date_of_birth); ?></p>
    <p class="text-xl mb-0">Email - <?php echo e($patient->email); ?></p>

    <h2>Assigned Doctor:</h2>
    <?php if($patient->doctors): ?>
        <ul>
            <?php $__currentLoopData = $patient->doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($doctor->first_name); ?> <?php echo e($doctor->last_name); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    <?php endif; ?>

    <h2>Assigned Nurses:</h2>
    <?php if($patient->nurses): ?>
        <ul>
            <?php $__currentLoopData = $patient->nurses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nurse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($nurse->id); ?></li>
                <li><?php echo e($nurse->first_name); ?></li>
                <li><?php echo e($nurse->last_name); ?></li><br>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    <?php endif; ?>

   

    <form action="/patients/<?php echo e($patient->id); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('DELETE'); ?>
        <button>Discharge Patient</button>
    </form>
</div>

<a href="/patients" class="btn btn-primary mt-3 wow zoomIn"><- Back to all Patients</a>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\MyDoc\laravel-ehr-system\resources\views/patient/show.blade.php ENDPATH**/ ?>