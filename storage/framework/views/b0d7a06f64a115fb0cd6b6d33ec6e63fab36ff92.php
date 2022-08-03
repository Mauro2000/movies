<?php $__env->startSection('title'); ?>
    Lista de Sliders
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-12 col-lg-12">
        <div class="card">
            <div class="card-header" id="top">
                <form>
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Search">
                      <div class="input-group-btn">
                        <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                      </div>
                    </div>
                  </form>

             <div class="d-flex align-items-center mt-2 mb-2 flex-wrap wrapper">
                 <div class="d-flex justify-content-end">


                     <button class="btn btn-primary mr-2"><i class="fas fa-filter mr-2"></i>Exportar</button>

                     <button class="btn btn-primary mr-2" data-toggle="modal" data-target="#addMovieSlider"><i class="fas fa-plus mr-2"></i>Adicionar Slider</button>
                 </div>
             </div>

            </div>

            <div class="card-body p-0">
                <?php if(Session::has('error')): ?>
                <div class="alert alert-danger text-center">
                    <?php echo e(Session::get('error')); ?>

                </div>
            <?php endif; ?>

            <?php if(Session::has('success')): ?>
            <div class="alert alert-success text-center">
                <?php echo e(Session::get('success')); ?>

            </div>
        <?php endif; ?>
              <div class="table-responsive">
                <table class="table dataTable table-striped" id="table-1">
                  <tr>
                    <th class="text-center">
                      <div class="custom-checkbox custom-checkbox-table custom-control">
                        <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad"
                          class="custom-control-input" id="checkbox-all">
                        <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                      </div>
                    </th>
                    <th>Tipo</th>
                    <th>Poster</th>
                    <th>Titulo</th>
                    <th>Ações</th>
                  </tr>

                  <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td></td>
                        <td><?php echo e($slider->movies->type); ?></td>
                        <td><img src="<?php echo e($slider->movies->image); ?>" width="100" class="img-fluid img-thumbnail"/></td>
                        <td><?php echo e($slider->movies->name); ?></td>
                        <td>
                            <div class="d-flex">
                                <form action="<?php echo e(route('adminDeleteSlider')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="id" value="<?php echo e($slider->id); ?>">
                                    <button class="btn btn-danger rounded" type="submit" data-toggle="tooltip" data-placement="top" title="Apagar">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
                <div class="d-flex justify-content-center">
                    <?php echo $sliders->links(); ?>

                </div>
              </div>
            </div>
          </div>
    </div>
</div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.modals.addSlider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('scripts'); ?>

<script src="/assets/js/page/datatables.js"></script>
<script src="/assets/bundles/datatables/datatables.min.js"></script>
<script src="/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="/assets/bundles/sweetalert/sweetalert.min.js"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.dashboards.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\movies\resources\views/admin/list_sliders.blade.php ENDPATH**/ ?>