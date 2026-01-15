


<?php $__env->startSection('content'); ?>
<?php if(session('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>
<a href ="/beds/create" class="btn btn-primary mt-3 wow zoomIn">Add new Bed</a>
<?php if($beds->count() > 0): ?>
<table>
    <thead>
        <tr>
            <th>Bed id</th>
            <th>Ward</th>
            <th>Patient first Name</th>
            <th>Patient last Name</th>
            <th>Patient Email</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $beds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bed): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><a href="/beds/<?php echo e($bed->id); ?>"><?php echo e($bed->id); ?></td>
                <td><?php echo e(optional($bed->ward)->name); ?></td>
                <td><?php echo e(optional($bed->patient)->first_name); ?></td>
                <td><?php echo e(optional($bed->patient)->last_name); ?></td>
                <td><?php echo e(optional($bed->patient)->email); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php else: ?>
    <p>No data available</p>
<?php endif; ?>


<a href="/assign/assign-bed-to-patient" class="btn btn-primary mt-3 wow zoomIn">assign patient to bed</a>
<?php if(session('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\MyDoc\laravel-ehr-system\resources\views/beds/index.blade.php ENDPATH**/ ?>