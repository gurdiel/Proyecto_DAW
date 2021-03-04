
<?php $__env->startSection('migasdepan'); ?>

<nav aria-label="breadcrumb migas">
  <ol class="breadcrumb migas">
    
    <li class="breadcrumb-item active"><a href="<?php echo e(url('/home')); ?>">Inicio</a></li>
    <li class="breadcrumb-item" aria-current="page">Usuarios</li>
  </ol>
</nav>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>

        <div class="container-fluid pad peq2">        
        <div class="title-card text-success grande">Lista completa de usuarios registrados.</div>
                        <table class="table table-hover pad">

                        <tr class="text-info">
                            <th class="tdth1" scope="col">ID</th>
                            <th class="tdth1" scope="col">Foto</th>
                            <th class="tdth2" scope="col">Tipo</th>
                            <th class="tdth2" scope="col">Nombre</th>
                            <th scope="col">Email</th>
                            <th class="tdth2" scope="col">Teléfono</th>
                            <th class="tdth2" scope="col">Teléfono</th>
                        </tr>
                        <tbody>
                        <?php if($usuarios): ?>
                            <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <tr>
                            <td class="tdth1" style="vertical-align:middle;"><?php echo e($user->id); ?></td>
                            <?php if($user->foto): ?>
                            <td class="tdth1 img-responsive"><img src="/images/<?php echo e($user->foto->ruta_foto); ?>" width="100%"/></td>
                            <?php else: ?>
                            <td class="tdth1 img-responsive"><img src="/images/nofoto.jpg" width="100%"/></td>

                            <?php endif; ?>
                            <td class="tdth2" style="vertical-align:middle;"><?php echo e($user->role->nombre); ?></td>
                            <td class="tdth2" style="vertical-align:middle;"><?php echo e($user->nombre); ?></td>
                            <td style="vertical-align:middle;"><?php echo e($user->email); ?></td>

                            <?php if($user->role_id == '2'): ?>
                            <td class="tdth2" style="vertical-align:middle;"><?php echo e($user->docente->telefono); ?></td>
                            <?php elseif($user->role_id == '1'): ?>
                            <td class="tdth2" style="vertical-align:middle;"><?php echo e('No tiene'); ?></td>
                            <?php elseif($user->role_id == '3'): ?>
                            <td class="tdth2" style="vertical-align:middle;"><?php echo e($user->progenitore->telefono); ?></td>
                            <?php elseif($user->role_id == '4'): ?>
                            <td class="tdth2" style="vertical-align:middle;"><?php echo e('No tiene'); ?></td>
                            <?php endif; ?>

                            <td class="tdth2" style="vertical-align:middle;">
                            <a href="<?php echo e(route('users.edit',$user->id)); ?>" class="btn btn-warning">Editar</a>
                            <form method="POST" action="<?php echo e(url('/admin/users/'.$user->id)); ?>">
                                    <?php echo e(csrf_field()); ?>

                                    <?php echo e(method_field('DELETE')); ?>

                                    <button type="submit" onclick="return confirm('BORRAR?');" class="btn btn-danger">
                                    <?php echo e(__('Eliminar')); ?>

                                    </button>
                            </form>
                            </td>
                        </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        </tbody>
                        </table>
        </div>
        <div class="div" style="text-align:center;">
        <button type="button" class="btn btn-info" onclick="location.href='#arriba';">Ir arriba</button>
        </div>
        
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/Proyecto_DAW/resources/views/admin/users/index.blade.php ENDPATH**/ ?>