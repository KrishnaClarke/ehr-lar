





<?php $__env->startSection('content'); ?>

<h1>Statistics</h1>

<p>Total Doctors: <?php echo e($doctorCount); ?></p>
<p>Total Patients: <?php echo e($patientCount); ?></p>
<p>Total Nurse: <?php echo e($nursesCount); ?></p>
<p>Beds: <?php echo e($availableBeds); ?></p>

<h1>Update</h1>

<a href="/update/update-nurse" class="btn btn-primary mt-3 wow zoomIn">update nurse to patient</a>
<a href="/update/update-doc" class="btn btn-primary mt-3 wow zoomIn">update patient to doctor</a>

<a href="/update/update-bed" class="btn btn-primary mt-3 wow zoomIn">update patient to bed</a>


<h1>Option for assignment</h1>
<a href="/assign/assign-patient" class="btn btn-primary mt-3 wow zoomIn">assign Patient to Doctor</a>
<a href="/assign/assign-doctor" class="btn btn-primary mt-3 wow zoomIn">assign doctor to patient</a>


<a href="/assign/assign-nurse-to-patient" class="btn btn-primary mt-3 wow zoomIn">assign nurse to patient</a>
<a href="/assign/assign-patient-to-nurse" class="btn btn-primary mt-3 wow zoomIn">assign patient to nurse</a>

<a href="/assign/assign-bed-to-patient" class="btn btn-primary mt-3 wow zoomIn">assign patient to bed</a>

<?php if(session('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>



<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\MyDoc\laravel-ehr-system\resources\views/hospital/index.blade.php ENDPATH**/ ?>