@extends('frontend.header.header')

@section('links')
<link rel="stylesheet" href="{{asset('css/login-page.css')}}">
<link rel="stylesheet" href="{{asset('css/homepage.css')}}">
<link rel="stylesheet" href="{{asset('css/imdbrequest.css')}}">
@endsection

@section('content')
    <section class="p-100 imdb-request">
            <div class="row w-100 m-0">
                @if(\Session::get('error'))
                <div class="col-12">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ \Session::get('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                        </button>
                    </div>
                </div>
                @endif
                <div class="col-lg-5 col-md-4 col-sm-12">
                    <div class="order-function p-3">
                        <span>Pedir Filme/Serie</span>
                        <form name="searchIMDB" method="POST" action="{{route('addrequestid')}}" >
                            {{ csrf_field() }}
                            <div class="form-group float-label-control w-50 mt-4">
                                <label for="">ID Imdb</label>
                                <input type="text" name="imdb" value="{{old('imdb')}}" class="form-control {{ $errors->has('imdb') ? ' is-invalid' : '' }}" placeholder="ID Imdb">
                                @error('imdb')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            </div>
                            <button type="submit" class=" w-50 btn btn-md btn-block btn-primary" id="btn-session">
                                <i class="fa fa-search" aria-hidden="true"></i>
                                Fazer Pedido
                            </button>
                        </form>
                    </div>
                </div>

                <div class="col-lg-7 col-md-8 col-sm-12" id="resultsRequest">
                    <h3>Meus Pedidos</h3>
                    <div class="row w-100 m-0">

                        @forelse($requests as $request)
                            <div class="col-3 mb-4">
                                <div class="item">
                                    <img src="{{asset('movies/'.$request->IMDB.'/'.$request->IMDB.'.jpg')}}" width="50%" class="img-fluid"/>
                                    <span>{{$request->name}}</span>
                                    <small>Nº de Pedidos {{$request->votes}}</small>
                                </div>
                            </div>
                        @empty
                            <h3>Ainda não fez nenhum pedido</h3>
                        @endforelse
                    </div>
                </div>
            </div>
    </section>
@endsection

@section('scripts')
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
        <script>
                $('form').submit(function () {


                        $('#loader').addClass("loader-active");

                });
        </script>
@endsection
