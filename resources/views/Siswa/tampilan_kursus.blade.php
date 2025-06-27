@extends('layouts.sidebar')

@section('content')
    <div class="grid grid-cols-3 gap-6">
        <!-- Konten Kursus -->
        <div class="col-span-2 space-y-4">
            <h2 class="text-2xl font-bold">Bahasa Inggris Sehari-hari untuk Percakapan</h2>
            <p class="text-sm text-gray-600">Kategori: Bahasa | Pengajar: Aprendi, S.Pd</p>

            <!-- Video -->
            <div class="w-full aspect-video bg-black">
                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/qb-m3tEW_as?si=VhXNsChF_FPSIe5c"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>

            <!-- Deskripsi -->
            <div>
                <h3 class="font-semibold">Deskripsi</h3>
                <p class="text-gray-700 mt-2">
                    Kursus bahasa Inggris sehari-hari dirancang untuk membantu peserta didik mengembangkan keterampilan
                    komunikasi bahasa Inggris yang praktis dan relevan untuk situasi sehari-hari.
                </p>
                <ul class="list-disc list-inside mt-2 text-gray-700 space-y-1">
                    <li>Meningkatkan kemampuan berbicara dalam konteks sehari-hari</li>
                    <li>Berlatih dengan situasi nyata seperti belanja, bepergian, dan bersosialisasi</li>
                    <li>Memahami kosakata dan tata bahasa dasar</li>
                </ul>
            </div>

            <!-- Materi Accordion -->
            <div class="bg-white rounded-lg shadow p-4">
                <h3 class="font-semibold mb-2">Materi</h3>

                <!-- Pengantar Pembelajaran dengan sub-item -->
                <details class="mb-2 group">
                    <summary class="cursor-pointer font-medium group-open:text-orange-500">
                        Pengantar Pembelajaran
                    </summary>
                    <div class="mt-2 ml-4 text-sm text-gray-700 space-y-1">
                        <p>1. Kosakata Sehari-hari</p>
                        <p>2. Video Pembelajaran</p>
                        <p>3. Quiz</p>
                    </div>
                </details>

                <details class="mb-2 group">
                    <summary class="cursor-pointer font-medium group-open:text-orange-500">
                        Pengenalan Bahasa
                    </summary>
                    <p class="mt-1 ml-4 text-sm text-gray-700">Dasar-dasar kosakata dan kalimat sederhana.</p>
                </details>

                <details class="mb-2 group">
                    <summary class="cursor-pointer font-medium group-open:text-orange-500">
                        Percakapan Dasar
                    </summary>
                    <p class="mt-1 ml-4 text-sm text-gray-700">Simulasi percakapan dalam kehidupan sehari-hari.</p>
                </details>

                <details class="group">
                    <summary class="cursor-pointer font-medium group-open:text-orange-500">
                        Keterampilan Berbicara dan Menulis Menengah
                    </summary>
                    <p class="mt-1 ml-4 text-sm text-gray-700">Latihan untuk meningkatkan kefasihan berbicara dan menulis.
                    </p>
                </details>
            </div>

        </div>

        <!-- Kartu Kursus -->
        <div class="bg-white rounded-lg shadow p-4">
            <img src="{{ asset('gambar/gambar1.jpg') }}" alt="Course Image" class="w-300 h-200 object-cover">
            <h3 class="font-semibold">Bahasa Inggris Sehari-hari untuk Percakapan</h3>
            <p class="text-sm text-gray-600">Aprendi, S.Pd</p>
            <p class="text-lg font-bold text-orange-500 mt-2">Rp. 240.000</p>
            <button class="mt-4 w-full bg-orange-500 hover:bg-orange-600 text-white py-2 rounded">Beli Sekarang</button>
        </div>
    </div>
@endsection