@extends('layouts.instruktur')
@section('title', 'Detail Kursus')

@section('content')
<div class="mb-6">
    <!-- Header -->
    <div class="flex items-center gap-2 mb-6">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-[#0E1212]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 9h10M9 14h10" />
        </svg>
        <h1 class="text-xl font-semibold text-[#0E1212]">Mengelola Kursus</h1>
    </div>

    <!-- Card Container -->
    <div class="bg-white shadow rounded-xl p-6 space-y-8">
        <!-- Header Info -->
        <div>
            <h2 class="text-2xl font-bold text-gray-800">{{ $kursus->judul_kursus }}</h2>
            <p class="text-sm text-gray-500">Kategori: {{ $kursus->kategori }}</p>
            <p class="text-sm text-gray-500">Instruktur: {{ $kursus->instruktur->name ?? 'Instruktur tidak ditemukan' }}</p>
        </div>

        <!-- Media & Info -->
        <div class="flex flex-col lg:flex-row gap-6">
            <!-- Video + Deskripsi -->
            <div class="flex-1 bg-gray-100 rounded-lg overflow-hidden shadow">
                <!-- Video -->
                <div class="w-full aspect-video bg-black flex items-center justify-center">
                    @if ($kursus->vidio)
                        <video controls class="w-full h-full object-contain">
                            <source src="{{ asset('uploads/videos/' . $kursus->vidio) }}" type="video/mp4">
                            Browser Anda tidak mendukung pemutaran video.
                        </video>
                    @else
                        <p class="text-white text-sm">Belum ada video.</p>
                    @endif
                </div>
                <!-- Deskripsi -->
                <div class="p-4 h-[200px] overflow-y-auto bg-white">
                    <h3 class="text-lg font-semibold mb-2 text-gray-800">Deskripsi</h3>
                    <p class="text-sm text-gray-700 whitespace-pre-line">
                        {{ $kursus->deskripsi }}
                    </p>
                </div>
            </div>

            <!-- Info Singkat -->
            <div class="w-full lg:w-[370px] bg-white rounded-xl shadow border overflow-hidden">
                <div class="w-full aspect-[3/2] bg-gray-200">
                    <img src="{{ $kursus->cover ? asset('uploads/covers/' . $kursus->cover) : asset('images/default-cover.jpg') }}"
                         alt="Cover Kursus"
                         class="w-full h-full object-contain rounded-t-xl">
                </div>
                <div class="p-4 space-y-2">
                    <h3 class="text-xl font-bold text-gray-800">{{ $kursus->judul_kursus }}</h3>
                    <p class="text-sm text-gray-500">{{ $kursus->instruktur->name ?? '' }}</p>
                    <div class="flex justify-between items-center mt-4">
                        <span class="text-base font-bold text-green-600">
                            Rp{{ number_format($kursus->harga_kursus, 0, ',', '.') }}
                        </span>
                        <span class="bg-yellow-500 text-white text-sm px-3 py-1 rounded-full">
                            {{ $kursus->jumlah_siswa ?? 0 }} Siswa
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tujuan Kursus -->
        <div>
            <h3 class="text-xl font-semibold text-gray-800 mb-2">🎯 Tujuan Kursus</h3>
            <ul class="list-disc pl-5 text-gray-700 text-sm space-y-1">
                @forelse($kursus->tujuan as $tujuan)
                    <li>{{ $tujuan->deskripsi }}</li>
                @empty
                    <li class="text-gray-400 italic">Belum ada tujuan ditambahkan.</li>
                @endforelse
            </ul>
        </div>

        <!-- Materi Kursus -->
        <div>
            <div class="flex justify-between items-center mb-3">
                <h3 class="text-xl font-semibold text-gray-800">📚 Materi</h3>
                <a href="{{ route('materi.create', $kursus->id) }}"
                   class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold px-4 py-2 rounded-lg transition duration-200">
                    + Tambah Materi
                </a>
            </div>

            <div class="bg-gray-50 rounded-lg shadow p-4 max-h-[300px] overflow-y-auto">
                @forelse ($kursus->materi as $materi)
                    <details class="group py-2 cursor-pointer">
                        <summary class="flex justify-between items-center text-gray-800 font-medium hover:text-blue-700">
                            {{ $materi->judul }}
                            <svg class="w-5 h-5 group-open:rotate-180 transition-transform text-gray-600" fill="none" stroke="currentColor"
                                 stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </summary>
                        <div class="mt-2 ml-2 text-sm text-gray-700">
                            <p>{{ $materi->deskripsi }}</p>
                            @if ($materi->subMateri->count())
                                <ul class="mt-2 list-disc list-inside">
                                    @foreach ($materi->subMateri as $sub)
                                        <li>{{ $sub->judul }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </details>
                @empty
                    <p class="text-sm text-gray-500 italic">Belum ada materi yang ditambahkan.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
