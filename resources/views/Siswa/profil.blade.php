@extends('layouts.sidebar')

@section('content')
<div class="p-6 bg-white min-h-screen">
    <div class="bg-white rounded shadow-lg p-6">
        {{-- Judul dengan ikon --}}
        <div class="flex items-center mb-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-gray-700" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M5.121 17.804A13.937 13.937 0 0112 15c3.042 0 5.824 1.007 8.121 2.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            <h2 class="text-xl font-semibold">Profil</h2>
        </div>

        <p class="text-sm text-gray-500 mb-4 uppercase">Data Diri Anda</p>
        <hr class="mb-6 border-gray-300">

        <form action="{{ route('loginSiswa') }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="nama" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                <input type="text" id="nama" name="nama"
                    class="mt-1 block w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-1 focus:ring-[#F5B40D]"
                    placeholder="Masukkan nama lengkap Anda" value="" />
            </div>

            <div>
                <label for="nomor_ktp" class="block text-sm font-medium text-gray-700">Nomor ID / KTP</label>
                <input type="number" id="nomor_ktp" name="nomor_ktp"
                    class="mt-1 block w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-1 focus:ring-[#F5B40D]"
                    placeholder="Masukkan nomor ID / KTP Anda" value="" />
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email"
                    class="mt-1 block w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-1 focus:ring-[#F5B40D]"
                    placeholder="Masukkan alamat email Anda" value="" />
            </div>

            <div>
                <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                <input type="text" id="jenis_kelamin" name="jenis_kelamin"
                    class="mt-1 block w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-1 focus:ring-[#F5B40D]"
                    placeholder="Contoh: Laki-laki / Perempuan" value="" />
            </div>

            <div>
                <label for="no_hp" class="block text-sm font-medium text-gray-700">Nomor HP</label>
                <input type="number" id="no_hp" name="no_hp"
                    class="mt-1 block w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-1 focus:ring-[#F5B40D]"
                    placeholder="Masukkan nomor HP Anda" value="" />
            </div>

            <div>
                <label for="tingkat_pelajar" class="block text-sm font-medium text-gray-700">Tingkat Pelajar</label>
                <input type="text" id="tingkat_pelajar" name="tingkat_pelajar"
                    class="mt-1 block w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-1 focus:ring-[#F5B40D]"
                    placeholder="Contoh: Pemula / Menengah / Mahir" value="" />
            </div>

            <div>
                <label for="pertanyaan" class="block text-sm font-medium text-gray-700">Pertanyaan</label>
                <input type="text" id="pertanyaan" name="pertanyaan"
                    class="mt-1 block w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-1 focus:ring-[#F5B40D]"
                    placeholder="Jika ada pertanyaan terkait profil Anda" value="" />
            </div>

            <div>
                <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                <textarea id="alamat" name="alamat" rows="3"
                    class="mt-1 block w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-1 focus:ring-[#F5B40D]"
                    placeholder="Masukkan alamat lengkap Anda"></textarea>
            </div>

            <div class="flex justify-end space-x-2 pt-4">
                <a href="{{ route('dashboardSiswa') }}"
                    class="px-4 py-2 border border-gray-300 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors">Batal</a>
                <button type="submit"
                    class="px-4 py-2 text-white rounded transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2"
                    style="background-color: #F5B40D;"
                    onmouseover="this.style.backgroundColor='#d99a00'"
                    onmouseout="this.style.backgroundColor='#F5B40D'">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
