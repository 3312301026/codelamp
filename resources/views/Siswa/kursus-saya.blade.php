@extends('layouts.sidebar')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow">
        @if($kursus->isEmpty())
            <p class="text-gray-600">Anda belum membeli kursus apapun.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($kursus as $item)
                    <div class="bg-[#FBE5C8] p-4 rounded-lg shadow hover:shadow-lg transition">

                        {{-- ✅ Tampilkan Cover Kursus --}}
                        <div class="aspect-[3/2] bg-gray-100 rounded overflow-hidden">
                            @php
                                $coverPath = Str::startsWith($item->cover, 'covers/')
                                    ? $item->cover
                                    : 'covers/' . $item->cover;
                            @endphp
                            <img src="{{ asset('storage/' . $coverPath) }}" alt="Cover Kursus" class="w-full h-full object-contain">
                        </div>

                        {{-- ✅ Judul, Deskripsi & Harga --}}
                        <h3 class="text-lg font-bold text-gray-800 mt-3">{{ $item->judul_kursus }}</h3>
                        <p class="text-sm text-gray-600 mt-1">{{ Str::limit($item->deskripsi, 80) }}</p>
                        <p class="mt-2 text-sm text-gray-800 font-semibold">
                            Harga: Rp {{ number_format($item->harga_kursus, 0, ',', '.') }}
                        </p>

                        <a href="{{ route('siswa.kursus.saya.detail', $item->id) }}"
                            class="mt-3 inline-block bg-[#FDB813] text-white px-3 py-1 rounded hover:bg-[#e6a50d]">
                            Lihat Kursus
                        </a>

                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
