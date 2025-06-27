<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard - CodeLamp</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Tambahkan di layouts.sidebar di bagian <head> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-/vXstFwS3N3tBi0bQh+Y6axhHEuAiDWnqzNQch2t2OdZb3AStRbLwT3xgPvU1O4JUL93gOAzY0bUrKIsw9d4Jw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.5.0/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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
            <a href="/Siswa/dashboard" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" stroke="white" stroke-width="2"
                    viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                    <rect width="7" height="9" x="3" y="3" rx="1"></rect>
                    <rect width="7" height="5" x="14" y="3" rx="1"></rect>
                    <rect width="7" height="9" x="14" y="12" rx="1"></rect>
                    <rect width="7" height="5" x="3" y="16" rx="1"></rect>
                </svg>
                <span>Dashboard</span>
            </a>
            <a href="/Siswa/profil" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" stroke="white" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
                <span>Profil</span>
            </a>
            <a href="/Siswa/kursus" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" stroke="white" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path d="M10 2v8l3-3 3 3V2"></path>
                    <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20">
                    </path>
                </svg>
                <span>Kursus</span>
            </a>
            <a href="/Siswa/pembayaran" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-gray-700">
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
    <header class="bg-[#FDB813] p-4 flex justify-between items-center">
        <!-- <h1 class="text-white text-lg">Kursus</h1> -->
        <button aria-label="Menu">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="none" viewBox="0 0 24 24"
                stroke="black">
                <path d="M3 6h18M3 12h18M3 18h18" stroke-width="2" stroke-linecap="round" />
            </svg>
        </button>

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