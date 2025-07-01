@extends($mode === 'admin' ? 'layouts.admin' : 'layouts.sidebar')

@section('content')
<div class="p-6 bg-white min-h-screen">
    <!-- Judul -->
    <div class="flex items-center mb-1">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-gray-700" fill="none"
            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M5.121 17.804A13.937 13.937 0 0112 15c3.042 0 5.824 1.007 8.121 2.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>
        <h2 class="text-xl font-semibold">
            {{ $mode === 'admin' ? 'Detail Siswa' : 'Profil' }}
        </h2>
    </div>

    @if($mode === 'admin')
        <div class="text-sm text-gray-500 italic mb-4">
            * Ini adalah tampilan profil siswa (mode admin / read-only)
        </div>
    @endif

    <div class="bg-white rounded shadow-lg p-6">
        <p class="text-sm text-gray-500 mb-4 uppercase">Data Diri</p>
        <hr class="mb-6 border-gray-300">

        <form action="{{ $mode === 'admin' ? '#' : route('siswa.profil.update') }}" method="POST" class="space-y-4">
            @csrf
            @if($mode !== 'admin') @method('PUT') @endif

            @php
                $readonly = $mode === 'admin' ? 'readonly' : '';
                $disabled = $mode === 'admin' ? 'disabled' : '';
            @endphp

            <!-- Nama -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                <input type="text" id="name" name="name"
                    value="{{ old('name', $siswa->name ?? '') }}"
                    class="mt-1 block w-full {{ $readonly ? 'bg-gray-100 cursor-not-allowed' : '' }} border border-gray-300 rounded px-3 py-2"
                    {{ $readonly }}>
            </div>

            <!-- Nomor HP -->
            <div>
                <label for="nomor_hp" class="block text-sm font-medium text-gray-700">Nomor HP</label>
                <input type="text" id="nomor_hp" name="nomor_hp"
                    value="{{ old('nomor_hp', $siswa->nomor_hp ?? '') }}"
                    class="mt-1 block w-full {{ $readonly ? 'bg-gray-100 cursor-not-allowed' : '' }} border border-gray-300 rounded px-3 py-2"
                    {{ $readonly }}>
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email"
                    value="{{ old('email', $siswa->email ?? '') }}"
                    class="mt-1 block w-full bg-gray-100 cursor-not-allowed border border-gray-300 rounded px-3 py-2"
                    readonly>
            </div>

            @if($mode !== 'admin')
                <!-- Password Baru -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password Baru</label>
                    <input type="password" id="password" name="password"
                        class="mt-1 block w-full border border-gray-300 rounded px-3 py-2 focus:ring-[#F5B40D] focus:ring-1"
                        placeholder="Biarkan kosong jika tidak ingin mengganti" />
                </div>

                <!-- Konfirmasi -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password Baru</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        class="mt-1 block w-full border border-gray-300 rounded px-3 py-2 focus:ring-[#F5B40D] focus:ring-1"
                        placeholder="Ulangi password baru" />
                </div>

                <!-- Tombol -->
                <div class="flex justify-end space-x-2 pt-4">
                    <a href="{{ route('siswa.dashboard') }}"
                        class="px-4 py-2 border border-gray-300 rounded text-sm text-gray-600 hover:bg-gray-100 transition-colors">Batal</a>
                    <button type="submit"
                        class="px-4 py-2 text-white rounded bg-[#F5B40D] hover:bg-[#d99a00] transition-colors">
                        Simpan
                    </button>
                </div>
            @endif
        </form>
    </div>
</div>
@endsection
