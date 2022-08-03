<?php $__env->startSection('title'); ?>
    Lista de Series
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

                     <button class="btn btn-primary mr-2" data-toggle="modal" data-target="#addSerie"><i class="fas fa-plus mr-2"></i>Adicionar Serie</button>
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
                    <th>Temporadas</th>
                    <th>Ações</th>
                  </tr>
                  <?php $__currentLoopData = $Series; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td></td>
                        <td>Serie</td>
                        <td> <img src="<?php echo e($serie->image); ?>" width="140" class="img-fluid img-thumbnail" alt="<?php echo e($serie->name); ?>" srcset=""/></td>
                        <td><?php echo e($serie->name); ?></td>
                        <td><?php echo e($serie->summary); ?></td>
                        <td><?php echo e(count($serie->seasons)); ?></td>
                        <td>
                            <div class="d-flex">

                                <button type="button" class="btn btn-primary rounded mr-3" onclick="return gerarEpisodios('<?php echo e($serie->IMDB); ?>','<?php echo e($serie->id); ?>','<?php echo e(count($serie->seasons)); ?>');"  data-toggle="tooltip" data-placement="top" title="Gerar Episodios">
                                    <i class="fas fa-server"></i>
                                </button>

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
                    <?php echo $Series->links(); ?>

                </div>
              </div>
            </div>
          </div>
    </div>
</div>



<?php $__env->stopSection(); ?>



<?php $__env->startSection('scripts'); ?>
<script src="/assets/js/page/datatables.js"></script>
<script src="/assets/bundles/datatables/datatables.min.js"></script>
<script src="/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="/assets/bundles/sweetalert/sweetalert.min.js"></script>

<script>
    function gerarEpisodios(IMDB,ID,SEASONS){
        jQuery.ajax({
                  url: "<?php echo e(route('adminGenEpisode')); ?>",
                  method: 'post',
                  dataType:"JSON",
                  data: {
                    _token: '<?php echo e(csrf_token()); ?>',
                     imdbid: IMDB,
                     idmovie:ID,
                     seasons:SEASONS

                  },
                  beforeSend: function(){
                   new swal({
                        title: 'Loading cars from data base'
                    });

                  },
                  success: function(result){
                      alert(result);
                        console.log(result);
                  },
                  complete: function(error) {
                    swal.close();
                    console.log(error);
                  }
                });
    }
</script>
<script>
    function getDataSerie(){

           jQuery.ajax({
              url: "<?php echo e(route('teste')); ?>",
              method: 'post',
              dataType: "json",
              data: {
                _token: '<?php echo e(csrf_token()); ?>',
                 imdbid: jQuery('#imdbid').val()

              },
              beforeSend: function(){
               new swal({
                    title: 'Loading cars from data base'
                });

              },
              success: function(result){
                swal.close();
                //result = JSON.parse(result);
                if(result.status=="error"){
                   new swal({
                        icon: 'error',
                        title: 'Erro...',
                        text: result.msg
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $('#imdbid').addClass('invalid');
                        }
                    });
                }else{
                    console.log(result);
                    $("#poster").attr("src", result[0].poster);
                    $('#PosterDefault').attr('value',result[0].poster);
                    $("#name").attr("value",result[0].name);
                    var select = document.getElementById("type");
                    select.options[select.options.length] = new Option(result[0].type,result[0].type,true);
                    $('#desc').val(result[0].desc);
                    $('#year').attr("value",result[0].year);
                    $("#time").attr("value",result[0].time);
                    $('#categs').attr('value',result[0].categs);
                    $(".inputtags").tagsinput('add',result[0].categsm, {preventPost: true});

                    $("#cast").attr("value", JSON.stringify(result[0][0].cast));

                    $("#directors").attr("value",result[0][0].directors);

                    $("#votes").attr("value",result[0][0].votes);

                    $("#reviews").attr('value',result[0][0].reviews);

                    $("#mpaa").attr('value',result[0][0].MPAA);

                    $("#creator").attr('value',result[0][0].Creator);

                    $("#seasons").attr("value",JSON.stringify(result[0][0].seasons));
                }
              },
              complete: function() {
                swal.close();
              }
            });
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.modals.series.addSerie', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;

<?php echo $__env->make('admin.layouts.dashboards.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\movies\resources\views/admin/series/list_series.blade.php ENDPATH**/ ?>