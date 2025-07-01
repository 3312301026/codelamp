<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard Instruktur') - CodeLamp</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-[#0E1212] text-white flex flex-col justify-between shadow-lg">
        <div>
            <div class="bg-white px-6 py-4 flex items-center justify-between">
                <span class="text-[#F5B40D] font-bold text-xl">CodeLamp</span>
                <img src="{{ asset('images/lamp.png') }}" alt="Lamp Icon" class="h-7 w-7">
            </div>
            <nav class="px-4 py-6 space-y-2">
                @php
                    $menu = [
                        ['route' => 'instruktur.dashboard', 'label' => 'Dashboard', 'icon' => 'M3 7h18M3 12h18M3 17h18'],
                        ['route' => 'instruktur.profil', 'label' => 'Profil', 'icon' => 'M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4z M12 14c-3.31 0-6 2.69-6 6s2.69 6 6 6 6-2.69 6-6-2.69-6-6-6z'],
                        ['route' => 'instruktur.kursus', 'label' => 'Kursus', 'icon' => 'M9 9h10M9 14h10'],
                        ['route' => 'instruktur.pembayaran', 'label' => 'Pembayaran', 'icon' => 'M12 2L12 14M5 11L12 18L19 11'],
                        ['route' => 'instruktur.pesan', 'label' => 'Pesan', 'icon' => 'M5 13h14l-7 7-7-7z'],
                    ];
                @endphp

                @foreach ($menu as $item)
                    <a href="{{ route($item['route']) }}"
                        class="flex items-center space-x-3 py-2 px-4 rounded-md hover:bg-[#1F2626] transition duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" stroke="#D5D1D1" fill="none"
                            viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="{{ $item['icon'] }}" />
                        </svg>
                        <span class="text-gray-200 text-sm">{{ $item['label'] }}</span>
                    </a>
                @endforeach
            </nav>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
        <!-- Header -->
        <header class="bg-yellow-400 px-6 py-4 flex items-center justify-between shadow">
            {{-- <button class="text-black md:block hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button> --}}
            <div class="text-lg font-semibold text-black">Selamat datang, Instruktur!</div>
            <!-- Profile Dropdown with Logout -->
            <div class="relative inline-block text-left">
                <button id="profileMenuBtn" class="flex items-center space-x-2 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-black" fill="none"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5.121 17.804A13.937 13.937 0 0112 15c3.042 0 5.824 1.007 8.121 2.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </button>

                <!-- Dropdown Menu -->
                <div id="profileMenu"
                    class="origin-top-right absolute right-0 mt-2 w-32 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden z-50">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            Logout
                        </button>
                    </form>
                </div>
            </div>

            <script>
                // Toggle dropdown
                document.addEventListener('DOMContentLoaded', function () {
                    const btn = document.getElementById('profileMenuBtn');
                    const menu = document.getElementById('profileMenu');

                    btn.addEventListener('click', function (e) {
                        e.stopPropagation();
                        menu.classList.toggle('hidden');
                    });

                    document.addEventListener('click', function () {
                        menu.classList.add('hidden');
                    });
                });
            </script>

        </header>

        <!-- Page Content -->
        <main class="p-6 bg-white flex-1 rounded-t-lg shadow-inner">
            @yield('content')
        </main>
    </div>

</body>

</html>