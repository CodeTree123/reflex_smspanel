<div class="container-fluid">
    <nav aria-label="breadcrumb" style="--bs-breadcrumb-divider: '>';">
        <?php if(Route::current()->getName() == 'shop'): ?>
        <ol class="breadcrumb mb-0 ms-4">
            <li class="breadcrumb-item active" aria-current="page">Home</li>
        </ol>
        <?php endif; ?>

        <?php if(Route::current()->getName() == 'cart_view'): ?>
        <ol class="breadcrumb mb-0 ms-4">
            <li class="breadcrumb-item active" aria-current="page">
                <a href="<?php echo e(route('shop')); ?>">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Cart</li>
        </ol>
        <?php endif; ?>

        <?php if(Route::current()->getName() == 'Order_list'): ?>
        <ol class="breadcrumb mb-0 ms-4">
            <li class="breadcrumb-item active" aria-current="page">
                <a href="<?php echo e(route('shop')); ?>">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">My Orders</li>
        </ol>
        <?php endif; ?>

        <?php if(Route::current()->getName() == 'shop_product'): ?>
        <ol class="breadcrumb mb-0 ms-4">
            <li class="breadcrumb-item active" aria-current="page">
                <a href="<?php echo e(route('shop')); ?>">Home</a>
            </li>
            <?php if($name == "sub_subcat_3"): ?>
            <li class="breadcrumb-item active" aria-current="page">
                <!-- <a href="#"> <?php echo e($breadcrumb->SubsubCat2->SubsubCat1->SubCat->cat->name); ?> </a> -->
                <?php echo e($breadcrumb->SubsubCat2->SubsubCat1->SubCat->cat->name); ?>

            </li>
            <li class="breadcrumb-item active" aria-current="page">
                <a href="<?php echo e(route('shop_product',['subcat',$breadcrumb->SubsubCat2->SubsubCat1->SubCat->id])); ?>">
                    <?php echo e($breadcrumb->SubsubCat2->SubsubCat1->SubCat->name); ?>

                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                <a href="<?php echo e(route('shop_product',['sub_subcat_1',$breadcrumb->SubsubCat2->SubsubCat1->id])); ?>">
                    <?php echo e($breadcrumb->SubsubCat2->SubsubCat1->name); ?>

                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                <a href="<?php echo e(route('shop_product',['sub_subcat_2',$breadcrumb->SubsubCat2->id])); ?>">
                    <?php echo e($breadcrumb->SubsubCat2->name); ?>

                </a>
            </li>
            <?php endif; ?>

            <?php if($name == "sub_subcat_2"): ?>
            <li class="breadcrumb-item active" aria-current="page">
                <!-- <a href="#"> <?php echo e($breadcrumb->SubsubCat1->SubCat->cat->name); ?> </a> -->
                <?php echo e($breadcrumb->SubsubCat1->SubCat->cat->name); ?>

            </li>
            <li class="breadcrumb-item active" aria-current="page">
                <a href="<?php echo e(route('shop_product',['subcat',$breadcrumb->SubsubCat1->SubCat->id])); ?>">
                    <?php echo e($breadcrumb->SubsubCat1->SubCat->name); ?>

                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                <a href="<?php echo e(route('shop_product',['sub_subcat_1',$breadcrumb->SubsubCat1->id])); ?>">
                    <?php echo e($breadcrumb->SubsubCat1->name); ?>

                </a>
            </li>
            <?php endif; ?>

            <?php if($name == "sub_subcat_1"): ?>
            <li class="breadcrumb-item active" aria-current="page">
                <!-- <a href="#"> <?php echo e($breadcrumb->SubCat->cat->name); ?> </a> -->
                <?php echo e($breadcrumb->SubCat->cat->name); ?>

            </li>
            <li class="breadcrumb-item active" aria-current="page">
                <a href="<?php echo e(route('shop_product',['subcat',$breadcrumb->SubCat->id])); ?>">
                    <?php echo e($breadcrumb->SubCat->name); ?>

                </a>
            </li>
            <?php endif; ?>

            <?php if($name == "subcat"): ?>
            <li class="breadcrumb-item active" aria-current="page">
                <!-- <a href="#"> <?php echo e($breadcrumb->cat->name); ?> </a> -->
                <?php echo e($breadcrumb->cat->name); ?>

            </li>
            <?php endif; ?>

            <li class="breadcrumb-item active" aria-current="page">
                <a href="<?php echo e(route('shop_product',[$name,$breadcrumb->id])); ?>"> <?php echo e($breadcrumb->name); ?> </a>
            </li>

        </ol>
        <?php endif; ?>

        <?php if(Route::current()->getName() == 'shop_single_product'): ?>
            <ol class="breadcrumb mb-0 ms-4">
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="<?php echo e(route('shop')); ?>">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo e($cat->name); ?></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="<?php echo e(route('shop_product',['subcat',$subcat->id])); ?>"><?php echo e($subcat->name); ?></a>
                </li>
                <?php if($subcat1 != null): ?>
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="<?php echo e(route('shop_product',['sub_subcat_1',$subcat1->id])); ?>"><?php echo e($subcat1->name); ?></a>
                </li>
                <?php endif; ?>
                <?php if($subcat2 != null): ?>
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="<?php echo e(route('shop_product',['sub_subcat_2',$subcat2->id])); ?>"><?php echo e($subcat2->name); ?></a>
                </li>
                <?php endif; ?>
                <?php if($subcat3 != null): ?>
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="<?php echo e(route('shop_product',['sub_subcat_3',$subcat3->id])); ?>"><?php echo e($subcat3->name); ?></a>
                </li>
                <?php endif; ?>
                <li class="breadcrumb-item active" aria-current="page"><?php echo e($product->pro_name); ?></li>
            </ol>
        <?php endif; ?>

    </nav>
</div>
<?php /**PATH /home/reflexdn/public_html/resources/views/shop/include/breadcrumb.blade.php ENDPATH**/ ?>