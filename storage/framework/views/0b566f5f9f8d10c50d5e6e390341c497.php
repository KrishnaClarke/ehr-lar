

<?php $__env->startSection('content'); ?>
    <div>
                <h1>Doctor's Name - <?php echo e($doctor->first_name); ?> <?php echo e($doctor->last_name); ?></h1>
                    <p class="text-xl mb-0">Date of Birth - <?php echo e($doctor->date_of_birth); ?></p>
                    <p class="text-xl mb-0">Email - <?php echo e($doctor->email); ?></p>

                    <h2>Assigned Patients:</h2>
                    <ul>
                        <?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($patient->id); ?>: <?php echo e($patient->first_name); ?> <?php echo e($patient->last_name); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>

                    <form action="/doctors/<?php echo e($doctor->id); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button>Retired/Dismissal Doctor</button>
                    </form>
    </div>

    <a href="/doctors" class="btn btn-primary mt-3 wow zoomIn"><- Back to all Doctors </a>
    <a href="/beds/{bed}" class="btn btn-primary mt-3 wow zoomIn">Update Doctor</a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\MyDoc\laravel-ehr-system\resources\views/doctors/show.blade.php ENDPATH**/ ?>