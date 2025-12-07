<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Page Title -->
    @stack('title')

    <!-- Head Includes (CSS, meta, etc.) -->
    @include('includes.head')
</head>
<body>

    <!-- Header -->
    @include('includes.header')

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    @include('includes.footer')

    <!-- Optional JS Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
</body>
</html>
