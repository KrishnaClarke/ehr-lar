

<?php $__env->startSection('content'); ?>

<div >
  <h1>Create a New Bed</h1>
  <form class="main-form" action="/beds" method="POST">
  <?php echo csrf_field(); ?>
        
         
  <div>
        <label for="ward_id">Ward:</label>
        <select name="ward_id" id="ward_id">
            <?php $__currentLoopData = $wards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ward): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($ward->id); ?>"><?php echo e($ward->id); ?>: <?php echo e($ward->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>




        
    <input type="submit" value="add new bed" >
  </form>


  <a href="/beds"  class="btn btn-primary mt-3 wow zoomIn"><- Back to all beds </a>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\MyDoc\laravel-ehr-system\resources\views/beds/create.blade.php ENDPATH**/ ?>