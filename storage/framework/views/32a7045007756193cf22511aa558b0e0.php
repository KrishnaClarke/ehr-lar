

<?php $__env->startSection('content'); ?>
<div >
  <h1>Create a New Doctor</h1>
  <form class="main-form" action="/doctors" method="POST">
  <?php echo csrf_field(); ?>
        <div class="row mt-5 ">
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
            <label for="first_name">Doctor first name:</label>
            <input type="text" class="form-control" name="first_name" id="first_name" required>
          </div>  
          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
            <label for="last_name">Doctor last name:</label>
            <input type="text" class="form-control" name="last_name" id="last_name" required>
          </div>  
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <label for="date_of_birth">Doctor Date of Birth:</label>
            <input type="text" class="form-control" name="date_of_birth" id="date_of_birth" placeholder="yyyy-mm-dd" required>
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <label for="email">Doctor email:</label>
            <input type="text" class="form-control" name="email" id="email" required>
          </div>
         
        </div>
   
    <input type="submit" value="add new doctor" >
  </form>


  <a href="/doctors"  class="btn btn-primary mt-3 wow zoomIn"><- Back to all Doctors </a>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\MyDoc\laravel-ehr-system\resources\views/doctors/create.blade.php ENDPATH**/ ?>