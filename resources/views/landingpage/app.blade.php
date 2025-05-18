<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>@yield('title', 'PERUJI')</title>
    <link rel="stylesheet" href="{{ asset('lp-css/style.css') }}">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
</head>
<body>
    @include('landingpage.header')

    <main>
        @yield('content')
    </main>
    
    @include('landingpage.footer')
</body>
<script src="{{asset('/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script>
    const menuButton = document.getElementById('nav-menu-open');
    const menuText = document.getElementById('menu-toggle-text');
    const navMenu = document.querySelector('.nav-menu-body');

    menuButton.addEventListener('click', () => {
        const isShown = navMenu.classList.contains('show');
        
        if (isShown) {
            navMenu.classList.remove('show');
            menuText.textContent = 'Menu';
        } else {
            navMenu.classList.add('show');
            menuText.textContent = 'Exit';
        }
    });
</script>
</html>