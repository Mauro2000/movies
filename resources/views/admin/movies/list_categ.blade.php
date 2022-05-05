@extends('admin.layouts.dashboards.app')
@section('title')
    Lista de Categorias de Filmes
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

                     <button class="btn btn-primary mr-2" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus mr-2"></i>Adicionar Utilizador</button>
                 </div>
             </div>

            </div>
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
                    <th>Imagem</th>
                    <th>Nome</th>
                    <th>Ações</th>
                  </tr>

                  @foreach ($Categs as $Categ)

                  <tr>
                        <td>{{$Categ->id}}</td>
                        <td><img width="150" class="img-fluid img-thumbnail" src="{{asset('movies/Categs')."/".$Categ->image}}"/></td>
                        <td>{{$Categ->name}}</td>
                        <td>
                            <ul class="list-inline m-0">

                                <li class="list-inline-item">
                                    <form class="delete" method="post" action="{{route('adminDeleteCategs')}}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$Categ->id}}" />
                                    <button class="p-4 btn btn-danger btn-sm rounded-circle" type="submit" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash font-20"></i></button>
                                    </form>
                                </li>
                            </ul>
                        </td>
                  </tr>

                  @endforeach

                </table>
              </div>
            </div>
          </div>
    </div>
</div>



@endsection

@include('admin.modals.addCateg')

@section('scripts')

<script src="/assets/js/page/datatables.js"></script>
<script src="/assets/bundles/datatables/datatables.min.js"></script>
<script src="/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="/assets/bundles/sweetalert/sweetalert.min.js"></script>

@endsection
