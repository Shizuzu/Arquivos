<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Fonte do Google -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
    <!-- CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- CSS da Aplicação -->
    <link rel="stylesheet" href="/css/styles.css">
    <script scr="/js/scripts.css"></script>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="navbar-collapse collapse" id="navbar">
                <a href="/" class="navbar-brand">
                    <img src="/img/hdcevents_logo.png" alt="HDC Events">
                </a>
                <ul class= "navbar-nav">
                    <li class="nav-item">
                        <a href="/" class="nav-link">Eventos</a>
                    </li>

                    <li class="nav-item">
                        <a href="/events/create" class="nav-link">Criar Eventos</a>
                    </li>
                    @auth
                    <li class="nav-item">
                        <a href="/dashboard" class="nav-link">Meus Eventos</a>
                    </li>

                    <li class="nav-item">
                        <form action="/logout" method="POST">
                            @csrf
                            <a  href="/logout"
                                class="nav-link" 
                                onclick="event.preventDefault();
                                this.closest('form').submit()">
                                Sair
                            </a>
                        </form>
                    </li>
                    @endauth
                    @guest
                     <li class="nav-item">
                        <a href="/login" class="nav-link">Entrar</a>
                    </li>
                    <li class="nav-item">
                        <a href="/register" class="nav-link">Cadastrar</a>
                    </li>
                    @endguest
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <div class="container-fluid">
            <div class="row">
                @if(session('msg'))
                    <p class="msg">{{session('msg')}}</p>
                @endif
            @yield('content')
            </div>
        </div>
    </main>
    <footer>
        <p>HDC Events &copy; 2024</p>
    </footer>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>
