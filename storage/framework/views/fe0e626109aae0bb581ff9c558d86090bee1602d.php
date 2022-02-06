<?php $__currentLoopData = $items->translation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <h6>
        <span class="text-info">[<?php echo e($item->translation->code); ?>]</span>
        <?php echo e($encode ? json_encode($item->{$key}) : $item->{$key}); ?>

    </h6>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH D:\Projects\new-green-hydrogen\resources\views/components/table/cell/language.blade.php ENDPATH**/ ?>