<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>@yield('title', 'PERUJI | CMS')</title>
    <link rel="stylesheet" href="{{ asset('dash-css/dash-style.css') }}">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <script src="{{asset('dash-js/fetchhelper.js')}}"></script>
</head>
<body>
    @include('dashboard.header')

    <main>
        @yield('content')
    </main>
    
    @include('dashboard.footer')
</body>
<script src="{{asset('/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script>
</script>
</html>