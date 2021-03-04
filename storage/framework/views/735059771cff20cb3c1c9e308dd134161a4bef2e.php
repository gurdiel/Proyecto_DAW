

<?php $__env->startSection('migasdepan'); ?>

<nav aria-label="breadcrumb migas">
  <ol class="breadcrumb migas">
    
    <li class="breadcrumb-item active"><a href="<?php echo e(url('/home')); ?>">Inicio</a></li>
    <li class="breadcrumb-item" aria-current="page">Edición</li>
  </ol>
</nav>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>

        <div class="container-fluid pad">        
        
                        <table class="table table-hover">

                        <tr>
                            <th class="tdth1" scope="col">ID</th>
                            <th class="tdth1" scope="col">Foto</th>
                            <th class="tdth2" scope="col">Tipo</th>
                            <th class="tdth2" scope="col">Nombre</th>
                            <th scope="col">Email</th>
                            <th class="tdth2" scope="col">Teléfono</th>
                        </tr>
                        <tbody>
                        <?php if($usuarios): ?>
                            <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <tr>
                            <td class="tdth1"><?php echo e($user->id); ?></td>
                            <?php if($user->foto): ?>
                            <td class="tdth1 img-responsive"><img src="/images/<?php echo e($user->foto->ruta_foto); ?>" width="100%"/></td>
                            <?php else: ?>
                            <td class="tdth1 img-responsive"><img src="/images/nofoto.jpg" width="100%"/></td>

                            <?php endif; ?>
                            
                            <td class="tdth2"><?php echo e($user->role->nombre); ?></td>
                            <td class="tdth2"><a href="<?php echo e(route('users.edit',$user->id)); ?>" class="text-success"><?php echo e($user->nombre); ?></a></td>
                            <td><?php echo e($user->email); ?></td>

                            <?php if($user->role_id == '2'): ?>
                            <td class="tdth2"><?php echo e($user->docente->telefono); ?></td>
                            <?php elseif($user->role_id == '1'): ?>
                            <td class="tdth2"><?php echo e('No tiene'); ?></td>
                            <?php elseif($user->role_id == '3'): ?>
                            <td class="tdth2"><?php echo e($user->progenitore->telefono); ?></td>
                            <?php elseif($user->role_id == '4'): ?>
                            <td class="tdth2"><?php echo e('No tiene'); ?></td>
                            <?php endif; ?>
                        </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        </tbody>
                        </table>
        </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/Proyecto_DAW/resources/views/admin/users/vista.blade.php ENDPATH**/ ?>