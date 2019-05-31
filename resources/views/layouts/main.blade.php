<!doctype html>
<html lang="en">
<head>
    <title>BuranaArsa</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>
    <!-- Material Kit CSS -->
    <link href="/assets/css/material-kit.css?v=2.0.5" rel="stylesheet"/>
    <link rel="stylesheet" href="/css/nice-select.css">
    <link rel="stylesheet" href="/css/styles.css">
    <script src="/assets/js/core/jquery.min.js" type="text/javascript"></script>
</head>
<body>
@include('components.navbar')

@yield('content')

@include('components.footer')

<!--   Core JS Files   -->
<script src="https://kit.fontawesome.com/c7ffe98868.js"></script>
<script src="/assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="/assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
<script src="/assets/js/plugins/moment.min.js"></script>
<!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
<script src="/assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="/assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
<!--  Google Maps Plugin  -->
<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5pqlf37NqcN8xW6-FW2pbFEgpZ7ssTIk&callback=initMap"></script>
<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
<script src="/assets/js/material-kit.js?v=2.0.5" type="text/javascript"></script>
<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="/js/jquery.nice-select.min.js"></script>
<script src="/js/scripts.js"></script>
</body>
</html>
