<!---Modal add movie --->

<div class="modal fade bd-example-modal-lg" id="addSerie" tabindex="-1" role="dialog" aria-labelledby="formModal"
    aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
   <div class="modal-content">
       <div class="modal-header">
       <h5 class="modal-title" id="formModal">Nova Serie</h5>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
       </button>
       </div>
       <div class="modal-body">
       <form method="POST" enctype="multipart/form-data" action="{{route('adminAddSerie')}}" novalidate="">
           @csrf
           <div class="row">
               <div class="col-12">
                <div class="input-group">
                    <input name="imdbid" id="imdbid" type="text" class="form-control" placeholder="IMDB ID">
                    <div class="input-group-btn">
                      <button class="btn btn-primary" type="button" onclick="getDataSerie()">Preencher</button>
                    </div>
                  </div>
               </div>
               <div class="col-12">
                   <div class="form-group">
                       <select class="form-control" name="type" id="type">

                       </select>
                   </div>
               </div>
               <div class="col-12 justify-content-center d-flex">
                    <img id="poster" class="img-fliud img-thumbnail" width="60" src=""/>
               </div>
               <div class="col-12">
                <div class="form-group">

                    <label class="required">Alterar Imagem de Capa</label>
                    <input type="url" id="CatImage" name="poster" class="form-control"/>
                    </div>
               </div>

               <div class="col-12">
                <div class="form-group">

                    <label class="required">Logo</label>
                    <input type="text" id="logo" name="logo" class="form-control"/>
                    </div>
               </div>


               <input type="hidden" name="seasons" id="seasons">

               <input type="hidden" name="PosterImageDefault" id="PosterDefault">

               <input type="hidden" name="cast[]" id="cast">

               <input type="hidden" name="director" id="directors">

               <input type="hidden" value="5" name="votes" id="votes">

               <input type="hidden" name="reviews[]" id="reviews">

               <input type="hidden" name="MPAA" id="mpaa">

               <input type="hidden" name="Creator" id="creator">


               <div class="col-12">
                <div class="form-group">

                    <label class="required">Cover</label>
                    <input type="text" id="CatImage" name="cover" class="form-control"/>
                    </div>
               </div>

               <div class="col-12">
                <div class="form-group">

                    <label class="required">Link Trailer</label>
                    <input type="url" id="trailer" name="trailer" class="form-control"/>
                    </div>
               </div>

           <div class="col-12">
               <div class="form-group">
               <label class="required">Nome do Filme</label>
               <input type="text" id="name" name="name" class="form-control"/>
               </div>
           </div>

           <div class="col-12">
            <div class="form-group">
            <label class="required">Resumo do Filme</label>
            <textarea class="form-control" name="desc" id="desc" cols="30" rows="10"></textarea>
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                <label class="required" for="">Ano</label>
                <input type="text" class="form-control" id="year" name="year">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label class="required" for="">Time</label>
                <input type="text" class="form-control" id="time" name="time">
            </div>
        </div>

        <div class="col-12">
            <div class="form-group">
                <label for="">Categorias</label>
                <input type="text" id="categs" name="categs" class="form-control inputtags">
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

@section('scripts')



@endsection
