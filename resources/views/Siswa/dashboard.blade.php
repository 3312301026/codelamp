@extends('layouts.sidebar')

@section('content')
    <div class="p-6">
        @if(session('success'))
            <div class="mb-4 px-4 py-3 rounded bg-green-100 border border-green-400 text-green-700">
                {{ session('success') }}
            </div>
        @endif

        <div class="text-center mb-8">
            <h1 class="text-2xl font-semibold">Apa yang Ingin Anda Pelajari Hari Ini?</h1>
        </div>

        <!-- Search -->
        <form method="GET" action="{{ route('siswa.dashboard') }}" class="flex justify-center mb-8">
            <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari kursus..."
                class="w-full max-w-3xl h-12 px-4 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-yellow-400" />
        </form>

        <!-- Leaderboard -->
        <section class="flex justify-center mb-12 px-4">
            <div
                class="w-full max-w-5xl rounded-xl bg-gradient-to-tr from-[#1f1f1f] via-[#2b2b2b] to-[#3a3a3a] shadow-xl text-white relative overflow-hidden">
                <div class="absolute inset-0 opacity-10 z-0 flex flex-col items-center justify-center">
                    <img src="/images/logo.png" alt="Logo" class="w-20" />
                    <h2 class="text-yellow-300 font-bold text-xl mt-2">Leaderboard</h2>
                </div>
                <div class="relative z-10 px-8 py-8 grid grid-cols-1 sm:grid-cols-3 gap-6">
                    <!-- Top 3 -->
                    <ul class="space-y-4">
                        @foreach ($leaderboard->take(3) as $key => $entry)
                            <li
                                class="flex items-center gap-4 bg-[#2a2a2a] p-3 rounded-lg shadow hover:bg-[#333] transition">
                                <span class="text-2xl font-bold text-yellow-400 animate-pulse">
                                    {{ $key + 1 }} 
                                    @if($key == 0) 🥇 
                                    @elseif($key == 1) 🥈 
                                    @else 🥉 
                                    @endif
                                </span>
                                <div>
                                    <span class="font-semibold">{{ $entry->siswa->name }}</span><br>
                                    <span class="text-sm text-gray-300">{{ $entry->kursus->judul_kursus ?? '-' }} - {{ $entry->skor }} pts</span>
                                </div>
                            </li>
                        @endforeach
                    </ul>

                    <!-- Middle -->
                    <div class="hidden sm:flex flex-col items-center justify-center text-yellow-400 font-bold text-2xl">
                        🏆 <div class="mt-2 text-lg">Top Siswa</div>
                    </div>

                    <!-- Peringkat 4-6 -->
                    <ul class="space-y-4">
                        @foreach ($leaderboard->slice(3, 3) as $key => $entry)
                            <li
                                class="flex items-center gap-4 bg-[#2a2a2a] p-3 rounded-lg shadow hover:bg-[#333] transition justify-end">
                                <div class="text-right">
                                    <span class="font-semibold">{{ $entry->siswa->name }}</span><br>
                                    <span class="text-sm text-gray-300">{{ $entry->kursus->judul_kursus ?? '-' }} - {{ $entry->skor }} pts</span>
                                </div>
                                <span class="text-2xl font-bold text-yellow-400 animate-pulse">
                                    {{ $key + 4 }} 🏅
                                </span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </section>

        <!-- Kursus Tersedia -->
        <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($kursus as $k)
                @if ($k->status === 'aktif')
                    <div
                        class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition transform hover:scale-[1.02]">
                        <div class="w-full h-40 bg-gray-100 flex items-center justify-center">
                            @php
                                $coverPath = \Illuminate\Support\Str::startsWith($k->cover, 'covers/') ? $k->cover : 'covers/' . $k->cover;
                            @endphp
                            <img src="{{ $k->cover ? asset('storage/' . $coverPath) : asset('images/default-cover.jpg') }}"
                                alt="Cover Kursus" class="max-h-full max-w-full object-contain">
                        </div>
                        <div class="p-4">
                            <h3 class="text-lg font-semibold mb-1">{{ $k->judul_kursus }}</h3>
                            <p class="text-sm text-gray-600">{{ $k->instruktur->name ?? '-' }}</p>
                            <p class="text-yellow-500 font-bold my-2">
                                Rp {{ number_format($k->harga_kursus, 0, ',', '.') }}
                            </p>
                            <div class="text-center">
                                <span class="bg-yellow-400 text-white px-3 py-1 rounded-full text-xs">
                                    {{ $k->siswa()->wherePivot('status', 'aktif')->count() }} Siswa
                                </span>
                            </div>
                        </div>
                    </div>
                @endif
            @empty
                <p class="text-center col-span-3 text-gray-500 italic">Belum ada kursus aktif tersedia.</p>
            @endforelse
        </section>
    </div>
@endsection
