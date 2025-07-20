@extends('layouts.sidebar')

@section('content')
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
                        @php
                            $videoPath = \Illuminate\Support\Str::startsWith($kursus->vidio, 'videos/') 
                                ? $kursus->vidio 
                                : 'videos/' . $kursus->vidio;
                        @endphp
                        <video controls class="w-full h-full object-contain bg-black">
                            <source src="{{ asset('storage/' . $videoPath) }}" type="video/mp4">
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
                @php
                    $coverPath = Str::startsWith($kursus->cover, 'covers/') 
                        ? $kursus->cover 
                        : 'covers/' . $kursus->cover;
                @endphp
                <img src="{{ asset('storage/' . $coverPath) }}" alt="Cover Kursus"
                    class="w-full h-full object-contain">
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
@endsection
