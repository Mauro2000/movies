<?php $__env->startSection('title'); ?>
    Lista de Filmes
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

                     <button class="btn btn-primary mr-2" data-toggle="modal" data-target="#addmovie"><i class="fas fa-plus mr-2"></i>Adicionar Filme</button>
                 </div>
             </div>

            </div>
            <?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>
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
                    <th>Descrição</th>
                    <th>Ações</th>
                  </tr>

                  <?php $__currentLoopData = $Movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td></td>
                        <td>
                            <?php if($movie->type=="Movie"): ?>
                                Filme
                            <?php elseif($movie->type=="Tv series"): ?>
                                Serie
                            <?php endif; ?>
                        </td>
                        <td> <img src="<?php echo e($movie->image); ?>" width="140" class="img-fluid img-thumbnail" alt="<?php echo e($movie->name); ?>" srcset=""/></td>
                        <td><?php echo e($movie->name); ?></td>
                        <td><?php echo e($movie->summary); ?></td>
                        <td>
                            <div class="d-flex">
                                <a data-toggle="modal" data-target="#addMovieServer">
                                <button class="btn btn-primary rounded mr-3" onclick=""  data-toggle="tooltip" data-placement="top" title="Adicionar Servidor">
                                    <i class="fas fa-server"></i>
                                </button>
                                </a>
                                <button class="btn btn-success rounded mr-3" data-toggle="tooltip" data-placement="top" title="Editar">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                                <button class="btn btn-danger rounded" data-toggle="tooltip" data-placement="top" title="Apagar">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
                <div class="d-flex justify-content-center">
                    <?php echo $Movies->links(); ?>

                </div>
              </div>
            </div>
          </div>
    </div>
</div>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('modals'); ?>
<?php echo $__env->make('admin.modals.addMovie', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="/assets/js/page/datatables.js"></script>
<script src="/assets/bundles/datatables/datatables.min.js"></script>
<script src="/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="/assets/bundles/sweetalert/sweetalert.min.js"></script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layouts.dashboards.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\movies\resources\views/admin/movies/list_movies.blade.php ENDPATH**/ ?>