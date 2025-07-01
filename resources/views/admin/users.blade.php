@extends('layouts.admin')
@section('title', 'Pengguna')

@section('content')
    <div class="flex items-center gap-2 mb-4">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" stroke="#0E1212" fill="none" viewBox="0 0 24 24"
            stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13h14l-7 7-7-7z" />
        </svg>
        <span class="text-[18px] text-[#0E1212] font-bold leading-[30px]">Mengelola Akun</span>
    </div>

    <div class="w-full px-6">
    <div class="w-full bg-white shadow-md p-6 rounded-[5px]">
            <div class="text-[#0E1212] text-[20px] font-normal leading-[30px] mb-1">
                Instruktur
            </div>
            <div class="text-[#9197A0] text-[14px] font-normal leading-[24px] mb-2">
                Daftar Akun Instruktur
            </div>

            <div class="flex justify-between items-center mb-6">
                <div class="flex items-center gap-4">
                    <div class="text-[#0E1212] text-[14px] font-normal leading-[24px]">
                        Tambahkan Akun Baru Instruktur
                    </div>
                    <a href="{{ route('admin.instruktur.create') }}"
                        class="inline-block w-[150px] h-[40px] bg-[#F5B40D] text-white text-sm rounded-[5px] border border-[#F5B40D] hover:bg-[#e6a900] transition text-center leading-[40px]">
                        Menambahkan
                    </a>
                </div>
                <div>
                    <input type="text"
                        class="w-[333px] h-[50px] border border-gray-300 rounded-sm px-4 text-[16px] leading-[24px] text-[#9197A0] focus:outline-none focus:ring-2 focus:ring-yellow-400"
                        placeholder="Search">
                </div>
            </div>

            <table class="w-full border-collapse text-black">
                <thead>
                    <tr class="bg-[#E8E6E6] font-bold text-left">
                        <th class="px-4 py-2 border-b border-gray-300">No</th>
                        <th class="px-4 py-2 border-b border-gray-300">Nama</th>
                        <th class="px-4 py-2 border-b border-gray-300">Email</th>
                        <th class="px-4 py-2 border-b border-gray-300">No HP</th>
                        <th class="px-4 py-2 border-b border-gray-300">Pekerjaan</th>
                        <th class="px-4 py-2 border-b border-gray-300">Alamat</th>
                        <th class="px-4 py-2 border-b border-gray-300">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $index => $user)
                        <tr class="{{ $loop->even ? 'bg-[#E8E6E6]' : 'bg-[#FFFFFF]' }}">
                            <td class="px-4 py-2 border-b border-gray-300">{{ $index + 1 }}</td>
                            <td class="px-4 py-2 border-b border-gray-300">{{ $user->name }}</td>
                            <td class="px-4 py-2 border-b border-gray-300">{{ $user->email }}</td>
                            <td>{{ $user->nomor_hp ?? '-' }}</td>
                            <td>{{ $user->instrukturDetail->pekerjaan ?? '-' }}</td>
                            <td>{{ $user->instrukturDetail->alamat ?? '-' }}</td>
                            <td class="px-4 py-2 border-b border-gray-300">
                                <div class="flex gap-2">
                                    <!-- Tombol Detail -->
                                    <a href="{{ route('admin.instruktur.detail', $user->id) }}" class="w-[51px] h-[30px] bg-[#5EA3FD] rounded-[6px] flex items-center justify-center" title="Detail Pengguna">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                                        </svg>
                                    </a>

                                    <!-- Tombol Edit -->
                                    <a href="{{ route('admin.instruktur.edit', $user->id) }}"
                                        class="w-[51px] h-[30px] bg-[#FBB800] rounded-[6px] flex items-center justify-center"
                                        title="Edit Pengguna">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-black" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M11 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2v-5" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M18.5 2.5l3 3L12 15l-4 1 1-4 9.5-9.5z" />
                                        </svg>
                                    </a>

                                    <!-- Tombol Delete -->
                                    <form action="{{ route('admin.instruktur.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pengguna ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="w-[51px] h-[30px] bg-[#FF0000] rounded-[6px] flex items-center justify-center"
                                            title="Hapus Pengguna">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center py-4 text-gray-500">Tidak ada data pengguna.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
