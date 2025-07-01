@extends('layouts.admin')
@section('title', 'Kursus')

@section('content')
    <div class="text-2xl font-bold text-[#0E1212] mb-6">Daftar Kursus</div>

    <table class="w-full bg-white shadow-md rounded-md overflow-hidden">
        <thead class="bg-gray-200 text-left">
            <tr>
                <th class="px-4 py-3">No</th>
                <th class="px-4 py-3">Judul</th>
                <th class="px-4 py-3">Kategori</th>
                <th class="px-4 py-3">Harga</th>
                <th class="px-4 py-3">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kursus as $index => $item)
                <tr class="{{ $loop->even ? 'bg-gray-100' : 'bg-white' }}">
                    <td class="px-4 py-2">{{ $index + 1 }}</td>
                    <td class="px-4 py-2">{{ $item->judul_kursus }}</td>
                    <td class="px-4 py-2">{{ $item->kategori }}</td>
                    <td class="px-4 py-2">Rp{{ number_format($item->harga_kursus, 0, ',', '.') }}</td>
                    <td class="px-4 py-2 capitalize">{{ $item->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
