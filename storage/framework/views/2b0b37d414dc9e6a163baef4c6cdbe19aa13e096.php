<form action="<?php echo e($action); ?>" method="post">
    <?php echo csrf_field(); ?>
    <?php echo method_field('delete'); ?>
    <button class="btn btn-danger btn-xs" type="button" data-original-title="btn btn-danger btn-xs"
        type="submit">Delete</button>
</form>
<?php /**PATH D:\Projects\new-green-hydrogen\resources\views/components/action/delete-row.blade.php ENDPATH**/ ?>