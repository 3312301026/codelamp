@extends('layouts.instruktur')
@section('title', 'Edit Kursus')

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
        <!-- Judul -->
        <div class="text-[20px] text-[#0E1212] font-normal mb-1">Mengedit kursus</div>
        <div class="text-[14px] text-[#9197A0] font-normal mb-6">DATA DASAR KURSUS</div>

        <!-- Form -->
        <form action="{{ route('instruktur.kursus.update', $kursus->id_kursus) }}" method="POST"
            enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')

            <!-- instruktur -->
            <div class="flex items-center space-x-4">
                <label for="instruktur"
                    class="w-[150px] h-[70px] flex items-center text-sm text-[#0E1212]">instruktur</label>
                <input type="text" id="instruktur" name="instruktur" placeholder="Masukkan Nama instruktur"
                    value="{{ old('instruktur', $kursus->instruktur) }}"
                    class="w-[1124px] h-[50px] px-4 text-sm border border-gray-300 rounded-sm focus:outline-none focus:ring-2 focus:ring-yellow-400"
                    required>
            </div>

            <!-- Judul -->
            <div class="flex items-center space-x-4">
                <label for="judul_kursus"
                    class="w-[150px] h-[70px] flex items-center text-sm text-[#0E1212]">Judul</label>
                <input type="text" id="judul_kursus" name="judul_kursus" placeholder="Masukkan judul"
                    value="{{ old('judul_kursus', $kursus->judul_kursus) }}"
                    class="w-[1124px] h-[50px] px-4 text-sm border border-gray-300 rounded-sm focus:outline-none focus:ring-2 focus:ring-yellow-400"
                    required>
            </div>

            <!-- Kategori -->
            <div class="flex items-center space-x-4">
                <label for="kategori"
                    class="w-[150px] h-[70px] flex items-center text-sm text-[#0E1212]">Kategori</label>
                <input type="text" id="kategori" name="kategori" placeholder="Masukkan kategori"
                    value="{{ old('kategori', $kursus->kategori) }}"
                    class="w-[1124px] h-[50px] px-4 text-sm border border-gray-300 rounded-sm focus:outline-none focus:ring-2 focus:ring-yellow-400"
                    required>
            </div>

            <!-- Harga -->
            <div class="flex items-center space-x-4">
                <label for="harga_kursus"
                    class="w-[150px] h-[70px] flex items-center text-sm text-[#0E1212]">Harga</label>
                <input type="number" id="harga_kursus" name="harga_kursus" placeholder="Masukkan harga"
                    value="{{ old('harga_kursus', $kursus->harga_kursus) }}"
                    class="w-[1124px] h-[50px] px-4 text-sm border border-gray-300 rounded-sm focus:outline-none focus:ring-2 focus:ring-yellow-400"
                    required>
            </div>

            <!-- Status -->
            <div class="flex items-center space-x-4">
                <label for="status" class="w-[150px] h-[70px] flex items-center text-sm text-[#0E1212]">Status</label>
                <select id="status" name="status"
                    class="w-[1124px] h-[50px] px-4 text-sm border border-gray-300 rounded-sm focus:outline-none focus:ring-2 focus:ring-yellow-400"
                    required>
                    <option value="aktif" {{ old('status', $kursus->status) == 'aktif' ? 'selected' : '' }}>Aktif
                    </option>
                    <option value="nonaktif" {{ old('status', $kursus->status) == 'nonaktif' ? 'selected' : '' }}>
                        Nonaktif</option>
                </select>
            </div>

            <!-- Jumlah Siswa -->
            <div class="flex items-center space-x-4">
                <label for="jumlah_siswa" class="w-[150px] h-[70px] flex items-center text-sm text-[#0E1212]">Jumlah
                    Siswa</label>
                <input type="number" id="jumlah_siswa" name="jumlah_siswa" min="0"
                    value="{{ old('jumlah_siswa', $kursus->jumlah_siswa ?? 0) }}"
                    class="w-[1124px] h-[50px] px-4 text-sm border border-gray-300 rounded-sm focus:outline-none focus:ring-2 focus:ring-yellow-400">
            </div>

            <!-- Deskripsi -->
            <div class="flex items-start space-x-4">
                <label for="deskripsi"
                    class="w-[150px] h-[70px] flex items-center text-sm text-[#0E1212]">Deskripsi<br>Kursus</label>
                <textarea id="deskripsi" name="deskripsi" placeholder="Tulis deskripsi kursus"
                    class="w-[1124px] h-[92px] px-4 py-2 text-sm border border-gray-300 rounded-sm resize-none focus:outline-none focus:ring-2 focus:ring-yellow-400">{{ old('deskripsi', $kursus->deskripsi) }}</textarea>
            </div>

            <!-- Gambar & Video -->
            <div class="text-[14px] text-[#9197A0] font-normal mt-8">GAMBAR & VIDIO</div>

            <!-- Upload Cover -->
            <div class="flex items-start space-x-4">
                <label for="cover_kursus"
                    class="w-[150px] h-[239px] flex items-center justify-center text-sm text-[#0E1212]">Unggah
                    Cover<br>Kursus</label>
                <div
                    class="w-[1124px] h-[239px] bg-[#E8E6E6] rounded-sm flex flex-col items-center justify-center space-y-4">
                    @if($kursus->cover)
                    <img src="{{ asset('uploads/covers/' . $kursus->cover) }}" alt="Cover Kursus"
                        class="max-h-[120px] mb-4 object-contain">
                    @else
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-gray-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                    <div class="text-gray-700 font-semibold">Tambah Cover Kursus</div>
                    @endif
                    <label for="cover_kursus"
                        class="cursor-pointer w-[200px] h-[50px] bg-[#F5B40D] text-white flex items-center justify-center rounded-[5px] text-sm font-medium hover:bg-[#e6a900] transition">
                        Jelajahi File
                    </label>
                    <input type="file" id="cover_kursus" name="cover_kursus" class="hidden" accept="image/*">
                </div>
            </div>

            <!-- Upload Video -->
            <div class="flex items-start space-x-4 mt-6">
                <label for="vidio_kursus"
                    class="w-[150px] h-[239px] flex items-center justify-center text-sm text-[#0E1212]">Unggah
                    Vidio<br>Kursus</label>
                <div
                    class="w-[1124px] h-[239px] bg-[#E8E6E6] rounded-sm flex flex-col items-center justify-center space-y-4">
                    @if($kursus->vidio)
                    <video controls class="max-h-[120px] mb-4">
                        <source src="{{ asset('uploads/videos/' . $kursus->vidio) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    @else
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-gray-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                    <div class="text-gray-700 font-semibold">Tambah Vidio Kursus</div>
                    @endif
                    <label for="vidio_kursus"
                        class="cursor-pointer w-[200px] h-[50px] bg-[#F5B40D] text-white flex items-center justify-center rounded-[5px] text-sm font-medium hover:bg-[#e6a900] transition">
                        Jelajahi File
                    </label>
                    <input type="file" id="vidio_kursus" name="vidio_kursus" class="hidden" accept="video/*">
                </div>
            </div>

            <!-- Tombol -->
            <div class="flex justify-end space-x-4 mt-6">
                <button type="button" onclick="window.history.back()"
                    class="w-[150px] h-[50px] border border-[#F5B40D] text-[#F5B40D] bg-white text-sm rounded-[5px] hover:bg-[#fff9ec] transition">
                    Batal
                </button>
                <button type="submit"
                    class="w-[150px] h-[50px] bg-[#F5B40D] text-white text-sm rounded-[5px] border border-[#F5B40D] hover:bg-[#e6a900] transition">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
