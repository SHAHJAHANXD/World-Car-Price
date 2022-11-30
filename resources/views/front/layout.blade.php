<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="World Car Price providing latest prices, specifications, and release date of Cars, Bikes, Motorcycles, Scooters and Bicycles, Ok Wheeler also providing info about EV Vehicles like Electric Cars and Bikes.">
    <meta name="keywords" content="Cars, Bikes, BiCycle, World Car Price">
    <meta name="author" content="World Car Price">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-site-verification" content="jcY_nKd2Gyl1ktdKeXS6F3zE1dKhREbBrnb6rkdEsUY" />
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-E7ED5419Y0"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-E7ED5419Y0');

    </script>
    @include('front.layouts.heads')
    @yield('extra-heads')
    <title>@yield('title')</title>
</head>
<body>
    @include('front.layouts.header')
    @yield('content')
    @include('front.layouts.footer')
    @include('front.layouts.scripts')
    @yield('extra-scripts')
</body>
</html>
