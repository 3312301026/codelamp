@extends('layouts.sidebar')

@section('content')
<h2 class="text-2xl font-bold mb-6">Daftar Kursus Tersedia</h2>

<div class="grid grid-cols-3 gap-6">
    @forelse($kursusList as $kursus)
    <div class="bg-white rounded-lg shadow p-4">
        {{-- <img src="{{ asset('storage/cover/' . $kursus->cover) }}" alt="Cover" class="rounded mb-4 w-full h-48 object-cover"> --}}
        <img src="{{ $kursus->cover ? asset('uploads/covers/' . $kursus->cover) : asset('images/default-cover.jpg') }}">

        <h3 class="font-semibold text-lg">{{ $kursus->judul_kursus }}</h3>
        <p class="text-sm text-gray-600">Pengajar: {{ $kursus->instruktur->name ?? 'Tidak diketahui' }}</p>
        <p class="text-sm text-gray-500">Kategori: {{ $kursus->kategori }}</p>
        <p class="text-lg font-bold text-orange-500 mt-2">Rp. {{ number_format($kursus->harga_kursus, 0, ',', '.') }}</p>
        <p class="text-sm text-gray-500 mt-1">Jumlah Siswa: {{ $kursus->jumlah_siswa }}</p>
        <a href="{{ route('siswa.kursus.detail', $kursus->id) }}" class="mt-4 inline-block w-full bg-orange-500 hover:bg-orange-600 text-white py-2 text-center rounded">
            Lihat Detail
        </a>
    </div>
    @empty
    <p class="col-span-3 text-center text-gray-500">Belum ada kursus yang tersedia.</p>
    @endforelse
</div>
@endsection
