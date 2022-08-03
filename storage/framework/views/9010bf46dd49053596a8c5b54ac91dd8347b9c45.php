<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/login-page.css')); ?>">
    <?php echo $__env->make('meta::manager', [
    'title'         => 'Inciar Sessão - '.config('app.name').' - Veja Séries de Televisão e Filmes Online',
    'image'         => 'Url to the image'
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</head>
<body>
    <a href="<?php echo e(URL::previous()); ?>"><span class="close-icon"><i class="fa fa-times-circle" aria-hidden="true"></i></span></a>
    <div class="content">
        <div class="logo">
            <img src="https://templates.iqonic.design/streamit/frontend/html/images/logo.png" alt="">
        </div>
        <div class="header mb-5">
            Log in!
        </div>
        <div class="row" id="loginform">
            <div class="col-12">
                <?php if(\Session::get('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo e(\Session::get('error')); ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
                <?php endif; ?>
                <?php if(\Session::get('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo e(\Session::get('success')); ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
                <?php endif; ?>
                <form role="form" method="POST" action="<?php echo e(route('verify-Login')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="form-group float-label-control">
                        <label for="">Endereço de E-mail</label>
                        <input type="email" name="email" value="<?php echo e(old('email')); ?>" class="form-control <?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" placeholder="Endereço de E-mail">
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="form-group float-label-control">
                        <label for="">Palavra-Passe</label>
                        <input type="password" name="password"  class="form-control <?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" placeholder="Palavra-Passe">
                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                         <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
                <p><a href="<?php echo e(route('forget.password.get')); ?>">Recuperar Palavra-Passe<a></p>
            <p class="mt-1">Ainda não tens conta?<a href="<?php echo e(route('pageRegister')); ?>"> Regista-te já</a></p>
            </div>
        </div>

    </div>


    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
     <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
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
<?php /**PATH C:\xampp\htdocs\movies\resources\views/frontend/access-app/login.blade.php ENDPATH**/ ?>