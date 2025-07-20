@extends('layouts.sidebar')

@section('content')

    <div class="flex-1 p-6">
        <header class="flex items-center justify-between mb-6">
            <h2 class="text-xl font-semibold text-gray-800">Kursus yang sudah dibeli</h2>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="relative">
                    <img src="https://via.placeholder.com/300x150/4A5568/EDF2F7?Text=English+Course" alt="Gambar Kursus"
                        class="w-full h-32 object-cover">
                    <div class="absolute top-2 left-2 bg-yellow-400 text-white text-sm font-semibold px-3 py-1 rounded">70%
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Bahasa Inggris Sehari-hari untuk Percakapan</h3>
                    <p class="text-gray-600 text-sm mb-3">Arpendi, S.Pd</p>
                    <p class="text-indigo-500 font-semibold">Rp. 240.000,-</p>
                    <button
                        class="mt-4 bg-indigo-500 hover:bg-indigo-600 text-white font-semibold py-2 px-4 rounded-md w-full">Lanjutkan
                        Belajar</button>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="relative">
                    <img src="https://via.placeholder.com/300x150/4A5568/EDF2F7?Text=English+Course" alt="Gambar Kursus"
                        class="w-full h-32 object-cover">
                    <div class="absolute top-2 left-2 bg-yellow-400 text-white text-sm font-semibold px-3 py-1 rounded">50%
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Bahasa Inggris Sehari-hari untuk Percakapan</h3>
                    <p class="text-gray-600 text-sm mb-3">Arpendi, S.Pd</p>
                    <p class="text-indigo-500 font-semibold">Rp. 240.000,-</p>
                    <button
                        class="mt-4 bg-indigo-500 hover:bg-indigo-600 text-white font-semibold py-2 px-4 rounded-md w-full">Lanjutkan
                        Belajar</button>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="relative">
                    <img src="https://via.placeholder.com/300x150/4A5568/EDF2F7?Text=English+Course" alt="Gambar Kursus"
                        class="w-full h-32 object-cover">
                    <div class="absolute top-2 left-2 bg-green-500 text-white text-sm font-semibold px-3 py-1 rounded">100%
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Bahasa Inggris Sehari-hari untuk Percakapan</h3>
                    <p class="text-gray-600 text-sm mb-3">Arpendi, S.Pd</p>
                    <p class="text-indigo-500 font-semibold">Rp. 240.000,-</p>
                    <button
                        class="mt-4 bg-indigo-500 hover:bg-indigo-600 text-white font-semibold py-2 px-4 rounded-md w-full">Lihat
                        Sertifikat</button>
                </div>
            </div>
        </div>
    </div>
@endsection
