<!DOCTYPE html>
<html lang="en">
    <!--<< Header Area >>-->
    
<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Gramentheme">
    <meta name="description" content="S4E Ecommerce">
   <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="keywords" content="S4E, Step For Environment, Ecommerce, Shop, Online Shop, Online Store, Store, eCommerce Store">
     

    <!-- ======== Page title ============ -->
    @stack('title')

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset(config('constants.ASSETS_PATH').'img/logo/logo4.png') }}">

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset(config('constants.ASSETS_PATH').'css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset(config('constants.ASSETS_PATH').'css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset(config('constants.ASSETS_PATH').'css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset(config('constants.ASSETS_PATH').'css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset(config('constants.ASSETS_PATH').'css/meanmenu.css') }}">
    <link rel="stylesheet" href="{{ asset(config('constants.ASSETS_PATH').'css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset(config('constants.ASSETS_PATH').'css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset(config('constants.ASSETS_PATH').'css/color.css') }}">
    <link rel="stylesheet" href="{{ asset(config('constants.ASSETS_PATH').'css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>

</head>