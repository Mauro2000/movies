<?php echo $__env->make('meta::manager', [
    'title'         => $movie->name.' - '.config('app.name').' - Veja Séries de Televisão e Filmes Online',
    'description'   => 'Assitir '.$movie->name.' grátis',
    'image'         => 'Url to the image',
    'type'=>'article'
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('links'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/movie-details.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="img-background" style="background-image:url(<?php echo e(asset('movies/'.$movie->IMDB.'/'.$movie->cover[0]->image.'')); ?>);"></div>


    <section class="position-relative infos">

        <img class="poster" src="<?php echo e(asset('movies/'.$movie->IMDB.'/'.$movie->IMDB.'.jpg')); ?>"/>
        <h2 class=" title mb-3"><?php echo e($movie->name); ?></h2>

        <div class="d-flex mb-3" id="info-movie">
            <span class="mr-3"><i class="far fa-star"></i> IMDB: <?php echo e(str_replace(',','.',$movie->votes)); ?></span>
            <span class="time mb-3 mr-3">
                <i class="far fa-clock"></i>
                Duração: <?php echo e($movie->time); ?></span>
            <div class="year mr-3">
                <i class="fas fa-calendar-alt"></i>
                Ano: <?php echo e($movie->year); ?></div>
        </div>

        <p class="Description summary mb-3"> <?php echo e(\Illuminate\Support\Str::limit($movie->summary,119)); ?></p>


        <p><span>Diretor:</span><span><?php echo e($movie->director); ?></span></p>

            <div class="genres mb-5">
                <?php $genres=explode(' ,',$movie->categs)?>

                <?php $__currentLoopData = $genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a class="mr-3"><?php echo e($item); ?></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <?php if(Auth::user()): ?>






            <div class="d-flex mt-3 m btns justify-content-center align-items-center r-mb-23 fadeInUp animated" data-animation-in="fadeInUp" data-delay-in="1.2" style="opacity: 1; animation-delay: 1.2s;">

                <a href="javascript:void(0)" onclick="showplayers();"   class="mr-2 btn-movies" id="wishlist_btn" tabindex="0">
                    <i class="fas fa-play" aria-hidden="true"></i>
                    <span>Assitir</span>
                </a>

                <a href=""  class="mr-2 btn-movies btn-reproduzir btn-hover" tabindex="0">
                    <svg width="24px" height="24px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6,4.67012593 L6,19.3298741 C6,19.6888592 6.29101491,19.9798741 6.65,19.9798741 C6.78014165,19.9798741 6.90728686,19.940808 7.01497592,19.8677333 L17.6705631,12.6371563 C18.0224548,12.3983727 18.114147,11.9195356 17.8753633,11.5676439 C17.8206658,11.4870371 17.7511699,11.4175411 17.6705631,11.3628437 L7.01497592,4.13226667 C6.71792446,3.93069604 6.31371138,4.00809854 6.11214075,4.30515 C6.03906603,4.41283906 6,4.53998428 6,4.67012593 Z M5,4.67012593 C5,4.33976636 5.09916761,4.01701312 5.28466497,3.74364859 C5.79634428,2.98959487 6.82242363,2.79311159 7.57647734,3.3047909 L18.2320645,10.5353679 C18.4173555,10.6611011 18.5771059,10.8208515 18.7028391,11.0061425 C19.2517314,11.8150365 19.0409585,12.9157398 18.2320645,13.4646321 L7.57647734,20.6952091 C7.3031128,20.8807065 6.98035956,20.9798741 6.65,20.9798741 C5.73873016,20.9798741 5,20.2411439 5,19.3298741 L5,4.67012593 Z"/>
                      </svg>

                    <span>Ver Trailer</span>
                </a>




                <a href="javascript:void(0)" onclick="AddWishlist('<?php echo e($movie->id); ?>')"  class="mr-2 btn-movies" id="wishlist_btn" tabindex="0">
                    <i class="fas fa-plus" aria-hidden="true"></i>
                    <span>A Minha Lista</span>
                </a>


            </div>

            <div class="button" id="showPlayers" onclick="showplayers();">
                <svg version="1.1" id="play" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="100px" width="100px"
                viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
             <path class="stroke-solid" fill="none" stroke="white"  d="M49.9,2.5C23.6,2.8,2.1,24.4,2.5,50.4C2.9,76.5,24.7,98,50.3,97.5c26.4-0.6,47.4-21.8,47.2-47.7
               C97.3,23.7,75.7,2.3,49.9,2.5"/>
             <path class="stroke-dotted" fill="none" stroke="white"  d="M49.9,2.5C23.6,2.8,2.1,24.4,2.5,50.4C2.9,76.5,24.7,98,50.3,97.5c26.4-0.6,47.4-21.8,47.2-47.7
               C97.3,23.7,75.7,2.3,49.9,2.5"/>
             <path class="icon" fill="white" d="M38,69c-1,0.5-1.8,0-1.8-1.1V32.1c0-1.1,0.8-1.6,1.8-1.1l34,18c1,0.5,1,1.4,0,1.9L38,69z"/>
            </svg>
            </div>
            <?php else: ?>
                <div class="col-12 btn-login">
                    <a href="<?php echo e(route('pageLogin')); ?>" class="btn-get-started btn btn-light btn-large">
                      <i class="fa fa-user-circle" aria-hidden="true"></i>  Iniciar Sessão
                    </a>
                </div>
            <?php endif; ?>
    </section>


    <section class="position-relative p-170">
        <div class="row">
            <div class="col-12">
                <h2 class="mb-5 section-title">Elenco</h2>
                <div class="d-flex list-cast">

                <?php $__currentLoopData = $casts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cast): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <span>
                    <div id="avatar" >
                        <?php if(file_exists('movies/Cast/'.$cast.'.jpg')): ?>
                            <img src="<?php echo e(asset('movies/Cast/'.$cast.'.jpg')); ?>"/>
                            <?php else: ?>
                            <img src="<?php echo e(asset('images/default.png')); ?>"/>
                        <?php endif; ?>

                        <a><?php echo e($cast); ?></a>
                    </div>
                </span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>

            </div>

        </div>
    </section>



<div class="playerarea">
    <div class="optionsButtons">
        <div class="gButton click" onclick="showplayers();">
            Mostrar Players
            </div>
    </div>
    <div id="playerFrame">

    </div>
    <div class="list">
        <div class="title">
            Escolha um player de video
        </div>
        <div class="listing">
            <div onclick="return getplayer('<?php echo e($movie->IMDB); ?>')" class="playerBtn">
                Player 1</div>
        <div class="closePlayerarea" onclick="return closePlayerarea()">
            <i class="fa fa-times-circle" aria-hidden="true"></i>
        </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        function showplayers(){
            $('#playerFrame').removeClass('visible');
            $('.optionsButtons').removeClass('active');
            $('body').addClass('playerarea-active');
        }
        function closePlayerarea(){
            $('body').removeClass('playerarea-active');
        }

    </script>
    <script>
        function getplayer(id){
            $('#playerFrame').addClass('visible');
            $('.optionsButtons').addClass('active');
            var type='filme';
            var season="";
            var episode="";
            warezPlugin(type,id,season,episode);

        }
    </script>
    <script>
         function warezPlugin(type, imdb, season, episode){
                if (type == "filme") { season="";episode="";}else{if (season !== "") { season = "/"+season; }if (episode !== "") { episode = "/"+episode; }}
                var frame = document.getElementById('playerFrame');
                frame.innerHTML += '<iframe src="https://embed.warezcdn.com/'+type+'/'+imdb+season+episode+'" scrolling="no" frameborder="0" allowfullscreen="" webkitallowfullscreen="" mozallowfullscreen=""></iframe>';
            }
    </script>

<script>
    $('.list-cast').slick({
    dots: false,
    infinite: false,
    speed: 300,
    arrows: false,
    variableWidth: true,
    variableHeight: true,
    slidesToShow: 7,
    slidesToScroll: 1,

    responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 6,
        slidesToScroll: 1

      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]

    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.header.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\movies\resources\views/frontend/movie-details.blade.php ENDPATH**/ ?>