

<?php $__env->startSection('contenido'); ?>

        <div class="card-body">
            <p>EN construcción</p>
        

        <table width="700" border="1">

        <tr>
            <th scope="col">ID</th>
            <th scope="col">Tipo</th>
            <th scope="col">Nombre</th>
            <th scope="col">Email</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Número de USUARIO</th>
        </tr>
        <?php if($usuarios): ?>
            <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <tr>
            <td><?php echo e($user->id); ?></td>
            <td><?php echo e($user->role->nombre); ?></td>
            <td><?php echo e($user->name); ?></td>
            <td><?php echo e($user->email); ?></td>
            <?php if($user->role_id == '2'): ?>
            <td><?php echo e($user->docente->telefono); ?></td>
            <?php elseif($user->role_id == '1'): ?>
            <td><?php echo e($user->role_id); ?></td>
            <?php endif; ?>

            <td><?php echo e($user->id); ?></td>
        </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        </table>
        </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/Proyecto_DAW/resources/views/admin/users/index.blade.php ENDPATH**/ ?>