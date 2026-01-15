

<?php $__env->startSection('content'); ?>
<?php if(session('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>
<a href ="/doctors/create" class="btn btn-primary mt-3 wow zoomIn">Add new Doctor</a>
<?php if($doctors->count() > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Doctor's ID</th>
                    <th>First name</th>
                    <th>Last Name</th>
                    <th>Date of birth</th>
                    <th>Email</th>
                    
                </tr>  
            </thead>
            <tbody>
            <?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><a href="/doctors/<?php echo e($doctor->id); ?>"><?php echo e($doctor->id); ?></a></td>
                    <td><?php echo e($doctor->first_name); ?></td>
                    <td><?php echo e($doctor->last_name); ?></td>
                    <td><?php echo e($doctor->date_of_birth); ?></td>
                    <td><?php echo e($doctor->email); ?></td>
                    
                </tr>    
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <?php else: ?>
    <p>No data available</p>
        <?php endif; ?>
        <?php if(session('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>

<a href="/assign/assign-doctor" class="btn btn-primary mt-3 wow zoomIn">assign doctor to patient</a>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\MyDoc\laravel-ehr-system\resources\views/doctors/index.blade.php ENDPATH**/ ?>