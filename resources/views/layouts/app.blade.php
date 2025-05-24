<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', 'Car Rental Management')</title>
        <!-- Tailwind CSS CDN -->
        <script src="https://cdn.tailwindcss.com"></script>
        <style>
            .content-background {
                background: #FAFAFA;
                border: 1px solid rgba(6, 182, 212, 0.1);
                box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            }
            .sidebar-background {
                background: #FAFAFA;
                border-right: 1px solid rgba(6, 182, 212, 0.1);
            }
            .header-background {
                background: #FAFAFA;
                border-bottom: 1px solid rgba(6, 182, 212, 0.1);
            }
        </style>
        @stack('head')
    </head>
    <body class="bg-[#FAFAFA] min-h-screen">
        <div x-data="{ open: false }" class="flex min-h-screen relative z-10">
            <!-- Sidebar -->
            <aside class="sidebar-background shadow-lg w-64 hidden md:flex flex-col fixed inset-y-0 z-30">
                <div class="flex items-center justify-center h-16 border-b border-[#06B6D4]/10">
                    <span class="text-xl font-bold text-[#06B6D4]">DRIOUCHI CAR</span>
                </div>
                <nav class="flex-1 py-4">
                    <ul class="space-y-2">
                        <li>
                            <a href="{{ route('dashboard') }}" class="flex items-center px-6 py-3 hover:bg-[#06B6D4]/5 focus:bg-[#06B6D4]/10 {{ request()->routeIs('dashboard') ? 'bg-[#06B6D4]/10 text-[#06B6D4] font-semibold' : 'text-[#374151]' }}">
                                <!-- Heroicon: Home -->
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7m-9 2v6a2 2 0 002 2h4a2 2 0 002-2v-6m-6 0h6"/></svg>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('cars.index') }}" class="flex items-center px-6 py-3 hover:bg-[#06B6D4]/5 focus:bg-[#06B6D4]/10 {{ request()->routeIs('cars.*') ? 'bg-[#06B6D4]/10 text-[#06B6D4] font-semibold' : 'text-[#374151]' }}">
                                <!-- Heroicon: Truck -->
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 17v-6a2 2 0 012-2h6a2 2 0 012 2v6m-2 4a2 2 0 100-4 2 2 0 000 4zm-8 0a2 2 0 100-4 2 2 0 000 4z"/></svg>
                                Gestion des Voitures
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('rentals.index') }}" class="flex items-center px-6 py-3 hover:bg-[#06B6D4]/5 focus:bg-[#06B6D4]/10 {{ request()->routeIs('rentals.*') ? 'bg-[#06B6D4]/10 text-[#06B6D4] font-semibold' : 'text-[#374151]' }}">
                                <!-- Heroicon: Clipboard List -->
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 4H7a2 2 0 01-2-2V7a2 2 0 012-2h3.28a2 2 0 001.44-.59l.72-.72a2 2 0 012.83 0l.72.72A2 2 0 0016.72 5H20a2 2 0 012 2v11a2 2 0 01-2 2z"/></svg>
                                Gestion des Locations
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('users.index') }}" class="flex items-center px-6 py-3 hover:bg-[#06B6D4]/5 focus:bg-[#06B6D4]/10 {{ request()->routeIs('users.*') ? 'bg-[#06B6D4]/10 text-[#06B6D4] font-semibold' : 'text-[#374151]' }}">
                                <!-- Heroicon: Users -->
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m9-4a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                                Gestion des Utilisateurs
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('expenses.index') }}" class="flex items-center px-6 py-3 hover:bg-[#06B6D4]/5 focus:bg-[#06B6D4]/10 {{ request()->routeIs('expenses.*') ? 'bg-[#06B6D4]/10 text-[#06B6D4] font-semibold' : 'text-[#374151]' }}">
                                <!-- Heroicon: Credit Card -->
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a5 5 0 00-10 0v2M5 9h14a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2z"/></svg>
                                Gestion des Finances
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('history.index') }}" class="flex items-center px-6 py-3 hover:bg-[#06B6D4]/5 focus:bg-[#06B6D4]/10 {{ request()->routeIs('history.*') ? 'bg-[#06B6D4]/10 text-[#06B6D4] font-semibold' : 'text-[#374151]' }}">
                                <!-- Heroicon: Clock -->
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                Historique
                            </a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}" class="w-full">
                                @csrf
                                <button type="submit" class="flex items-center w-full px-6 py-3 text-left hover:bg-[#EF4444]/5 focus:bg-[#EF4444]/10 text-[#EF4444]">
                                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H7a2 2 0 01-2-2V7a2 2 0 012-2h4a2 2 0 012 2v1"/></svg>
                                    Déconnexion
                                </button>
                            </form>
                        </li>
                    </ul>
                </nav>
            </aside>
            <!-- Mobile Sidebar -->
            <div class="md:hidden">
                <button @click="open = !open" class="fixed top-4 left-4 z-40 bg-[#FACC15] text-[#374151] p-2 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#06B6D4]">
                    <!-- Heroicon: Menu -->
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
                <div x-show="open" @click.away="open = false" class="fixed inset-0 z-30 flex">
                    <aside class="sidebar-background shadow-lg w-64 flex flex-col h-full">
                        <div class="flex items-center justify-between h-16 border-b border-[#06B6D4]/10 px-4">
                            <span class="text-xl font-bold text-[#06B6D4]">DRIOUCHI CAR</span>
                            <button @click="open = false" class="text-[#374151] hover:text-[#06B6D4] focus:text-[#06B6D4]">
                                <!-- Heroicon: X -->
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                            </button>
                        </div>
                        <nav class="flex-1 py-4">
                            <ul class="space-y-2">
                                <li>
                                    <a href="{{ route('dashboard') }}" class="flex items-center px-6 py-3 hover:bg-[#06B6D4]/5 focus:bg-[#06B6D4]/10 {{ request()->routeIs('dashboard') ? 'bg-[#06B6D4]/10 text-[#06B6D4] font-semibold' : 'text-[#374151]' }}">
                                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7m-9 2v6a2 2 0 002 2h4a2 2 0 002-2v-6m-6 0h6"/></svg>
                                        Dashboard
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('cars.index') }}" class="flex items-center px-6 py-3 hover:bg-[#06B6D4]/5 focus:bg-[#06B6D4]/10 {{ request()->routeIs('cars.*') ? 'bg-[#06B6D4]/10 text-[#06B6D4] font-semibold' : 'text-[#374151]' }}">
                                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 17v-6a2 2 0 012-2h6a2 2 0 012 2v6m-2 4a2 2 0 100-4 2 2 0 000 4zm-8 0a2 2 0 100-4 2 2 0 000 4z"/></svg>
                                        Gestion des Voitures
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('rentals.index') }}" class="flex items-center px-6 py-3 hover:bg-[#06B6D4]/5 focus:bg-[#06B6D4]/10 {{ request()->routeIs('rentals.*') ? 'bg-[#06B6D4]/10 text-[#06B6D4] font-semibold' : 'text-[#374151]' }}">
                                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 4H7a2 2 0 01-2-2V7a2 2 0 012-2h3.28a2 2 0 001.44-.59l.72-.72a2 2 0 012.83 0l.72.72A2 2 0 0016.72 5H20a2 2 0 012 2v11a2 2 0 01-2 2z"/></svg>
                                        Gestion des Locations
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('users.index') }}" class="flex items-center px-6 py-3 hover:bg-[#06B6D4]/5 focus:bg-[#06B6D4]/10 {{ request()->routeIs('users.*') ? 'bg-[#06B6D4]/10 text-[#06B6D4] font-semibold' : 'text-[#374151]' }}">
                                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m9-4a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                                        Gestion des Utilisateurs
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('expenses.index') }}" class="flex items-center px-6 py-3 hover:bg-[#06B6D4]/5 focus:bg-[#06B6D4]/10 {{ request()->routeIs('expenses.*') ? 'bg-[#06B6D4]/10 text-[#06B6D4] font-semibold' : 'text-[#374151]' }}">
                                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a5 5 0 00-10 0v2M5 9h14a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2z"/></svg>
                                        Gestion des Finances
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('history.index') }}" class="flex items-center px-6 py-3 hover:bg-[#06B6D4]/5 focus:bg-[#06B6D4]/10 {{ request()->routeIs('history.*') ? 'bg-[#06B6D4]/10 text-[#06B6D4] font-semibold' : 'text-[#374151]' }}">
                                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                        Historique
                                    </a>
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                                        @csrf
                                        <button type="submit" class="flex items-center w-full px-6 py-3 text-left hover:bg-[#EF4444]/5 focus:bg-[#EF4444]/10 text-[#EF4444]">
                                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H7a2 2 0 01-2-2V7a2 2 0 012-2h4a2 2 0 012 2v1"/></svg>
                                            Déconnexion
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </nav>
                    </aside>
                    <div class="flex-1" @click="open = false"></div>
                </div>
            </div>
            <!-- Main content -->
            <div class="flex-1 md:ml-64 flex flex-col min-h-screen">
                <!-- Header/Navbar -->
                <header class="header-background shadow-lg h-16 flex items-center justify-between px-6 sticky top-0 z-20">
                    <div class="flex items-center space-x-4">
                        <button @click="open = !open" class="md:hidden text-[#374151] hover:text-[#06B6D4] focus:text-[#06B6D4] focus:outline-none">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/></svg>
                        </button>
                    </div>
                    <div class="flex items-center space-x-4">
                        @auth
                            <span class="text-[#374151] font-medium">{{ Auth::user()->name }}</span>
                        @endauth
                    </div>
                </header>
                <main class="flex-1 p-6">
                    <div class="content-background rounded-xl p-6">
                        @yield('content')
                    </div>
                </main>
            </div>
        </div>
        <!-- Alpine.js for sidebar toggle -->
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
        @stack('scripts')
    </body>
</html>
