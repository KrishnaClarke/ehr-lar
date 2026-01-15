

<?php $__env->startSection('content'); ?>


    <div > 
        <h1>Bed id - <?php echo e($bed->id); ?></h1>
        <p class="text-xl mb-0">Ward id - <?php echo e($bed->ward_id); ?></p>
        <p class="text-xl mb-0">Occupied - <?php echo e($bed->occupied); ?></p>

        <h2>Assigned Patient:</h2>
        <?php if($patient): ?>
            <p><?php echo e($patient->id); ?></p>
            <p><?php echo e($patient->first_name); ?></p>
            <p><?php echo e($patient->last_name); ?></p>
        <?php else: ?>
            <p>No patient assigned.</p>
        <?php endif; ?>

        <form action="/beds/<?php echo e($bed->id); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <button>Throw away bed</button>
        </form>
                                    </div>
                              
                                  <a href="/beds" class="btn btn-primary mt-3 wow zoomIn"><- Back to all Beds </a>
                                  <a href="/beds/update" class="btn btn-primary mt-3 wow zoomIn">Update bed</a>
                            </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\MyDoc\laravel-ehr-system\resources\views/beds/show.blade.php ENDPATH**/ ?>