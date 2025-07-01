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
                Siswa
            </div>
            <div class="text-[#9197A0] text-[14px] font-normal leading-[24px] mb-2">
                Daftar Akun Siswa
            </div>

            <div class="flex justify-end mb-6">
                <input type="text"
                    class="w-[333px] h-[50px] border border-gray-300 rounded-sm px-4 text-[16px] leading-[24px] text-[#9197A0] focus:outline-none focus:ring-2 focus:ring-yellow-400"
                    placeholder="Search">
            </div>

            <table class="w-full border-collapse text-black">
                <thead>
                    <tr class="bg-[#E8E6E6] font-bold text-left">
                        <th class="px-4 py-2 border-b border-gray-300">No</th>
                        <th class="px-4 py-2 border-b border-gray-300">Nama</th>
                        <th class="px-4 py-2 border-b border-gray-300">Email</th>
                        <th class="px-4 py-2 border-b border-gray-300">No HP</th>
                        <th class="px-4 py-2 border-b border-gray-300">Kursus yang Dibeli</th>
                        <th class="px-4 py-2 border-b border-gray-300">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $index => $user)
                        <tr class="{{ $loop->even ? 'bg-[#E8E6E6]' : 'bg-[#FFFFFF]' }}">
                            <td class="px-4 py-2 border-b border-gray-300">{{ $index + 1 }}</td>
                            <td class="px-4 py-2 border-b border-gray-300">{{ $user->name }}</td>
                            <td class="px-4 py-2 border-b border-gray-300">{{ $user->email }}</td>
                            <td class="px-4 py-2 border-b border-gray-300">{{ $user->nomor_hp ?? '-' }}</td>
                            <td class="px-4 py-2 border-b border-gray-300 text-center text-gray-400 italic">-</td>
                            <td class="px-4 py-2 border-b border-gray-300">
                                <a href="{{ route('admin.siswa.detail', $user->id) }}"
                                    class="w-[51px] h-[30px] bg-[#5EA3FD] rounded-[6px] flex items-center justify-center"
                                    title="Detail Siswa">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-gray-500">Tidak ada data siswa.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
