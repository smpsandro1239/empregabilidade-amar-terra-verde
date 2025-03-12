<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} - @yield('title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-50 font-sans antialiased">
    <div class="min-h-screen flex flex-col">
        <!-- Navbar -->
        <header class="bg-brown-600 text-white shadow-lg">
            <nav class="container mx-auto px-6 py-4 flex items-center justify-between">
                <a href="/" class="text-2xl font-bold tracking-tight hover:text-brown-200 transition-colors duration-200">
                    {{ config('app.name') }}
                </a>
                <div class="flex items-center space-x-6">
                    @auth
                        <span class="text-sm">Olá, {{ auth()->user()->name }}</span>
                        <div id="notifications" class="relative">
                            <button class="flex items-center space-x-1 focus:outline-none">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14V11a6 6 0 00-12 0v3c0 .55-.156 1.064-.405 1.595L4 17h5m6 0v1a3 3 0 01-6 0v-1m6 0H9"></path></svg>
                                <span id="notification-count" class="text-xs bg-red-500 text-white rounded-full px-2 py-1">0</span>
                            </button>
                            <div id="notification-dropdown" class="hidden absolute right-0 mt-2 w-72 bg-white rounded-lg shadow-xl border z-10"></div>
                        </div>
                        <a href="{{ route('logout') }}" class="hover:text-brown-200 transition-colors duration-200"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sair</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="hover:text-brown-200 transition-colors duration-200">Login</a>
                        <a href="{{ route('register') }}" class="bg-brown-700 px-4 py-2 rounded-full hover:bg-brown-800 transition-colors duration-200">Registrar</a>
                    @endauth
                </div>
            </nav>
        </header>

        <!-- Main Content -->
        <main class="flex-grow">
            <div class="container mx-auto px-6 py-8">
                @yield('content')
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-gray-800 text-white py-4">
            <div class="container mx-auto px-6 text-center">
                <p>&copy; {{ date('Y') }} {{ config('app.name') }}. Todos os direitos reservados.</p>
            </div>
        </footer>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    @auth
        <script>
            Echo.private('App.Models.User.' + {{ auth()->id() }})
                .notification((notification) => {
                    let count = parseInt(document.getElementById('notification-count').innerText);
                    document.getElementById('notification-count').innerText = count + 1;
                    let dropdown = document.getElementById('notification-dropdown');
                    dropdown.innerHTML += `<div class="p-3 text-gray-800 border-b">${notification.message}</div>`;
                });

            document.getElementById('notifications').addEventListener('click', () => {
                document.getElementById('notification-dropdown').classList.toggle('hidden');
            });
        </script>
    @endauth
</body>
</html>
