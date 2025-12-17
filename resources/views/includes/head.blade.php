<!DOCTYPE html>
<html lang="en">
<head>

    <!-- ================= BASIC META ================= -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ================= SEO META ================= -->
    <title>@yield('meta_title', 'S4E | Step For Environment')</title>

    <meta name="description" content="@yield('meta_description', 'S4E Ecommerce – Step For Environment online eco-friendly store')">
    <meta name="keywords" content="@yield('meta_keywords', 'S4E, Step For Environment, Ecommerce, Online Store')">
    <meta name="author" content="Step For Environment">
    <meta name="robots" content="index, follow">

    <link rel="canonical" href="{{ url()->current() }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- ================= OPEN GRAPH ================= -->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Step For Environment">
    <meta property="og:title" content="@yield('meta_title', 'S4E | Step For Environment')">
    <meta property="og:description" content="@yield('meta_description', 'S4E Ecommerce – Step For Environment online eco-friendly store')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="@yield('meta_image', asset(config('constants.ASSETS_PATH').'img/logo/logo4.png'))">

    <!-- ================= TWITTER ================= -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('meta_title', 'S4E | Step For Environment')">
    <meta name="twitter:description" content="@yield('meta_description', 'S4E Ecommerce – Step For Environment online eco-friendly store')">
    <meta name="twitter:image" content="@yield('meta_image', asset(config('constants.ASSETS_PATH').'img/logo/logo4.png'))">

    <!-- ================= FAVICON ================= -->
    <link rel="icon" href="{{ asset(config('constants.ASSETS_PATH').'img/logo/logo4.png') }}">

    <!-- ================= CSS ================= -->

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
    <!-- ================= JSON-LD (FIXED) ================= -->
    @verbatim
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "name": "Step For Environment",
      "url": "{{APP_URL}}",
      "logo": "{{LOGO_URL}}",
      "sameAs": [
        "https://www.facebook.com/",
        "https://www.instagram.com/",
        "https://www.linkedin.com/"
      ]
    }
    </script>
    @endverbatim

    <!-- ================= JS ================= -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
