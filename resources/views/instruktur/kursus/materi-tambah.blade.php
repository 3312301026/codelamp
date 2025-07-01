@extends('layouts.instruktur')
@section('title', 'Tambah Materi')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">📘 Tambah Materi Baru</h2>

    <form action="{{ route('materi.store') }}" method="POST">
        @csrf

        <!-- Hidden ID Kursus -->
        <input type="hidden" name="kursus_id" value="{{ $kursus->id }}">

        <!-- Judul Materi -->
        <div class="mb-4">
            <label for="judul" class="block text-sm font-medium text-gray-700">Judul Materi</label>
            <input type="text" name="judul" id="judul" value="{{ old('judul') }}"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            @error('judul')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Deskripsi -->
        <div class="mb-4">
            <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" rows="4"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('deskripsi') }}</textarea>
            @error('deskripsi')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Sub Materi -->
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Sub Materi (opsional)</label>
            <div id="sub-materi-wrapper">
                <input type="text" name="sub_materi[]" placeholder="Judul Sub Materi"
                    class="mt-2 block w-full border-gray-300 rounded-md shadow-sm">
            </div>
            <button type="button" onclick="tambahSubMateri()"
                class="mt-2 text-sm text-blue-600 hover:underline">+ Tambah Sub Materi</button>
        </div>

        <!-- Tujuan Kursus -->
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Tujuan Kursus (opsional)</label>
            <div id="tujuan-wrapper">
                <input type="text" name="tujuan[]" placeholder="Deskripsi Tujuan"
                    class="mt-2 block w-full border-gray-300 rounded-md shadow-sm">
            </div>
            <button type="button" onclick="tambahTujuan()"
                class="mt-2 text-sm text-blue-600 hover:underline">+ Tambah Tujuan</button>
        </div>

        <!-- Tombol -->
        <div class="flex justify-end space-x-3 mt-6">
            <a href="{{ route('instruktur.kursus.show', $kursus->id) }}"
                class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-md text-sm font-semibold">
                Batal
            </a>
            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm font-semibold">
                Simpan Materi
            </button>
        </div>
    </form>
</div>

<!-- JS dinamis -->
<script>
    function tambahSubMateri() {
        const wrapper = document.getElementById('sub-materi-wrapper');
        const input = document.createElement('input');
        input.type = 'text';
        input.name = 'sub_materi[]';
        input.placeholder = 'Judul Sub Materi';
        input.className = 'mt-2 block w-full border-gray-300 rounded-md shadow-sm';
        wrapper.appendChild(input);
    }

    function tambahTujuan() {
        const wrapper = document.getElementById('tujuan-wrapper');
        const input = document.createElement('input');
        input.type = 'text';
        input.name = 'tujuan[]';
        input.placeholder = 'Deskripsi Tujuan';
        input.className = 'mt-2 block w-full border-gray-300 rounded-md shadow-sm';
        wrapper.appendChild(input);
    }
</script>
@endsection
