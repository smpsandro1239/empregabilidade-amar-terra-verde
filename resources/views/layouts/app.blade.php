<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} - @yield('title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <nav class="bg-brown-600 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="/" class="text-xl font-bold">{{ config('app.name') }}</a>
            <div>
                @auth
                    <span class="mr-4">Olá, {{ auth()->user()->name }}</span>
                    <a href="{{ route('logout') }}" class="hover:underline"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sair</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                @else
                    <a href="{{ route('login') }}" class="mr-4 hover:underline">Login</a>
                    <a href="{{ route('register') }}" class="hover:underline">Registrar</a>
                @endauth
            </div>
        </div>
    </nav>

    <main class="py-6">
        @yield('content')
    </main>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
