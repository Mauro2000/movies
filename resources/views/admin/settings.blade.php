@extends('admin.layouts.dashboards.app')

@section('title')
    Definições Frontend
@endsection

@section('links')
<link rel="stylesheet" href="/assets/bundles/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
@endsection

@section('site-toolbar')
    <div class="toolbar">
        <a class="p-2 border-right">Definições Frontend</a>

            <a class="m-2 p-2">Pagina Incial - Definições</a>

    </div>
@endsection

@section('content')
<div class="row">
    <div class="col-6 col-lg-6">
        <form action="{{route('uploadSettings')}}" method="POST">
            @csrf
            <div class="form-group">
                <label>Nome do site</label>
                <input class="form-control" type="text" name="site_name" id="">
            </div>
            <div class="form-group">
                <label>Descrição do site</label>
                <input class="form-control" type="text" name="desc_site" id="">
            </div>
            <div class="form-group">
                <label>Fonte do site</label>
                <input class="form-control" type="text" name="font_site" id="">
            </div>
            <div class="form-group">
                <label>Cor Principal</label>
                <div class="input-group colorpickerinput">
                  <input type="text" value="{{$colors[0]['primary']}}" name="primary" class="form-control">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <i class="fas fa-fill-drip"></i>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Cor Secundaria</label>
                <div class="input-group colorpickerinput">
                  <input type="text"  value="{{$colors[0]['secundary']}}" name="secundary" class="form-control">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <i class="fas fa-fill-drip"></i>
                    </div>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script src="/assets/bundles/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<script>
    $(".colorpickerinput").colorpicker({
        format: 'hex',
        component: '.input-group-append',
    });
</script>
@endsection
