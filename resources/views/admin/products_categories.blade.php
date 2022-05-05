@extends('admin.layouts.dashboards.app')

@section('style')
    <style>
        .toolbar{
            
    padding-left: 280px;
    margin-top: 70px;
    height: 60px;
    position: fixed;
    width: 100%;
    border-bottom: 1px solid lightgray;
    background: #ffffff;
    z-index: 111;
    /* justify-content: center; */
    align-items: center;
    display: flex;

        }
        hr {
  margin-top: 1rem;
  margin-bottom: 1rem;
  border: 0;
  border-top: 1px solid rgba(0, 0, 0, 0.1);
}
#top{
    display: flex;
    justify-content: space-between;
    align-items: stretch;
    flex-wrap: wrap;
}
    </style>
@endsection

@section('title')
    Lista de Adiministradores
@endsection

@section('links')
<link rel="stylesheet" href="/assets/bundles/datatables/datatables.min.css">
<link rel="stylesheet" href="/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
@endsection

@section('site-toolbar')
    <div class="toolbar">
        <a class="p-2 border-right">Categorias dos Produtos</a> 
        
            <a class="m-2 p-2">Pagina Incial - Produtos - Categorias</a>

    </div>    
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
                    
                    <button class="btn btn-primary mr-2"><i class="fas fa-print mr-2"></i>Imprimir</button>

                     <button class="btn btn-primary mr-2"><i class="fas fa-filter mr-2"></i>Exportar</button>

                     <button class="btn btn-primary mr-2" data-toggle="modal" data-target="#addCat"><i class="fas fa-plus mr-2"></i>Adicionar Categoria</button>
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
                    <th>Nome</th>
                    <th>Descricão</th>
                    <th>Imagem</th>
                    <th>Status</th>
                    <th>Data de Criação</th>
                    <th>Ações</th>
                  </tr>
                  
                  @foreach ($Categs as $cat)
                      <tr>
                        <td class="p-0 text-center">
                          <div class="custom-checkbox custom-control">
                            <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input"
                              id="checkbox-1">
                            <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                          </div>
                        </td>
                        <td>{{$cat->cat_name}}</td>
                        <td>{{$cat->cat_description}}</td>
                        <td> <img class="rounded-circle" width="54"  src="/storage/Cat/{{$cat->cat_image_path}}"/></td>
                        <td>
                          @if ($cat->status=='0')
                              <div class="badge badge-danger">Não Ativo</div>
                          @else
                              <div class="badge badge-success">Ativo</div>
                              
                          @endif

                        </td>
                        <td>
                          <a class="badge badge-light fw-bolder">{{ \Carbon\Carbon::parse($cat->created_at)->diffForHumans()  }}</a>
                        </td>

                        <td>
                          <div class="btn-group">
                              <button class="btn btn-light btn-active-light-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Ações
                              </button>
                              <div class="dropdown-menu w-50 px-3" x-placement="top-start" >
                                <button class="dropdown-item px-3" id="editar"  data-id="{{$cat->id}}" type="button">Editar</button>
                                
                                  
                                  <form class="delete" method="post" action="{{route('Admin.User.Delete')}}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$cat->id}}" />
                                    
                                    <button class="dropdown-item px-3"  type="submit">Remover</button>
                                  </form>
                                  
                             
                              </div>
                            </div>
  
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


@section('scripts')

<script src="/assets/js/page/datatables.js"></script>
<script src="/assets/bundles/datatables/datatables.min.js"></script>
<script src="/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="/assets/bundles/sweetalert/sweetalert.min.js"></script>
  <!-- Page Specific JS File -->
@endsection