

<?php $__env->startSection('content'); ?>
<div class="container">
<h1><?php echo e($product->name); ?></h1>
<img src="<?php echo e($product->image); ?>" width="200">
<p><?php echo e($product->description); ?></p>
<p><strong><?php echo e(number_format($product->price, 0)); ?> ៛</strong></p>

<form action="<?php echo e(route('checkout', $product->id)); ?>" method="POST">
<?php echo csrf_field(); ?>
<button class="btn btn-success">Generate KHQR to Pay</button>
 
</form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Seyha\FILE\Programing\Laravel\ecommerce_bakong\resources\views/products/show.blade.php ENDPATH**/ ?>