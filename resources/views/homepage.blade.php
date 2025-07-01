<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CodeLamp - Home</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#0E1212] min-h-screen">

  <!-- Navbar -->
  <nav class="bg-white py-4 border-b-2 border-yellow-400">
    <div class="container mx-auto flex items-center justify-between px-6">
      <div class="flex items-center space-x-2">
        <span class="text-yellow-500 font-bold text-lg">CodeLamp</span>
        <img src="{{ asset('gambar/logo1.png') }}" alt="Logo" class="w-12 md:w-15 mb-2">
      </div>
      <div>
        <a href="{{ route('login') }}"
          class="px-4 py-2 mr-3 border border-yellow-400 text-yellow-400 rounded-full hover:bg-yellow-400 hover:text-white transition">
          Masuk
        </a>
        <a href="{{ route('register') }}"
          class="px-4 py-2 border border-yellow-600 text-yellow-400 rounded-full hover:bg-yellow-400 hover:text-white transition">
          Daftar
        </a>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="bg-[#0E1212] text-white py-16 px-6">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between">

      <!-- Left Text -->
      <div class="md:w-2/3 text-center">
        <h1 class="text-4xl font-extrabold mb-4">Selamat datang !!!</h1>
        <p class="text-4xl mb-4">
          Mulai Belajar bersama <span class="text-yellow-400 font-semibold">CodeLamp</span><br>
          Bangun Keahlianmu dengan Kursus Online
        </p>
      </div>

      <!-- Right Logo -->
      <div class="md:w-1/3 flex flex-col items-center mt-10 md:mt-0">
        <img src="{{ asset('gambar/logo2.png') }}" alt="Logo" class="w-40 md:w-48 mb-2">
        <span class="text-yellow-400 font-bold text-xl">CodeLamp</span>
      </div>
    </div>
  </section>

  <!-- Courses Section -->
  <h2 class="text-white text-3xl text-center font-semibold">Pilih Kelas Sesuai dengan Cara Belajar Kamu!</h2>
  <section class="container mx-auto px-6 py-10">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
      @for ($i = 1; $i <= 4; $i++)
      <div class="bg-white rounded-lg overflow-hidden shadow-md">
      <img src="{{ asset('gambar/gambar' . $i . '.jpg') }}" alt="Course Image" class="w-full h-40 object-cover">
      <div class="p-4 text-gray-800">
        <h3 class="text-md font-bold mb-1">Bahasa Inggris Sehari-hari untuk Percakapan</h3>
        <p class="text-sm text-gray-600 mb-1">Arpendi, S.Pd</p>
        <p class="text-yellow-500 font-semibold mb-4">Rp. 240.000,-</p>
        <a href="#"
        class="block text-center bg-yellow-400 hover:bg-yellow-500 text-white py-2 rounded-lg font-semibold transition">
        Beli Sekarang
        </a>
      </div>
      </div>
    @endfor
    </div>
  </section>

</body>

</html>