
<?php $__env->startSection('migasdepan'); ?>

<nav aria-label="breadcrumb migas">
  <ol class="breadcrumb migas">
    <li class="breadcrumb-item" aria-current="page">Inicio</li>
  </ol>
</nav>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-info">Panel de control del <?php echo e(Auth::user()->role->nombre); ?></div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                    
                    <?php if(Auth::user()->role_id == 1): ?>
                    <spam class="text-success">Bienvenido, <?php echo e(Auth::user()->nombre); ?> que deseas hacer?</spam>
                   
                    <div class="list-group grupo">
                        <a href="<?php echo e(url('/admin/users/')); ?>" class="list-group-item list-group-item-action text-info card text-center">Listar usuarios</a>
                        <a href="<?php echo e(url('admin/users/create')); ?>" class="list-group-item list-group-item-action text-info card text-center">Crear usuario</a>
                        <a href="<?php echo e(url('admin/users/vista')); ?>" class="list-group-item list-group-item-action text-info card text-center">Modificar/Eliminar usuario</a>
                    </div>
                    
                    <?php elseif(Auth::user()->role_id == 2): ?>
                    <div class="container grupo pad">
                            <div class="row pad">

                                <div class="col-2 text-info">
                                    Nombre
                                </div>
                                <div class="col-4 text-info">
                                    Horarios
                                </div>
                                <div class="col-6 text-info">
                                    Opciones:
                                </div>
                            
                            </div>
                        <?php if($clases): ?>
                                <?php $__currentLoopData = $clases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                            <div class="row pad">
                            
                                <div class="col-2">
                                    <?php echo e($clase->nombre); ?>

                                </div>
                                <div class="div col-4 peq1">
                                    <?php echo e($clase->horarios); ?>

                                </div>
                                <div class="col-3">
                                <a href="<?php echo e(route('escolares.show', $clase->id)); ?>" class="list-group-item list-group-item-action list-group-item-danger peq">Ver Alumnos</a>
                                </div>
                                <div class="col-3">
                                <a href="<?php echo e(route('mensajes.show', $clase->id)); ?>" class="list-group-item list-group-item-action list-group-item-warning peq">Mensajes</a>
                                </div>
                                
                            </div>
                           
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                            </div>
                            <?php elseif(Auth::user()->role_id == 3): ?>
                            <spam class="text-success">Bienvenido, <?php echo e(Auth::user()->nombre); ?> que deseas hacer?</spam>
                            <div class="container grupo">
                                <div class="row">
                                    <div class="card-body">

                                    </div>
                                </div>
                                <?php if($hijos): ?>
                                <?php $__currentLoopData = $hijos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hijo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="container grupo">
                                    <p class="text-info">Tu hijo <?php echo e($hijo->nombre); ?> va a la clase: <?php echo e($hijo->clase->nombre); ?></p>
                                        <div class="row">
                                                <div class="col-3">
                                                    <a href="<?php echo e(route('mensajes.show', $hijo->clase->id)); ?>" class="list-group-item list-group-item-action list-group-item-info peq">Ver Mensajes</a>
                                                </div>
                                                <div class="col-3">
                                                    <a href="<?php echo e(route('users.show', $hijo->id)); ?>" class="list-group-item list-group-item-action list-group-item-warning peq">Ver Logros</a>
                                                </div>
                                            
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>

                            

                            <?php elseif(Auth::user()->role_id == 4): ?>
                            <spam class="text-success">Bienvenido <?php echo e(Auth::user()->nombre); ?>! , aquí puedes ver tus logros.</spam>
                        <div class="container grupo">
                            <div class="row">
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <?php echo e(Auth::user()->escolare->clase->anuncios); ?>


                                    <div class="container">
                                    <div class="row justify-content-center">
                                    
                                        <div class="col-md-10 pad">
                                        
                                        <table class="table table-hover">

                                                        <tr>
                                                            <th class="tdth1" scope="col">ID Clase</th>
                                                            <th class="tdth2" scope="col">Nombre</th>
                                                            <th class="tdth1" scope="col">Pts.</th>
                                                            <th class="tdth2" scope="col">Items</th>
                                                            <th class="tdth1" scope="col">User</th>
                                                        </tr>
                                                        <tbody>
                                                                    <tr>
                                                                        <td class="tdth1"><?php echo e($escolar->id); ?></td>
                                                                        <td class="tdth2"><?php echo e($escolar->nombre); ?></td>
                                                                        <td class="tdth1"><?php echo e($escolar->puntos); ?></td>
                                                                        <td class="tdth2">
                                                                        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php if($item->escolare_id == $escolar->id): ?>
                                                                            <img src="/images/<?php echo e($item->fotoitem->ruta_foto); ?>" width="50%"/>
                                                                        <?php endif; ?>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        </td>
                                                                        <td class="tdth1"><?php echo e($escolar->user_id); ?></td>
                                                                        
                                                                    </tr>
                                                                    
                                                        </tbody>
                                        </table>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    <?php endif; ?>
                </div>
                
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/Proyecto_DAW/resources/views/home.blade.php ENDPATH**/ ?>