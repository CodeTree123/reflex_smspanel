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
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

    <!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> -->

    <!-- Prescription CSS -->
    <link rel="stylesheet" href="{{asset('public/assets/css/prescription_style.css')}}">
    <!-- <link rel="stylesheet" href="{{ asset ('assets/css/tab.css')}}"> -->
    <!-- <link rel="stylesheet" href="{{ asset ('assets/css/multiselect.css')}}"> -->
    <!-- <link rel="stylesheet" href="{{ asset ('assets/css/bs-stepper.css')}}"> -->

    <!-- Slick Slider CSS -->
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset ('assets/css/slick_slider.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset ('assets/css/slick_slider_theme.css')}}" /> -->
    <title>ReflexDN</title>

</head>
@if(Route::current()->getName() == 'login')
<body class="vh-100 d-flex flex-column">
@else
<body>
@endif
    @if(Route::current()->getName() == 'prescription')
    @elseif(Route::current()->getName() == 'invoice')
    @elseif(Route::current()->getName() == 'monthly_report')
    @else
    @include('doctor.include.header')
    @endif

    @yield('content')

    @if(Route::current()->getName() == 'prescription')
    @elseif(Route::current()->getName() == 'invoice')
    @elseif(Route::current()->getName() == 'monthly_report')
    @else
    @include('include.footer')
    @endif

    @stack('page-modals')

    @include('include.samiPackage')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- <script src="{{asset ('assets/js/app.js')}}"></script> -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- <script src="{{ asset ('assets/js/chosen.jquery.js')}}"></script> -->

    <!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->

    <!-- Sami Package JS File -->
    <script src="{{asset('public/samipackage/js/samipack.js')}}"></script>

    <script>
        $(document).ready(function() {
            // $(".multi").select2({
            //     // maximumSelectionLength: 2
            // });
            // window.setTimeout(function() {
            //     $(".test").alert('close');
            // }, 2000);

            //Sami Package For Toast
            $(document).cus_toast_auto({
                cus_toast_time: 3000,
                cus_toast_top: "60px",
                cus_toast_border: "#4e6f8a",
            });

            $('.image_view_sami').image_preview();

            $(document).on('click', 'img.full_view', function() {
                $(this).modal_image_preview();
            });
        });
    </script>
    <!-- <script src="{{ asset ('assets/js/bs-stepper.js')}}"></script>
    <script src="{{ asset ('assets/js/custom_stepper.js')}}"></script> -->

    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl)
        })
    </script>

    <!-- <script type="text/javascript" src="{{ asset ('assets/js/slick.js')}}"></script> -->
    <!-- Page js -->
    @stack('page-js')

</body>

</html>