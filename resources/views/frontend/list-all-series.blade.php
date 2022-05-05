@extends('frontend.header.header')

@include('meta::manager', [
    'title'         => 'Séries - '.config('app.name').' - Veja Séries de Televisão e Filmes Online',
    'description'   => 'Lista de Séries',
    'image'         => 'Url to the image',
])


@section('links')
<link rel="stylesheet" href="{{asset('css/listseries.css')}}">
<link rel="stylesheet" href="{{asset('css/homepage.css')}}">
@endsection


@section('content')
    <section class="listseries p-100">
        <div class="row">
            <div class="col-12">
                <form id="filters-form">
                    <div class="col-md-12 col-xl-4 float-left">
                        <div class="searchdiv">
                            <input type="search" name="search" placeholder="Pesquisa por titulo..." id="serieSearch">
                        </div>

                    </div>
                    <div class="filters col-md-12 col-xl-8">

                            <input type="hidden" value="{{old('year')}}" name="year">
                            <input type="hidden" value="{{old('category')}}" name="category">
                            <input type="hidden" value="{{old('order')}}" name="order">

                        <div class="searchItem col-6 col-xl-3 mb-3"data-search="year">
                            <div class="itemTitle">
                                {{old('year')? :'Ano'}}
                            </div>
                            <div class="list p-rl">
                                <span class="row-line selected">Todos</span>
                                @foreach ($years as $year)
                                    <span class="row-line" data-value="{{$year}}">{{$year}}</span>
                                @endforeach
                            </div>
                        </div>

                        <div class="searchItem col-6 col-xl-3 mb-3"data-search="category">
                            <div class="itemTitle">
                                {{ old('category')?: 'Categoria'}}
                            </div>
                            <div class="list p-rl">
                                <span class="row-line selected">Todos</span>
                                @foreach ($categs as $categ => $key)
                                    <div class="row-line" data-value="{{$categ}}">{{$key}}</div>
                                @endforeach
                            </div>
                        </div>

                        <div class="searchItem col-6 col-xl-3 mb-3"data-search="order">
                            <div class="itemTitle">
                                Ordenar
                            </div>
                            <div class="list p-rl">
                                <span class="row-line selected">Todos</span>
                                @foreach ($orders as $order => $key)
                                    <div class="row-line" data-value="{{$order}}">{{$key}}</div>
                                @endforeach
                            </div>
                        </div>

                        <div class="searchItem col-6 col-xl-3 mb-3"data-search="order" id="resetButton">
                            <button class="btn btn-dark" type="button" id="reset">Limpar</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-12 mt-4">
                <div class="table-list">
                    @if ($series->count() > 0)
                    <div class="row w-100">
                        @foreach ($series as $serie)
                            <div class="col-4 col-md-3 col-xl-2 col-sm-4">
                                <div class="movieCard card-movie h-300 marginRight zoomCardHover ">
                                    <figure class="placeHolderRatio2X3">
                                        <div class="content">
                                            <img src="{{$serie->image}}" width="100%"/>
                                        </div>
                                    </figure>
                                    <div class="cardPopupWrap ">
                                        <h3 class="title">
                                            <span>
                                                {{$serie->name}}
                                            </span>
                                        </h3>
                                        <div class="details">
                                            <span>{{$serie->votes}}</span>
                                            <span>{{$serie->time}}</span>
                                            <span>{{$serie->categs}}</span>
                                        </div>
                                        <div class="buttonplay">
                                            <form method="post" action="{{route('serieShow',['IMDB'=>$serie->IMDB,'title'=>Str::slug($serie->name)])}}">
                                            @csrf
                                                <button style="    width: 100%;border: none;" type="submit" tabindex="0">
                                                <div class="noSelect btnIcon playBtnIcon">
                                                    <div class="btntext">
                                                         Watch
                                                    </div>
                                                </div>
                                            </button>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="col-12 d-flex justify-content-center">
                            {!! $series->appends([

                                'year' => old('year'),
                                'search'=>old('search'),
                                'category'=> old('category'),
                                'order'=>old('order')

                                ])->links() !!}
                        </div>
                    </div>

                    @else
                        <h3>NENHUM FILME ENCONTRADO, TENTA OUTRO FILTRO</h3>
                    @endif

                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
<script src="{{asset('js/filters.js')}}"></script>
@endsection
