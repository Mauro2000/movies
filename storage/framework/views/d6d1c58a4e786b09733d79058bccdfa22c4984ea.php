<?php $__env->startSection('title'); ?>
    ola
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="row">

            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="card-statistic-4">
                      <div class="align-items-center justify-content-between">
                        <div class="row ">
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                            <div class="card-content">
                              <h5 class="font-30">Filmes</h5>
                              <h2 class="mb-3 font-20"><?php echo e($movies); ?></h2>

                            </div>
                          </div>
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                            <div class="banner-img">
                              <img src="<?php echo e(asset('images/movieicon.png')); ?>" width="110" height="110" alt="">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>

            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="card-statistic-4">
                      <div class="align-items-center justify-content-between">
                        <div class="row ">
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                            <div class="card-content">
                              <h5 class="font-30">Series</h5>
                              <h2 class="mb-3 font-20"><?php echo e($series); ?></h2>

                            </div>
                          </div>
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                            <div class="banner-img">
                              <img src="<?php echo e(asset('images/seriesicon.png')); ?>" width="110" height="110" alt="">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>

            <div class="col-xl-5 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="card-statistic-4">
                      <div class="align-items-center justify-content-between">
                        <div class="row ">
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                            <div class="card-content">
                              <h5 class="font-30">Documentarios</h5>
                              <h2 class="mb-3 font-20">0</h2>

                            </div>
                          </div>
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                            <div class="banner-img">
                              <img src="<?php echo e(asset('images/documentaryicon.png')); ?>" width="110" height="110" alt="">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="card-statistic-4">
                      <div class="align-items-center justify-content-between">
                        <div class="row ">
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                            <div class="card-content">
                              <h5 class="font-30">Kids</h5>
                              <h2 class="mb-3 font-20">0</h2>

                            </div>
                          </div>
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                            <div class="banner-img">
                              <img src="<?php echo e(asset('images/kidsicon.png')); ?>" width="110" height="110" alt="">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="card-statistic-4">
                      <div class="align-items-center justify-content-between">
                        <div class="row ">
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                            <div class="card-content">
                              <h5 class="font-30">Notificações</h5>
                              <?php if($user->unreadnotifications->count()): ?>
                                <h2 class="mb-3 font-20"><?php echo e($user->unreadnotifications->count()); ?></h2>
                                <?php else: ?>
                                <h2 class="mb-3 font-20">0</h2>

                              <?php endif; ?>


                            </div>
                          </div>
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                            <div class="banner-img">
                              <img src="<?php echo e(asset('images/notificationicon.png')); ?>" width="110" height="110" alt="">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="card-statistic-4">
                      <div class="align-items-center justify-content-between">
                        <div class="row ">
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                            <div class="card-content">
                              <h5 class="font-30">Utilizadores</h5>
                              <h2 class="mb-3 font-20"><?php echo e($users); ?></h2>

                            </div>
                          </div>
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                            <div class="banner-img">
                              <img src="<?php echo e(asset('images/usersicon.png')); ?>" width="110" height="110" alt="">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </div>

    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.dashboards.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\movies\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>