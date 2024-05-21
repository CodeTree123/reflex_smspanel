<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($pageTitle); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row justify-content-around">
            <div class="col-md-6">
                <div class="card mt-3">
                    <div class="card-header bg-primary">
                        <h3>SMS Content</h3>
                    </div>
                    <div class="card-body">
                    
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Registration Content</th>
                                    <th scope="col">Appointment Content</th>
                                    <th scope="col">Billing Content</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $customSms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customSms): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th scope="row"><?php echo e($customSms->id); ?></th>
                                    <td><?php echo e($customSms->registration_sms); ?></td>
                                    <td><?php echo e($customSms->appointment_sms); ?></td>
                                    <td><?php echo e($customSms->billing_sms); ?></td>
                                    <td><a href="<?php echo e(url('sms/content/edit')); ?>/<?php echo e($customSms->id); ?>" class="btn btn-primary">Edit</a></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html><?php /**PATH C:\xampp\htdocs\reflex\resources\views/sms/content.blade.php ENDPATH**/ ?>