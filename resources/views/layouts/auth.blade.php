<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="apple-touch-icon" href="~/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!--Layout Stylesheets-->
    <link rel="stylesheet" type="text/css" href="../../vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="../../vendors/css/extensions/toastr.css">
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="../../css/colors.css">
    <link rel="stylesheet" type="text/css" href="../../css/components.css">
    <link rel="stylesheet" type="text/css" href="../../css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="../../css/themes/semi-dark-layout.css">
    <link rel="stylesheet" type="text/css" href="../../css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="../../css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="../../css/plugins/extensions/toastr.css">
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
    <link rel="stylesheet newest" type="text/css" href="../../css/style.custom.css">
    @yield('css')
</head>
    <body class="vertical-layout vertical-menu-modern 2-columns navbar-floating footer-static menu-collapsed bg-full-screen-image" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
        <div class="app-content content">
            <div class="content-overlay"></div>
            <div class="header-navbar-shadow"></div>
            <div class="content-wrapper">
                <!--Layout Scripts-->
                <script src="../../vendors/js/signalr/signalr.js"></script>
                <script src="../../js/wise-erp-core.js"></script>

                <script src="../../vendors/js/vendors.min.js"></script>
                <script src="../../vendors/js/extensions/toastr.min.js"></script>
                <script src="../../js/core/app-menu.js"></script>
                <script src="../../js/core/app.js"></script>
                <script src="../../js/scripts/components.js"></script>

                <!--Render Body-->
                @yield('content')
            </div>
        </div>

        <div class="sidenav-overlay"></div>
        <div class="drag-target"></div>
        @yield('js')
    </body>
</html>
