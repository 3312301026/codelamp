@extends('layouts.admin')
@section('title', 'Pembayaran')

@section('content')
    <div class="flex items-center gap-2 mb-4">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" stroke="#0E1212" fill="none" viewBox="0 0 24 24"
            stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 9h10M9 14h10" />
        </svg>
        <span class="text-[18px] text-[#0E1212] font-bold leading-[30px]">Riwayat Pembayaran</span>
    </div>

     <div class="w-full px-6">
        <div class="w-full bg-white shadow-md p-6 rounded-[5px]">
            <div class="text-[#0E1212] text-[20px] font-normal leading-[30px] mb-1">
                Pembayaran
            </div>
            <div class="text-[#9197A0] text-[14px] font-normal leading-[24px] mb-2">
                Daftar Transaksi Pembayaran
            </div>

            <div class="flex justify-between items-center mb-6">
                <div class="flex items-center gap-4">
                    <div class="text-[#0E1212] text-[14px] font-normal leading-[24px]">
                        Lihat riwayat pembayaran kursus
                    </div>
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
                        <th class="px-4 py-2 border-b border-gray-300">Pengguna</th>
                        <th class="px-4 py-2 border-b border-gray-300">Nama Kursus</th>
                        <th class="px-4 py-2 border-b border-gray-300">Harga</th>
                        <th class="px-4 py-2 border-b border-gray-300">Metode Pembayaran</th>
                        <th class="px-4 py-2 border-b border-gray-300">Status</th>
                        <th class="px-4 py-2 border-b border-gray-300">Total Pembayaran</th>
                        <th class="px-4 py-2 border-b border-gray-300">Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $dummyData = [
                            [
                                'tanggal' => '2025-06-30',
                                'pengguna' => 'Budi Santoso',
                                'kursus' => 'Laravel Dasar',
                                'harga' => 250000,
                                'metode' => 'Transfer Bank',
                                'status' => 'berhasil',
                                'total' => 250000
                            ],
                            [
                                'tanggal' => '2025-06-28',
                                'pengguna' => 'Siti Aminah',
                                'kursus' => 'React Lanjutan',
                                'harga' => 300000,
                                'metode' => 'QRIS',
                                'status' => 'berhasil',
                                'total' => 300000
                            ],
                        ];

                        $totalPendapatan = array_sum(array_column($dummyData, 'total'));
                    @endphp

                    @foreach ($dummyData as $index => $data)
                        <tr class="{{ $index % 2 === 0 ? 'bg-[#FFFFFF]' : 'bg-[#E8E6E6]' }}">
                            <td class="px-4 py-2 border-b border-gray-300">{{ $index + 1 }}</td>
                            <td class="px-4 py-2 border-b border-gray-300">{{ $data['tanggal'] }}</td>
                            <td class="px-4 py-2 border-b border-gray-300">{{ $data['pengguna'] }}</td>
                            <td class="px-4 py-2 border-b border-gray-300">{{ $data['kursus'] }}</td>
                            <td class="px-4 py-2 border-b border-gray-300">Rp{{ number_format($data['harga'], 0, ',', '.') }}</td>
                            <td class="px-4 py-2 border-b border-gray-300">{{ $data['metode'] }}</td>
                            <td class="px-4 py-2 border-b border-gray-300">{{ ucfirst($data['status']) }}</td>
                            <td class="px-4 py-2 border-b border-gray-300">Rp{{ number_format($data['total'], 0, ',', '.') }}</td>
                            <td class="px-4 py-2 border-b border-gray-300">
                                <div class="flex gap-2">
                                    <button
                                        class="w-[51px] h-[30px] bg-[#5EA3FD] rounded-[6px] flex items-center justify-center"
                                        title="Lihat Detail">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    <tr class="bg-[#F5F5F5]">
                        <td colspan="7" class="px-4 py-3 text-left font-semibold text-[#0E1212]">
                            Total Pendapatan:
                        </td>
                        <td colspan="2" class="px-4 py-3 text-right font-semibold text-[#0E1212]">
                            Rp{{ number_format($totalPendapatan, 0, ',', '.') }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
