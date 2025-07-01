@extends('layouts.admin')
@section('title', 'Dashboard')

@section('content')
    <div class="text-2xl font-bold text-[#0E1212] mb-6">Dashboard Admin</div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white p-6 rounded-lg shadow">
            <div class="text-gray-600 text-sm mb-2">Total Pengguna</div>
            <div class="text-3xl font-bold text-black">{{ $jumlahUser }}</div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow">
            <div class="text-gray-600 text-sm mb-2">Total Kursus</div>
            <div class="text-3xl font-bold text-black">{{ $jumlahKursus }}</div>
        </div>
    </div>
@endsection
