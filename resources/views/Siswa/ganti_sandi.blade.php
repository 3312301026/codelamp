@extends('layouts.sidebar')

@section('content')
    <!-- <form action="#" method="POST" class="bg-white p-6 rounded shadow-md w-full max-w-xl mx-auto">
        @csrf -->
        <div class="mb-4">
            <label class="block text-gray-700">Email</label>
            <input type="email" name="email" class="w-full border border-gray-300 rounded px-4 py-2" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Kata Sandi Saat Ini</label>
            <input type="password" name="current_password" class="w-full border border-gray-300 rounded px-4 py-2" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Kata Sandi Baru</label>
            <input type="password" name="new_password" class="w-full border border-gray-300 rounded px-4 py-2" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Konfirmasi Kata Sandi Baru</label>
            <input type="password" name="new_password_confirmation" class="w-full border border-gray-300 rounded px-4 py-2" required>
        </div>
        <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">
            Simpan
        </button>
    <!-- </form> -->
@endsection
