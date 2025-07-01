@extends('layouts.admin')
@section('title', 'Dashboard')

@section('content')
<div class="text-2xl font-bold text-[#0E1212] mb-6">Dashboard Admin</div>

<!-- Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
    <!-- Total Pengguna -->
    <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
        <div class="flex items-center justify-between">
            <div>
                <div class="text-sm text-gray-500 mb-1">Total Pengguna</div>
                <div class="text-3xl font-bold text-[#0E1212]">{{ $jumlahUser }}</div>
            </div>
            <div class="bg-yellow-100 text-yellow-500 p-3 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5V4H2v16h5m10-6h5m-5 0a5 5 0 01-10 0m5 0V6" />
                </svg>
            </div>
        </div>
    </div>

    <!-- Total Kursus -->
    <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
        <div class="flex items-center justify-between">
            <div>
                <div class="text-sm text-gray-500 mb-1">Total Kursus</div>
                <div class="text-3xl font-bold text-[#0E1212]">{{ $jumlahKursus }}</div>
            </div>
            <div class="bg-blue-100 text-blue-500 p-3 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m2 0a2 2 0 100-4H7a2 2 0 000 4h10zm0 0v4m-4-4v4m-4-4v4" />
                </svg>
            </div>
        </div>
    </div>
</div>

<!-- Chart Dummy -->
<div class="bg-white p-6 rounded-2xl shadow">
    <div class="mb-4 text-lg font-semibold text-[#0E1212]">Statistik Aktivitas</div>
    <div class="h-64 w-full bg-gray-100 rounded-lg flex items-center justify-center text-gray-400">
        <span>🔧 Dummy Chart Line & Bar (contoh grafik)</span>
    </div>
</div>
@endsection
