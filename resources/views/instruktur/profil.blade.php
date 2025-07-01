@extends('layouts.instruktur')
@section('title', 'Profil')
@section('content')

    <div class="flex items-center gap-2 mb-4">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" stroke="#0E1212" fill="none" viewBox="0 0 24 24"
            stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zM12 14
                          c-3.31 0-6 2.69-6 6s2.69 6 6 6 6-2.69 6-6-2.69-6-6-6z" />
        </svg>
        <span class="text-[18px] text-[#0E1212] font-bold leading-[30px]">Profil</span>
    </div>

    <div class="flex justify-center">
        <div class="w-[1086px] bg-white shadow-md p-6 rounded-[5px]">
            <div class="text-[#0E1212] text-[20px] font-normal leading-[30px] mb-1">
                Profil ({{ $user->name }})
            </div>

            <div class="text-[#9197A0] text-[14px] font-normal leading-[24px] mb-6">
                DATA DIRI INSTRUKTUR
            </div>

            <form method="POST" action="{{ route('instruktur.profil.update') }}">
                @csrf

                <div class="space-y-2">
                    <!-- Nama -->
                    <div class="flex items-center space-x-4">
                        <label for="name" class="text-[#0E1212] text-sm w-[150px] h-[70px] flex items-center">
                            Nama Lengkap
                        </label>
                        <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}"
                            class="border border-gray-300 rounded-sm h-[50px] w-[1124px] px-4 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400"
                            placeholder="Masukkan nama lengkap">
                    </div>

                    <!-- Nomor KTP -->
                    <div class="flex items-center space-x-4">
                        <label for="nomor_ktp" class="text-[#0E1212] text-sm w-[150px] h-[70px] flex items-center">
                            Nomor ID (KTP)
                        </label>
                        <input type="text" id="nomor_ktp" name="nomor_ktp"
                            value="{{ old('nomor_ktp', $detail->nomor_ktp) }}"
                            class="border border-gray-300 rounded-sm h-[50px] w-[1124px] px-4 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400"
                            placeholder="Masukkan nomor KTP">
                    </div>

                    <!-- Email -->
                    <div class="flex items-center space-x-4">
                        <label for="email" class="text-[#0E1212] text-sm w-[150px] h-[70px] flex items-center">
                            Email
                        </label>
                        <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"
                            class="border border-gray-300 rounded-sm h-[50px] w-[1124px] px-4 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400"
                            placeholder="Masukkan email">
                    </div>

                    <!-- Gender -->
                    <div class="flex items-center space-x-4">
                        <label for="gender" class="text-[#0E1212] text-sm w-[150px] h-[70px] flex items-center">
                            Jenis Kelamin
                        </label>
                        <select id="jenis_kelamin" name="jenis_kelamin"
                            class="border border-gray-300 rounded-sm h-[50px] w-[1124px] px-4 text-sm bg-white focus:outline-none focus:ring-2 focus:ring-yellow-400">
                            <option value="">Pilih jenis kelamin</option>
                            <option value="Laki-laki" {{ old('jenis_kelamin', $detail->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ old('jenis_kelamin', $detail->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>

                    <!-- Nomor HP -->
                    <div class="flex items-center space-x-4">
                        <label for="nomor_hp" class="text-[#0E1212] text-sm w-[150px] h-[70px] flex items-center">
                            Nomor HP
                        </label>
                        <input type="text" id="nomor_hp" name="nomor_hp" value="{{ old('nomor_hp', $user->nomor_hp) }}"
                            class="border border-gray-300 rounded-sm h-[50px] w-[1124px] px-4 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400"
                            placeholder="Masukkan nomor HP">
                    </div>

                    <!-- Pekerjaan -->
                    <div class="flex items-center space-x-4">
                        <label for="pekerjaan" class="text-[#0E1212] text-sm w-[150px] h-[70px] flex items-center">
                            Pekerjaan
                        </label>
                        <input type="text" id="pekerjaan" name="pekerjaan"
                            value="{{ old('pekerjaan', $detail->pekerjaan) }}"
                            class="border border-gray-300 rounded-sm h-[50px] w-[1124px] px-4 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400"
                            placeholder="Masukkan pekerjaan">
                    </div>

                    <!-- Perkenalan -->
                    <div class="flex items-center space-x-4">
                        <label for="perkenalan"
                            class="text-[#0E1212] text-sm w-[150px] h-[70px] flex flex-col justify-center">
                            Perkenalan
                        </label>
                        <textarea id="perkenalan" name="perkenalan"
                            class="border border-gray-300 rounded-sm h-[92px] w-[1124px] px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400"
                            placeholder="Tulis perkenalan singkat">{{ old('perkenalan', $detail->perkenalan) }}</textarea>
                    </div>

                    <!-- Alamat -->
                    <div class="flex items-center space-x-4">
                        <label for="alamat" class="text-[#0E1212] text-sm w-[150px] h-[70px] flex flex-col justify-center">
                            Alamat
                        </label>
                        <textarea id="alamat" name="alamat"
                            class="border border-gray-300 rounded-sm h-[92px] w-[1124px] px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400"
                            placeholder="Masukkan alamat lengkap">{{ old('alamat', $detail->alamat) }}</textarea>
                    </div>

                    <!-- Subjudul Data Bank -->
                    <div class="text-[#9197A0] text-[14px] font-normal leading-[24px] mt-8">
                        DATA BANK
                    </div>

                    <!-- Nama Bank -->
                    <div class="flex items-center space-x-4">
                        <label for="nama_bank" class="text-[#0E1212] text-sm w-[150px] h-[70px] flex items-center">
                            Nama Bank
                        </label>
                        <input type="text" id="nama_bank" name="nama_bank"
                            value="{{ old('nama_bank', $detail->nama_bank) }}"
                            class="border border-gray-300 rounded-sm h-[50px] w-[1124px] px-4 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400"
                            placeholder="Masukkan nama bank">
                    </div>

                    <!-- Nama Rekening -->
                    <div class="flex items-center space-x-4">
                        <label for="nama_rekening" class="text-[#0E1212] text-sm w-[150px] h-[70px] flex items-center">
                            Nama Rekening Bank
                        </label>
                        <input type="text" id="nama_rekening" name="nama_rekening"
                            value="{{ old('nama_rekening', $detail->nama_rekening) }}"
                            class="border border-gray-300 rounded-sm h-[50px] w-[1124px] px-4 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400"
                            placeholder="Masukkan nama pemilik rekening">
                    </div>

                    <!-- Nomor Rekening -->
                    <div class="flex items-center space-x-4">
                        <label for="nomor_rekening"
                            class="text-[#0E1212] text-sm w-[150px] h-[70px] flex flex-col justify-center">
                            Nomor Rekening Bank
                        </label>
                        <input type="text" id="nomor_rekening" name="nomor_rekening"
                            value="{{ old('nomor_rekening', $detail->nomor_rekening) }}"
                            class="border border-gray-300 rounded-sm h-[50px] w-[1124px] px-4 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400"
                            placeholder="Masukkan nomor rekening">
                    </div>

                    <!-- Tombol -->
                    <div class="flex justify-end space-x-4 mt-6">
                        <a href="{{ route('instruktur.dashboard') }}"
                            class="w-[150px] h-[50px] border border-[#F5B40D] text-[#F5B40D] bg-white text-sm rounded-[5px] flex items-center justify-center hover:bg-[#fff9ec] transition">
                            Batal
                        </a>
                        <button type="submit"
                            class="w-[150px] h-[50px] bg-[#F5B40D] text-white text-sm rounded-[5px] border border-[#F5B40D] hover:bg-[#e6a900] transition">
                            Simpan
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection