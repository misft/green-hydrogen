<?php $__env->startSection('title', 'Premium Admin Template'); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(route('/')); ?>/assets/css/prism.css">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(route('/')); ?>/assets/css/chartist.css">
    <link rel="stylesheet" type="text/css" href="<?php echo e(route('/')); ?>/assets/css/date-picker.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
    <h2>Menu<span> Management</span></h2>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item active">Default</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <!-- Individual column searching (text inputs) Starts-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Individual column searching (text inputs) </h5>
                        <span>The searching functionality provided by DataTables is useful for quickly search through the
                            information in the table - however the search is global, and you may wish to present controls
                            that search on specific columns.</span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive product-table">
                            <table class="display" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>Menu</th>
                                        <th>Slot</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <?php if (isset($component)) { $__componentOriginal18918a514acb71fa23a4b7e334b60b71eeb156b3 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Table\Cell\Language::class, ['items' => $item->menu,'key' => 'name']); ?>
<?php $component->withName('table.cell.language'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal18918a514acb71fa23a4b7e334b60b71eeb156b3)): ?>
<?php $component = $__componentOriginal18918a514acb71fa23a4b7e334b60b71eeb156b3; ?>
<?php unset($__componentOriginal18918a514acb71fa23a4b7e334b60b71eeb156b3); ?>
<?php endif; ?>
                                            </td>
                                            <td>
                                                <h6><?php echo e($item->slot->name); ?></h6>
                                            </td>
                                            <td>
                                                <button class="btn btn-danger btn-xs" type="button"
                                                    data-original-title="btn btn-danger btn-xs" title="">Delete</button>
                                                <button class="btn btn-success btn-xs" type="button"
                                                    data-original-title="btn btn-danger btn-xs" title="">Edit</button>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Individual column searching (text inputs) Ends-->
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(route('/')); ?>/assets/js/owlcarousel/owl.carousel.js"></script>
    <script src="<?php echo e(route('/')); ?>/assets/js/datatable/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo e(route('/')); ?>/assets/js/rating/jquery.barrating.js"></script>
    <script src="<?php echo e(route('/')); ?>/assets/js/rating/rating-script.js"></script>
    <script src="<?php echo e(route('/')); ?>/assets/js/ecommerce.js"></script>
    <script src="<?php echo e(route('/')); ?>/assets/js/product-list-custom.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\new-green-hydrogen\resources\views/admin/menu/menu_has_slot/index.blade.php ENDPATH**/ ?>