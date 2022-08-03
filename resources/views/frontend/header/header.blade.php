<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/header.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/slick.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{asset('css/slick-theme.css')}}">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
 {{--  <style>
      :root{
          --primary: {{colors('primary')}};
          --secondary: {{colors('secundary')}};
          font-family: {{font()}};
      }
  </style> --}}
  @yield('links')
</head>
<body>

    <!----website header ---->
    <header class="col-12 d-none d-lg-block">
        <div class="main-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <nav class="navbar navbar-expand-lg navbar-light p-0">
                            <a class="navbar-brand">
                                <img class="img-fluid" id="logo" src="https://templates.iqonic.design/streamit/frontend/html/images/logo.png"/>
                            </a>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <div class="menu-main-menu-container">
                                   <ul id="top-menu" class="navbar-nav ml-auto">
                                      <li class="menu-item">
                                         <a href="{{route('homepage')}}">Home</a>
                                      </li>
                                      <li class="menu-item">
                                         <a href="{{route('listSeries')}}">Séries</a>
                                      </li>
                                      <li class="menu-item">
                                         <a href="{{route('listMovies')}}">Movies</a>
                                      </li>
                                      <li class="menu-item">
                                         <a href="{{route('listMovies',['category'=>'Documentary'])}}">Documentários</a>

                                      </li>
                                      <li class="menu-item">
                                         <a href="{{route('listMovies',['category'=>'Animation'])}}">Kids</a>
                                        {{--  <ul class="sub-menu">
                                            <li class="menu-item"><a href="about-us.html">About Us</a></li>
                                            <li class="menu-item "><a href="contact.html">Contact</a></li>
                                            <li class="menu-item"><a href="faq.html">FAQ</a></li>
                                            <li class="menu-item"><a href="privacy-policy.html">Privacy-Policy</a></li>
                                            <li class="menu-item"><a href="#">Pricing</a>
                                            <ul class="sub-menu">
                                               <li class="menu-item"><a href="pricing-plan-1.html">Pricing Plan 1</a></li>
                                               <li class="menu-item"><a href="pricing-plan-2.html">Pricing Plan 2</a></li>
                                            </ul> --}}
                                         </li>
                                         </ul>
                                      </li>
                                   </ul>
                                </div>
                             </div>
                             <div class="navbar-right menu-right">
                                <ul class="d-flex align-items-center list-inline m-0">
                                    <li class="nav-item nav-icon">
                                        <a onclick="searchBox()" class="search-toggle device-search">
                                            <i class="fa fa-search" aria-hidden="true"></i>
                                        </a>
                                    </li>

                                    @if (Auth::check())
                                        <li class="nav-item nav-icon">
                                            <div class="notifications">
                                                <div class="icon_wrap">
                                                    @if (Auth::user()->unreadNotifications()->count() > '0')
                                                        <i class="fas fa-bell ringing"></i>
                                                    @else
                                                        <i class="fas fa-bell"></i>
                                                    @endif


                                                </div>

                                                <div class="notification_dd">
                                                    <ul class="notification_ul p-0">
                                                        @foreach (Auth::user()->unreadNotifications as $notification)


                                                        <li class="item-notification">
                                                            <div class="row">
                                                                <div class="col-4 p.0 image-notification">
                                                                    <img src="https://www.themoviedb.org/t/p/original/8zWSgdtYKyLUGRZpxMQvveNxRIU.jpg"/>
                                                                </div>
                                                                <div class="col p-0 info-notification">
                                                                    <div class="title">
                                                                        Lucifer {{Auth::user()->unreadNotifications()->count()}}
                                                                    </div>
                                                                    <p class="message">{{$notification->data['message']}}</p>
                                                                    <p class="time">{{

                                                                       $notification->created_at->diffForHumans()

                                                                    }}</p>
                                                                </div>
                                                                    <a data-id="{{$notification->id}}" class="btn-delete">
                                                                        <i class="fa fa-times-circle" aria-hidden="true"></i>
                                                                    </a>
                                                            </div>
                                                        </li>
                                                        @endforeach
                                                        <li class="show_all">
                                                            <p class="link">Show All Activities</p>
                                                        </li>
                                                    </ul>
                                                </div>

                                              </div>
                                        </li>

                                        <li>
                                            <div class="profile">
                                                <div class="icon_wrap">
                                                  <img src="https://i.imgur.com/x3omKbe.png" alt="profile_pic">
                                                  <span class="name">{{auth()->user()->name}}</span>
                                                  <i class="fas fa-chevron-down"></i>
                                                </div>

                                                <div class="profile_dd">
                                                  <ul class="profile_ul">
                                                    <li>
                                                        <a href="{{route('logout')}}">Logout</a>
                                                    </li>
                                                  </ul>
                                                </div>
                                              </div>
                                            </div>
                                        </li>
                                    @else
                                    <li class="nav-item nav-icon">
                                        <button class="btn btn-get-started btn-danger btn-large">
                                            <a href="{{route('pageRegister')}}"> Registo</a>
                                        </button>
                                    </li>
                                        <li class="nav-item nav-icon">
                                            <button class="btn-get-started btn btn-light btn-large">
                                                <a href="{{route('pageLogin')}}"> Iniciar Sessão</a>
                                            </button>
                                        </li>

                                    @endif


                                </ul>
                             </div>



                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!----Fim website header ---->
    <header id="top_nav_mobile" class="col-12 d-xl-none d-lg-none d-md-none d-sm-block d-xs-none">
        <div class="main-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <nav class="navbar navbar-expand-lg navbar-light p-0">
                            <a class="navbar-brand">
                                <img class="img-fluid" id="logo" src="https://templates.iqonic.design/streamit/frontend/html/images/logo.png">
                            </a>
                             <div class="navbar-right menu-right">
                                <ul class="d-flex align-items-center list-inline m-0">
                                    @if (Auth::check())
                                    <li class="nav-item nav-icon">
                                        <div class="notifications">
                                            <div class="icon_wrap" data-toggle="tooltip" data-placement="top" title="Notificações">
                                                @if (Auth::user()->unreadNotifications()->count() > '0')
                                                    <i class="fas fa-bell ringing"></i>
                                                @else
                                                    <i class="fas fa-bell"></i>
                                                @endif


                                            </div>

                                            <div class="notification_dd">
                                                <ul class="notification_ul p-0">
                                                    @foreach (Auth::user()->unreadNotifications as $notification)


                                                    <li class="item-notification">
                                                        <div class="row">
                                                            <div class="col-4 p.0 image-notification">
                                                                <img src="https://www.themoviedb.org/t/p/original/8zWSgdtYKyLUGRZpxMQvveNxRIU.jpg"/>
                                                            </div>
                                                            <div class="col p-0 info-notification">
                                                                <div class="title">
                                                                    Lucifer {{Auth::user()->unreadNotifications()->count()}}
                                                                </div>
                                                                <p class="message">{{$notification->data['message']}}</p>
                                                                <p class="time">{{

                                                                   $notification->created_at->diffForHumans()

                                                                }}</p>
                                                            </div>
                                                                <a data-id="{{$notification->id}}" class="btn-delete">
                                                                    <i class="fa fa-times-circle" aria-hidden="true"></i>
                                                                </a>
                                                        </div>
                                                    </li>
                                                    @endforeach
                                                    <li class="show_all">
                                                        <p class="link">Show All Activities</p>
                                                    </li>
                                                </ul>
                                            </div>

                                          </div>
                                    </li>

                                    <li class="nav-item nav-icon">
                                        <a href="{{route('logout')}}" data-toggle="tooltip" data-placement="top" title="Sair">
                                            <i class="fas fa-sign-out-alt"></i>
                                        </a>
                                    </li>
                                    @endif

                                </ul>
                             </div>



                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <header id="menu_mobile" class="col-12 d-xl-none d-lg-none d-md-none d-sm-block d-xs-none">
        <ul>
            <li class="{{ Request::routeIs('listMovies') ? 'activeMenuMobile' : '' }}"><a href="{{route('listMovies')}}" ><i class="fa fa-film" aria-hidden="true"></i><span>Filmes</span></a></li>
            <li class="{{ Request::routeIs('listSeries') ? 'activeMenuMobile' : '' }}"><a href="{{route('listSeries')}}"><i class="fa fa-tv" aria-hidden="true"></i><span>Series</span></a></li>
            <li class="{{ Request::routeIs('homepage') ? 'activeMenuMobile' : '' }}"><a href="{{route('homepage')}}"><i class="fa fa-home" aria-hidden="true"></i><span>Home</span></a></li>
            <li><a onclick="searchBox()"><i class="fa fa-search" aria-hidden="true"></i><span>Pesquisar</span></a></li>
            <li><a href="{{route('myAccount')}}"><i class="fa fa-user" aria-hidden="true"></i><span>Perfil</span></a></li>

        </ul>
    </header>


    @yield('content')

@include('frontend.footer.footer')
    <div id="loader" class="lds-dual-ring hidden overlay"></div>
    <div class="searchBox">

        <div class="content-search">
            <div class="close-btn">
                <span class="fas fa-times"></span>
             </div>

             <div class="search-data">
                <input type="text" id="search" required>
                <div class="line"></div>
                <label>Pesquisa por titulo ou IMDB...</label>
                <span class="fas fa-search" id="btn-search"></span>
             </div>

        </div>
        <div class="results">
            <div class="row" id="dados">
                <div class="col">
                    <div class="cirle-icon">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </div>
                    <h2 class="circle-h2"> Os resultados da pesquisa vão aparecer aqui</h2>
                </div>
            </div>
        </div>
     </div>

     <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
     <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/slick.min.js') }}"></script>
<script>
    $(".notifications .icon_wrap").click(function(){
  $(this).parent().toggleClass("active");
   $(".profile").removeClass("active");
});

$(".profile .icon_wrap").click(function(){
  $(this).parent().toggleClass("active");
  $(".notifications").removeClass("active");
});
</script>

{{-- <script>
    $('.related-movies').slick({
    arrows: true, // Adds arrows to sides of slider
  dots: true,
  infinite: true,
  speed: 300,
  slidesToShow: 1,
  adaptiveHeight: true
});
</script> --}}
<script>
    $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>

<script>
    function searchBox(){
        $('.searchBox').toggleClass("activate");
    }
</script>
<script>
    $('.close-btn').click(function(){
        $('.searchBox').removeClass('activate');
    });
</script>
<script>
    $('#btn-search').click(function(){

        $("#dados").html('\
                <div class="col">\
                    <div class="cirle-icon">\
                        <i class="fa fa-search" aria-hidden="true"></i>\
                    </div>\
                    <h2 class="circle-h2"> Os resultados da pesquisa vão aparecer aqui</h2>\
                </div>\
                ');

        $.ajax({
        url: "{{ route('search') }}",
        type:"POST",
        data:{
            search_query: $('#search').val(),
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

            if(result.length > 0)
            {
                $('#dados').html('');
                var index = document.getElementsByClassName("results");

                console.log(result);
                for(var count = 0; count < result.length; count++)
                {
                    if(result[count].type=="Movie"){
                        $('#dados').append('\
                        <div class="col">\
                            <div class="movieCard card-movie h-300 marginRight zoomCardHover ">\
                                <figure class="placeHolderRatio2X3">\
                                            <div class="content">\
                                                <img width="100%" src="'+result[count].image+'" title="420 IPC Movie" alt="420 IPC Movie" crossorigin="anonymous">\
                                            </div>\
                                        </figure>\
                                        <div class="cardPopupWrap ">\
                                            <h3 class="title"><span>'+result[count].name+'</span></h3>\
                                            <div class="details">\
                                                <span>'+result[count].votes+'</span>\
                                                <span>'+result[count].time+'</span>\
                                                <span>'+result[count].categs+'</span>\
                                            </div>\
                                            <div class="buttonplay">\
                                                <a href="/movie/'+result[count].IMDB+'/assistir-'+result[count].name+'" tabindex="0">\
                                                <div class="noSelect btnIcon playBtnIcon">\
                                                    <div class="btntext">\
                                                        Watch\
                                                    </div>\
                                                </div>\
                                                </a>\
                                            </div>\
                                        </div>\
                            </div>\
                            </div>\
                        ');
                    }else{
                        $('#dados').append('\
                        <div class="col">\
                            <div class="movieCard card-movie h-300 marginRight zoomCardHover ">\
                                <figure class="placeHolderRatio2X3">\
                                            <div class="content">\
                                                <img width="100%" src="'+result[count].image+'" title="420 IPC Movie" alt="420 IPC Movie" crossorigin="anonymous">\
                                            </div>\
                                        </figure>\
                                        <div class="cardPopupWrap ">\
                                            <h3 class="title"><span>'+result[count].name+'</span></h3>\
                                            <div class="details">\
                                                <span>'+result[count].votes+'</span>\
                                                <span>'+result[count].time+'</span>\
                                                <span>'+result[count].categs+'</span>\
                                            </div>\
                                            <div class="buttonplay">\
                                                <a href="/serie/'+result[count].IMDB+'/assistir-'+result[count].name+'" tabindex="0">\
                                                <div class="noSelect btnIcon playBtnIcon">\
                                                    <div class="btntext">\
                                                        Watch\
                                                    </div>\
                                                </div>\
                                                </a>\
                                            </div>\
                                        </div>\
                            </div>\
                            </div>\
                        ');
                    }


                }

                //$('.results').html(index);
            }else{
                $("#dados").html('\
                <div class="col">\
                    <div class="cirle-icon">\
                        <i class="fa fa-search" aria-hidden="true"></i>\
                    </div>\
                    <h2 class="circle-h2"> A tua pesquisa não retornou resultados. Experimenta utilizar outras palavras-chave e tenta novamente.</h2>\
                </div>\
                ');


            }
        },
        error: function(error) {
         console.log(error);
        }
       });
    });

</script>
{{-- <script>
     (function () {
        (function a() {
            try {
                (function b(i) {
                    if (('' + (i / i)).length !== 1 || i % 20 === 0) {
                        (function () { }).constructor('debugger')()
                    } else {
                        debugger
                    }
                    b(++i)
                }
                )(0)
            } catch (e) {
                setTimeout(a, 5000)
            }
        }
        )()
    }
    )();
</script> --}}

<script>
    function AddWishlist(idIMDB){
        $.ajax({
        url: "{{ route('addWishlist') }}",
        type:"POST",
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
            $('#wishlist_btn i').toggleClass('fa-plus fa-check');

        },
        error: function(error) {
         console.log(error);
        }
       });
    }
</script>


@yield('scripts')
</body>
</html>
