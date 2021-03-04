<?php $__env->startSection('migasdepan'); ?>

<nav aria-label="breadcrumb migas">
  <ol class="breadcrumb migas">
    <li class="breadcrumb-item" aria-current="page">Principal</li>
    <?php if(Route::has('login')): ?>
    <?php if(auth()->guard()->check()): ?>
    <li class="breadcrumb-item active">
    <a href="<?php echo e(url('/home')); ?>">Inicio</a></li>
    <?php endif; ?>
    <?php endif; ?>
  </ol>
</nav>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>

<div class="row">
<div class="col">
<div class="card-group">
<div class="row">
  <div class="card col-lg-4 col-xl-4">
    <img class="card-img-top" src="<?php echo e(asset('images/gamificacion.jpg')); ?>" alt="Gamificación">
    <div class="card-body">
    <h5 class="card-title text-primary">Gamificacion</h5>
      <p class="card-text">Aprendemos mientras nos divertimos.</p>
    </div>
  </div>
  <div class="card col-lg-4 col-xl-4">
    <img class="card-img-top" src="<?php echo e(asset('images/pi.jpg')); ?>" alt="Campues y cursos">
    <div class="card-body">
      <h5 class="card-title text-primary">COOPERATING</h5>
      <p class="card-text">Campus y cursos en modalidad presencial y a distancia.</p>
    </div>
  </div>
  <div class="card col-lg-4 col-xl-4">
    <img class="card-img-top" src="<?php echo e(asset('images/conectados.jpg')); ?>" alt="Conectados">
    <div class="card-body">
      <h5 class="card-title text-primary">CONECTADOS</h5>
      <p class="card-text">Siempre en contacto progenitores,educadores y Centro Educativo</p>
    </div>
  </div>
  </div>
</div>
</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/Proyecto_DAW/resources/views/welcome.blade.php ENDPATH**/ ?>