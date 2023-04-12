<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card text-center" >
                    <img class="card-img-top" src="<?php echo e(asset($sauce->imageUrl)); ?>" alt="Card image cap" width="300px" height="400px">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo e($sauce->name); ?></h5> 
                        <h6 class="card-subtitle mb-2 text-muted">Heat: <?php echo e($sauce->heat); ?> / 10</h6>
                        <p class="card-text"><?php echo e($sauce->description); ?></p>
                        <p class="card-text">Main Pepper : <?php echo e($sauce->mainPepper); ?></p>
                        <p class="card-text">Manufacturer : <?php echo e($sauce->manufacturer); ?></p>
                        <?php if(Auth::user()->id == $sauce->userId): ?> 
                        <div class="d-flex justify-content-center">
                            <a href="<?php echo e(route('sauces.edit', ['id' => $sauce->id])); ?>" class="btn btn-primary mr-2">Modifier</a>
                            <form action="<?php echo e(route('sauces.destroy', $sauce->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger ml-2">Supprimer</button>
                            </form>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-center align-items-center">
                            <div>
                            <form action="<?php echo e(route('sauces.like', $sauce->id)); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="btn btn-success mr-1">Like</button>
                            </form>
                            <span class="ml-1"><?php echo e($sauce->likes); ?></span> </div>
                            <div>
                            <form action="<?php echo e(route('sauces.dislike', $sauce->id)); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="btn btn-danger mr-1">Dislike</button>
                            </form>
                            <span class="ml-1"><?php echo e($sauce->dislikes); ?></span> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\saucesitee\resources\views/sauce.blade.php ENDPATH**/ ?>