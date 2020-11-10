<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>KIT TOOL CLASS</title>
        <!-- Fonts -->
        <!-- Styles -->
        <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('css/mystyle.css')); ?>" rel="stylesheet">
    </head>


    <body>

    <?php echo $__env->yieldContent('contenido'); ?>


    <footer>
        <p>KTC<br><br><small>by</small> Rafael Gurdiel Sanchez - 2020</p>
    </footer>


    </body>
</html>
<?php /**PATH /home/vagrant/code/Proyecto_DAW/resources/views/layouts/plantilla.blade.php ENDPATH**/ ?>