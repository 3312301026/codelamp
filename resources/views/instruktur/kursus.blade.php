@extends('layouts.instruktur')
@section('title', 'Kursus')

@section('content')
<div class="flex items-center gap-2 mb-4">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" stroke="#0E1212" fill="none" viewBox="0 0 24 24"
        stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9 9h10M9 14h10" />
    </svg>
    <span class="text-[18px] text-[#0E1212] font-bold leading-[30px]">Mengelola Kursus</span>
</div>

<div class="flex justify-center">
    <div class="max-w-[1431px] w-full bg-white shadow-md p-6 rounded-[5px]">
        <div class="text-[#0E1212] text-[20px] font-normal leading-[30px] mb-1">
            Kursus
        </div>
        <div class="text-[#9197A0] text-[14px] font-normal leading-[24px] mb-2">
            Daftar Kursus Anda
        </div>

        <div class="flex justify-between items-center mb-6">
            <div class="flex items-center gap-4">
                <div class="text-[#0E1212] text-[14px] font-normal leading-[24px]">
                    Tambahkan konten baru anda di sini
                </div>
                <a href="{{ route('instruktur.kursus.tambah') }}"
                    class="inline-block w-[150px] h-[40px] bg-[#F5B40D] text-white text-sm rounded-[5px] border border-[#F5B40D] hover:bg-[#e6a900] transition text-center leading-[40px]">
                    Tambahkan
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
                <tr class="bg-[#E8E6E6] font-bold">
                    <th class="px-4 py-2 border-b border-gray-300">No</th>
                    <th class="px-4 py-2 border-b border-gray-300">Tanggal</th>
                    <th class="px-4 py-2 border-b border-gray-300">Cover</th>
                    <th class="px-4 py-2 border-b border-gray-300">Judul</th>
                    <th class="px-4 py-2 border-b border-gray-300">Kategori</th>
                    <th class="px-4 py-2 border-b border-gray-300">Harga</th>
                    <th class="px-4 py-2 border-b border-gray-300">Status</th>
                    <th class="px-4 py-2 border-b border-gray-300">Tindakan</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($kursus as $index => $item)
                <tr class="{{ $loop->even ? 'bg-[#E8E6E6]' : 'bg-[#FFFFFF]' }}">
                    <td class="px-4 py-2 border-b border-gray-300">{{ $index + 1 }}</td>
                    <td class="px-4 py-2 border-b border-gray-300">{{ $item->tgl_pembuatan }}</td>
                    <td class="px-4 py-2 border-b border-gray-300">
                        <img src="{{ $item->cover ? asset('uploads/covers/' . $item->cover) : asset('images/default-cover.jpg') }}"
                            alt="Cover" class="w-16 h-10 object-cover" />
                    </td>
                    <td class="px-4 py-2 border-b border-gray-300">{{ $item->judul_kursus }}</td>
                    <td class="px-4 py-2 border-b border-gray-300">{{ $item->kategori }}</td>
                    <td class="px-4 py-2 border-b border-gray-300">
                        Rp{{ number_format($item->harga_kursus, 0, ',', '.') }}</td>
                    <td class="px-4 py-2 border-b border-gray-300">{{ ucfirst($item->status) }}</td>
                    <td class="px-4 py-2 border-b border-gray-300">
                        <div class="flex gap-2">
                            <!-- Detail -->
                            <a href="{{ route('instruktur.kursus.show', $item->id_kursus) }}"
                                class="w-[51px] h-[30px] bg-[#5EA3FD] rounded-[6px] flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </a>
                            <!-- Edit -->
                            <a href="{{ route('instruktur.kursus.edit', $item->id_kursus) }}"
                                class="w-[51px] h-[30px] bg-[#FBB800] rounded-[6px] flex items-center justify-center"
                                title="Edit Kursus">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-black" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M11 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2v-5" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M18.5 2.5l3 3L12 15l-4 1 1-4 9.5-9.5z" />
                                </svg>
                            </a>

                            <form action="{{ route('instruktur.kursus.destroy', $item->id_kursus) }}" method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus kursus ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="w-[51px] h-[30px] bg-[#FF0000] rounded-[6px] flex items-center justify-center"
                                    title="Hapus Kursus">
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
                    <td colspan="9" class="text-center py-4 text-gray-500">Belum ada kursus yang ditambahkan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
