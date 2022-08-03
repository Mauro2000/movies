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
    <a href="{{URL::previous()}}"><span class="close-icon"><i class="fa fa-times-circle" aria-hidden="true"></i></span></a>
    <div class="content">
        <div class="logo">
            <img src="https://templates.iqonic.design/streamit/frontend/html/images/logo.png" alt="">
        </div>
        <div class="header mb-5">
            Log in!
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
                <form role="form" method="POST" action="{{route('verify-Login')}}">
                    @csrf
                    <div class="form-group float-label-control">
                        <label for="">Endereço de E-mail</label>
                        <input type="email" name="email" value="{{old('email')}}" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Endereço de E-mail">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group float-label-control">
                        <label for="">Palavra-Passe</label>
                        <input type="password" name="password"  class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Palavra-Passe">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                         @enderror
                    </div>

                    <div class="row">

                    <button class="btn btn-lg btn-block btn-primary" id="btn-session">
                        <div class="loading"></div>
                        <i class="fa fa-user-circle" aria-hidden="true"></i>
                        Iniciar Sessão
                    </button>
                </form>

            </div>
            <div class="col-12 mt-3">
                <p><a href="{{route('forget.password.get')}}">Recuperar Palavra-Passe<a></p>
            <p class="mt-1">Ainda não tens conta?<a href="{{route('pageRegister')}}"> Regista-te já</a></p>
            </div>
        </div>

    </div>


    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
     <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>

(function ($) {
        $.fn.floatLabels = function (options) {

            // Settings
            var self = this;
            var settings = $.extend({}, options);


            // Event Handlers
            function registerEventHandlers() {
                self.on('input keyup change', 'input, textarea', function () {
                    actions.swapLabels(this);
                });
            }


            // Actions
            var actions = {
                initialize: function() {
                    self.each(function () {
                        var $this = $(this);
                        var $label = $this.children('label');
                        var $field = $this.find('input,textarea').first();

                        if ($this.children().first().is('label')) {
                            $this.children().first().remove();
                            $this.append($label);
                        }

                        var placeholderText = ($field.attr('placeholder') && $field.attr('placeholder') != $label.text()) ? $field.attr('placeholder') : $label.text();

                        $label.data('placeholder-text', placeholderText);
                        $label.data('original-text', $label.text());

                        if ($field.val() == '') {
                            $field.addClass('empty')
                        }
                    });
                },
                swapLabels: function (field) {
                    var $field = $(field);
                    var $label = $(field).siblings('label').first();
                    var isEmpty = Boolean($field.val());

                    if (isEmpty) {
                        $field.removeClass('empty');
                        $label.text($label.data('original-text'));
                    }
                    else {
                        $field.addClass('empty');
                        $label.text($label.data('placeholder-text'));
                    }
                }
            }


            // Initialization
            function init() {
                registerEventHandlers();

                actions.initialize();
                self.each(function () {
                    actions.swapLabels($(this).find('input,textarea').first());
                });
            }
            init();


            return this;
        };

        $(function () {
            $('.float-label-control').floatLabels();
        });
    })(jQuery);
    </script>
</body>
</html>
