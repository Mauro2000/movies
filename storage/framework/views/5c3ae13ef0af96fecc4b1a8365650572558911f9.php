<?php echo $__env->make('meta::manager', [
    'title'         => config('app.name').' - Veja Séries de Televisão e Filmes Online',
    'description'   => 'Aqui pode assistir filmes online grátis',
    'image'         => 'Url to the image',
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('title'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('links'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/homepage.css')); ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<link rel="stylesheet" href="<?php echo e(asset('css/cookieNotice.css')); ?>">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="home-slider w-100">
    <?php echo $__env->make('cookie-consent::index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="related-movies">
        <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div>
                <div class="img-background" style="background-image:url('<?php echo e(asset('movies/'.$slider->movies->IMDB.'/'.$slider->cover->image.'')); ?>');"></div>
                <div class="container-fluid position-relative h-100 p-100">
                    <div class="slider-inner h-100">
                        <div class="row align-items-center  h-100 iq-ltr-direction justify-content-center">
                            <div class="col-xl-6 col-lg-12 text-center col-md-12">
                                <a>
                                    <div class="channel-logo fadeInLeft animate__animated animate__fadeInLeft"  style="opacity: 1;">
                                        <span> <?php echo e($slider->message); ?></span>
                                    </div>
                                </a>
                                <div class="mt-5  content-infos d-flex flex-wrap  animate__animated animate__fadeInLeft">
                                    <h3 style="display: contents;" class="movie-name fadeInLeft animate__animated animate__fadeInLeft"  style="opacity: 1;">
                                        <?php echo e($slider->movies->name); ?>

                                    </h3>

                                    <p data-animation-in="fadeInUp" data-delay-in="1.2" class="fadeInUp animated desc w-100" style="opacity: 1; animation-delay: 1.2s;">
                                        <?php echo e(\Illuminate\Support\Str::limit($slider->movies->summary,150)); ?>

                                        </p>
                                </div>


                                <div class="d-flex flex-wrap ">
                                        
                                        

                                </div>

                                

                                <div class="d-flex mt-4 justify-content-center m btns align-items-center r-mb-23 fadeInUp animated" data-animation-in="fadeInUp" data-delay-in="1.2" style="opacity: 1; animation-delay: 1.2s;">
                                    <?php if($slider->movies->type=="Movie"): ?>
                                    <a href="<?php echo e(route('movieShow',
                                    [
                                        'IMDB'=>$slider->movies->IMDB,
                                        'title'=>Str::slug($slider->movies->name),
                                    ]

                                    )); ?>"  class="mr-2 btn-movies btn-reproduzir btn-hover" tabindex="0">
                                      <i class="fa fa-play-circle" aria-hidden="true"></i>

                                      <span>Reproduzir</span>
                                    </a>
                                    <?php else: ?>

                                        <a class="mr-2 btn-movies btn-reproduzir btn-hover" tabindex="0">
                                            <form class="m-0" method="POST" action="<?php echo e(route('serieShow',
                                            [
                                                'IMDB'=>$slider->movies->IMDB,
                                                'title'=>Str::slug($slider->movies->name),
                                            ]

                                            )); ?>">
                                            <?php echo csrf_field(); ?>
                                            <i class="fa fa-play-circle" aria-hidden="true"></i>

                                            <button style="border: none;color:white;"class="bg-transparent ">Reproduzir</button>

                                            </form>
                                        </a>

                                    <?php endif; ?>



                                    <?php if($slider->movies->type=="Movie"): ?>
                                    <a href="<?php echo e(route('movieShow',
                                    [
                                        'IMDB'=>$slider->movies->IMDB,
                                        'title'=>Str::slug($slider->movies->name),
                                    ]

                                    )); ?>"  class="mr-2 btn-movies" tabindex="0">
                                      <i class="fa fa-info-circle" aria-hidden="true"></i>

                                      <span>Mais Informações</span>
                                    </a>
                                    <?php else: ?>

                                        <a class="mr-2 btn-movies" tabindex="0">
                                            <form class="m-0" method="POST" action="<?php echo e(route('serieShow',
                                            [
                                                'IMDB'=>$slider->movies->IMDB,
                                                'title'=>Str::slug($slider->movies->name),
                                            ]

                                            )); ?>">
                                            <?php echo csrf_field(); ?>
                                           <i class="fa fa-info-circle" aria-hidden="true"></i>

                                            <button style="border: none;color:white;"class="bg-transparent ">Mais Informações</button>

                                            </form>
                                        </a>

                                    <?php endif; ?>


                                    <a class="mr-2 btn-movies" tabindex="0">
                                        <form  class="m-0" action="<?php echo e(route('addWishlist')); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
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
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


    </div>
    
    <a class="right slider-control"><img class="home-browser-carousel-right-arrow" src="<?php echo e(asset('images/arrow.png')); ?>"></a>
    <a class="left slider-control"><img class="home-browser-carousel-right-arrow" src="<?php echo e(asset('images/arrow.png')); ?>"></a>

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
                            <?php $__currentLoopData = $Lancamentos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="item-movie mr-2 position-relative">
                                <div class="movieCard card-movie  marginRight zoomCardHover ">
                                    <a href="javascript::" class="clickWrapper">
                                        <figure class="placeHolderRatio2X3">
                                            <div class="content">
                                                <img width="100%" src="<?php echo e($movie->image); ?>" title="420 IPC Movie" alt="420 IPC Movie" crossorigin="anonymous">
                                            </div>
                                        </figure>
                                    </a>
                                    <div class="cardPopupWrap ">
                                        <h3 class="title"><span><?php echo e($movie->name); ?></span></h3>
                                        <div class="details">
                                            <span><?php echo e($movie->votes); ?></span>
                                            <span><?php echo e($movie->time); ?></span>
                                            <span><?php echo e($movie->categs); ?></span>
                                        </div>
                                        <div class="buttonplay">
                                            <a href="<?php echo e(route('movieShow',
                                            [
                                                'IMDB'=>$movie->IMDB,
                                                'title'=>Str::slug($movie->name),
                                            ]

                                            )); ?>">
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
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




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
                            <?php $__currentLoopData = $Movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="item-movie mr-2 position-relative">
                                <div class="movieCard card-movie  marginRight zoomCardHover ">
                                    <a href="javascript::" class="clickWrapper">
                                        <figure class="placeHolderRatio2X3">
                                            <div class="content">
                                                <img width="100%" src="<?php echo e($movie->image); ?>" title="420 IPC Movie" alt="420 IPC Movie" crossorigin="anonymous">
                                            </div>
                                        </figure>
                                    </a>
                                    <div class="cardPopupWrap ">
                                        <h3 class="title"><span><?php echo e($movie->name); ?></span></h3>
                                        <div class="details">
                                            <span><?php echo e($movie->votes); ?></span>
                                            <span><?php echo e($movie->time); ?></span>
                                            <span><?php echo e($movie->categs); ?></span>
                                        </div>
                                        <div class="buttonplay">
                                            <?php if($movie->type=="Movie"): ?>
                                            <a href="<?php echo e(route('movieShow',
                                            [
                                                'IMDB'=>$movie->IMDB,
                                                'title'=>Str::slug($movie->name),
                                            ]

                                            )); ?>">
                                                <div class="noSelect btnIcon playBtnIcon">
                                                    <div class="btntext">
                                                        Watch
                                                    </div>
                                                </div>
                                            </a>
                                            <?php else: ?>
                                            <div class="buttonplay">
                                                <form method="post" action="<?php echo e(route('serieShow',['IMDB'=>$movie->IMDB,'title'=>Str::slug($movie->name)])); ?>">
                                                    <?php echo csrf_field(); ?>
                                                        <button style="    width: 100%;border: none;" type="submit" tabindex="0">
                                                        <div class="noSelect btnIcon playBtnIcon">
                                                            <div class="btntext">
                                                                 Watch
                                                            </div>
                                                        </div>
                                                    </button>
                                                </form>
                                            </div>
                                            <?php endif; ?>

                                        </div>
                                    </div>
                                </div>

                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




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
                            <?php $__currentLoopData = $Series; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <li class="item-serie mr-2 position-relative">
                                <div class="movieCard card-movie  marginRight zoomCardHover ">
                                    <a class="clickWrapper">
                                        <span class="span-serie">NOVOS EPISÓDIOS</span>
                                        <figure class="placeHolderRatio2X3">
                                            <div class="content">
                                                <?php if($movie->logo!= Null): ?>
                                                    <img class="logo-serie" src="<?php echo e(asset('movies/'.$movie->IMDB.'/'.$movie->logo.'')); ?>"/>
                                                <?php endif; ?>
                                                <img width="100%" alt="<?php echo e($movie->name); ?>" src="<?php echo e(asset('movies/'.$movie->IMDB.'/'.$movie->cover[0]->image.'')); ?>" title="420 IPC Movie" alt="420 IPC Movie" crossorigin="anonymous">
                                            </div>
                                        </figure>

                                    </a>
                                    <a id="name-serie">
                                        <?php echo e($movie->name); ?>

                                    </a>
                                    <div class="cardPopupWrap ">
                                        <h3 class="title"><span><?php echo e($movie->name); ?></span></h3>
                                        <div class="details">
                                            <span><?php echo e($movie->votes); ?></span>
                                            <span><?php echo e($movie->time); ?></span>
                                            <span><?php echo e($movie->categs); ?></span>
                                        </div>
                                        <div class="buttonplay">
                                            <form method="post" action="<?php echo e(route('serieShow',['IMDB'=>$movie->IMDB,'title'=>Str::slug($movie->name)])); ?>">
                                                <?php echo csrf_field(); ?>
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
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                        </ul>
                        <a class="left-slider-list slider-control sliders-list"><img class="home-browser-carousel-right-arrow" src=""></a>
                        <a class="right-slider-list slider-control sliders-list"><img class="home-browser-carousel-right-arrow" src=""></a>

                    </div>
                </div>

            </div>

    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


    <?php if(Session::has('message')): ?>
        <script>

            toastr.success('<?php echo e(Session::get("message")); ?>','Conta Criada',{
                enableHtml: true,
                progressBar: true,
                positionClass: "toast-top-full-width",
                timeOut: "5000",
                onclick: function(){

                    window.location.href = "<?php echo e(route('pageLogin')); ?>";
                },
                onCloseClick: function(){

                    window.location.href = "<?php echo e(route('pageLogin')); ?>";
                }
            });
      </script>
    <?php elseif(Session::has('error')): ?>
        <script>

            toastr.error('<?php echo e(Session::get("error")); ?>');
    </script>
    <?php endif; ?>




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



<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.header.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\movies\resources\views/frontend/Homepage.blade.php ENDPATH**/ ?>