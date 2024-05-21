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
                <?php if(session('success')): ?>
                <div id="successAlert" class="alert alert-success">
                    <?php echo e(session('success')); ?>

                </div>
                <script>
                    setTimeout(function() {
                        document.getElementById('successAlert').style.display = 'none';
                    }, 3000); // 10 seconds
                </script>
                <?php endif; ?>

                <div class="card mt-3">
                    <div class="card-header bg-primary">
                        <h3>SMS Content Edit</h3>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo e(route('sms.content.update')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <input type="text" class="d-none" name="id" value="<?php echo e($editSms->id); ?>">
                            <div class="form-group">
                                <div class="form-label">New Patient Registration Content</div>
                                <textarea class="form-control" name="registration_sms" id=""><?php echo e($editSms->registration_sms); ?></textarea>
                            </div>
                            <div class="form-group">
                                <div class="form-label">New Appointment Content</div>
                                <textarea class="form-control" name="appointment_sms" id=""><?php echo e($editSms->appointment_sms); ?></textarea>
                            </div>
                            <div class="form-group">
                                <div class="form-label">Billing Content</div>
                                <textarea class="form-control" name="billing_sms" id=""><?php echo e($editSms->billing_sms); ?></textarea>
                            </div>
                            <button class="btn btn-primary w-100 mt-1" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html><?php /**PATH C:\xampp\htdocs\reflex\resources\views/sms/content/edit.blade.php ENDPATH**/ ?>