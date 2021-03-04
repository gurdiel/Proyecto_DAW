
<?php $__env->startSection('migasdepan'); ?>

<nav aria-label="breadcrumb migas">
  <ol class="breadcrumb migas">
    
    <li class="breadcrumb-item active"><a href="<?php echo e(url('/home')); ?>">Inicio</a></li>
    <li class="breadcrumb-item" aria-current="page">Menu</li>
  </ol>
</nav>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>
<div class="container grupo">
  <div class="row justify-content-center">
    <div class="col-8">
        <div class="list-group">
        <div class="panel-title" style="font-size:xx-large;">Elige un rol:</div>
      
            <a href="<?php echo e(url('register/docente/')); ?>" class="list-group-item list-group-item-action card text-info text-center text-center">Docente</a>
            <a href="<?php echo e(url('register/progenitor/')); ?>" class="list-group-item list-group-item-action card text-info text-center">Progenitor</a>
            <a href="<?php echo e(url('register/escolar/')); ?>" class="list-group-item list-group-item-action card text-info text-center">Escolar</a>
        </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/Proyecto_DAW/resources/views/auth/register.blade.php ENDPATH**/ ?>