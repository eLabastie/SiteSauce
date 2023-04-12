

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Modifier une sauce</div>
                    <div class="card-body">
                        <form action="<?php echo e(route('sauces.update', $sauce->id)); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="form-group">
                                <label for="name">Nom</label>
                                <input type="text" name="name" id="name" class="form-control" value="<?php echo e($sauce->name); ?>">
                            </div>
                            <div class="form-group">
                                <label for="heat">Chaleur</label>
                                <input type="number" name="heat" id="heat" class="form-control" min="1" max="10" value="<?php echo e($sauce->heat); ?>">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control"><?php echo e($sauce->description); ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="mainPepper">Principal ingrédient</label>
                                <input type="text" name="mainPepper" id="mainPepper" class="form-control" value="<?php echo e($sauce->mainPepper); ?>">
                            </div>
                            <div class="form-group">
                                <label for="manufacturer">Fabricant</label>
                                <input type="text" name="manufacturer" id="manufacturer" class="form-control" value="<?php echo e($sauce->manufacturer); ?>">
                            </div>
                            <div class="form-group">
                                <label for="imageUrl">Image</label>
                                <input type="file" name="imageUrl" id="imageUrl" class="form-control-file">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Modifier la sauce</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\saucesitee\resources\views/sauces/edit.blade.php ENDPATH**/ ?>