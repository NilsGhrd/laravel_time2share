<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/main.css">
    <script src="/js/main.js" defer></script>
    <title>@yield('title')</title>
</head>
<body>
    <!-- TODO: Header -->
    <header class="header">
        <a href="/"><h1 class="header__title">Time 2 Share</h1></a>
        <nav class="header__navigation">
            <ul>
                <a href="/product"><li class="header__link">Producten</li></a>
                @guest
                    <a href="/register"><li class="header__link">Aanmelden</li></a>
                @endguest
                @auth
                    <a href="/product/create"><li class="header__link">Adverteer Product</li></a>
                    <a href="/account"><li class="header__link">Mijn Account</li></a>
                @endauth
            </ul>
        </nav>
    </header>
    @yield('filter')
    <main>
        @yield('content')
    </main>
    <!-- TODO: Footer -->
    <footer class='footer'>
        <h2 class='footer__text'>Time2 Share - Nils Gerhard s1127500</h2>
    </footer>
</body>
</html>