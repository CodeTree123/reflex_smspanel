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
                    <div class="card-header bg-secondary">
                        <h3 class="text-white"><?php echo e($pageTitle); ?></h3>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo e(route('sms.bulk.update')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <input type="text" class="d-none" name="id" value="<?php echo e($userSms->id); ?>">
                            <div class="form-group">
                                <div class="form-label">Total Sms</div>
                                <input class="form-control" name="sms" id="" value="<?php echo e($userSms->sms); ?>">
                            </div>
                            <button class="btn btn-secondary w-100 mt-2" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html><?php /**PATH C:\xampp\htdocs\reflex\resources\views/sms/bulk_sms_edit.blade.php ENDPATH**/ ?>