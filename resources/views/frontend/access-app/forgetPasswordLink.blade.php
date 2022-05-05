<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/register-page.css')}}">
    @include('meta::manager', [
    'title'         => 'Recuperar Palavra-Passe - '.config('app.name').' - Veja Séries de Televisão e Filmes Online',
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
            Alterar a Palavra-Passe!
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
                <form role="form" method="POST" id="form-changePassword" action="{{ route('reset.password.post',["token" => $token]) }}">
                    @csrf
                    <div class="input">
                        <label for="">Endereço de E-mail</label>
                        <input type="email" name="email" required autofocus value="{{old('email')}}" class="form-control {{ $errors->has('email') ? ' invalid' : '' }}" placeholder="Endereço de E-mail">
                        @error('email')
                            <div class="invalid-input">{{ $message }}</div>
                        @enderror
                    </div>
                    @error('email')
                        <div class="invalid-input">{{ $message }}</div>
                    @enderror
                    <div class="input">
                        <label for="">Nova Palavra-Passe</label>
                        <input type="password" name="password" required autofocus value="{{old('password')}}" class="form-control {{ $errors->has('password') ? ' invalid' : '' }}" placeholder="Nova Palavra-Passe">

                    </div>
                    @error('password')
                        <div class="invalid-input">{{ $message }}</div>
                    @enderror

                    <div class="input">
                        <label for="">Repita a Palavra-Passe</label>
                        <input type="password" name="password_confirm" required autofocus value="{{old('password_confirm')}}" class="form-control {{ $errors->has('password_confirm') ? ' invalid' : '' }}" placeholder="Repita a  Palavra-Passe">

                    </div>
                    @error('password_confirm')
                        <div class="invalid-input">{{ $message }}</div>
                    @enderror

                    <div class="row">

                        <div class="col-12 p-0 mt-4">
                            <div class="login-btn" onclick="submit();" id="btn-session">
                                <div class="loading"></div>
                                <div class="c">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path></svg>
                                    Enviar pedido de recuperação
                                </div>
                            </div>
                        </div>
                </form>

            </div>
            <div class="col-12 mt-3">
                <p><a href="{{route('pageLogin')}}"> <i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar<a></p>
            </div>
        </div>

    </div>


    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
     <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        function Register(){
            $('#form-ChangePassword').submit();
        }
    </script>
</body>
</html>
