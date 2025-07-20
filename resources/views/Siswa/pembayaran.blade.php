@extends('layouts.sidebar')

@section('content')
<div class="content-area bg-gray-50 flex-1 p-6 overflow-y-auto">

    {{-- ✅ Header --}}
    <header class="flex items-center justify-between bg-white p-4 rounded-lg shadow-sm mb-6">
        <div class="flex items-center space-x-3">
            <button class="text-gray-600 hover:text-gray-900 transition">
                <i class="fas fa-bars fa-lg"></i>
            </button>
            <h2 class="text-xl font-bold text-gray-800">Catatan Pembayaran</h2>
        </div>
        <div class="flex items-center space-x-3">
            <button class="bg-yellow-400 hover:bg-yellow-500 text-white p-2 rounded-full shadow transition">
                <i class="fas fa-lightbulb"></i>
            </button>
            <button class="relative text-gray-600 hover:text-gray-900">
                <i class="fas fa-bell fa-lg"></i>
                <span class="absolute top-0 right-0 block h-2 w-2 rounded-full bg-red-500"></span>
            </button>
            <button class="text-gray-600 hover:text-gray-900">
                <i class="fas fa-user-circle fa-lg"></i>
            </button>
        </div>
    </header>

    {{-- ✅ Judul Halaman --}}
    <div class="mb-6">
        <h3 class="text-2xl font-semibold text-gray-800">Daftar Pembayaran</h3>
        <p class="text-gray-500">Berikut adalah riwayat transaksi pembayaran kursus Anda.</p>
    </div>

    {{-- ✅ Kotak Tabel --}}
    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        {{-- ✅ Pencarian --}}
        <div class="p-4 border-b border-gray-100">
            <input type="text" placeholder="Cari transaksi..."
                class="w-full rounded-lg border border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 sm:text-sm p-2">
        </div>

        {{-- ✅ Tabel --}}
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-xs font-semibold text-gray-600 uppercase">No</th>
                        <th class="px-6 py-3 text-xs font-semibold text-gray-600 uppercase">Tanggal</th>
                        <th class="px-6 py-3 text-xs font-semibold text-gray-600 uppercase">Nama Kursus</th>
                        <th class="px-6 py-3 text-xs font-semibold text-gray-600 uppercase">Instruktur</th>
                        <th class="px-6 py-3 text-xs font-semibold text-gray-600 uppercase">Harga</th>
                        <th class="px-6 py-3 text-xs font-semibold text-gray-600 uppercase">Metode</th>
                        <th class="px-6 py-3 text-xs font-semibold text-gray-600 uppercase">Status</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @forelse($transaksis as $index => $transaksi)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4">{{ $index + 1 }}</td>
                            <td class="px-6 py-4">{{ \Carbon\Carbon::parse($transaksi->tanggal_transaksi)->format('d/m/Y') }}</td>
                            <td class="px-6 py-4 font-medium text-gray-800">{{ $transaksi->kursus->judul_kursus ?? '-' }}</td>
                            <td class="px-6 py-4 text-gray-700">{{ $transaksi->kursus->instruktur->name ?? '-' }}</td>
                            <td class="px-6 py-4 font-semibold text-gray-900">
                                Rp {{ number_format($transaksi->kursus->harga_kursus ?? 0, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4 text-gray-700">{{ $transaksi->metode_pembayaran ?? 'Virtual Account' }}</td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 text-xs font-semibold rounded-full 
                                    {{ $transaksi->status == 'berhasil' ? 'bg-green-100 text-green-700' : 
                                       ($transaksi->status == 'tertunda' ? 'bg-yellow-100 text-yellow-700' : 'bg-red-100 text-red-700') }}">
                                    {{ ucfirst($transaksi->status) }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-gray-500 py-6 italic">Tidak ada catatan transaksi.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
