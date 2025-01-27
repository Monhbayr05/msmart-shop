<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="./assets/img/favicon.png">

    <title>smart panel</title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

    <!-- Nucleo Icons -->
    <link href="{{asset('admin/assets/css/nucleo-icons.css')}} " rel="stylesheet" />
    <link href="{{asset('admin/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="{{asset('admin/assets/css/material-dashboard.css?v=3.1.0')}}" rel="stylesheet">
</head>


<body class="g-sidenav-show  bg-gray-100">

@include('layouts.inc.admin.sidebar')

<main class="main-content border-radius-lg ">
  @include('layouts.inc.admin.navbar')

  @yield('content')

  @include('layouts.inc.admin.footer')
</main>

<!--   Core JS Files   -->
<script src="{{asset('admin/assets/js/core/popper.min.js')}}" ></script>
<script src="{{asset('admin/assets/js/core/bootstrap.min.js')}}" ></script>
<script src="{{asset('admin/assets/js/plugins/perfect-scrollbar.min.js')}}" ></script>
<script src="{{asset('admin/assets/js/plugins/smooth-scrollbar.min.js')}}" ></script>
<script src="{{asset('admin/assets/js/material-dashboard.min.js?v=3.1.0')}}"></script>

<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>
<script async defer src="https://buttons.github.io/buttons.js"></script>



<script src="sweetalert2/dist/sweetalert2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(Session::has('message'))
    <script>
        Swal.fire({
            title: "Good job!",
            text: "You clicked the button!",
            icon: "success"
        });
    </script>
@endif
</body>


</html>
