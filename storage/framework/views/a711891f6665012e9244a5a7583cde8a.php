<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-50">
            <h3> Bienvenue sur le plus grand site communautaire pour découvrir les meilleures sauces au monde !</h3>
            <img src="<?php echo e(asset('images/sauce_index.jpg')); ?>" alt="Image de sauces" width="100%">
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\saucesitee\resources\views/index.blade.php ENDPATH**/ ?>