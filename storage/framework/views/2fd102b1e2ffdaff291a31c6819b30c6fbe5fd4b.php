<!--add slider Movie ---->
<div class="modal fade" id="addMovieSlider" tabindex="-1" role="dialog" aria-labelledby="formModal"
    aria-hidden="true">
   <div class="modal-dialog" role="document">
   <div class="modal-content">
       <div class="modal-header">
       <h5 class="modal-title" id="formModal">Adicionar Slider</h5>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
       </button>
       </div>
       <div class="modal-body">
       <form method="POST" enctype="multipart/form-data" action="<?php echo e(route('adminAddSlider')); ?>" novalidate="">
           <?php echo csrf_field(); ?>
           <div class="row">
               <div class="col-12">
                <div class="form-group">
                  <select name="movieId" id="" class="form-control">
                    <option disabled selected>Selecione um Filme ou Serie</option>
                    <?php $__currentLoopData = $movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($movie->type=="Movie"): ?>
                            <optgroup label="Filmes">
                                <option value="<?php echo e($movie->id); ?>"><?php echo e($movie->name); ?></option>
                            </optgroup>
                            <?php else: ?>
                            <optgroup label="Series">
                                <option value="<?php echo e($movie->id); ?>"><?php echo e($movie->name); ?></option>
                            </optgroup>
                        <?php endif; ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                    </div>
               </div>
           <div class="col-12">
               <div class="form-group">
               <label class="required">Message</label>
               <input type="text" id="message" name="message" class="form-control"/>
               </div>
           </div>
           <div class="col-12 justify-content-center align-items-center">
               <button class="btn btn-secondary">Cancelar</button>
               <button class="btn btn-primary" type="submit" id="submitform">Enviar</button>
           </div>
           </div>
       </form>
       </div>
   </div>
   </div>
</div>
<?php /**PATH C:\xampp\htdocs\movies\resources\views/admin/modals/addSlider.blade.php ENDPATH**/ ?>