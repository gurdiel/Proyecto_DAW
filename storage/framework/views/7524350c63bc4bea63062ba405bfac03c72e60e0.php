

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
                        <a href="#" class="list-group-item list-group-item-action active">Crear usuario</a>
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
                        <div class="container grupo">
                        <?php if($clases): ?>
                                <?php $__currentLoopData = $clases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="row">
                            
                                <div class="col-2">
                                    <?php echo e($clase->nombre); ?>

                                </div>
                                <div class="div col-6">
                                    <?php echo e($clase->horarios); ?>

                                </div>
                                
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
                
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/Proyecto_DAW/resources/views/home.blade.php ENDPATH**/ ?>