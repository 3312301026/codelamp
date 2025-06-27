@extends('layouts.instruktur')
@section('title', 'Detail Kursus')

@section('content')
<!-- Header -->
<div class="flex items-center gap-2 mb-4">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="#0E1212"
        stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9 9h10M9 14h10" />
    </svg>
    <span class="text-[18px] font-bold text-[#0E1212] leading-[30px]">Mengelola Kursus</span>
</div>

<!-- Card Utama -->
<div class="flex justify-center">
    <div class="w-full max-w-[1431px] bg-white shadow-md p-6 rounded-[5px]">
        <!-- Judul (ambil dari $kursus->judul_kursus) -->
        <div class="text-[20px] text-[#0E1212] font-bold mb-1">
            {{ $kursus->judul_kursus }}
        </div>

        <!-- Kategori (ambil dari $kursus->kategori) -->
        <div class="text-[15px] text-[#000000] font-normal mb-1">
            Kategori {{ $kursus->kategori }}
        </div>

        <!-- Instruktur (ambil dari $kursus->instruktur) -->
        <div class="text-[15px] text-[#000000] font-normal mb-6">
            {{ $kursus->instruktur }}
        </div>

        <!-- Kontainer 2 Kolom -->
        <div class="flex flex-col lg:flex-row gap-6 mb-8">
            <!-- KIRI: CARD COVER & DESKRIPSI -->
            <div class="w-[943px] h-[697px] bg-white border rounded shadow overflow-hidden">
                <!-- Video -->
                <div class="w-full h-[400px] overflow-hidden bg-black flex items-center justify-center">
                    @if ($kursus->vidio_kursus)
                    <video controls class="w-full h-full object-cover">
                        <source src="{{ asset('uploads/vidios/' . $kursus->vidio_kursus) }}" type="video/mp4">
                        Browser Anda tidak mendukung pemutaran video.
                    </video>
                    @else
                    <div class="text-gray-500">Belum ada video yang diunggah.</div>
                    @endif
                </div>

                <!-- Deskripsi -->
                <div class="p-4 h-[297px] overflow-y-auto">
                    <h3 class="text-lg font-semibold text-[#0E1212] mb-2">Deskripsi</h3>
                    <p class="text-sm text-[#0E1212] whitespace-pre-line">
                        {{ $kursus->deskripsi }}
                    </p>
                </div>
            </div>

            <!-- KANAN: CARD COURSE LAIN -->
            <div class="w-[372px] h-[401px] bg-white rounded-lg overflow-hidden shadow-md">
                <img src="{{ $kursus->cover ? asset('uploads/covers/' . $kursus->cover) : asset('images/default-cover.jpg') }}"
                    alt="Cover Course" class="w-full h-[180px] object-cover rounded-t-lg">
                <div class="p-4">
                    <h3 class="text-lg font-bold mb-1 leading-tight">{{ $kursus->judul_kursus }}</h3>
                    <p class="text-sm text-gray-600 mb-2">{{ $kursus->instruktur }}</p>
                    <div class="flex justify-end mb-4">
                        <p class="text-black font-semibold">Rp{{ number_format($kursus->harga_kursus, 0, ',', '.') }}
                        </p>
                    </div>
                    <div class="text-center">
                        <button class="bg-[#F5B40D] text-white text-sm font-semibold rounded w-[150px] h-[50px]">
                            {{ $kursus->jumlah_siswa }} Siswa
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Header Materi di luar card -->
<h2 class="text-xl font-bold text-[#0E1212] mb-3">Materi</h2>

<!-- CARD MATERI -->
<div class="w-[945px] h-[280px] bg-[#E8E6E6] rounded shadow p-6 overflow-hidden">
    <div class="flex flex-col divide-y divide-gray-300">
        @php
        $materis = [
            'Pengantar Pembelajaran' => 'Materi pengantar pembelajaran akan membahas tujuan kursus dan struktur umum pembelajaran.',
            'Pengenalan Bahasa' => 'Pengenalan dasar tentang struktur bahasa dan kosakata umum yang digunakan.',
            'Percakapan Dasar' => 'Materi berisi latihan percakapan sehari-hari seperti menyapa, bertanya arah, dan lainnya.',
            'Keterampilan Berbicara & Menulis Menengah' => 'Latihan menulis kalimat kompleks dan berbicara secara spontan dengan struktur menengah.',
        ];
        @endphp

        @foreach ($materis as $judul => $isi)
        <details class="group bg-[#E8E6E6] py-3 cursor-pointer" style="padding-left: 0; padding-right: 0;">
            <summary class="flex justify-between items-center list-none text-[#0E1212] font-semibold select-none px-2">
                {{ $judul }}
                <svg class="w-5 h-5 text-[#0E1212] group-open:rotate-180 transition-transform duration-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" >
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
            </summary>
            <p class="mt-2 text-sm text-[#0E1212] px-2">
                {{ $isi }}
            </p>
        </details>
        @endforeach
    </div>
</div>


        <!-- Tombol Kembali -->
        <div class="flex justify-end mt-6">
            <button class="bg-[#F5B40D] text-white text-sm font-semibold rounded w-[150px] h-[50px]">
                + Materi
            </button>
        </div>

    </div>
</div>
@endsection
