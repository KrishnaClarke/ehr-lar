


<?php $__env->startSection('content'); ?>

<h1>Update</h1>

<a href="/update/update-nurse" class="btn btn-primary mt-3 wow zoomIn">update nurse to patient</a>
<a href="/update/update-doc" class="btn btn-primary mt-3 wow zoomIn">update patient to doctor</a>

<a href="/update/update-bed" class="btn btn-primary mt-3 wow zoomIn">update patient to bed</a>

<?php if(session('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\MyDoc\laravel-ehr-system\resources\views/update/index.blade.php ENDPATH**/ ?>