<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row">
                    <?php $__currentLoopData = $sauces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sauce): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-3 mb-3">
                            <a href="<?php echo e(route('sauces.show', ['id' => $sauce->id])); ?>" style="text-decoration:none;">
                                <div class="card text-center" style="width: 100%;">
                                <img class="card-img-top" src="<?php echo e(asset($sauce->imageUrl)); ?>" alt="Card image cap" width="400px" height="250px">


                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo e($sauce->name); ?></h5>
                                        <p class="card-text">Heat: <?php echo e($sauce->heat); ?></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\saucesitee\resources\views/sauces.blade.php ENDPATH**/ ?>