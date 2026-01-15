

<?php $__env->startSection('content'); ?>
<?php if(session('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>
<a href ="/nurses/create" class="btn btn-primary mt-3 wow zoomIn">Add new Nurse</a>
<?php if($nurses->count() > 0): ?>
    <table>
        <thead>
            <tr>
                <th>Nurse's ID</th>
                <th>First name</th>
                <th>Last Name</th>
                <th>Date of birth</th>
                <th>Email</th>
                
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $nurses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nurse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><a href="/nurses/<?php echo e($nurse->id); ?>"><?php echo e($nurse->id); ?></a></td>
                    <td><?php echo e($nurse->first_name); ?></td>
                    <td><?php echo e($nurse->last_name); ?></td>
                    <td><?php echo e($nurse->date_of_birth); ?></td>
                    <td><?php echo e($nurse->email); ?></td>
                    
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No data available</p>
<?php endif; ?>


<a href="/assign/assign-nurse-to-patient" class="btn btn-primary mt-3 wow zoomIn">assign nurse to patient</a>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\MyDoc\laravel-ehr-system\resources\views/nurse/index.blade.php ENDPATH**/ ?>