<?php echo $__env->make('meta::manager', [
    'title'         => 'Filmes - '.config('app.name').' - Veja Séries de Televisão e Filmes Online',
    'description'   => 'Lista de Filmes',
    'image'         => 'Url to the image',
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('links'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/listseries.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('css/homepage.css')); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
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

                            <input type="hidden" value="<?php echo e(old('year')); ?>" name="year">
                            <input type="hidden" value="<?php echo e(old('category')); ?>" name="category">
                            <input type="hidden" value="<?php echo e(old('order')); ?>" name="order">

                        <div class="searchItem col-6 col-xl-3 mb-3"data-search="year">
                            <div class="itemTitle">
                                <?php echo e(old('year')? :'Ano'); ?>

                            </div>
                            <div class="list p-rl">
                                <span class="row-line selected">Todos</span>
                                <?php $__currentLoopData = $years; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span class="row-line" data-value="<?php echo e($year); ?>"><?php echo e($year); ?></span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>

                        <div class="searchItem col-6 col-xl-3 mb-3"data-search="category">
                            <div class="itemTitle">
                                <?php echo e(old('category')?: 'Categoria'); ?>

                            </div>
                            <div class="list p-rl">
                                <span class="row-line selected">Todos</span>
                                <?php $__currentLoopData = $categs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categ => $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="row-line" data-value="<?php echo e($categ); ?>"><?php echo e($key); ?></div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>

                        <div class="searchItem col-6 col-xl-3 mb-3"data-search="order">
                            <div class="itemTitle">
                                Ordenar
                            </div>
                            <div class="list p-rl">
                                <span class="row-line selected">Todos</span>
                                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order => $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="row-line" data-value="<?php echo e($order); ?>"><?php echo e($key); ?></div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>

                        <div class="searchItem col-6 col-xl-3 mb-3" id="resetButton"data-search="order">
                            <button class="btn btn-dark" type="button" id="reset">Limpar</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-12 mt-4">
                <div class="table-list">
                    <?php if($movies->count() > 0): ?>
                    <div class="row w-100">
                        <?php $__currentLoopData = $movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-4 col-md-3 col-xl-2 col-sm-4">
                                <div class="movieCard card-movie h-300 marginRight zoomCardHover ">
                                    <figure class="placeHolderRatio2X3">
                                        <div class="content">
                                            <img src="<?php echo e($movie->image); ?>" width="100%"/>
                                        </div>
                                    </figure>
                                    <div class="cardPopupWrap ">
                                        <h3 class="title">
                                            <span>
                                                <?php echo e($movie->name); ?>

                                            </span>
                                        </h3>
                                        <div class="details">
                                            <span><?php echo e($movie->votes); ?></span>
                                            <span><?php echo e($movie->time); ?></span>
                                            <span><?php echo e($movie->categs); ?></span>
                                        </div>
                                        <div class="buttonplay">
                                            <a href="/movie/<?php echo e($movie->IMDB); ?>/assistir-<?php echo e(trim($movie->name)); ?>" tabindex="0">
                                                <div class="noSelect btnIcon playBtnIcon">
                                                    <div class="btntext">
                                                         Watch
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <div class="col-12 d-flex justify-content-center">
                            <?php echo $movies->appends([

                                'year' => old('year'),
                                'search'=>old('search'),
                                'category'=> old('category'),
                                'order'=>old('order')

                                ])->links(); ?>

                        </div>
                    </div>

                    <?php else: ?>
                        <h3>NENHUM FILME ENCONTRADO, TENTA OUTRO FILTRO</h3>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('js/filters.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.header.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\movies\resources\views/frontend/list-all-movies.blade.php ENDPATH**/ ?>