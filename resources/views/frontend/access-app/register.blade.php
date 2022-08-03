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
    <a href="{{URL::previous()}}"><span class="close-icon"><i class="fa fa-times-circle" aria-hidden="true"></i></span></a>
    <div class="content">
        <div class="logo">
            <img src="https://templates.iqonic.design/streamit/frontend/html/images/logo.png" alt="">
        </div>
        <div class="header mb-5">
            Regista-te agora!
        </div>
        <div class="row">
            <div class="col-12">
                <form role="form" method="POST" action="{{route('verify-Register')}}">
                    @csrf
                    <div class="form-group float-label-control">
                        <label for="">Endereço de E-mail</label>
                        <input type="email" name="email" value="{{old('email')}}" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Endereço de E-mail">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group float-label-control">
                        <label for="">Nome de Utilizador</label>
                        <input type="text" name="name_user"  value="{{old('name-user')}}" class="form-control {{ $errors->has('name-user') ? ' is-invalid' : '' }}" placeholder="Nome de Utilizador">
                        @error('name-user')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">

                        <div class="col-6">
                            <div class="form-group float-label-control">
                                <label for="">Palavra-Passe</label>
                                <input type="password" name="password"  class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Palavra-Passe">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                 @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group float-label-control">
                                <label for="">Repetir Palavra-Passe</label>
                                <input type="password" name="repet-password"class="form-control {{ $errors->has('repet-password') ? ' is-invalid' : '' }}" placeholder="Repetir Palavra-Passe">
                                @error('repet-password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                 @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group float-label-control">
                        <label for="">Data de Aniversário</label>
                        <input type="date" name="birthday"  value="{{old('birthday')}}" class="form-control {{ $errors->has('birthday') ? ' is-invalid' : '' }}" placeholder="Data de Aniversário">
                        @error('birthday')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                 @enderror
                    </div>

                    <div class="form-group ">
                        <label for="">Genero</label>
                        <select name="gender" name="gender"  value="{{old('gender')}}" class="form-control {{ $errors->has('gender') ? ' is-invalid' : '' }}">
                            <option value="none" selected>Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">other</option>
                        </select>
                        @error('gender')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                 @enderror
                    </div>
                    <button class="btn btn-lg btn-block btn-primary"> <i class="fa fa-check" aria-hidden="true"></i> Criar Conta</button>
                </form>
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
