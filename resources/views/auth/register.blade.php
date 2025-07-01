<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Siswa | CodeLamp</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-yellow-400 flex items-center justify-center min-h-screen">
    <div class="bg-white rounded-xl shadow-md w-full max-w-sm p-6">
        <div class="text-center mb-6">
            <h1 class="text-2xl font-bold text-yellow-500 flex justify-center items-center gap-1">
                CodeLamp
                <img src="{{ asset('gambar/logo1.png') }}" alt="Logo" class="w-12 md:w-15 mb-2">
            </h1>
            <p class="text-sm font-medium text-gray-700">Daftar Sebagai Siswa</p>
        </div>

        <form action="{{ route('register') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm text-gray-700 mb-1">Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name') }}" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                @error('name')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-sm text-gray-700 mb-1">Nomor HP</label>
                <input type="text" name="nomor_hp" value="{{ old('nomor_hp') }}" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                @error('nomor_hp')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-sm text-gray-700 mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                @error('email')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-sm text-gray-700 mb-1">Kata Sandi</label>
                <input type="password" name="password" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                @error('password')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-sm text-gray-700 mb-1">Konfirmasi Kata Sandi</label>
                <input type="password" name="password_confirmation" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
            </div>

            <button type="submit" class="w-full bg-yellow-400 text-white font-semibold py-2 rounded hover:bg-yellow-500 transition">
                Daftar
            </button>

            <div class="text-center text-sm mt-4">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-yellow-500 hover:underline font-medium">Masuk</a>
            </div>
        </form>
    </div>
</body>
</html>
