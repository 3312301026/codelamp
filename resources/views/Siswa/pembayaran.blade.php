@extends('layouts.sidebar')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-/vXstFwS3N3tBi0bQh+Y6axhHEuAiDWnqzNQch2t2OdZb3AStRbLwT3xgPvU1O4JUL93gOAzY0bUrKIsw9d4Jw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <div class="content-area bg-white flex-1 p-6 overflow-y-auto">
        <header class="top-bar flex items-center justify-between mb-4 p-2 rounded-md">
            <div class="flex items-center">
                <button class="text-gray-500 mr-3 focus:outline-none">
                    <i class="fas fa-bars fa-lg"></i>
                </button>
                <h2 class="text-lg font-semibold text-gray-800">Catatan Pembayaran</h2>
            </div>
            <div class="flex items-center">
                <button class="bg-yellow-400 text-white py-1 px-3 rounded-md hover:bg-yellow-500 focus:outline-none">
                    <i class="fas fa-lightbulb mr-1"></i>
                </button>
                <button class="ml-2 text-gray-500 focus:outline-none">
                    <i class="fas fa-bell fa-lg"></i>
                </button>
                <button class="ml-2 text-gray-500 focus:outline-none">
                    <i class="fas fa-user-circle fa-lg"></i>
                </button>
            </div>
        </header>

        <main>
            <div class="mb-4">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Pembayaran</h3>
                <p class="text-gray-600">Daftar Pembayaran</p>
            </div>

            <div class="bg-white rounded-md shadow overflow-hidden">
                <div class="p-3">
                    <div class="mb-2">
                        <input type="text" placeholder="Search"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    No</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Tanggal</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nama Kursus</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nama Instruktur</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Harga</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Metode Pembayaran</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status</th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Tindakan</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($transaksis as $index => $transaksi)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $index + 1 }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    {{ \Carbon\Carbon::parse($transaksi->tanggal_transaksi)->format('d/m/y') }}</td>
                                                <td class="px-6 py-4 text-sm text-gray-800">{{ $transaksi->kursus->judul_kursus ?? '-' }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                    {{ $transaksi->kursus->instruktur->name ?? '-' }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">Rp
                                                    {{ number_format($transaksi->kursus->harga_kursus ?? 0, 0, ',', '.') }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                    {{ $transaksi->metode_pembayaran ?? 'Virtual Account' }}</td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm 
                                {{ $transaksi->status == 'berhasil' ? 'text-green-500' : ($transaksi->status == 'tertunda' ? 'text-yellow-500' : 'text-red-500') }}">
                                                    {{ ucfirst($transaksi->status) }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm">
                                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded-l">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-2 rounded-r">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </td>
                                            </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center text-gray-500 py-4">Tidak ada catatan transaksi.</td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>
            </div>
        </main>
    </div>
    </div>
@endsection