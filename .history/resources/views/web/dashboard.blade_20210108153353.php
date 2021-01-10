<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- Styles --> 
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

    </nav>
    <div class="container">
        @yield('content')
    </div>

    @yield('js')
</body>
</html>