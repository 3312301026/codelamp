<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard Admin') - CodeLamp</title>
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

            <nav class="px-4 py-6 space-y-2 text-sm">
                <!-- Dashboard -->
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center space-x-3 py-2 px-4 rounded-md hover:bg-[#1F2626] transition duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" stroke="#D5D1D1" fill="none"
                        viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 12h18M3 6h18M3 18h18" />
                    </svg>
                    <span class="text-gray-200">Dashboard</span>
                </a>

                <!-- Pengguna (dropdown) -->
                <div>
                    <button id="penggunaToggle" type="button"
                        class="w-full flex items-center justify-between py-2 px-4 text-gray-200 hover:bg-[#1F2626] rounded transition duration-200">
                        <div class="flex items-center space-x-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" stroke="#D5D1D1" fill="none"
                                viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M5.121 17.804A13.937 13.937 0 0112 15c2.97 0 5.824 1.007 8.121 2.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span>Pengguna</span>
                        </div>
                        <svg id="arrowIcon" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 transition-transform" fill="none"
                            viewBox="0 0 24 24" stroke="#D5D1D1" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="submenuPengguna" class="ml-8 mt-1 space-y-1 hidden">
                        <a href="{{ route('admin.users') }}" class="block py-1 px-2 text-gray-300 hover:bg-[#1F2626] rounded">Instruktur</a>
                        <a href="{{ route('admin.users') }}" class="block py-1 px-2 text-gray-300 hover:bg-[#1F2626] rounded">Siswa</a>
                    </div>
                </div>

                <!-- Kursus -->
                <a href="{{ route('admin.kursus') }}"
                    class="flex items-center space-x-3 py-2 px-4 rounded-md hover:bg-[#1F2626] transition duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" stroke="#D5D1D1" fill="none"
                        viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 9h10M9 14h10" />
                    </svg>
                    <span class="text-gray-200">Kursus</span>
                </a>

                <!-- Pembayaran -->
                <a href="#"
                    class="flex items-center space-x-3 py-2 px-4 rounded-md hover:bg-[#1F2626] transition duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" stroke="#D5D1D1" fill="none"
                        viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 2v12M5 11l7 7 7-7" />
                    </svg>
                    <span class="text-gray-200">Pembayaran</span>
                </a>

                <!-- Pesan -->
                <a href="#"
                    class="flex items-center space-x-3 py-2 px-4 rounded-md hover:bg-[#1F2626] transition duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" stroke="#D5D1D1" fill="none"
                        viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13h14l-7 7-7-7z" />
                    </svg>
                    <span class="text-gray-200">Pesan</span>
                </a>
            </nav>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
        <!-- Header -->
        <header class="bg-yellow-400 px-6 py-4 flex items-center justify-between shadow">
            <div class="text-lg font-semibold text-black">Selamat datang, Admin!</div>

            <div class="relative inline-block text-left">
                <button id="profileMenuBtn" class="flex items-center space-x-2 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-black" fill="none" stroke="currentColor">
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
                document.addEventListener('DOMContentLoaded', function () {
                    const profileBtn = document.getElementById('profileMenuBtn');
                    const profileMenu = document.getElementById('profileMenu');
                    profileBtn.addEventListener('click', function (e) {
                        e.stopPropagation();
                        profileMenu.classList.toggle('hidden');
                    });
                    document.addEventListener('click', function () {
                        profileMenu.classList.add('hidden');
                    });

                    const toggle = document.getElementById('penggunaToggle');
                    const submenu = document.getElementById('submenuPengguna');
                    const arrow = document.getElementById('arrowIcon');

                    toggle.addEventListener('click', function () {
                        submenu.classList.toggle('hidden');
                        arrow.classList.toggle('rotate-180');
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