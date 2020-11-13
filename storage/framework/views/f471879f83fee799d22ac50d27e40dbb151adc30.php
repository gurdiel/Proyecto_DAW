

<?php $__env->startSection('contenido'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="flex-center position-ref full-height grupo">
                    <p>Página para agregar usuarios</p>
        

                        <form action="<?php echo e(url('admin/users')); ?>" method="post" class="grupo">
                        <?php echo e(csrf_field()); ?>

                        <div class="row">
                        <div class="col-6">Nombre:</div><div class="col-4"><input type="text" name="nombre" size="20"></div>
                        </div>
                        <div class="row">
                        <div class="col-6">Telefono:</div><div class="col-4"><input type="text" name="telefono" size="20"></div>
                        </div>
                        <div class="row">
                        <div class="col-6">Email:</div> <div class="col-4"><input type="text" name="email" size="20"></div>
                        </div>
                        <div class="row">
                        <div class="col-6">Fam. Autorizado:</div><div class="col-4"><input type="text" name="fam_aut" size="20"></div>
                        </div>
                        <div class="row">
                        <div class="col-6">Escolar id:</div><div class="col-4"><input type="number" name="escolare_id" size="20"></div>
                        </div>
                        <div class="row">
                        <div class="col-6">Clase id:</div><div class="col-4"><input type="number" name="clase_id" size="20"></div>
                        </div>
                        <div class="row">
                        <div class="col-6">Rol id:</div><div class="col-4"><input type="number" name="role_id" size="20"></div>
                        </div>
                        <div class="row">
                        <div class="col-6">Password:</div><div class="col-4"><input type="text" name="password" size="20"></div>
                        </div>
                        
                        <div class="row">
                            <div class="col-6">
                            <input type="submit" value="Enviar">
                            <input type="reset" value="Borrar">
                        </div>
                        </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/Proyecto_DAW/resources/views/admin/users/create.blade.php ENDPATH**/ ?>