<?php $__env->startSection('content'); ?>
<!-- main start -->
<div class="container-fluid dental_bg">
    <div class="row justify-content-center align-items-center" style="height: 80vh;">
        <div class="col-lg-7 ps-5">
            <div>
                <img class="logo" src="<?php echo e(asset ('assets/img/reflex_logo.png')); ?>" alt="Logo" style="width:9rem; height:4.5rem;">
            </div>
            <div>
                <h2>
                    Connecting Communities & <br> Optimizing your clinical workflow
                </h2>
            </div>
        </div>
        <div class="col-lg-5 mt-5 pe-5">
            <form action="<?php echo e(route('login_user')); ?>" method="post">
                
        <?php if(Session::has('message')): ?>
        <div class="alert alert-danger"><?php echo e(Session::get('message')); ?></div>
        <?php endif; ?>
        <?php echo csrf_field(); ?>
        <h1 class="h3 mb-3 fw-normal">Please log in</h1>

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

        <!-- <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
            </div> -->

        <button class="w-100 btn btn-lg btn-outline-dark btn-outline-blue-grey" type="submit">Login</button>
        </form>
        <a href="<?php echo e(route('google.login')); ?>" class="w-100 btn btn-lg btn-outline-dark btn-outline-blue-grey p-1">
            <img src="<?php echo e(asset('assets/img/google.png')); ?>" class="sign-in-with-google img-fluid">
            Sign up With Google
        </a>
        <div class=" ">
            <a href="<?php echo e(route('registration')); ?>"> <span class="text-dark"> Don't have an account ?</span> Register</a>
        </div>
    </div>
</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.doc_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views/login.blade.php ENDPATH**/ ?>