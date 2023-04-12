<!DOCTYPE html>
<html>
<head>
    <title>Hot Sauce Reviews</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        .navbar-subtext {
            font-size: 16px;
            color: #666;
            margin-top: -10px;
            margin-left: 350px;
        }

        .navbar-text {
            display: flex;
            flex-direction: row;
            align-items: center;
            margin-left: 300px;
        }

        .navbar-text h1 {
            font-weight: bold;
            margin-bottom: 0;
            margin-left: 20px;
        }

        .logo {
            margin-top: 10px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="<?php echo e(route('sauces')); ?>"><?php if(auth()->guard()->guest()): ?> <?php else: ?> ALL SAUCES <?php endif; ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <a class="navbar-brand" href="<?php echo e(route('sauces.add')); ?>"><?php if(auth()->guard()->guest()): ?> <?php else: ?> ADD SAUCES <?php endif; ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <div class="mx-auto">
            <div class="navbar-text">
            <img src="<?php echo e(asset('/images/logo.png')); ?>" width="7%" height="7%" alt="Logo Flamme" class="logo">
                <h1><b>HOT TAKES</b></h1>
            </div>
            <h3 class="navbar-subtext">THE WEB'S BEST HOT SAUCE REVIEWS</h3>
        </div>
        <ul class="navbar-nav ml-auto">
            
<?php if(auth()->guard()->guest()): ?>
<li class="nav-item">
    <a class="nav-link" href="<?php echo e(route('register')); ?>"> SIGN UP</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="<?php echo e(route('login')); ?>"> LOGIN</a>
</li>
<?php else: ?>

<li class="nav-item">
    <a class="nav-link" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">LOGOUT</a>
    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
        <?php echo csrf_field(); ?>
    </form>
</li>
<?php endif; ?>
    </div>
</nav>


    <div class="container mt-5">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
<?php /**PATH C:\laragon\www\saucesitee\resources\views/layouts/app.blade.php ENDPATH**/ ?>