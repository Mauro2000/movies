@extends('admin.layouts.dashboards.app')
@section('title')
    Lista de Filmes
@endsection

@section('content')
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
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            <div class="card-body p-0">
                @if(Session::has('error'))
                <div class="alert alert-danger text-center">
                    {{Session::get('error')}}
                </div>
            @endif

            @if(Session::has('success'))
            <div class="alert alert-success text-center">
                {{Session::get('success')}}
            </div>
        @endif
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

                  @foreach ($Movies as $movie)
                    <tr>
                        <td></td>
                        <td>
                            @if ($movie->type=="Movie")
                                Filme
                            @elseif($movie->type=="Tv series")
                                Serie
                            @endif
                        </td>
                        <td> <img src="{{$movie->image}}" width="140" class="img-fluid img-thumbnail" alt="{{$movie->name}}" srcset=""/></td>
                        <td>{{$movie->name}}</td>
                        <td>{{$movie->summary}}</td>
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
                  @endforeach
                </table>
                <div class="d-flex justify-content-center">
                    {!! $Movies->links() !!}
                </div>
              </div>
            </div>
          </div>
    </div>
</div>



@endsection

@section('modals')
@include('admin.modals.addMovie')
@endsection

@section('scripts')
<script src="/assets/js/page/datatables.js"></script>
<script src="/assets/bundles/datatables/datatables.min.js"></script>
<script src="/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="/assets/bundles/sweetalert/sweetalert.min.js"></script>
@endsection


