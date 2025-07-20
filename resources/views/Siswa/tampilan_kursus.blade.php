@extends('layouts.sidebar')

@section('content')
    <h2 class="text-2xl font-bold mb-6">Daftar Kursus Tersedia</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($kursusList as $kursus)
            <div class="bg-white rounded-lg shadow p-4">
                @php
                    $coverPath = \Illuminate\Support\Str::startsWith($kursus->cover, 'covers/') ? $kursus->cover : 'covers/' . $kursus->cover;
                @endphp
                <div class="w-full h-48 bg-gray-100 flex items-center justify-center overflow-hidden rounded mb-4">
                    <img src="{{ $kursus->cover ? asset('storage/' . $coverPath) : asset('images/default-cover.jpg') }}"
                         alt="Cover" class="max-h-full max-w-full object-contain">
                </div>

                <h3 class="font-semibold text-lg">{{ $kursus->judul_kursus }}</h3>
                <p class="text-sm text-gray-600">Pengajar: {{ $kursus->instruktur->name ?? 'Tidak diketahui' }}</p>
                <p class="text-sm text-gray-500">Kategori: {{ $kursus->kategori }}</p>
                <p class="text-lg font-bold text-orange-500 mt-2">Rp. {{ number_format($kursus->harga_kursus, 0, ',', '.') }}</p>
                <p class="text-sm text-gray-500 mt-1">Jumlah Siswa: {{ $kursus->jumlah_siswa }}</p>
                <a href="{{ route('siswa.kursus.detail', $kursus->id) }}"
                   class="mt-4 inline-block w-full bg-orange-500 hover:bg-orange-600 text-white py-2 text-center rounded">
                    Lihat Detail
                </a>
            </div>
        @empty
            <p class="col-span-3 text-center text-gray-500">Belum ada kursus yang tersedia.</p>
        @endforelse
    </div>
@endsection
