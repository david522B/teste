<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @hasSection('css')
        @yield('css')
    @endif
    @hasSection('title')
        @yield('title')

    @@can('update', $post)
        
    @elsecan('create', $post)
        
    @endcan
    @endif
    <title></title>
</head>
<body>
    
</body>
</html>