@extends('layouts.sidebar')

@section('content')
        <div class="p-6 flex-1 overflow-auto">
            <h1 class="text-xl font-bold text-gray-800 mb-6">Detail Kursus</h1>

            <div class="bg-white p-6 rounded-lg shadow-lg flex gap-6">
                <div class="flex-1">
                    <h2 class="text-xl font-bold mb-1">Kursus</h2>
                    <p class="text-lg font-semibold text-gray-800 mb-2">Bahasa Inggris Sehari-hari untuk Percakapan
                    </p>
                    <p class="text-sm text-gray-600 mb-4">Kategori Bahasa | Arpend, S.Pd</p>
                    <!-- Video -->
                    <div class="w-full aspect-video bg-black">
                        <iframe width="100%" height="100%"
                            src="https://www.youtube.com/embed/qb-m3tEW_as?si=VhXNsChF_FPSIe5c"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>

                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Deskripsi</h3>
                        <p class="text-sm text-gray-700 leading-relaxed mb-4">
                            Kursus bahasa Inggris sehari-hari dirancang untuk membantu peserta didik mengembangkan
                            keterampilan komunikasi bahasa Inggris yang praktis dan relevan untuk situasi sehari-hari.
                            Berikut adalah deskripsi umum tentang kursus ini:
                        </p>
                        <h4 class="font-semibold text-gray-800 mb-1">Tujuan Umum:</h4>
                        <ul class="list-disc list-inside text-sm text-gray-700 ml-4 space-y-1">
                            <li>Meningkatkan kemampuan berbicara dan memahami bahasa Inggris dalam konteks sehari-hari.
                            </li>
                            <li>Memperluas kosakata yang berkaitan dengan situasi umum, seperti berbelanja, makan,
                                bepergian, dan berinteraksi sosial.</li>
                            <li>Meningkatkan kepercayaan diri dalam menggunakan bahasa Inggris secara lisan.</li>
                            <li>Memberikan pemahaman tentang tata bahasa dasar yang diperlukan untuk komunikasi
                                sehari-hari.</li>
                        </ul>
                    </div>

                    <div class="mb-8">
                        <h3 class="text-xl font-bold text-gray-800 mb-4">Materi</h3>

                        <div class="accordion-item border border-gray-300 rounded-lg mb-2">
                            <div
                                class="accordion-header flex items-center justify-between p-4 cursor-pointer bg-gray-50 hover:bg-gray-100">
                                <span class="font-medium text-gray-700">Pengantar Pembelajaran</span>
                            </div>
                            <div class="accordion-content hidden p-4 text-sm text-gray-600 border-t border-gray-200">
                                <p>Selamat datang di kursus ini! Di sini Anda akan mempelajari dasar-dasar yang penting
                                    sebelum memulai perjalanan bahasa Inggris Anda.</p>
                                <ul class="list-disc list-inside mt-2 space-y-1">
                                    <li>Perkenalan Kursus</li>
                                    <li>Cara Belajar Efektif</li>
                                    <li>Mengenal Fitur Platform</li>
                                </ul>
                            </div>
                        </div>

                        <div class="accordion-item border border-gray-300 rounded-lg mb-2">
                            <div
                                class="accordion-header flex items-center justify-between p-4 cursor-pointer bg-gray-50 hover:bg-gray-100">
                                <span class="font-medium text-gray-700">Pengenalan Bahasa</span>
                            </div>
                            <div class="accordion-content hidden p-4 text-sm text-gray-600 border-t border-gray-200">
                                <p>Bagian ini akan mengenalkan Anda pada konsep dasar bahasa Inggris.</p>
                                <ul class="list-disc list-inside mt-2 space-y-1">
                                    <li>Abjad dan Pelafalan</li>
                                    <li>Salam dan Perkenalan Diri</li>
                                    <li>Kata Ganti Orang</li>
                                </ul>
                            </div>
                        </div>

                        <div class="accordion-item border border-gray-300 rounded-lg mb-2">
                            <div
                                class="accordion-header flex items-center justify-between p-4 cursor-pointer bg-gray-50 hover:bg-gray-100">
                                <span class="font-medium text-gray-700">Percakapan Dasar</span>
                            </div>
                            <div class="accordion-content hidden p-4 text-sm text-gray-600 border-t border-gray-200">
                                <p>Latih kemampuan percakapan Anda dengan topik sehari-hari.</p>
                                <ul class="list-disc list-inside mt-2 space-y-1">
                                    <li>Memesan Makanan</li>
                                    <li>Bertanya Arah</li>
                                    <li>Berbelanja</li>
                                </ul>
                            </div>
                        </div>

                        <div class="accordion-item border border-gray-300 rounded-lg">
                            <div
                                class="accordion-header flex items-center justify-between p-4 cursor-pointer bg-gray-50 hover:bg-gray-100">
                                <span class="font-medium text-gray-700">Keterampilan Berbicara dan Menulis
                                    Menengah</span>
                            </div>
                            <div class="accordion-content hidden p-4 text-sm text-gray-600 border-t border-gray-200">
                                <p>Tingkatkan kefasihan berbicara dan kemampuan menulis Anda.</p>
                                <ul class="list-disc list-inside mt-2 space-y-1">
                                    <li>Debat Sederhana</li>
                                    <li>Menulis Email Formal</li>
                                    <li>Presentasi Singkat</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="w-80 bg-white rounded-2xl overflow-hidden shadow-lg h-fit">
                    <img src="{{ asset('gambar/gambar1.jpg') }}" alt="Course Image" class="w-300 h-200 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-bold mb-1">Bahasa Inggris Sehari-hari untuk Percakapan</h3>
                        <p class="text-sm text-gray-600 mb-2">Arpend, S.Pd</p>
                        <p class="text-yellow-500 font-semibold mb-2">Rp. 240.000,-</p>
                        <div class="text-center">
                            <button
                                class="inline-block bg-yellow-400 text-white px-6 py-2 rounded-full text-base font-semibold hover:bg-yellow-500 transition-colors">
                                Beli Sekarang
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const accordionHeaders = document.querySelectorAll('.accordion-header');

            accordionHeaders.forEach(header => {
                header.addEventListener('click', function () {
                    const accordionItem = this.closest('.accordion-item');
                    const accordionContent = accordionItem.querySelector('.accordion-content');

                    // Toggle active class on the item
                    accordionItem.classList.toggle('active');

                    // Toggle visibility of the content
                    if (accordionContent.style.display === 'block') {
                        accordionContent.style.display = 'none';
                    } else {
                        accordionContent.style.display = 'block';
                    }
                });
            });
        });
    </script>
@endsection