<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <link href="<?php echo e(asset('frontend/css/bootstrap5.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('frontend/css/custom.css')); ?>" rel="stylesheet">
    <style>
        form label {
  display: inline-block;
  width: 100px;
}

form div {
  margin-bottom: 10px;
}

.error {
  color: red;
  margin-left: 5px;
}

label.error {
  display: inline;
}
        </style>
</head>
<body>
    <div id="app">

        <main class="py-4">
            <?php echo $__env->yieldContent('content'); ?>
        </main>

    </div>

    <!-- Scripts -->
    <script src="<?php echo e(asset('frontend/js/jquery-3.6.0.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/js/bootstrap5.bundle.min.js')); ?>"></script>
    <?php echo $__env->yieldContent('scripts'); ?>

</body>
</html>
<?php /**PATH /var/www/html/user-crud-app/resources/views/layouts/app.blade.php ENDPATH**/ ?>