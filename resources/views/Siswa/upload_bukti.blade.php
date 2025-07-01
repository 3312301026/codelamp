@extends('layouts.sidebar')

@section('content')
<div class="content-area bg-white flex-1 p-6 overflow-y-auto">
    <header class="top-bar flex items-center justify-between mb-4 p-2 rounded-md">
        <h2 class="text-lg font-semibold text-gray-800">Upload Bukti Pembayaran</h2>
    </header>

    <div class="bg-white shadow rounded-md p-6 max-w-xl mx-auto">
        @if(session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4">
                <ul class="list-disc list-inside text-sm">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- 🔔 Petunjuk Pembayaran --}}
        <div class="mb-6 border border-yellow-300 bg-yellow-50 p-4 rounded-md">
            <h3 class="text-md font-semibold text-yellow-700 mb-2">🔔 Petunjuk Pembayaran</h3>
            <p class="text-sm text-gray-700 mb-1">Silakan transfer ke rekening berikut:</p>

            @if($kursus->instruktur && $kursus->instruktur->instrukturDetail)
                <ul class="text-sm text-gray-800 list-inside list-disc ml-4">
                    <li><strong>Bank:</strong> {{ $kursus->instruktur->instrukturDetail->nama_bank }}</li>
                    <li><strong>Nomor Rekening:</strong> {{ $kursus->instruktur->instrukturDetail->nomor_rekening }}</li>
                    <li><strong>Atas Nama:</strong> {{ $kursus->instruktur->instrukturDetail->nama_rekening }}</li>
                </ul>
            @else
                <p class="text-sm text-red-500">Data rekening instruktur belum tersedia.</p>
            @endif

            <p class="text-sm text-gray-600 mt-2">Setelah transfer, unggah bukti pembayaran melalui form di bawah ini.</p>
        </div>

        {{-- 📤 Form Upload Bukti --}}
        <form action="{{ route('siswa.pembayaran.upload', $kursus->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700">Nama Kursus</label>
                <p class="text-gray-800">{{ $kursus->judul_kursus }}</p>
            </div>

            <div class="mb-4">
                <label for="bukti_pembayaran" class="block text-sm font-semibold text-gray-700">
                    Upload Bukti Pembayaran (jpg/png/pdf)
                </label>
                <input type="file" name="bukti_pembayaran" id="bukti_pembayaran" accept=".jpg,.jpeg,.png,.pdf"
                    class="border border-gray-300 rounded-md w-full py-2 px-3 mt-1" required>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-white font-semibold py-2 px-6 rounded">
                    Kirim Bukti
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
