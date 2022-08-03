<?php $__env->startSection('title'); ?>
    Acesso Administravido - <?php echo e(env('APP_NAME')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">

      <div class="col-sm-12 col-md-6  col-lg-6">
        <div class="card card-primary">
            <div class="card-header align-items-center justify-content-center">
              <h4>Acesso Administrativo -  <?php echo e(env('APP_NAME')); ?> </h4>
            </div>
            <?php if($errors->any()): ?>
    <?php echo e(implode('', $errors->all('<div>:message</div>'))); ?>

<?php endif; ?>
            <div class="card-body">
              <form method="POST" action="<?php echo e(route('Admin.Login.Verify')); ?>" novalidate="">
                  <?php echo csrf_field(); ?>
                  <?php if(Session::has('error')): ?>
                  <div class="alert alert-danger text-center">
                      <?php echo e(Session::get('error')); ?>

                  </div>
              <?php endif; ?>

              <?php if(Session::has('error_attempts')): ?>
              <div class="alert alert-danger text-center">
                  <?php echo e(Session::get('error_attempts')); ?>

              </div>
          <?php endif; ?>


              <?php if(Session::has('success')): ?>
              <div class="alert alert-success text-center">
                  <?php echo e(Session::get('success')); ?>

              </div>
          <?php endif; ?>

                <div class="form-group">
                  <label for="email">Numero de Utilizador</label>
                  <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" tabindex="1" required autofocus>
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="form-group">
                  <div class="d-block">
                    <label for="password" class="control-label">Palavra-Passe</label>
                    <div class="float-right">
                      <a href="auth-forgot-password.html" class="text-small">
                        Forgot Password?
                      </a>
                    </div>
                  </div>
                  <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                  <div class="invalid-feedback">
                    please fill in your password
                  </div>
                </div>
                <div class="form-group">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                    <label class="custom-control-label" for="remember-me">Remember Me</label>
                  </div>
                </div>
                <?php if(!Session::has('error_attempts')): ?>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                    Aceder
                  </button>
                </div>
                <?php endif; ?>
              </form>


            </div>
          </div>
      </div>

    </div>
  </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.auth.auth_login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\movies\resources\views/admin/auth/login.blade.php ENDPATH**/ ?>