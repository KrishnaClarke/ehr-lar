

<?php $__env->startSection('content'); ?>
    <div>
        <h1>Nurse's Name - <?php echo e($nurse->first_name); ?> <?php echo e($nurse->last_name); ?></h1>
        <p class="text-xl mb-0">Date of Birth - <?php echo e($nurse->date_of_birth); ?></p>
        <p class="text-xl mb-0">Email - <?php echo e($nurse->email); ?></p>

        <h2>Assigned Patients:</h2>
        <?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <ul>
                <li>Patient: <?php echo e($patient->first_name); ?> <?php echo e($patient->last_name); ?></li>
           
                <?php $__currentLoopData = $patient->doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <h3>Doctor: <?php echo e($doctor->first_name); ?> <?php echo e($doctor->last_name); ?></h3>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
      


       
    </div>

    <!-- Display common nurses and assigned patients -->
    </div>
    <form action="/nurses/<?php echo e($nurse->id); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('DELETE'); ?>
        <button>Retired/Dismissal Nurse</button>
    </form>
</div>

<a href="/nurses" class="btn btn-primary mt-3 wow zoomIn"><- Back to all Nurses</a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\MyDoc\laravel-ehr-system\resources\views/nurse/show.blade.php ENDPATH**/ ?>