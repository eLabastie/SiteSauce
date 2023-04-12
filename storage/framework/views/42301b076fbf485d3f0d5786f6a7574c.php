

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3> Ajouter une nouvelle sauce </h3>
            <form method="post" action="<?php echo e(route('sauces.store')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="name">Nom de la sauce</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="manufacturer">Fabricant</label>
                    <input type="text" class="form-control" id="manufacturer" name="manufacturer" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" required></textarea>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control-file" id="image" name="imageUrl">
                </div>
                <div class="form-group">
                    <label for="mainPepper">Ingrédient principal</label>
                    <input type="text" class="form-control" id="mainPepper" name="mainPepper">
                </div>
                <div class="form-group">
                    <label for="heat">Force</label>
                    <input type="range" class="form-control-range" id="heat" name="heat" min="1" max="10">
                    <span id="heatValue">6</span>
                </div>
                <button type="submit" class="btn btn-primary">Ajouter la sauce</button>
            </form>
        </div>
    </div>
</div>

<script>
// (js) Afficher la valeur du champ de force en temps réel
document.getElementById('heat').addEventListener('input', function() {
    document.getElementById('heatValue').textContent = this.value;
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\saucesitee\resources\views/add.blade.php ENDPATH**/ ?>