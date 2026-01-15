

<?php $__env->startSection('content'); ?>
<?php if(session('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>
<a href ="/patients/create" class="btn btn-primary mt-3 wow zoomIn">Add new Patient</a>
<?php if($patients->count() > 0): ?>
        <table>
                <thead>
                    <tr>
                        <th>Patient ID</th>
                        <th>First name</th>
                        <th>Last Name</th>
                        <th>Date of Birth</th>
                        <th>Email</th>
                        
                    </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <tr>
                        <td><a href="/patients/<?php echo e($patient->id); ?>"><?php echo e($patient->id); ?></a></td>
                        <td><?php echo e($patient->first_name); ?></td>
                        <td><?php echo e($patient->last_name); ?></td>
                        <td><?php echo e($patient->date_of_birth); ?></td>
                        <td><?php echo e($patient->email); ?></td>
                    
                       
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 </tbody>
        </table>
        <?php else: ?>
    <p>No data available</p>
        <?php endif; ?>
        <a href="/assign/assign-doctor" class="btn btn-primary mt-3 wow zoomIn">assign doctor to patient</a>
    <a href="/assign/assign-nurse-to-patient" class="btn btn-primary mt-3 wow zoomIn">assign nurse to patient</a>
    <a href="/assign/assign-bed-to-patient" class="btn btn-primary mt-3 wow zoomIn">assign patient to bed</a>

        <?php if(session('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\MyDoc\laravel-ehr-system\resources\views/patient/index.blade.php ENDPATH**/ ?>