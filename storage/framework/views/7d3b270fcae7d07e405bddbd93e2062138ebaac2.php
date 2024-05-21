<?php $__env->startSection('content'); ?>

<!-- main start -->
<div class="container-fluid dental_bg">
    <div class="row justify-content-center align-items-center">
        <div class="col-lg-5 mt-5">
            <form action="<?php echo e(route('register_user')); ?>" method="post">
                <?php if(Session::has('success')): ?>
                <div class="alert alert-success"><?php echo e(Session::get('success')); ?></div>
                <?php endif; ?>
                <?php if(Session::has('fail')): ?>
                <div class="alert alert-danger"><?php echo e(Session::get('fail')); ?></div>
                <?php endif; ?>
                <?php echo csrf_field(); ?>
                <!-- <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
                <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

                <div class="form-floating ">
                    <input type="name" name="fname" class="form-control custom-form-control mb-2" id="floatingInput" placeholder="name@example.com" value="<?php echo e(old('fname')); ?>">
                    <label for="floatingInput">First Name</label>
                </div>
                <span class="text-danger"><?php $__errorArgs = ['fname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                <div class="form-floating ">
                    <input type="name" name="lname" class="form-control custom-form-control mb-2" id="floatingInput" placeholder="name@example.com" value="<?php echo e(old('lname')); ?>">
                    <label for="floatingInput">Last Name</label>
                </div>
                <span class="text-danger"><?php $__errorArgs = ['lname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                <div class="form-floating ">
                    <input type="email" name="email" class="form-control custom-form-control mb-2" id="floatingInput" placeholder="name@example.com" value="<?php echo e(old('email')); ?>">
                    <label for="floatingInput">Email address</label>
                </div>
                <span class="text-danger"><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control custom-form-control mb-2" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <span class="text-danger"><?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                <!-- <div class="form-floating">
            <input type="password" class="form-control custom-form-control mb-2" id="floatingConfirmPassword" placeholder=" Confirm Password">
            <label for="floatingConfirmPassword">Confirm Password</label>
        </div> -->

                <!-- <div class="checkbox mb-3">
        <label>
            <input type="checkbox" value="remember-me"> Remember me
        </label>
        </div> -->

                <button class="w-100 btn btn-lg btn-outline-dark btn-outline-blue-grey mb-2" type="submit">Sign Up</button>

                <div class=" my-3">

                    <a href="<?php echo e(route('login')); ?>"> <span class="text-dark"> Already have an account ?</span> Login</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.doc_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views/doctor/registration.blade.php ENDPATH**/ ?>