<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/login-page.css')}}">
    @include('meta::manager', [
    'title'         => 'Inciar Sessão - '.config('app.name').' - Veja Séries de Televisão e Filmes Online',
    'image'         => 'Url to the image'
])

</head>
<body>
    <div class="background"></div>
    <div class="overlay"></div>
    <a href="{{URL::previous()}}"><span class="close-icon"><i class="fa fa-times-circle" aria-hidden="true"></i></span></a>
    <div class="content">
        <div class="logo">
            <img src="https://templates.iqonic.design/streamit/frontend/html/images/logo.png" alt="">
        </div>
        <div class="header mb-5">
            Conta de Utilizador
        </div>
        <div class="row" id="loginform">
            <div class="col-12">
                @if(\Session::get('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ \Session::get('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
                @endif
                @if(\Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ \Session::get('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
                @endif
                <form role="form" method="POST" id="form-login" action="{{route('verify-Login')}}">
                    @csrf
                    <div class="input">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>
                        <input id="emailInput" required name="email" value="{{old('email')}}" type="text" placeholder="Endereço de email">
                    </div>
                    <div class="input">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                        <input id="emailInput" required  name="password" type="password" placeholder="Palavra-passe">
                    </div>


            </div>
            <div class="col-12 mt-3 group-options-access">
                <div class="remember">
                    <div class="input-check"></div>
                    <div>Manter Sessão iniciada</div>
                </div>
                <a  class="forgot" href="{{route('forget.password.get')}}">Recuperar Palavra-Passe</a>
            </div>
            <div class="col-12">
                <div class="login-btn" onclick="Login();">
                    <div class="c">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4M10 17l5-5-5-5M13.8 12H3"/></svg>
                        Entrar na minha conta
                    </div>
                </div>
            </div>
        </form>
            <p class="col-12 noaccount">Ainda não tens conta?<a class="create_account" href="{{route('pageRegister')}}"> Regista-te já</a></p>
        </div>

    </div>


    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
     <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        function Login(){
            $('#form-login').submit();
        }
    </script>
</body>
</html>
