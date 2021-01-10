<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- Styles -->
    {!! HTML::style('css/common.css') !!} 
    @yield('css')
    
    <title>Teste - @yield('title')</title>
</head>
<body>
    <nav>
        <div class="logo">
            <h1>Teste</h1>
        </div>
        <ul class="nav-links">
            <li>
                <a href="#">Produtos</a>
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
    <script type="text/javascript"
</body>
</html>