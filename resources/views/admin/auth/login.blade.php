@extends('admin.auth.auth_login')

@section('title')
    Acesso Administravido - {{env('APP_NAME')}}
@endsection

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">

      <div class="col-sm-12 col-md-6  col-lg-6">
        <div class="card card-primary">
            <div class="card-header align-items-center justify-content-center">
              <h4>Acesso Administrativo -  {{env('APP_NAME')}} </h4>
            </div>
            @if($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
@endif
            <div class="card-body">
              <form method="POST" action="{{route('Admin.Login.Verify')}}" novalidate="">
                  @csrf
                  @if(Session::has('error'))
                  <div class="alert alert-danger text-center">
                      {{Session::get('error')}}
                  </div>
              @endif

              @if(Session::has('error_attempts'))
              <div class="alert alert-danger text-center">
                  {{Session::get('error_attempts')}}
              </div>
          @endif


              @if(Session::has('success'))
              <div class="alert alert-success text-center">
                  {{Session::get('success')}}
              </div>
          @endif

                <div class="form-group">
                  <label for="email">Numero de Utilizador</label>
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" tabindex="1" required autofocus>
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                  <div class="d-block">
                    <label for="password" class="control-label">Palavra-Passe</label>
                    <div class="float-right">
                      <a href="auth-forgot-password.html" class="text-small">
                        Forgot Password?
                      </a>
                    </div>
                  </div>
                  <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                  <div class="invalid-feedback">
                    please fill in your password
                  </div>
                </div>
                <div class="form-group">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                    <label class="custom-control-label" for="remember-me">Remember Me</label>
                  </div>
                </div>
                @if(!Session::has('error_attempts'))
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                    Aceder
                  </button>
                </div>
                @endif
              </form>


            </div>
          </div>
      </div>

    </div>
  </div>
@endsection

