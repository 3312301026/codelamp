<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Kursus;
use App\Models\User;
use App\Models\KursusSiswa;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class SiswaController extends Controller
{
    public function dashboard(Request $request)
    {
        $siswa = Auth::user();

        // Ambil keyword pencarian dari input (q)
        $query = $request->input('q');

        // Ambil daftar kursus yang cocok dengan pencarian
        $kursus = Kursus::with(['instruktur', 'siswa'])
            ->when($query, function ($q) use ($query) {
                $q->where('judul_kursus', 'like', '%' . $query . '%')
                    ->orWhere('deskripsi', 'like', '%' . $query . '%');
            })
            ->get();

        // Ambil leaderboard (6 tertinggi), dengan relasi siswa dan kursus
        $leaderboard = KursusSiswa::with(['siswa', 'kursus'])
            ->where('status', 'aktif') // Hanya siswa yang aktif
            ->orderByDesc('skor')
            ->take(6)
            ->get();

        return view('Siswa.dashboard', compact('siswa', 'kursus', 'leaderboard'));
    }

    public function edit()
    {
        $siswa = Auth::user();
        return view('Siswa.profil', compact('siswa'));
    }

    public function update(Request $request)
    {
        $siswa = Auth::user();

        $request->validate([
            'nomor_hp' => 'required|string|max:20',
            'email' => 'required|email|unique:users,email,' . $siswa->id,
            'password' => 'nullable|min:6|confirmed',
        ]);

        $siswa->nomor_hp = $request->nomor_hp;
        $siswa->email = $request->email;

        if ($request->filled('password')) {
            $siswa->password = Hash::make($request->password);
        }

        $siswa->save();

        return redirect()->route('siswa.dashboard')->with('success', 'Profil berhasil diperbarui.');
    }

    public function listKursus()
    {
        $kursusList = Kursus::all();
        return view('Siswa.tampilan_kursus', compact('kursusList'));
    }

    public function tampilkanKursus($id)
    {
        $kursus = Kursus::with([
            'instruktur',
            'tujuan',
            'materi.subMateri'  // nested eager loading
        ])->findOrFail($id);

        return view('Siswa.detail_kursus', compact('kursus'));
    }


    public function beliKursus($id)
    {
        $siswa = Auth::user();

        $sudahBeli = KursusSiswa::where('siswa_id', $siswa->id)
            ->where('kursus_id', $id)
            ->exists();

        if ($sudahBeli) {
            return redirect()->back()->with('info', 'Kursus ini sudah kamu beli.');
        }

        KursusSiswa::create([
            'siswa_id' => $siswa->id,
            'kursus_id' => $id,
        ]);

        return redirect()->route('siswa.kursus_dibeli')->with('success', 'Kursus berhasil dibeli!');
    }

    public function kursusDibeli()
    {
        $siswa = Auth::user();
        $kursusDibeli = $siswa->kursus()->get();

        return view('Siswa.kursus_dibeli', compact('kursusDibeli'));
    }

    public function catatanPembayaran()
    {
        $siswa = Auth::user();

        $transaksis = Transaksi::with(['kursus.instruktur'])
            ->where('siswa_id', $siswa->id)
            ->orderByDesc('tanggal_transaksi')
            ->get();

        return view('Siswa.pembayaran', compact('transaksis'));
    }

    public function formBayar($id)
    {
        $kursus = Kursus::findOrFail($id);
        return view('Siswa.form_pembayaran', compact('kursus'));
    }

    public function prosesBayar(Request $request, $id)
    {
        $request->validate([
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $siswa = Auth::user();

        // Simpan file bukti
        $file = $request->file('bukti_pembayaran');
        $namaFile = Str::uuid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/bukti'), $namaFile);

        // Simpan transaksi
        Transaksi::create([
            'siswa_id' => $siswa->id,
            'kursus_id' => $id,
            'status' => 'pending',
            'tanggal_transaksi' => now(),
            'bukti_pembayaran' => $namaFile
        ]);

        return redirect()->route('siswa.pembayaran')->with('success', 'Bukti pembayaran berhasil dikirim. Menunggu konfirmasi.');
    }

    public function formUploadBukti($id)
    {
        $kursus = Kursus::with('instruktur.instrukturDetail')->findOrFail($id);

        return view('Siswa.upload_bukti', compact('kursus'));
    }


    public function uploadBuktiPembayaran(Request $request, $id)
    {
        $request->validate([
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $file = $request->file('bukti_pembayaran');
        $namaFile = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads/bukti_pembayaran'), $namaFile);

        Transaksi::create([
            'siswa_id' => Auth::id(),
            'kursus_id' => $id,
            'status' => 'pending',
            'tanggal_transaksi' => now(),
            'bukti_pembayaran' => $namaFile,
        ]);

        return redirect()->route('siswa.pembayaran')->with('success', 'Bukti pembayaran berhasil diunggah. Menunggu konfirmasi.');
    }
}
