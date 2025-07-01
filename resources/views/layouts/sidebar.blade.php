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
        <nav class="flex-1 px-4 py-4 space-y-2">
            <a href="{{ route('siswa.dashboard') }}"
                class="flex items-center gap-3 py-2 px-4 rounded-lg transition hover:bg-[#1f1f1f]">
                📊 <span>Dashboard</span>
            </a>
            <a href="{{ route('siswa.profil') }}"
                class="flex items-center gap-3 py-2 px-4 rounded-lg transition hover:bg-[#1f1f1f]">
                👤 <span>Profil Siswa</span>
            </a>
            <a href="{{ route('siswa.kursus') }}"
                class="flex items-center gap-3 py-2 px-4 rounded-lg transition hover:bg-[#1f1f1f]">
                📚 <span>Kursus</span>
            </a>
            <a href="{{ route('siswa.pembayaran') }}"
                class="flex items-center gap-3 py-2 px-4 rounded-lg transition hover:bg-[#1f1f1f]">
                💳 <span>Pembayaran</span>
            </a>
            <a href="" class="flex items-center gap-3 py-2 px-4 rounded-lg transition hover:bg-[#1f1f1f]">
                💬 <span>Pesan</span>
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
        <!-- Akun Dropdown -->
        <div class="relative group cursor-pointer">
            <div class="text-white">👤</div>
            <div
                class="absolute right-0 mt-2 w-40 bg-white text-black rounded shadow-lg opacity-0 group-hover:opacity-100 transition-opacity duration-200 z-50">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block w-full text-left px-4 py-2 hover:bg-gray-200">
                        🔓 Logout
                    </button>
                </form>
            </div>
        </div>

    </header>

    <!-- Page Content -->
    <main class="p-6">
        @yield('content')
    </main>
</div>
</div>
</body>

</html>