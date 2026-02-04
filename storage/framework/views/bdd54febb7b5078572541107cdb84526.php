

<?php $__env->startSection('content'); ?>
<div class="container text-center">
<h1>Scan KHQR to Pay</h1>
<p><strong><?php echo e($product->name); ?></strong> — <?php echo e(number_format($product->price,
2)); ?> $</p>

<?php if($qr): ?>
<?php echo QrCode::size(300)->generate($qr); ?>

<p class="mt-3">MD5: <?php echo e($md5); ?></p>
<p class="text-muted">Scan this QR code using Bakong App to make a payment.</p>
<?php else: ?>
<p class="alert alert-danger">⚠ Failed to generate KHQR.</p>
<?php endif; ?>


<div class="mt-4">
<h3 id="countdown" class="text-danger fw-bold">120</h3>
<p class="text-muted">This page will expire in <span
id="seconds">120</span> seconds.</p>
</div>

<a href="<?php echo e(route('home')); ?>" class="btn btn-secondary mt-4">Back to Shop</a>
</div>


<script>
let timeLeft = 120; // seconds
const countdownElement = document.getElementById('countdown');
const secondsText = document.getElementById('seconds');

const timer = setInterval(() => {
timeLeft--;  countdownElement.textContent = timeLeft; secondsText.textContent = timeLeft;
if (timeLeft > 0) {
fetch("<?php echo e(route('verify.transaction')); ?>", {
method: "POST",
 
headers: {
"Content-Type": "application/json", "X-CSRF-TOKEN": "<?php echo e(csrf_token()); ?>"
},
body: JSON.stringify({
md5: "<?php echo e($md5); ?>"
})
})
.then(response => response.json())
.then(data => {
console.log(data);
if (data.responseCode === 0) { clearInterval(timer); alert("Transaction successful!");
window.location.href = "<?php echo e(route('home')); ?>";
} else if (data.failed) {
alert("Transaction failed. Please try again.");
}
})
.catch(error => console.error('Error:', error));
}
if (timeLeft <= 0) {
clearInterval(timer);
window.location.href = "<?php echo e(route('home')); ?>";
}
}, 1000);
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Seyha\FILE\Programing\Laravel\ecommerce_bakong\resources\views/products/checkout.blade.php ENDPATH**/ ?>