@extends($mode === 'admin' ? 'layouts.admin' : 'layouts.instruktur')
@section('title', $mode === 'admin' ? 'Detail Instruktur' : 'Profil Saya')

@section('content')
<div class="flex items-center gap-2 mb-4">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" stroke="#0E1212" fill="none" viewBox="0 0 24 24" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round"
            d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zM12 14
                      c-3.31 0-6 2.69-6 6s2.69 6 6 6 6-2.69 6-6-2.69-6-6-6z" />
    </svg>
    <span class="text-[18px] text-[#0E1212] font-bold leading-[30px]">
        {{ $mode === 'admin' ? 'Detail Instruktur' : 'Profil Saya' }}
    </span>
</div>

@if($mode === 'admin')
    <div class="text-sm text-gray-500 italic mb-4">
        * Ini adalah tampilan profil instruktur (mode admin / read-only)
    </div>
@endif

@php
    $readonly = $mode === 'admin' ? 'readonly' : '';
    $disabled = $mode === 'admin' ? 'disabled' : '';
@endphp

<div class="w-full px-6">
    <div class="w-full bg-white shadow-md p-6 rounded-[5px]">
        <div class="text-[#0E1212] text-[20px] font-normal leading-[30px] mb-1">
            Profil ({{ $user->name }})
        </div>

        <div class="text-[#9197A0] text-[14px] font-normal leading-[24px] mb-6">DATA DIRI INSTRUKTUR</div>

        <form method="POST" action="{{ $mode === 'admin' ? '#' : route('instruktur.profil.update') }}">
            @csrf
            @if($mode !== 'admin')
                @method('POST')
            @endif

            <div class="space-y-4">
                <!-- Nama -->
                <label class="block text-sm font-medium text-[#0E1212]">Nama Lengkap</label>
                <input type="text" name="name" value="{{ $user->name }}" {{ $readonly }}
                    class="w-full border border-gray-300 rounded-sm px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400" />

                <!-- Nomor KTP -->
                <label class="block text-sm font-medium text-[#0E1212]">Nomor ID (KTP)</label>
                <input type="text" name="nomor_ktp" value="{{ $detail->nomor_ktp }}" {{ $readonly }}
                    class="w-full border border-gray-300 rounded-sm px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400" />

                <!-- Email -->
                <label class="block text-sm font-medium text-[#0E1212]">Email</label>
                <input type="email" name="email" value="{{ $user->email }}" {{ $readonly }}
                    class="w-full border border-gray-300 rounded-sm px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400" />

                <!-- Gender -->
                <label class="block text-sm font-medium text-[#0E1212]">Jenis Kelamin</label>
                <select name="jenis_kelamin"
                    class="w-full border border-gray-300 rounded-sm px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400 bg-white"
                    {{ $disabled }}>
                    <option value="">Pilih jenis kelamin</option>
                    <option value="Laki-laki" {{ $detail->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ $detail->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>

                <!-- Nomor HP -->
                <label class="block text-sm font-medium text-[#0E1212]">Nomor HP</label>
                <input type="text" name="nomor_hp" value="{{ $user->nomor_hp }}" {{ $readonly }}
                    class="w-full border border-gray-300 rounded-sm px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400" />

                <!-- Pekerjaan -->
                <label class="block text-sm font-medium text-[#0E1212]">Pekerjaan</label>
                <input type="text" name="pekerjaan" value="{{ $detail->pekerjaan }}" {{ $readonly }}
                    class="w-full border border-gray-300 rounded-sm px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400" />

                <!-- Perkenalan -->
                <label class="block text-sm font-medium text-[#0E1212]">Perkenalan</label>
                <textarea name="perkenalan" rows="3" {{ $readonly }}
                    class="w-full border border-gray-300 rounded-sm px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400">{{ $detail->perkenalan }}</textarea>

                <!-- Alamat -->
                <label class="block text-sm font-medium text-[#0E1212]">Alamat</label>
                <textarea name="alamat" rows="3" {{ $readonly }}
                    class="w-full border border-gray-300 rounded-sm px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400">{{ $detail->alamat }}</textarea>

                <div class="text-[#9197A0] text-[14px] font-normal leading-[24px] mt-6">DATA BANK</div>

                <!-- Nama Bank -->
                <label class="block text-sm font-medium text-[#0E1212]">Nama Bank</label>
                <input type="text" name="nama_bank" value="{{ $detail->nama_bank }}" {{ $readonly }}
                    class="w-full border border-gray-300 rounded-sm px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400" />

                <!-- Nama Rekening -->
                <label class="block text-sm font-medium text-[#0E1212]">Nama Rekening Bank</label>
                <input type="text" name="nama_rekening" value="{{ $detail->nama_rekening }}" {{ $readonly }}
                    class="w-full border border-gray-300 rounded-sm px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400" />

                <!-- Nomor Rekening -->
                <label class="block text-sm font-medium text-[#0E1212]">Nomor Rekening Bank</label>
                <input type="text" name="nomor_rekening" value="{{ $detail->nomor_rekening }}" {{ $readonly }}
                    class="w-full border border-gray-300 rounded-sm px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400" />
            </div>

            @if($mode !== 'admin')
                <div class="mt-6">
                    <button type="submit"
                        class="bg-yellow-400 hover:bg-yellow-500 text-white font-semibold px-4 py-2 rounded-sm">
                        Simpan Perubahan
                    </button>
                </div>
            @endif
        </form>
    </div>
</div>
@endsection
