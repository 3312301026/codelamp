<?php

namespace App\Http\Controllers;

use App\Models\Kursus;
use App\Models\KursusSiswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\InstrukturDetail;

class InstrukturController extends Controller
{
    // Tampilkan dashboard
    public function dashboard()
    {
        $instrukturId = Auth::id();

        $kursusList = Kursus::where('instruktur_id', $instrukturId)->get();

        $leaderboard = KursusSiswa::with(['siswa', 'kursus'])
            ->whereHas('kursus', function ($query) use ($instrukturId) {
                $query->where('instruktur_id', $instrukturId);
            })
            ->orderByDesc('skor')
            ->take(6)
            ->get();

        return view('instruktur.dashboard', compact('kursusList', 'leaderboard'));
    }

    // Tampilkan halaman profil
    public function profil()
    {
        $user = Auth::user();
        $detail = $user->instrukturDetail ?? new InstrukturDetail;

        return view('instruktur.profil', compact('user', 'detail'));
    }

    // Update profil
    public function updateProfil(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name'             => 'required|string|max:255',
            'email'            => 'required|email|max:255',
            'nomor_hp'         => 'nullable|string|max:20',
            // Detail instruktur
            'nomor_ktp'        => 'nullable|string|max:30',
            'jenis_kelamin'    => 'nullable|string|in:Laki-laki,Perempuan',
            'pekerjaan'        => 'nullable|string|max:255',
            'perkenalan'       => 'nullable|string|max:1000',
            'alamat'           => 'nullable|string|max:1000',
            'nama_bank'        => 'nullable|string|max:100',
            'nama_rekening'    => 'nullable|string|max:255',
            'nomor_rekening'   => 'nullable|string|max:50',
        ]);

        // Update tabel users
        $user->update([
            'name'     => $request->name,
            'email'    => $request->email,
            'nomor_hp' => $request->nomor_hp,
        ]);

        // Update atau buat detail instruktur
        InstrukturDetail::updateOrCreate(
            ['user_id' => $user->id],
            [
                'nomor_ktp'      => $request->nomor_ktp,
                'jenis_kelamin'  => $request->jenis_kelamin,
                'pekerjaan'      => $request->pekerjaan,
                'perkenalan'     => $request->perkenalan,
                'alamat'         => $request->alamat,
                'nama_bank'      => $request->nama_bank,
                'nama_rekening'  => $request->nama_rekening,
                'nomor_rekening' => $request->nomor_rekening,
            ]
        );

        return redirect()->route('instruktur.dashboard')->with('success', 'Profil berhasil diperbarui.');

    }
}
