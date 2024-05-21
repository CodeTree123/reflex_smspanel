<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="my-3">
        <div class="profile blue-grey-border-thin">
            <h4 class="p-2 mb-3 d-flex justify-content-center bg-blue-grey custom-border-radius"><?php echo e($breadcrumb->name); ?> Lists</h4>
            <div class="d-flex flex-wrap justify-content-center">
                <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <a href="<?php echo e(route('shop_single_product',$product->id)); ?>" class="mb-3 px-2">
                    <div class="card" style="width: 230px;">
                        <img src="<?php echo e(asset('public/assets/img/profile.png')); ?>" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h6 class="card-title"><?php echo e($product->pro_name); ?></h6>
                            <p class="card-text mb-2">Price: <?php echo e($product->pro_price); ?> Taka</p>
                            <p class="card-text mb-2"><?php echo e($product->supplier->fname." ".$product->supplier->lname); ?></p>
                            <?php if($product->pro_stock->status == 1): ?>
                            <p class="card-text text-success">In Stock</p>
                            <?php else: ?>
                            <p class="card-text text-danger">Out Of Stock</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <h4 class="text-center">There are no products available in this category.</h4>
                <?php endif; ?>
            </div>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.shop_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/reflexdn/public_html/resources/views/shop/shop_product.blade.php ENDPATH**/ ?>