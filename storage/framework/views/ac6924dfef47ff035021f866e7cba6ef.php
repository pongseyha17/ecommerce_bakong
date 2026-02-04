

<?php $__env->startSection('content'); ?>
<div class="container">
<h1>Product List</h1>
<div class="row">
<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="col-md-4">
<div class="card mb-3">
<img src="<?php echo e($product->image); ?>" class="card-img-top" alt="<?php echo e($product->name); ?>">
<div class="card-body">
<h5><?php echo e($product->name); ?></h5>
<p><?php echo e($product->description); ?></p>
<p><strong><?php echo e(number_format($product->price, 0)); ?> ៛</strong></p>
<a href="<?php echo e(route('product.show', $product->id)); ?>" class="btn btn-primary">Buy</a>
</div>
</div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Seyha\FILE\Programing\Laravel\ecommerce_bakong\resources\views/products/index.blade.php ENDPATH**/ ?>