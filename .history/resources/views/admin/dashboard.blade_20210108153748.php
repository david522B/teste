<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- Styles -->   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">    
    @yield('css')
    
    <title>Admin - @yield('title')</title>
</head>
<body>
    <nav>
        <div class="logo">
            <h1>Teste</h1>
        </div>
        <ul class="nav-links">
            <li>
                <a href="/admin/dashboard">Produtos</a>
            </li>
            <li>
                <a href="/admin/categories">Categorias</a>
            </li>
        </ul>

        <div class="mobile-menu">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </nav>
    <div class="container">
        <a type="button" href="/products/create">Criar Produto</a>
        @yield('content')
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    @yield('js')
</body>
</html>