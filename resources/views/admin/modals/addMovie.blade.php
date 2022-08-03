<!---Modal add movie --->

<div class="modal fade bd-example-modal-lg" id="addmovie" tabindex="-1" role="dialog" aria-labelledby="formModal"
    aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
   <div class="modal-content">
       <div class="modal-header">
       <h5 class="modal-title" id="formModal">Novo Filme</h5>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
       </button>
       </div>
       <div class="modal-body">
       <form method="POST" enctype="multipart/form-data" action="{{route('adminAddMovie')}}" novalidate="">
           @csrf
           <div class="row">
               <div class="col-12">
                <div class="input-group">
                    <input name="imdbid" id="imdbid" type="text" class="form-control" placeholder="IMDB ID">
                    <div class="input-group-btn">
                      <button class="btn btn-primary" type="button" onclick="return getDataMovie()">Preencher</button>
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
                    <input type="file" id="CatImage" name="poster" class="form-control"/>
                    </div>
               </div>

               <div class="col-12">
                <div class="form-group">

                    <label class="required">Tag</label>
                    <input type="text" id="tag" name="tag" class="form-control"/>
                    </div>
               </div>

               <div class="col-12">
                <div class="form-group">

                    <label class="required">Logo</label>
                    <input type="text" id="logo" name="logo" class="form-control"/>
                    </div>
               </div>

               <div class="col-6">
                <div class="form-group">

                    <label class="required">Coleção</label>
                    <input type="checkbox" id="collection" name="collection" class="form-control"/>
                    </div>
               </div>

               <div class="col-6">
                <div class="form-group">

                    <label class="required">Nome da Coleção</label>
                    <input type="text" id="" name="collection_name" class="form-control"/>
                    </div>
               </div>

               <input type="hidden" name="PosterImageDefault" id="PosterDefault">

               <input type="hidden" name="cast[]" id="cast">

               <input type="hidden" name="director" id="directors">

               <input type="hidden" name="votes" id="votes">

               <input type="hidden" name="reviews[]" id="reviews">

               <input type="hidden" name="MPAA" id="mpaa">

               <input type="hidden" name="Creator" id="creator">

               <input type="hidden" name="photos" id="photos">



               <div class="col-12">
                <div class="form-group">

                    <label class="required">Cover</label>
                    <input type="url" id="CatImage" name="cover" class="form-control"/>
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


<!--add server Movie ---->
<div class="modal fade" id="addMovieServer" tabindex="-1" role="dialog" aria-labelledby="formModal"
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


@section('scripts')

    <script>
        function getDataMovie(){

               jQuery.ajax({
                  url: "{{ route('teste') }}",
                  method: 'post',
                  dataType: "json",
                  data: {
                    _token: '{{csrf_token()}}',
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

                        $("#photos").attr('value',result[0][0].photos);


                    }
                  },
                  complete: function() {
                    swal.close();
                  }
                });
        }
    </script>

@endsection
