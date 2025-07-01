<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard - CodeLamp</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .rotate-180 {
            transform: rotate(180deg);
        }
    </style>
</head>

<body class="flex min-h-screen bg-[#FBE5C8]">

    <!-- Sidebar -->
    <aside class="w-64 bg-[#0E1212] text-white flex flex-col">
        <div class="flex items-center justify-start space-x-2 px-6 py-3 bg-white">
            <span class="font-bold text-lg" style="color:#F5B40D;">CodeLamp</span>
            <img src="{{ asset('gambar/logo1.png') }}" alt="Logo" class="h-8 object-contain">
        </div>

        <nav class="flex-1 px-4 py-4 space-y-2">
            <a href="{{ route('siswa.dashboard') }}"
                class="flex items-center gap-3 py-2 px-4 rounded-lg transition hover:bg-[#1f1f1f]">📊
                <span>Dashboard</span></a>
            <a href="{{ route('siswa.profil') }}"
                class="flex items-center gap-3 py-2 px-4 rounded-lg transition hover:bg-[#1f1f1f]">👤 <span>Profil
                    Siswa</span></a>
            <a href="{{ route('siswa.kursus') }}"
                class="flex items-center gap-3 py-2 px-4 rounded-lg transition hover:bg-[#1f1f1f]">📚
                <span>Kursus</span></a>
            <a href="{{ route('siswa.pembayaran') }}"
                class="flex items-center gap-3 py-2 px-4 rounded-lg transition hover:bg-[#1f1f1f]">💳
                <span>Pembayaran</span></a>
            <a href="#" class="flex items-center gap-3 py-2 px-4 rounded-lg transition hover:bg-[#1f1f1f]">💬
                <span>Pesan</span></a>
        </nav>
    </aside>

    <div class="flex-1 flex flex-col">
        <header class="bg-[#FDB813] px-6 py-4 flex items-center justify-between">
            <div
                class="w-[30px] h-[15px] border-[2px] border-black border-opacity-60 flex items-center justify-center bg-white">
                <div class="space-y-[3px]">
                    <div class="w-[20px] h-[2px] bg-black"></div>
                    <div class="w-[20px] h-[2px] bg-black"></div>
                    <div class="w-[20px] h-[2px] bg-black"></div>
                </div>
            </div>
            <div class="w-10 h-10 rounded-full border-2 border-black flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-black" fill="none" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5.121 17.804A13.937 13.937 0 0112 15c3.042 0 5.824 1.007 8.121 2.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </div>
        </header>

        <div class="p-6 flex-1 overflow-auto">
            <h1 class="text-xl font-bold text-gray-800 mb-6">Detail Kursus</h1>

            <div class="bg-white p-6 rounded-lg shadow-lg flex gap-6">

                <!-- Kiri: Info Kursus -->
                <div class="flex-1">
                    <h2 class="text-xl font-bold mb-1">{{ $kursus->judul_kursus }}</h2>
                    <p class="text-sm text-gray-600 mb-2">
                        Kategori: {{ $kursus->kategori }} |
                        Instruktur: {{ $kursus->instruktur->name ?? '-' }}
                    </p>
                    <p class="text-lg font-semibold text-yellow-500 mb-4">
                        Rp {{ number_format($kursus->harga_kursus, 0, ',', '.') }}
                    </p>

                    <!-- Video Kursus -->
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Video Kursus</h3>
                        <div class="aspect-video bg-black rounded-lg overflow-hidden">
                            @if ($kursus->vidio)
                                <video controls class="w-full h-full object-contain bg-black">
                                    <source src="{{ asset('uploads/videos/' . $kursus->vidio) }}" type="video/mp4">
                                    Browser Anda tidak mendukung pemutaran video.
                                </video>
                            @else
                                <div class="flex items-center justify-center h-full">
                                    <p class="text-white text-sm">Belum ada video.</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Deskripsi -->
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Deskripsi</h3>
                        <p class="text-sm text-gray-700 leading-relaxed mb-4">{{ $kursus->deskripsi }}</p>
                    </div>

                    <!-- Tujuan Kursus -->
                    @if($kursus->tujuan->count())
                        <div class="mb-8">
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">Tujuan Kursus</h3>
                            <ul class="list-disc list-inside text-sm text-gray-700 ml-4 space-y-1">
                                @foreach ($kursus->tujuan as $tujuan)
                                    <li>{{ $tujuan->deskripsi }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Materi Kursus -->
                    @if($kursus->materi->count())
                        <div class="mb-8">
                            <h3 class="text-xl font-bold text-gray-800 mb-4">Materi Kursus</h3>
                            @foreach ($kursus->materi as $materi)
                                <div class="accordion-item border border-gray-300 rounded-lg mb-2">
                                    <div
                                        class="accordion-header flex items-center justify-between p-4 cursor-pointer bg-gray-50 hover:bg-gray-100">
                                        <span class="font-medium text-gray-700">{{ $materi->judul }}</span>
                                        <svg class="w-4 h-4 text-gray-600 transition-transform duration-300" fill="none"
                                            stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </div>
                                    <div class="accordion-content hidden p-4 text-sm text-gray-600 border-t border-gray-200">
                                        <p>{{ $materi->deskripsi }}</p>
                                        @if($materi->subMateri->count())
                                            <ul class="list-disc list-inside mt-2 space-y-1">
                                                @foreach($materi->subMateri as $sub)
                                                    <li>{{ $sub->judul }}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                <!-- Kanan: Gambar dan Beli -->
                <div class="w-80 bg-white rounded-2xl overflow-hidden shadow-lg h-fit">
                    <div class="aspect-[3/2] bg-gray-100">
                        <img src="{{ $kursus->cover ? asset('uploads/covers/' . $kursus->cover) : asset('images/default-cover.jpg') }}"
                            alt="Cover Kursus" class="w-full h-full object-contain">
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-bold mb-1">{{ $kursus->judul_kursus }}</h3>
                        <p class="text-sm text-gray-600 mb-2">{{ $kursus->instruktur->name ?? '-' }}</p>
                        <p class="text-yellow-500 font-semibold mb-2">
                            Rp {{ number_format($kursus->harga_kursus, 0, ',', '.') }}
                        </p>
                        <div class="text-center">
                            <a href="{{ route('siswa.pembayaran.form', $kursus->id) }}"
                                class="inline-block bg-yellow-400 text-white px-6 py-2 rounded-full text-base font-semibold text-center hover:bg-yellow-500 transition-colors">
                                Beli Sekarang
                            </a>
                        </div>
                    </div>
                </div>


                <!-- Accordion Script -->
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const headers = document.querySelectorAll('.accordion-header');
                        headers.forEach(header => {
                            header.addEventListener('click', () => {
                                const item = header.closest('.accordion-item');
                                const content = item.querySelector('.accordion-content');
                                const icon = header.querySelector('svg');

                                const isOpen = content.style.display === 'block';

                                document.querySelectorAll('.accordion-content').forEach(c => c.style.display = 'none');
                                document.querySelectorAll('.accordion-item svg').forEach(i => i.classList.remove('rotate-180'));

                                if (!isOpen) {
                                    content.style.display = 'block';
                                    icon.classList.add('rotate-180');
                                }
                            });
                        });
                    });
                </script>
</body>

</html>
