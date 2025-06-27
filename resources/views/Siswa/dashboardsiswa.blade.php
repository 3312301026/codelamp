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

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
        <!-- Navbar Atas -->
        <header class="bg-[#FDB813] px-6 py-4 flex items-center justify-end">
            <div class="w-10 h-10 rounded-full border-2 border-black flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-black" fill="none" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5.121 17.804A13.937 13.937 0 0112 15c3.042 0 5.824 1.007 8.121 2.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </div>
        </header>

        <!-- Konten Utama -->
        <div class="p-6 px-6">
            <div class="text-center mb-6">
                <h1 class="text-xl font-bold text-gray-800">Apa yang Ingin Anda Pelajari hari ini?</h1>
            </div>

            <!-- Search Box -->
            <div class="mb-6 flex justify-center">
                <input type="text" placeholder="Search"
                    class="w-[1086px] h-[50px] px-4 border border-gray-300 rounded-[5px] focus:outline-none focus:ring-2 focus:ring-yellow-400 shadow">
            </div>

            <!-- Leaderboard -->
            <div class="flex justify-center mt-6">
                <div class="w-[1086px] h-[270px] rounded-[10px] flex items-center justify-center relative overflow-hidden shadow-xl bg-[radial-gradient(circle_at_center,_#FFFFFF,_#0E1822)]">
                    <div class="absolute inset-0 flex flex-col items-center justify-center pointer-events-none z-0">
                        <h2 class="text-yellow-400 font-bold text-lg mb-2">Skor tertinggi</h2>
                        <img src="/images/logo.png" alt="Logo" class="w-24 opacity-30" />
                    </div>
                    <div class="grid grid-cols-3 w-full px-10 text-white text-sm font-medium z-10">
                        <ul class="space-y-1">
                            <li><span class="text-yellow-400 font-bold">1 🏅</span> Anisa Yulia</li>
                            <li>2 🥈 Anna Taufan</li>
                            <li>3 🥉 Anna Taufan</li>
                            <li>4 🥈 Anna Taufan</li>
                            <li>5 🥉 Anna Taufan</li>
                        </ul>
                        <div></div>
                        <ul class="space-y-1 text-right">
                            <li>6 🥈 Anisa Yulia</li>
                            <li>7 🥉 Anna Taufan</li>
                            <li>8 🥈 Anna Taufan</li>
                            <li>9 🥉 Anna Taufan</li>
                            <li>10 🥈 Anna Taufan</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Kartu Kursus -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-10">
                <!-- Ulangi contoh kartu kursus -->
                @for ($i = 0; $i < 3; $i++)
                @php
                    $gambar = ['gambar3.jpg','gambar2.jpg','DBS Decoding.png'];
                @endphp
                <div class="bg-white rounded-2xl overflow-hidden shadow-lg">
                    <img src="{{ asset('gambar/' . $gambar[$i]) }}" alt="Course Image" class="w-full h-40 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-bold mb-1">Bahasa Inggris Sehari-hari untuk Percakapan</h3>
                        <p class="text-sm text-gray-600 mb-2">Arpend, S.Pd</p>
                        <p class="text-yellow-500 font-semibold mb-2">Rp. 240.000,-</p>
                        <div class="text-center">
                            <span class="inline-block bg-yellow-400 text-white px-4 py-1 rounded-full text-sm font-semibold">
                                36 Siswa
                            </span>
                        </div>
                    </div>
                </div>
                @endfor
            </div>
        </div>
    </div>
</body>

</html>
