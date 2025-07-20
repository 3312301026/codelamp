@extends('layouts.instruktur')
@section('title', 'Detail Kursus')

@section('content')
    <div class="mb-8">
        <!-- Header -->
        <div class="flex items-center gap-2 mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-[#0E1212]" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 9h10M9 14h10" />
            </svg>
            <h1 class="text-xl font-semibold text-[#0E1212]">Mengelola Kursus</h1>
        </div>

        <!-- Main Card -->
        <div class="bg-white shadow-lg rounded-xl p-6 space-y-10">
            <!-- Info Kursus -->
            <div class="space-y-1">
                <h2 class="text-2xl font-bold text-gray-800">{{ $kursus->judul_kursus }}</h2>
                <p class="text-sm text-gray-500">Kategori: <span class="font-medium">{{ $kursus->kategori }}</span></p>
                <p class="text-sm text-gray-500">Instruktur: <span
                        class="font-medium">{{ $kursus->instruktur->name ?? 'Instruktur tidak ditemukan' }}</span></p>
            </div>

            <!-- Media + Info -->
            <div class="flex flex-col lg:flex-row gap-6">
                <!-- Video & Deskripsi -->
                <div class="flex-1 bg-gray-50 rounded-xl overflow-hidden shadow-sm border">
                    <div class="w-full aspect-video bg-black flex items-center justify-center">
                        @php
                            $videoPath = \Illuminate\Support\Str::startsWith($kursus->vidio, 'videos/') ? $kursus->vidio : 'videos/' . $kursus->vidio;
                        @endphp

                        @if ($kursus->vidio && file_exists(public_path('storage/' . $videoPath)))
                            <video controls class="w-full h-full object-contain">
                                <source src="{{ asset('storage/' . $videoPath) }}" type="video/mp4">
                                Browser Anda tidak mendukung pemutaran video.
                            </video>
                        @else
                            <p class="text-white text-sm">Belum ada video utama.</p>
                        @endif
                    </div>

                    <div class="p-4 h-[200px] overflow-y-auto bg-white">
                        <h3 class="text-lg font-semibold mb-2 text-gray-800">📝 Deskripsi</h3>
                        <p class="text-sm text-gray-700 whitespace-pre-line">{{ $kursus->deskripsi }}</p>
                    </div>
                </div>

                <!-- Informasi Kursus -->
                <div class="w-full lg:w-[370px] bg-white rounded-xl shadow border overflow-hidden">
                    <div class="w-full aspect-[3/2] bg-gray-200">
                        @php
                            $coverPath = \Illuminate\Support\Str::startsWith($kursus->cover, 'covers/') ? $kursus->cover : 'covers/' . $kursus->cover;
                        @endphp
                        <img src="{{ $kursus->cover ? asset('storage/' . $coverPath) : asset('images/default-cover.jpg') }}"
                            alt="Cover Kursus" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4 space-y-2">
                        <h3 class="text-xl font-bold text-gray-800">{{ $kursus->judul_kursus }}</h3>
                        <p class="text-sm text-gray-500">{{ $kursus->instruktur->name ?? '' }}</p>
                        <div class="flex justify-between items-center mt-4">
                            <span class="text-base font-bold text-green-600">
                                Rp{{ number_format($kursus->harga_kursus, 0, ',', '.') }}
                            </span>
                            <span class="bg-yellow-500 text-white text-sm px-3 py-1 rounded-full">
                                {{ $kursus->jumlah_siswa ?? 0 }} Siswa
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tujuan Kursus -->
            <div>
                <div class="flex justify-between items-center mb-3">
                    <h3 class="text-xl font-semibold text-gray-800">🎯 Tujuan Kursus</h3>
                    <form action="{{ route('tujuan.store') }}" method="POST" class="flex gap-2">
                        @csrf
                        <input type="hidden" name="kursus_id" value="{{ $kursus->id }}">
                        <input type="text" name="deskripsi" required
                            class="border rounded px-3 py-1 text-sm w-[250px] focus:outline-none focus:ring-2 focus:ring-blue-400"
                            placeholder="Tambahkan tujuan baru...">
                        <button type="submit"
                            class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded text-sm">Tambah</button>
                    </form>
                </div>

                <ul class="list-disc pl-5 text-gray-700 text-sm space-y-2">
                    @forelse($kursus->tujuan as $tujuan)
                        <li class="flex justify-between items-center">
                            <span>{{ $tujuan->deskripsi }}</span>
                            <div class="flex gap-2">
                                <!-- Edit Tujuan -->
                                <form action="{{ route('tujuan.update', $tujuan->id) }}" method="POST" class="flex gap-1">
                                    @csrf
                                    @method('PATCH')
                                    <input type="text" name="deskripsi" value="{{ $tujuan->deskripsi }}"
                                        class="border rounded px-2 py-1 text-xs focus:outline-none focus:ring-2 focus:ring-yellow-400">
                                    <button type="submit"
                                        class="bg-yellow-500 hover:bg-yellow-600 text-white text-xs px-2 py-1 rounded">Update</button>
                                </form>

                                <!-- Delete Tujuan -->
                                <form action="{{ route('tujuan.destroy', $tujuan->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus tujuan ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-600 hover:bg-red-700 text-white text-xs px-2 py-1 rounded">Delete</button>
                                </form>
                            </div>
                        </li>
                    @empty
                        <li class="text-gray-400 italic">Belum ada tujuan ditambahkan.</li>
                    @endforelse
                </ul>
            </div>


            <!-- Materi Kursus -->
            <div>
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-semibold text-gray-800">📚 Materi</h3>
                    <a href="{{ route('materi.create', $kursus->id) }}"
                        class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold px-4 py-2 rounded-lg transition duration-200">
                        + Tambah Materi
                    </a>
                </div>

                <div class="bg-gray-50 rounded-xl shadow p-4 max-h-[400px] overflow-y-auto divide-y">
                    @forelse ($kursus->materi as $materi)
                        <details class="group py-4">
                            <summary
                                class="flex justify-between items-center cursor-pointer text-lg font-semibold text-gray-800 hover:text-blue-600">
                                <div class="flex items-center gap-2">
                                    📖 {{ $materi->judul }}
                                </div>
                                <svg class="w-5 h-5 group-open:rotate-180 transition-transform text-gray-600" fill="none"
                                    stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </summary>
                            <div class="mt-3 ml-3 text-sm text-gray-700 space-y-3">
                                <p>{{ $materi->deskripsi }}</p>

                                <!-- Tombol Aksi Materi -->
                                <div class="flex gap-3 justify-end">
                                    <form action="{{ route('materi.destroy', $materi->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus materi ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-red-600 hover:text-red-800 text-sm font-medium">Delete</button>
                                    </form>
                                </div>

                                <!-- === List Sub Materi === -->
                                @if ($materi->subMateri->count())
                                    <ul class="space-y-4 mt-2">
                                        @foreach ($materi->subMateri as $sub)
                                            <li class="border rounded-lg p-3 bg-white shadow-sm">
                                                <div class="font-medium text-gray-800 mb-1">🎬 {{ $sub->judul }}</div>
                                                @php
                                                    $videoPath = public_path('storage/' . $sub->video);
                                                @endphp
                                                @if ($sub->video && file_exists($videoPath))
                                                    <video controls class="w-full rounded-lg">
                                                        <source src="{{ asset('storage/' . $sub->video) }}" type="video/mp4">
                                                        Browser Anda tidak mendukung pemutaran video.
                                                    </video>
                                                @else
                                                    <p class="text-gray-400 italic">Video belum tersedia.</p>
                                                @endif

                                                <!-- Update & Delete Sub Materi -->
                                                <div class="flex justify-end gap-2 mt-2">
                                                    <!-- Update -->
                                                    <form action="{{ route('submateri.update', $sub->id) }}" method="POST"
                                                        enctype="multipart/form-data" class="flex flex-col md:flex-row gap-2">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="text" name="judul" value="{{ $sub->judul }}"
                                                            class="border rounded px-2 py-1 text-xs w-full md:w-[150px]">
                                                        <input type="file" name="video" accept="video/mp4"
                                                            class="border rounded px-2 py-1 text-xs w-full md:w-[150px]">
                                                        <button type="submit"
                                                            class="bg-yellow-500 hover:bg-yellow-600 text-white text-xs px-2 py-1 rounded">Update</button>
                                                    </form>

                                                    <!-- Delete -->
                                                    <form action="{{ route('submateri.destroy', $sub->id) }}" method="POST"
                                                        onsubmit="return confirm('Yakin ingin menghapus sub materi ini?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="bg-red-600 hover:bg-red-700 text-white text-xs px-2 py-1 rounded">Delete</button>
                                                    </form>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p class="italic text-gray-400">Belum ada sub materi.</p>
                                @endif
                            </div>
                        </details>
                    @empty
                        <p class="text-sm text-gray-500 italic">Belum ada materi yang ditambahkan.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection