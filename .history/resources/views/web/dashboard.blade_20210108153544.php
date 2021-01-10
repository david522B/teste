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
        <a href="/products/
        @yield('content')
    </div>

    @yield('js')
    <script type="text/javascript">
        const navSlide = () => {
                const mobileMenu = document.querySelector('.mobile-menu')    
                const nav = document.querySelector('.nav-links')
                const navLinks = document.querySelectorAll('.nav-links li')

                mobileMenu.addEventListener('click', () => {     
                    //toggle Nav
                    nav.classList.toggle('nav-active')
                    //toggle Links
                    navLinks.forEach((link, index) => {
                        if (link.style.animation) {
                            link.style.animation = ''
                        } else {
                            link.style.animation = `navLinksFade 0.5s ease forwards ${index / 5 + 0.3}s`
                        }
                    })
                    //toggle Mobile menu
                    mobileMenu.classList.toggle('active')
                })
            
        }
        navSlide()
    </script>
</body>
</html>