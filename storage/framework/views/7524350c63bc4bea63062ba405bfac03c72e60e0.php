

<?php $__env->startSection('contenido'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Panel de control de <?php echo e(Auth::user()->role->nombre); ?></div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                    Bienvenido, <?php echo e(Auth::user()->name); ?> que deseas hacer?
                    <?php if(Auth::user()->role_id == 1): ?>
                    
                   
                    <div class="list-group grupo">
                        <a href="<?php echo e(url('/admin/users/')); ?>" class="list-group-item list-group-item-action active">Listar usuarios</a>
                        <a href="<?php echo e(url('admin/users/create')); ?>" class="list-group-item list-group-item-action active">Crear usuario</a>
                        <a href="#" class="list-group-item list-group-item-action active">Modificar usuario</a>
                        <a href="#" class="list-group-item list-group-item-actiona active">Eliminar usuario</a>
                        <a href="#" class="list-group-item list-group-item-action disabled" tabindex="-1" aria-disabled="true">Nueva funcionalidad</a>
                    </div>
                    
                    <?php elseif(Auth::user()->role_id == 2): ?>

                        <div class="container grupo">
                            <div class="row">
                                <div class="card-body col-8">
                                    Esto es lo que sale en el else.                    
                                </div>
                                <div class="col-4">
                                    MEtemos los  niños aqui por ejemplo
                                </div>
                            </div>
                        </div>
                        <?php if($clases): ?>
                                <?php $__currentLoopData = $clases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="container grupo">
                            <div class="row">
                            
                                <div class="col-2">
                                    <?php echo e($clase->nombre); ?>

                                </div>
                                <div class="div col-6">
                                    <?php echo e($clase->horarios); ?>

                                </div>
                                
                            </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                            <?php elseif(Auth::user()->role_id == 3): ?>

                            <div class="container grupo">
                                <div class="row">
                                    <div class="card-body">
                                        Esto es lo que sale cuando eres PROGENITOR.                    
                                    </div>
                                </div>
                                <?php if($hijos): ?>
                                <?php $__currentLoopData = $hijos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hijo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="container grupo">
                                        <div class="row">
                            
                                            <div class="col-2">
                                                <?php echo e($hijo->clase->nombre); ?>

                                            </div>
                                            <div class="div col-6">
                                            <?php echo e($hijo->clase->anuncios); ?>

                                            </div>                              
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <p>Tu hijo va a la clase: <?php echo e($hijo->clase->nombre); ?></p>

                                                <p>Estos son los anuncios:  <?php echo e($hijo->clase->anuncios); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>

                            

                            <?php elseif(Auth::user()->role_id == 4): ?>

                        <div class="container grupo">
                            <div class="row">
                                <div class="card-body">
                                    Esto es lo que sale cuando eres alumno.                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <?php echo e(Auth::user()->escolare->clase->anuncios); ?>

                                    <p>Tienes algún item: <?php echo e(Auth::user()->escolare->items); ?></p>
                                    <p>Tienes : <?php echo e(Auth::user()->escolare->puntos); ?> puntos</p>
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