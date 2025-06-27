<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard - CodeLamp</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex min-h-screen bg-[#FBE5C8]">

    <!-- Sidebar -->
    <aside class="w-64 bg-[#0E1212] text-white flex flex-col">
        <!-- Header Sidebar -->
<div class="flex items-center justify-start space-x-2 px-6 py-3 bg-white">
    <span class="font-bold text-lg" style="color:#F5B40D;">CodeLamp</span>
    <img src="{{ asset('gambar/logo1.png') }}" alt="Logo" class="h-8 object-contain">
</div>

        <!-- Navigasi -->
        <nav class="flex-1 px-4 space-y-2 mt-4">
            <a href="#" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" stroke="white" stroke-width="2"
                    viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                    <rect width="7" height="9" x="3" y="3" rx="1"></rect>
                    <rect width="7" height="5" x="14" y="3" rx="1"></rect>
                    <rect width="7" height="9" x="14" y="12" rx="1"></rect>
                    <rect width="7" height="5" x="3" y="16" rx="1"></rect>
                </svg>
                <span>Dashboard</span>
            </a>
            <a href="#" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" stroke="white" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
                <span>Profil</span>
            </a>
            <a href="#" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" stroke="white" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path d="M10 2v8l3-3 3 3V2"></path>
                    <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20">
                    </path>
                </svg>
                <span>Kursus</span>
            </a>
            <a href="#" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" stroke="white" stroke-width="2"
                    viewBox="0 0 24 24">
                    <rect width="20" height="14" x="2" y="5" rx="2"></rect>
                    <line x1="2" x2="22" y1="10" y2="10"></line>
                </svg>
                <span>Pembayaran</span>
            </a>
            <a href="#" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" stroke="white" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                    <path d="M13 8H7"></path>
                    <path d="M17 12H7"></path>
                </svg>
                <span>Pesan</span>
            </a>
        </nav>
    </aside>

</body>

</html>

        <!-- Main Content -->
        <div class="flex-1">
            <!-- Header -->
            <header class="bg-orange-400 p-4 flex justify-between items-center">
                <h1 class="text-white text-lg">Kursus</h1>
                <div class="text-white">👤</div>
            </header>

            <!-- Page Content -->
            <main class="p-6">
                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>