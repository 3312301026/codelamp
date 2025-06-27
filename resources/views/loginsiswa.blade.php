<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - CodeLamp</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#F5B40D] min-h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-sm">
        <div class="text-center mb-6">
            <h1 class="text-2xl font-bold text-[#F5B40D] flex items-center justify-center">
                CodeLamp
                <img src="{{ asset('gambar/logo1.png') }}" alt="Logo" class="w-12 md:w-15 mb-2">
            </h1>
            <p class="text-sm text-gray-600 mt-1">Masuk sebagai Siswa</p>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
            <label for="email" class="block text-gray-700 text-[20px] mb-1">Email</label> 
                <input type="email" name="email" id="email"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#F5B40D]"
                    required autofocus>
            </div>

            <div class="mb-6">
                <label for="password" class="block text-gray-700 text-sm mb-1">Kata Sandi</label>
                <input type="password" name="password" id="password"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#F5B40D]"
                    required>
            </div>

            <button type="submit"
                class="w-full bg-[#F5B40D] hover:bg-[#e5a80c] text-white font-bold py-2 rounded-lg transition duration-300">
                Masuk
            </button>

            <div class="text-right mt-3">
                <a href="{{ route('password.request') }}" class="text-xs text-gray-500 hover:underline">
                    Lupa kata sandi?
                </a>
            </div>
        </form>
    </div>

</body>

</html>
