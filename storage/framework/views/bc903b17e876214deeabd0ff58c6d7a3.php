<!DOCTYPE html>
<html lang="en">

<head>
  <?php echo $__env->make('bagian.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</head>

<body class="index-page">

  <?php echo $__env->make('bagian.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
  <main>
    <?php echo $__env->yieldContent('isi'); ?>
  </main>

  <?php echo $__env->make('bagian.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
  <?php echo $__env->yieldPushContent('scripts'); ?>
</body>

</html><?php /**PATH C:\laragon\www\project_akhir\resources\views/layout/master1.blade.php ENDPATH**/ ?>