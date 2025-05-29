

<?php $__env->startSection('isi'); ?>
<main class="main">

  <!-- Page Title -->
  <div class="page-title">
    <div class="heading">
      <div class="container">
        <div class="row d-flex justify-content-center text-center">
          <div class="col-lg-8">
            <h1>Login</h1>
            <p class="mb-0">Silakan masuk untuk melaporkan dan memantau kondisi sampah di lingkungan sekitar Anda.</p>
          </div>
        </div>
      </div>
    </div>
  </div><!-- End Page Title -->

  <!-- Login Form Section -->
  <?php if(session('error')): ?>
      <div class="alert alert-danger text-center">
          <?php echo e(session('error')); ?>

      </div>
  <?php endif; ?>

  <section id="login-section" class="section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <div class="card p-4 shadow rounded">
            <form method="POST" action="<?php echo e(route('kirimdata')); ?>">
              <?php echo csrf_field(); ?>
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo e(old('email')); ?>" required autofocus>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Kata Sandi</label>
                <input type="password" class="form-control" id="password" name="password" required>
              </div>
              <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label" for="remember">Ingat saya</label>
              </div>
              <button type="submit" class="btn btn-primary w-100">Masuk</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section><!-- /Login Form Section -->

</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master1', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\project_akhir\resources\views/autentikasi/login.blade.php ENDPATH**/ ?>