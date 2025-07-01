@extends('layouts.admin')
@section('title', 'Tambah Instruktur')

@section('content')
<!-- Header -->
<div class="flex items-center gap-2 mb-4">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="#0E1212" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9 9h10M9 14h10" />
    </svg>
    <span class="text-[18px] font-bold text-[#0E1212] leading-[30px]">Tambah Instruktur</span>
</div>

<!-- Card Utama -->
<div class="w-full px-6">
    <div class="w-full bg-white shadow-md p-6 rounded-[5px]">
        <form action="{{ route('admin.instruktur.store') }}" method="POST" class="space-y-4">
            @csrf

             <!-- Subjudul -->
            <div class="text-[20px] text-[#0E1212] font-normal mb-1">Menambahkan Akun Instruktur</div>
            <div class="text-[14px] text-[#9197A0] font-normal mb-6">Hanya memerlukan data utama instruktur</div>

            <!-- Nama Lengkap -->
            <div class="flex items-center space-x-4">
                <label for="name" class="w-[180px] h-[60px] flex items-center text-sm text-[#0E1212]">Nama Lengkap</label>
                <input type="text" id="name" name="name" placeholder="Masukkan nama lengkap"
                    class="w-full h-[45px] px-4 text-sm border border-gray-300 rounded-sm focus:outline-none focus:ring-2 focus:ring-yellow-400"
                    required>
            </div>

            <!-- Email -->
            <div class="flex items-center space-x-4">
                <label for="email" class="w-[180px] h-[60px] flex items-center text-sm text-[#0E1212]">Email</label>
                <input type="email" id="email" name="email" placeholder="Masukkan email"
                    class="w-full h-[45px] px-4 text-sm border border-gray-300 rounded-sm focus:outline-none focus:ring-2 focus:ring-yellow-400"
                    required>
            </div>

            <!-- Kata Sandi -->
            <div class="flex items-center space-x-4">
                <label for="password" class="w-[180px] h-[60px] flex items-center text-sm text-[#0E1212]">Kata Sandi</label>
                <input type="password" id="password" name="password" placeholder="Masukkan kata sandi"
                    class="w-full h-[45px] px-4 text-sm border border-gray-300 rounded-sm focus:outline-none focus:ring-2 focus:ring-yellow-400"
                    required>
            </div>

            <!-- Catatan -->
            <div class="text-sm text-[#9197A0] mt-4">
                *Data selengkapnya akan diisi oleh instruktur
            </div>

            <!-- Tombol -->
            <div class="flex justify-end space-x-4 mt-6">
                <a href="{{ route('admin.users') }}"
                    class="w-[120px] h-[45px] border border-[#F5B40D] text-[#F5B40D] bg-white text-sm rounded-[5px] hover:bg-[#fff9ec] transition flex items-center justify-center">
                    Batal
                </a>
                <button type="submit"
                    class="w-[120px] h-[45px] bg-[#F5B40D] text-white text-sm rounded-[5px] border border-[#F5B40D] hover:bg-[#e6a900] transition">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
