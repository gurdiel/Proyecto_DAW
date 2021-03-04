<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>KIT TOOL CLASS</title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
    <script src="<?php echo e(asset('js/pie.js')); ?>"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/mystyle.css')); ?>" rel="stylesheet">

    <link rel="shortcut icon" href="/images/lo.png" />

    
</head>
<body>
<A name="arriba"></A>
    <div class="container">
        <div class="container padtop">
        <nav class="navbar navbar-expand-md shadow-sm padtop">
                <a class="navbar-brand text-info" href="<?php echo e(url('/')); ?>">
                <img src="/images/lo.png" width="50" height="50" alt="logo">
                KTC
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon">Menu</span>
                </button>
                

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                       
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <?php echo $__env->yieldContent('migasdepan'); ?>
                        <?php if(auth()->guard()->guest()): ?>
                        <li class="nav-item">
                                <a class="nav-link text-info" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-info" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-info" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Hola,<?php echo e(Auth::user()->nombre); ?> <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right text-info" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <?php echo e(__('Logout')); ?>

                                </a>

                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                        <?php echo csrf_field(); ?>
                                </form>
                                </div>
                            </li>
                        <?php endif; ?>
                        
                    </ul>
                </div>
            
        </nav>
        </div>
        <div class="row">
            <div class="container pad">
             <?php echo $__env->yieldContent('contenido'); ?>
            </div>
        </div>
    
    </div>
    <div id="footer">
        <p>KTC<br><br><small>by</small> Rafael Gurdiel Sanchez - 2020</p>
    </div>
</body>
</html>
<?php /**PATH /home/vagrant/code/Proyecto_DAW/resources/views/layouts/app.blade.php ENDPATH**/ ?>