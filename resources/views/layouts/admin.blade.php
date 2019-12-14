<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield("title")</title>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @section("stylesheets")
            <!-- Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

            <!-- Styles -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css" integrity="sha256-vK3UTo/8wHbaUn+dTQD0X6dzidqc5l7gczvH+Bnowwk=" crossorigin="anonymous" />

            {{-- App --}}
            <link rel="stylesheet" href="{{ url("css/app.css") }}">

            {{-- Font Awesome --}}
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">

            {{-- Material Design Icons --}}
            <link rel="stylesheet" href="https://cdn.materialdesignicons.com/2.5.94/css/materialdesignicons.min.css">
        @show
    </head>
    <body>
        <nav class="navbar is-link" role="navigation" aria-label="main navigation">
            <div class="container">
                <div class="navbar-brand">
                    <a class="navbar-item" href="{{ url("admin") }}">
                        <b>Admin Panel</b>
                    </a>
                    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasic">
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                    </a>
                </div>
                
                <div id="navbarBasic" class="navbar-menu">
                    <div class="navbar-start">
                        <a class="navbar-item" href="{{ url("admin/users") }}">
                            Users
                        </a>
                        <a class="navbar-item" href="{{ url("admin/foods") }}">
                            Food Items
                        </a>
                        <a class="navbar-item" href="{{ url("admin/companies") }}">
                            Companies
                        </a>
                    </div>
                
                    <div class="navbar-end">
                        <a class="navbar-item" href="{{ url("/") }}" target="_blank">
                            View Site
                        </a>
                        @if(Auth::check())
                            <div class="navbar-item">
                                Hello&nbsp;<b>{{ Auth::user()->name }}</b>
                            </div>
                        @endif
                        
                        <div class="navbar-item">
                            <div class="buttons">
                                <form action="{{ url("logout") }}" method="POST">
                                    @csrf
                                    <input type="submit" class="button" value="Logout">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container" id="content">
            @if (session('success'))
                <article class="message is-success">
                    <div class="message-body">
                        {{ session("success") }}
                    </div>
                </article>
            @endif
            @if (session('danger'))
                <article class="message is-danger">
                    <div class="message-body">
                        {{ session("danger") }}
                    </div>
                </article>
            @endif
            @if (session('info'))
                <article class="message is-info">
                    <div class="message-body">
                        {{ session("info") }}
                    </div>
                </article>
            @endif

            @section('content')
                <p>Hey now brown cow!</p>
            @show
        </div>

        <script src="{{ url("js/app.js") }}"></script>
    </body>
</html>
