<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        {{-- CSS --}}

        <link rel="stylesheet" href="/css/styles.css">

        {{-- Fonts --}}

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

        {{-- Bootstrap --}}

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/Navbar-Fixed-Side-navbar-fixed-side.css">
        <link rel="stylesheet" href="/css/Navbar-Right-Links-Dark-icons.css">
        <link rel="stylesheet" href="/css/Soft-UI-Aside-Navbar.css">
        <link rel="stylesheet" href="/css/Navbar-Fixed-Side-navbar-fixed-side.css">
        <link rel="stylesheet" href="/css/Navbar-Right-Links-Dark-icons.css">
        <link rel="stylesheet" href="/css/Profile-Edit-Form-styles.css">
        <link rel="stylesheet" href="/css/Profile-Edit-Form.css">
        <link rel="stylesheet" href="/css/Soft-UI-Aside-Navbar.css">

        <link rel="stylesheet" href="/fonts/font-awesome.min.css">
        <link rel="stylesheet" href="/css/aos.min.css">
        <link rel="stylesheet" href="/css/Animation-Cards-_app.css">
        <link rel="stylesheet" href="/css/Animation-Cards.css">

        
        

            <!-- Exportar -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <link  href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <link  href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>



        {{-- JavaScript --}}
        <script src="/js/scripts.js"></script>

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    </head>
    <body>
        <header>
            <nav class="navbar navbar-light navbar-expand-md py-3">
                <div class="container"><a class="navbar-brand d-flex align-items-center" href="/"><span class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center me-2 bs-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-bezier">
                                <path fill-rule="evenodd" d="M0 10.5A1.5 1.5 0 0 1 1.5 9h1A1.5 1.5 0 0 1 4 10.5v1A1.5 1.5 0 0 1 2.5 13h-1A1.5 1.5 0 0 1 0 11.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm10.5.5A1.5 1.5 0 0 1 13.5 9h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1a1.5 1.5 0 0 1-1.5-1.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zM6 4.5A1.5 1.5 0 0 1 7.5 3h1A1.5 1.5 0 0 1 10 4.5v1A1.5 1.5 0 0 1 8.5 7h-1A1.5 1.5 0 0 1 6 5.5v-1zM7.5 4a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z"></path>
                                <path d="M6 4.5H1.866a1 1 0 1 0 0 1h2.668A6.517 6.517 0 0 0 1.814 9H2.5c.123 0 .244.015.358.043a5.517 5.517 0 0 1 3.185-3.185A1.503 1.503 0 0 1 6 5.5v-1zm3.957 1.358A1.5 1.5 0 0 0 10 5.5v-1h4.134a1 1 0 1 1 0 1h-2.668a6.517 6.517 0 0 1 2.72 3.5H13.5c-.123 0-.243.015-.358.043a5.517 5.517 0 0 0-3.185-3.185z"></path>
                            </svg></span><span class="text-uppercase fs-1">Transparência ITP</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navcol-1">
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item"><a class="nav-link active" href="{{route('relatorios.create')}}">Novo Relatório</a></li>
                            <li class="nav-item"><a class="nav-link" href="/pages/novo_cliente">Novo Cliente</a></li>
                            <li class="nav-item"><a class="nav-link" href="/pages/novo_usuario">Novo Úsuario</a></li>
                            <li class="nav-item"><a class="nav-link" href="/">Lista de Relatórios</a></li>
                                {{-- @auth
                                <li class="nav-item">
                                    <form action="/logout" method="POST">
                                        @csrf
                                        @method('POST')
                                        <a class="nav-link" href="/logout" 
                                        onclick="event.preventDefault();  
                                        this.closest('form').submit();">
                                            Sair</a>
                                    </form>
                                </li>
                                @endauth --}}
                            
                           
    
                        
                    </div>
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
        <script src="/bootstrap/js/bootstrap.min.js"></script>
        <script src="/js/Profile-Edit-Form-profile.js"></script>
        <script src="/js/aos.min.js"></script>
        <script src="/js/bs-init.js"></script>
    
    
        <footer>
            <p>Criado por João Vedoti &copy;</p>
        </footer>
    </body>