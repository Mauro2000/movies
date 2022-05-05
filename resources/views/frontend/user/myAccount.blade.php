@extends('frontend.header.header')

@include('meta::manager', [
    'title'         => config('app.name').' - Veja Séries de Televisão e Filmes Online',
    'description'   => 'Aqui pode assistir filmes online grátis',
    'image'         => 'Url to the image',
])

@section('title')

@endsection

@section('links')
<link rel="stylesheet" href="{{asset('css/homepage.css')}}">
<link rel="stylesheet" href="{{asset('css/movie-details.css')}}">
<link rel="stylesheet" href="{{asset('css/myAccount.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

@endsection

@section('content')
<div class="background"></div>
<div class="overlay"></div>
<div class="tray-container">
<div class="row listseries justify-content-between p-100">
    <div class="col-md-12 d-flex aligh-items-center justify-content-between bgDark">
        <div class="col-md-6 p-0 d-flex aligh-items-center ">
        <img class="avatar rounded-circle" width="150" src="{{Auth::user()->profile_pic ? Auth::user()->profile_pic : 'https://avatar.oxro.io/avatar.svg?name='.Auth::user()->name}} " alt="{{Auth::user()->name}}">
        <h4 class="ml-3 d-flex align-items-center card-title username">{{Auth::user()->name}}</h4>
        </div>
        <div class="col-md-6 p-0 d-flex align-items-center justify-content-end">
            <div class="login-btn" onclick="Login();">
                <div class="c">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4M10 17l5-5-5-5M13.8 12H3"></path></svg>
                   Terminar Sessão
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row w-100">
    <div class="panel1">
        <div class="title-panel">
            Faz aqui o teu pedido
        </div>
        <small>Insere o titulo ou o IMDB</small>
        <div class="input mt-2">
            <a class="requestSumbit">Enviar</a>
            <input id="emailInput" required="" name="requestInput" value="" type="text" placeholder="Titulo ou o IMDB">
        </div>
    </div>
    <div class="panel2">
        <div class="list">
            <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                Link with href
              </a>
        </div>
        <div class="panel2">
        <div class="collapse" id="collapseExample">
            <div class="card card-body">
              Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
            </div>
          </div>
        </div>
    </div>
</div>
</div>
@endsection
