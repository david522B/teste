<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    @yield('js')
    
    <title>Teste - @yield('title')</title>
</head>
<body>
    <nav>
        <div class="logo">
            <h1>DMS!</h1>
        </div>
        <ul class="nav-links">
            <li>
                <a href="#">About</a>
            </li>
            <li>
                <a href="#">Contact</a>
            </li>
            <li>
                <a href="#">Services</a>
            </li>
            <li>
                <a href="#">Projects</a>
            </li>
        </ul>

        <div class="mobile-menu">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>

    @yield('js')
</body>
</html>