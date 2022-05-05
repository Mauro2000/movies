    <!-- Modal add User -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="formModal"
    aria-hidden="true">
   <div class="modal-dialog" role="document">
   <div class="modal-content">
       <div class="modal-header">
       <h5 class="modal-title" id="formModal">Nova Categoria</h5>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
       </button>
       </div>
       <div class="modal-body">
       <form method="POST" enctype="multipart/form-data" action="{{route('adminAddCategs')}}" novalidate="">
           @csrf
           <div class="row">
               <div class="col-12">
                <div class="form-group">
                    <label class="required">Imagem da Categoria</label>
                    <input type="file" id="CatImage" name="file" class="form-control"/>
                    </div>
               </div>
           <div class="col-12">
               <div class="form-group">
               <label class="required">Nome Categoria</label>
               <input type="text" id="Catname" name="Catname" class="form-control"/>
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
