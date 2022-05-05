<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/register-page.css')}}">
    @include('meta::manager', [
        'title'         => 'Novo Registo - '.config('app.name').' - Veja Séries de Televisão e Filmes Online',
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
        <div class="header">
            Novo Utilizador
        </div>
        <small class="text-white">Cria a tua conta em segundos! </small>
        <div class="row mt-5">
            <div class="col-12">
                <form role="form" method="POST" id="form-register" action="{{route('verify-Register')}}">
                    @csrf

                    <div class="input">
                        <svg class="svg-icon" viewBox="0 0 20 20">
							<path d="M12.075,10.812c1.358-0.853,2.242-2.507,2.242-4.037c0-2.181-1.795-4.618-4.198-4.618S5.921,4.594,5.921,6.775c0,1.53,0.884,3.185,2.242,4.037c-3.222,0.865-5.6,3.807-5.6,7.298c0,0.23,0.189,0.42,0.42,0.42h14.273c0.23,0,0.42-0.189,0.42-0.42C17.676,14.619,15.297,11.677,12.075,10.812 M6.761,6.775c0-2.162,1.773-3.778,3.358-3.778s3.359,1.616,3.359,3.778c0,2.162-1.774,3.778-3.359,3.778S6.761,8.937,6.761,6.775 M3.415,17.69c0.218-3.51,3.142-6.297,6.704-6.297c3.562,0,6.486,2.787,6.705,6.297H3.415z"></path>
						</svg>
                        <input type="text" name="name_user"  value="{{old('name-user')}}" class="form-control {{ $errors->has('name-user') ? ' invalid ' : '' }}" placeholder="Nome de Utilizador">
                    </div>

                    @error('name-user')
                    <div class="invalid-input mb-2">
                        <span>{{ $message }}</span>
                    </div>
                    @enderror

                    <div class="input">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>
                        <input type="email" name="email"  autocomplete ="email"  value="{{old('email')}}" class="form-control {{ $errors->has('email') ? ' invalid' : '' }}" placeholder="Endereço de E-mail">


                    </div>
                    @error('email')
                    <div class="invalid-input">{{ $message }}</div>
                @enderror
                    <div class="row">

                        <div class="col-6">
                            <div class="input">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                <input type="password" id="new-password-text-field" name="password"  autocomplete="new-password"  class="form-control {{ $errors->has('password') ? ' invalid' : '' }}" placeholder="Palavra-Passe">

                            </div>
                            @error('password')
                                    <div class="invalid-input">{{ $message }}</div>
                                 @enderror
                        </div>
                        <div class="col-6">
                            <div class="input">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                <input type="password" id="confirm-password-text-field" autocomplete="new-password" name="repet-password"class="form-control {{ $errors->has('repet-password') ? ' invalid' : '' }}" placeholder="Repetir Palavra-Passe">

                            </div>
                            @error('repet-password')
                            <div class="invalid-input">{{ $message }}</div>
                         @enderror
                        </div>
                    </div>
                    <div class="input">
                        <input type="date" name="birthday"  value="{{old('birthday')}}" class="form-control {{ $errors->has('birthday') ? ' invalid' : '' }}" placeholder="Data de Aniversário">

                    </div>
                    @error('birthday')
                    <div class="invalid-input">{{ $message }}</div>
                 @enderror

                    <div class="input">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        <select name="gender" name="gender"  value="{{old('gender')}}" class="form-control {{ $errors->has('gender') ? ' invalid' : '' }}">
                            <option value="none" selected>Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">other</option>
                        </select>

                    </div>
                    @error('gender')
                    <div class="invalid-input">{{ $message }}</div>
                 @enderror
                    <div class="col-12 p-0 mt-4">
                        <div class="login-btn" onclick="Register();">
                            <div class="c">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                               Criar conta
                            </div>
                        </div>
                    </div>
                </form>
                <p class="col-12 noaccount">Já tens conta?<a class="create_account" href="{{route('pageLogin')}}"> Entra na tua conta</a></p>

            </div>
        </div>
    </div>


    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
     <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        function Register(){
            $('#form-register').submit();
        }
    </script>


</body>
</html>
