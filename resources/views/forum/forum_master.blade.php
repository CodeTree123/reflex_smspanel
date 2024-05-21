<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/x-icon" href="{{asset ('assets/img/reflex_logo.png')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">

    <!-- Bootstrap 5.1.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

    <!-- Page CSS -->
    @stack('page-css')

    <!-- Sami Package CSS -->
    <link rel="stylesheet" href="{{asset('public/samipackage/css/samipack.css')}}">

    <!--Main Style CSS -->
    <link rel="stylesheet" href="{{ asset ('assets/css/style.css')}}">

    <!-- Prescription CSS -->
    <link rel="stylesheet" href="{{ asset ('assets/css/prescription_style.css')}}">

    <!-- Forum CSS -->
    <link rel="stylesheet" href="{{ asset ('assets/css/forum.css')}}">

    <title>ReflexDN</title>

</head>

<body>

    @include('forum.include.header')

    <div class="container-fluid forum">
        <div class="row">
            <div class="col-3 pe-0">

                @include('forum.include.forumLeft')

            </div>

            <div class="col-6 pe-0 mb-5">

                @yield('content')

            </div>

            <div class="col-3 page-home ">

                @include('forum.include.forumRight')

            </div>
        </div>
    </div>

    @stack('page-modals')

    @include('include.samiPackage')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Sami Package JS File -->
    <script src="{{asset('public/samipackage/js/samipack.js')}}"></script>

    @stack('page-js')

</body>

</html>