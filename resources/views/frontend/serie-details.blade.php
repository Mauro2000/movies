@extends('frontend.header.header')

@include('meta::manager', [
    'title'         => $serie->name.' - '.config('app.name').' - Veja Séries de Televisão e Filmes Online',
    'description'   => 'Assitir '.$serie->name.' grátis',
    'image'         => 'Url to the image',
    'type'=>'article'
])


@section('links')
<link rel="stylesheet" href="{{asset('css/serie-details.css')}}">
@endsection

@section('content')
    <div class="img-background" style="background-image:url({{asset('movies/'.$serie->IMDB.'/'.$serie->cover[0]->image.'')}});"></div>

    <div class="recipe-popcorn">
        <a data-toggle="modal" data-target="#exampleModal">
        <img src="" id="popcorn-svg" alt="" srcset="{{asset('images/popcorn.svg')}}">
        </a>

    </div>

    <section class="position-relative infos">

        <img class="poster" src="{{asset('movies/'.$serie->IMDB.'/'.$serie->IMDB.'.jpg')}}"/>
        <h2 class=" title mb-3">{{$serie->name}}</h2>

        <div class="d-flex mb-3" id="info-movie">
            <span class="mr-3"><i class="far fa-star"></i> IMDB: {{str_replace(',','.',$serie->votes)}}</span>
            <span class="time mb-3 mr-3">
                <i class="far fa-clock"></i>
                Duração: {{$serie->time}}</span>
            <div class="year mr-3">
                <i class="fas fa-calendar-alt"></i>
                Ano: {{$serie->year}}</div>
        </div>

        <p class="Description summary mb-3"> {{\Illuminate\Support\Str::limit($serie->summary,119)}}</p>


        <p><span>Diretor:</span><span>{{$serie->director}}</span></p>

            <div class="genres mb-3">
                <?php $genres=explode(' ,',$serie->categs)?>

                @foreach ($genres as $item)
                <a class="mr-3" href="{{route('listSeries',['category'=>Str::slug($item)])}}"data-toggle="tooltip" data-placement="top" title="{{$item}}">{{$item}}</a>
                @endforeach
            </div>

            @if (Auth::user())



            <div class="d-flex mt-3 m btns align-items-center r-mb-23 fadeInUp animated" data-animation-in="fadeInUp" data-delay-in="1.2" style="opacity: 1; animation-delay: 1.2s;">
                <a href=""  class="mr-2 btn-movies btn-reproduzir btn-hover" tabindex="0">
                    <svg width="24px" height="24px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6,4.67012593 L6,19.3298741 C6,19.6888592 6.29101491,19.9798741 6.65,19.9798741 C6.78014165,19.9798741 6.90728686,19.940808 7.01497592,19.8677333 L17.6705631,12.6371563 C18.0224548,12.3983727 18.114147,11.9195356 17.8753633,11.5676439 C17.8206658,11.4870371 17.7511699,11.4175411 17.6705631,11.3628437 L7.01497592,4.13226667 C6.71792446,3.93069604 6.31371138,4.00809854 6.11214075,4.30515 C6.03906603,4.41283906 6,4.53998428 6,4.67012593 Z M5,4.67012593 C5,4.33976636 5.09916761,4.01701312 5.28466497,3.74364859 C5.79634428,2.98959487 6.82242363,2.79311159 7.57647734,3.3047909 L18.2320645,10.5353679 C18.4173555,10.6611011 18.5771059,10.8208515 18.7028391,11.0061425 C19.2517314,11.8150365 19.0409585,12.9157398 18.2320645,13.4646321 L7.57647734,20.6952091 C7.3031128,20.8807065 6.98035956,20.9798741 6.65,20.9798741 C5.73873016,20.9798741 5,20.2411439 5,19.3298741 L5,4.67012593 Z"/>
                      </svg>

                    <span>Ver Trailer</span>
                </a>

                @if (Auth::user()->getFollows!='[]')
                    @foreach (Auth::user()->getFollows as $follow)

                        @if ($follow->movie_id =="$serie->id")
                            <a href="javascript:void(0)" onclick="Follow('{{$serie->id}}')"  class="mr-2 btn-movies" id="follow_btn">
                                <i class="fas fa-check" aria-hidden="true"></i>
                                <span>Deixar de Seguir</span>
                            </a>

                        @endif
                    @endforeach
                @else
                    <a href="javascript:void(0)" onclick="Follow('{{$serie->id}}')"  class="mr-2 btn-movies" id="follow_btn">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                            <span>Seguir Serie</span>
                    </a>
                @endif




                <a href="javascript:void(0)" onclick="AddWishlist('{{$serie->id}}')"  class="mr-2 btn-movies" id="wishlist_btn" tabindex="0">
                    <i class="fas fa-plus" aria-hidden="true"></i>
                    <span>A Minha Lista</span>
                </a>


            </div>


            <div class="button" onclick="showplayers();">
                <svg version="1.1" id="play" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="100px" width="100px"
                viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
             <path class="stroke-solid" fill="none" stroke="white"  d="M49.9,2.5C23.6,2.8,2.1,24.4,2.5,50.4C2.9,76.5,24.7,98,50.3,97.5c26.4-0.6,47.4-21.8,47.2-47.7
               C97.3,23.7,75.7,2.3,49.9,2.5"/>
             <path class="stroke-dotted" fill="none" stroke="white"  d="M49.9,2.5C23.6,2.8,2.1,24.4,2.5,50.4C2.9,76.5,24.7,98,50.3,97.5c26.4-0.6,47.4-21.8,47.2-47.7
               C97.3,23.7,75.7,2.3,49.9,2.5"/>
             <path class="icon" fill="white" d="M38,69c-1,0.5-1.8,0-1.8-1.1V32.1c0-1.1,0.8-1.6,1.8-1.1l34,18c1,0.5,1,1.4,0,1.9L38,69z"/>
            </svg>
            </div>


            @else
                <div class="col-12 btn-login">
                    <a href="{{route('pageLogin')}}" class="btn-get-started btn btn-light btn-large">
                      <i class="fa fa-user-circle" aria-hidden="true"></i>  Iniciar Sessão
                    </a>
                </div>
            @endif
    </section>

    <section class="position-relative p-170">
        <div class="row">
            <div class="col-12">
                <h2 class="mb-5 section-title">Elenco</h2>
                <div class="d-block list-cast">

                @foreach ($casts as $cast)
                    <div>
                        <div id="avatar" >
                            @if (file_exists('movies/Cast/'.$cast.'.jpg'))
                                <img src="{{asset('movies/Cast/'.$cast.'.jpg')}}"/>
                                @else
                                <img src="{{asset('images/default.png')}}"/>
                            @endif

                            <a>{{ mb_convert_encoding($cast,'HTML-ENTITIES','utf-8')}}</a>
                        </div>
                    </div>
                @endforeach

                </div>

            </div>

        </div>
    </section>



<div class="playerarea">
    <div class="optionsButtons">
        <div class="gButton click" onclick="showplayers();">
            Mostrar Temporadas
            </div>

    </div>
    <div id="playerFrame">
        <div class="container">
        <div class="row w-100 justify-content-center"  id="playerFrameRow"></div>
           <div id="player1">

           </div>

        </div>
    </div>
    <div class="list">
        <div class="title">
            Escolha uma Temporada
        </div>
        <div class="listing">

            <div class="row" style="justify-content: center;">
                @foreach ($serie->seasons as $seasons)
                    <div class="col-4 p-5 temporadas" style="cursor:pointer;">
                        <span><a onclick="return getEpisodes('{{$seasons->id}}','{{$seasons->season}}','{{$serie->IMDB}}')">Temporada {{$seasons->season}}</a></span>
                    </div>
                @endforeach
            </div>
            <div onclick="return getplayer('{{$serie->IMDB}}')" class="playerBtn">
                Player 1</div>

        <div class="closePlayerarea" onclick="return closePlayerarea()">
            <i class="fa fa-times-circle" aria-hidden="true"></i>
        </div>
        </div>
    </div>
</div>
@include('frontend.modals.popcorn-recipe')
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js" integrity="sha512-H6cPm97FAsgIKmlBA4s774vqoN24V5gSQL4yBTDOY2su2DeXZVhQPxFK4P6GPdnZqM9fg1G3cMv5wD7e6cFLZQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        function showplayers(){
            $('body').removeClass('episodeList');
            $('#playerFrame').removeClass('visible');
            $('.optionsButtons').removeClass('active');
            $('body').addClass('playerarea-active');
        }
        function closePlayerarea(){
            $('body').removeClass('playerarea-active');
        }

        function ShowPlayersOK(episode,season){

            $('#playerFrameRow').addClass('d-none');
            $('#player1').removeClass('d-none');

            var frame = document.getElementById('player1');
            frame.innerHTML = '<div class="col-12"><button onclick="warezPlugin('+season+','+episode+')" class="btn btn-primary" type="button">Player 1</button>\
                <button onclick="warezPlugin2('+season+','+episode+')" class="btn btn-primary" type="button">Player 2</button>\
                </div>';
        }

    </script>
    <script>
        function getplayer(id){
            $('#playerFrame').addClass('visible');
            $('.optionsButtons').addClass('active');
            var type='serie';
            var season="";
            var episode="";
            //warezPlugin(type,id,season,episode);

        }
    </script>
    <script>
         function warezPlugin(season,episode){

           //  var season=$('#showserie').data('season');
            // var episode=$('#showserie').data('episode');
             var imdb="{{$serie->IMDB}}";
             var type="serie";

                var frame = document.getElementById('player1');
                frame.innerHTML = '<iframe src="https://embed.warezcdn.com/'+type+'/'+imdb+'/'+season+'/'+episode+'" scrolling="no" frameborder="0" allowfullscreen="" webkitallowfullscreen="" mozallowfullscreen=""></iframe>';
            }

            function warezPlugin2(season,episode){
            // var season=$('#showserie').data('season');
            // var episode=$('#showserie').data('episode');
             var imdb="{{$serie->IMDB}}";
             var type="serie";

             var frame = document.getElementById('player1');

            frame.innerHTML +='<iframe src="https://2embed.org/embed/series?imdb='+imdb+'&sea='+season+'&epi='+episode+'" scrolling="no" frameborder="0" allowfullscreen="" webkitallowfullscreen="" mozallowfullscreen=""></iframe>';

               // var frame = document.getElementById('playerFrame');
               // frame.innerHTML = '<iframe src="https://embed.warezcdn.com/'+type+'/'+imdb+'/'+season+'/'+episode+'" scrolling="no" frameborder="0" allowfullscreen="" webkitallowfullscreen="" mozallowfullscreen=""></iframe>';
            }
    </script>
<script>
    function getEpisodes(id,season,imdbid){
        $('#playerFrameRow').removeClass('d-none');
        $('#player1').addClass('d-none');
        $('body').addClass('episodeList');

        $.ajax({
        url: "{{ route('getEpisodes') }}",
        type:"POST",
        data:{
          seasonid: id,
          _token: '{{csrf_token()}}'
        },
        success:function(result){

                $('#playerFrame').addClass('visible');
                $('.optionsButtons').addClass('active');
                var frame = document.getElementById('playerFrameRow');
                frame.innerHTML = '<div class="col-12"><h4>Temporada '+season+'</h4></div>';

                var json = $.parseJSON(result);
                console.log(json[0]['Episodes']);
                for (var i=0;i<=json[0]['Episodes'].length;i++){
                    if(json[0]['Episodes'][i]['image']== "default"){
                        var image="{{asset('movies/'.$serie->IMDB.'/'.$serie->IMDB.'cover.jpg')}}";
                    }else{

                        var image="'/movies/"+json[0]['Episodes'][i]['image']+"'";
                    }

                    var airdate=json[0]['Episodes'][i]['airdate'];

                    var dados= json[0]['Episodes'][i]['episode'];



                    var today = new Date();

                    var date = new Date().toJSON().slice(0, 10);
                    console.log(date);

                    if(airdate >= date){
                        frame.innerHTML += '<div id="list">\
                        <a id="showserie">\
                            <span id="epi">'+json[0]['Episodes'][i]['episode']+'</span>\
                            <div class="episodes" style="background-image:url('+image+')">\
                                <div class="information"><span>Brevemente</span></div>\
                            </div>\
                            <span id="name">'+json[0]['Episodes'][i]['name']+'</span>\
                        </a>\
                        </div>';

                    }else{
                        frame.innerHTML += '<div id="list" onclick="ShowPlayersOK('+dados+','+season+')"><a id="showserie" data-episode="'+dados+'" data-season="'+season+'" ><span id="epi">'+json[0]['Episodes'][i]['episode']+'</span><div class="episodes" style="background-image:url('+image+')"></div><span id="name">'+json[0]['Episodes'][i]['name']+'</span></a></div>';
                    }

                }


        },
        error: function(error) {
         console.log(error);
        }
       });
    }
</script>
<script>
 function Follow(idIMDB){



        $.ajax({
        url: "{{ route('addFollow') }}",
        type:"POST",
        dataType: 'JSON',
        data:{
            idIMDB: idIMDB,
          _token: '{{csrf_token()}}'
        },
        beforeSend: function() {
        // setting a timeout
        $('#loader').addClass("loader-active");

        },
        complete: function () {
            $('#loader').removeClass("loader-active");
        },
        success:function(result){

           if(result[0].code==="1"){
            $('#follow_btn span').text("Seguir Serie");
           }else{
            $('#follow_btn span').text("Deixar de Seguir");
           }

            $('#follow_btn i').toggleClass('fa-plus fa-check');



        },
        error: function(error) {
         console.log(error);
        }
       });
    }
</script>
<script>
let popcornBucket = document.querySelector("#popcorn-svg");
let corns = document.querySelectorAll("#popcorn-svg use");
let masterTl = new TimelineMax().
add(showUp(), "start");



function showUp() {
  let tl = new TimelineMax().
  set(popcornBucket, {
    transformOrigin: "100% 100%",
    y: -window.innerHeight,
    autoAlpha: 1,
    rotation: 30 }).

  to(popcornBucket, 1.5, { y: 0, rotation: 0, ease: Bounce.easeOut });
  return tl;
}
function popCorn() {
  let tl = new TimelineMax();
  for (let corn of corns) {
    tl.to(
    corn,
    random(1, 15),
    {
      onStartParams: ["{self}"],
      onStart: function (el) {
        $(el.target).appendTo("svg");
      },
      scale: random(0.1, 15),
      physics2D: {
        velocity: random(100, 300),
        angle: random(230, 290),
        gravity: random(1000, 1200) } },


    Math.random() * random(1, 15));

  }
  return tl;
}

function random(min, max) {
  return min + Math.random() * (max - min);
}
</script>
<script>
    $('.list-cast').slick({
        infinite: false,
        slidesToShow: 6,
        slidesToScroll: 3,
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
@endsection
