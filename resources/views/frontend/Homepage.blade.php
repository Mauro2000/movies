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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<link rel="stylesheet" href="{{asset('css/cookieNotice.css')}}">

@endsection

@section('content')
<div class="home-slider w-100">
    @include('cookie-consent::index')
    <div class="related-movies">
        @foreach ($sliders as $slider)
            <div>
                <div class="img-background" style="background-image:url('{{asset('movies/'.$slider->movies->IMDB.'/'.$slider->cover->image.'')}}');"></div>
                <div class="container-fluid position-relative h-100 p-100">
                    <div class="slider-inner h-100">
                        <div class="row align-items-center  h-100 iq-ltr-direction justify-content-center">
                            <div class="col-xl-6 col-lg-12 text-center col-md-12">
                                <a>
                                    <div class="channel-logo fadeInLeft animate__animated animate__fadeInLeft"  style="opacity: 1;">
                                        <span> {{$slider->message}}</span>
                                    </div>
                                </a>
                                <div class="mt-5  content-infos d-flex flex-wrap  animate__animated animate__fadeInLeft">
                                    <h3 style="display: contents;" class="movie-name fadeInLeft animate__animated animate__fadeInLeft"  style="opacity: 1;">
                                        {{$slider->movies->name}}
                                    </h3>

                                    <p data-animation-in="fadeInUp" data-delay-in="1.2" class="fadeInUp animated desc w-100" style="opacity: 1; animation-delay: 1.2s;">
                                        {{\Illuminate\Support\Str::limit($slider->movies->summary,150)}}
                                        </p>
                                </div>


                                <div class="d-flex flex-wrap ">
                                        {{-- <div class="slider-ratting d-flex align-items-center mr-4 mt-2 mt-md-3">
                                            <ul class="ratting-start p-0 m-0 list-inline text-primary d-flex align-items-center justify-content-left">
                                                <li>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </li>
                                                <li>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </li>
                                                <li>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </li>
                                                <li>
                                                    <i class="fa fa-star-half" aria-hidden="true"></i>
                                                </li>
                                            </ul>
                                            <span class="text-white ml-2">4.7(lmdb)</span>
                                        </div> --}}
                                        {{-- <div class="d-flex align-items-center mt-2 mt-md-3">
                                            <span class="p-2">
                                            <i class="fas fa-calendar" aria-hidden="true"></i> {{$slider->movies->year}}
                                            </span>
                                            <span class="p-2">
                                                <i class="fas fa-clock" aria-hidden="true"></i> {{$slider->movies->time}}
                                            </span>


                                            <span class="badge bg-danger p-2" data-toggle="tooltip" data-placement="top" title="Aconcelhado para maiores de 18 anos">
                                                M/12
                                            </span>


                                        </div> --}}

                                </div>

                                {{-- <div class="trending-list" data-wp_object-in="fadeInUp" data-delay-in="1.2">
                                    <div class="text-primary title starring">
                                        Starring: <span class="text-body">Karen Gilchrist, James Earl Jones</span>
                                    </div>
                                    <div class="text-primary title genres">
                                        Genres: <span class="text-body">Action</span>
                                    </div>
                                    <div class="text-primary title tag">
                                        Tag: <span class="text-body">Action, Adventure, Horror</span>
                                    </div>
                                </div> --}}

                                <div class="d-flex mt-4 justify-content-center m btns align-items-center r-mb-23 fadeInUp animated" data-animation-in="fadeInUp" data-delay-in="1.2" style="opacity: 1; animation-delay: 1.2s;">
                                    @if ($slider->movies->type=="Movie")
                                    <a href="{{route('movieShow',
                                    [
                                        'IMDB'=>$slider->movies->IMDB,
                                        'title'=>Str::slug($slider->movies->name),
                                    ]

                                    )}}"  class="mr-2 btn-movies btn-reproduzir btn-hover" tabindex="0">
                                      <i class="fa fa-play-circle" aria-hidden="true"></i>

                                      <span>Reproduzir</span>
                                    </a>
                                    @else

                                        <a class="mr-2 btn-movies btn-reproduzir btn-hover" tabindex="0">
                                            <form class="m-0" method="POST" action="{{route('serieShow',
                                            [
                                                'IMDB'=>$slider->movies->IMDB,
                                                'title'=>Str::slug($slider->movies->name),
                                            ]

                                            )}}">
                                            @csrf
                                            <i class="fa fa-play-circle" aria-hidden="true"></i>

                                            <button style="border: none;color:white;"class="bg-transparent ">Reproduzir</button>

                                            </form>
                                        </a>

                                    @endif



                                    @if ($slider->movies->type=="Movie")
                                    <a href="{{route('movieShow',
                                    [
                                        'IMDB'=>$slider->movies->IMDB,
                                        'title'=>Str::slug($slider->movies->name),
                                    ]

                                    )}}"  class="mr-2 btn-movies" tabindex="0">
                                      <i class="fa fa-info-circle" aria-hidden="true"></i>

                                      <span>Mais Informações</span>
                                    </a>
                                    @else

                                        <a class="mr-2 btn-movies" tabindex="0">
                                            <form class="m-0" method="POST" action="{{route('serieShow',
                                            [
                                                'IMDB'=>$slider->movies->IMDB,
                                                'title'=>Str::slug($slider->movies->name),
                                            ]

                                            )}}">
                                            @csrf
                                           <i class="fa fa-info-circle" aria-hidden="true"></i>

                                            <button style="border: none;color:white;"class="bg-transparent ">Mais Informações</button>

                                            </form>
                                        </a>

                                    @endif


                                    <a class="mr-2 btn-movies" tabindex="0">
                                        <form  class="m-0" action="{{route('addWishlist')}}" method="POST">
                                            @csrf
                                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                            <button style="border: none;color:white;"class="bg-transparent ">A Minha Lista</button>

                                        </form>

                                    </a>


                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        @endforeach


    </div>
    {{-- https://opto.sic.pt/app/images/back_icon.svg?rev=1640194817596 --}}
    <a class="right slider-control"><img class="home-browser-carousel-right-arrow" src="{{asset('images/arrow.png')}}"></a>
    <a class="left slider-control"><img class="home-browser-carousel-right-arrow" src="{{asset('images/arrow.png')}}"></a>

</div>



    <section id="last-movies">

            <div class="row">

                <div class="col-sm-12 p-0 overflow-hidden" id="listMS">
                    <div class="tray-container">
                    <div class="header-movie mb-4 d-flex align-items-center justify-content-between">
                        <h4>Lançamentos</h4>
                        <a>Ver todos</a>
                    </div>

                        <ul class="last-movies-slider movies-list p-0">
                            @foreach ($Lancamentos as $movie)
                            <li class="item-movie mr-2 position-relative">
                                <div class="movieCard card-movie  marginRight zoomCardHover ">
                                    <a href="javascript::" class="clickWrapper">
                                        <figure class="placeHolderRatio2X3">
                                            <div class="content">
                                                <img width="100%" src="{{$movie->image}}" title="420 IPC Movie" alt="420 IPC Movie" crossorigin="anonymous">
                                            </div>
                                        </figure>
                                    </a>
                                    <div class="cardPopupWrap ">
                                        <h3 class="title"><span>{{$movie->name}}</span></h3>
                                        <div class="details">
                                            <span>{{$movie->votes}}</span>
                                            <span>{{$movie->time}}</span>
                                            <span>{{$movie->categs}}</span>
                                        </div>
                                        <div class="buttonplay">
                                            <a href="{{route('movieShow',
                                            [
                                                'IMDB'=>$movie->IMDB,
                                                'title'=>Str::slug($movie->name),
                                            ]

                                            )}}">
                                            <div class="noSelect btnIcon playBtnIcon">
                                                <div class="btntext">
                                                    Watch
                                                </div>
                                            </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </li>
                            @endforeach




                        </ul>



                    </div>
                </div>

                <div class="col-sm-12 p-0 overflow-hidden"id="listMS">
                    <div class="tray-container">
                    <div class="header-movie mb-4 d-flex align-items-center justify-content-between">
                        <h4>Ultimos Adiconados</h4>
                        <a>Ver todos</a>
                    </div>

                        <ul class="last-movies-slider movies-list p-0">
                            @foreach ($Movies as $movie)
                            <li class="item-movie mr-2 position-relative">
                                <div class="movieCard card-movie  marginRight zoomCardHover ">
                                    <a href="javascript::" class="clickWrapper">
                                        <figure class="placeHolderRatio2X3">
                                            <div class="content">
                                                <img width="100%" src="{{$movie->image}}" title="420 IPC Movie" alt="420 IPC Movie" crossorigin="anonymous">
                                            </div>
                                        </figure>
                                    </a>
                                    <div class="cardPopupWrap ">
                                        <h3 class="title"><span>{{$movie->name}}</span></h3>
                                        <div class="details">
                                            <span>{{$movie->votes}}</span>
                                            <span>{{$movie->time}}</span>
                                            <span>{{$movie->categs}}</span>
                                        </div>
                                        <div class="buttonplay">
                                            @if ($movie->type=="Movie")
                                            <a href="{{route('movieShow',
                                            [
                                                'IMDB'=>$movie->IMDB,
                                                'title'=>Str::slug($movie->name),
                                            ]

                                            )}}">
                                                <div class="noSelect btnIcon playBtnIcon">
                                                    <div class="btntext">
                                                        Watch
                                                    </div>
                                                </div>
                                            </a>
                                            @else
                                            <div class="buttonplay">
                                                <form method="get" action="{{route('serieShow',['IMDB'=>$movie->IMDB,'title'=>Str::slug($movie->name)])}}">
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
                                            @endif

                                        </div>
                                    </div>
                                </div>

                            </li>
                            @endforeach




                        </ul>

                    </div>
                </div>

                <div class="col-sm-12 p-0 overflow-hidden"id="listMS">
                    <div class="tray-container">
                    <div class="header-movie mb-4 d-flex align-items-center justify-content-between">
                        <h4>Séries recentes</h4>
                        <a>Ver todos</a>
                    </div>

                        <ul class="last-movies-slider series-list p-0">
                            @foreach ($Series as $movie)

                            <li class="item-serie mr-2 position-relative">
                                <div class="movieCard card-movie  marginRight zoomCardHover ">
                                    <a class="clickWrapper">
                                        <span class="span-serie">NOVOS EPISÓDIOS</span>
                                        <figure class="placeHolderRatio2X3">
                                            <div class="content">
                                                @if ($movie->logo!= Null)
                                                    <img class="logo-serie" src="{{asset('movies/'.$movie->IMDB.'/'.$movie->logo.'')}}"/>
                                                @endif
                                                <img width="100%" alt="{{$movie->name}}" src="{{asset('movies/'.$movie->IMDB.'/'.$movie->cover[0]->image.'')}}" title="420 IPC Movie" alt="420 IPC Movie" crossorigin="anonymous">
                                            </div>
                                        </figure>

                                    </a>
                                    <a id="name-serie">
                                        {{$movie->name}}
                                    </a>
                                    <div class="cardPopupWrap ">
                                        <h3 class="title"><span>{{$movie->name}}</span></h3>
                                        <div class="details">
                                            <span>{{$movie->votes}}</span>
                                            <span>{{$movie->time}}</span>
                                            <span>{{$movie->categs}}</span>
                                        </div>
                                        <div class="buttonplay">
                                            <form method="post" action="{{route('serieShow',['IMDB'=>$movie->IMDB,'title'=>Str::slug($movie->name)])}}">
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

                            </li>
                            @endforeach



                        </ul>
                        <a class="left-slider-list slider-control sliders-list"><img class="home-browser-carousel-right-arrow" src=""></a>
                        <a class="right-slider-list slider-control sliders-list"><img class="home-browser-carousel-right-arrow" src=""></a>

                    </div>
                </div>

            </div>

    </section>

@endsection

@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


    @if (Session::has('message'))
        <script>

            toastr.success('{{Session::get("message")}}','Conta Criada',{
                enableHtml: true,
                progressBar: true,
                positionClass: "toast-top-full-width",
                timeOut: "5000",
                onclick: function(){

                    window.location.href = "{{route('pageLogin')}}";
                },
                onCloseClick: function(){

                    window.location.href = "{{route('pageLogin')}}";
                }
            });
      </script>
    @elseif(Session::has('error'))
        <script>

            toastr.error('{{Session::get("error")}}');
    </script>
    @endif




    <script>
        $('.movies-list').slick({
        dots: false,
        infinite: false,
        speed: 300,
        arrows: false,
        variableWidth: true,

        responsive: [{
         breakpoint: 1024,
         settings: {
            slidesToShow: 6,
            slidesToScroll: 3,
            infinite: true,
            dots: true
         }
      },
      {
         breakpoint: 600,
         settings: {
            slidesToShow: 4,
            slidesToScroll: 2
         }
      },
      {
         breakpoint: 480,
         settings: {
            slidesToShow: 2,
            slidesToScroll: 1
         }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
   ]
        });
    </script>


<script>
    $('.series-list').slick({
    dots: false,
    centerMode: false,
    infinite: false,
    speed: 300,
    arrows: true,
        prevArrow:$('.left-slider-list'),
        nextArrow:$('.right-slider-list'),
        responsive: [{
         breakpoint: 1024,
         settings: {
            slidesToShow: 4,
            slidesToScroll: 1,
            infinite: true,
            dots: true
         }
      },
      {
         breakpoint: 600,
         settings: {
            slidesToShow: 1,
            slidesToScroll: 1,

         }
      },
      {
         breakpoint: 480,
         settings: {
            slidesToShow: 1,
            slidesToScroll: 1,

         }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
   ]
    });
</script>

<script>

    $('.related-movies').slick({
        infinite: true,
        slidesToShow: 1,
  slidesToScroll: 1,
  arrows: true,
  fade: true,
  dots:true,
  autoplay: true,
        autoplaySpeed: 30000,
prevArrow:$('.left'),
nextArrow: $('.right'),

});
</script>



@endsection
