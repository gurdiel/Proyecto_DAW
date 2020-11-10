

<?php $__env->startSection('contenido'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Panel de control de <?php echo e(Auth::user()->role->nombre); ?></div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <?php if(Auth::user()->role_id == 1): ?>
                    Bienvenido, <?php echo e(Auth::user()->name); ?> eres <?php echo e(Auth::user()->role->nombre); ?> que deseas hacer?
                    <div>
                    <div class="list-group grupo">
                        <a href="<?php echo e(url('/admin/users/')); ?>" class="list-group-item list-group-item-action active">Listar usuarios</a>
                        <a href="#" class="list-group-item list-group-item-action active">Crear usuario</a>
                        <a href="#" class="list-group-item list-group-item-action active">Modificar usuario</a>
                        <a href="#" class="list-group-item list-group-item-actiona active">Eliminar usuario</a>
                        <a href="#" class="list-group-item list-group-item-action disabled" tabindex="-1" aria-disabled="true">Nueva funcionalidad</a>
                    </div>
                    </div>
                    <?php elseif(Auth::user()->role_id == 2): ?>
                        <div class="card-body">
                        <p>Esto es lo que sale en el else.</p>
                    
                        </div>
                    <?php endif; ?>
                </div>
                
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/Proyecto_DAW/resources/views/home.blade.php ENDPATH**/ ?>