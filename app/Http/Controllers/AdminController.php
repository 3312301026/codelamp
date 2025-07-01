<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kursus;
use Illuminate\Support\Facades\File;


class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', [
            'jumlahUser' => User::count(),
            'jumlahKursus' => Kursus::count(),
        ]);
    }

    public function listUsers()
    {
        $users = User::with('instrukturDetail')
                    ->where('role', 'instruktur')
                    ->get();

        return view('admin.users', compact('users'));
    }


    public function listKursus()
    {
        $kursus = Kursus::all();
        return view('admin.kursus', compact('kursus'));
    }

    public function createInstruktur()
    {
        return view('admin.user.create');
    }

    public function storeInstruktur(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
            'role'     => 'instruktur',
            'nomor_hp'  => '-',
        ]);

        return redirect()->route('admin.users')->with('success', 'Instruktur berhasil ditambahkan.');
    }

    public function detailInstruktur($id)
    {
        $user = User::with('instrukturDetail')->findOrFail($id);

        return view('instruktur.profil', [
            'user' => $user,
            'detail' => $user->instrukturDetail, 
            'mode' => 'admin'
        ]);
    }

    public function editInstruktur($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    public function updateInstruktur(Request $request, $id)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|email|unique:users,email,' . $id,
            'password'  => 'nullable|min:6',
        ]);

        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->nomor_hp = $request->nomor_hp ?? '-';

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->route('admin.users')->with('success', 'Data instruktur berhasil diperbarui.');
    }

    public function destroyInstruktur($id)
    {
        $user = User::findOrFail($id);

        // Pastikan hanya instruktur yang bisa dihapus
        if ($user->role !== 'instruktur') {
            return redirect()->route('admin.users')->with('error', 'Akun ini tidak bisa dihapus.');
        }

        $user->delete();

        return redirect()->route('admin.users')->with('success', 'Instruktur berhasil dihapus.');
    }

    public function listSiswa()
    {
        $users = User::where('role', 'siswa')->get();
        return view('admin.siswa.index', compact('users'));
    }

    public function detailSiswa($id)
    {
        $user = User::findOrFail($id);
        return view('siswa.profil', [
            'siswa' => $user,
            'mode' => 'admin'
        ]);
    }

    public function createKursus()
    {
        $instrukturs = User::where('role', 'instruktur')->get();
        return view('admin.kursus.create', compact('instrukturs'));
    }

    public function storeKursus(Request $request)
    {
        $request->validate([
            'instruktur_id'   => 'required|exists:users,id',
            'judul_kursus'    => 'required|string|max:255',
            'kategori'        => 'required|string|max:100',
            'deskripsi'       => 'nullable|string',
            'cover_kursus'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'vidio_kursus'    => 'nullable|mimes:mp4,mkv,avi|max:51200',
        ]);

        // Simpan file cover
        $coverName = null;
        if ($request->hasFile('cover_kursus')) {
            $coverName = time() . '.' . $request->cover_kursus->extension();
            $request->cover_kursus->move(public_path('uploads/covers'), $coverName);
        }

        // Simpan file video
        $videoName = null;
        if ($request->hasFile('vidio_kursus')) {
            $videoName = time() . '.' . $request->vidio_kursus->extension();
            $request->vidio_kursus->move(public_path('uploads/videos'), $videoName);
        }

        Kursus::create([
            'instruktur_id'  => $request->instruktur_id,
            'judul_kursus'   => $request->judul_kursus,
            'kategori'       => $request->kategori,
            'harga_kursus'   => 0, // Karena admin tidak input harga
            'status'         => 'aktif',
            'jumlah_siswa'   => User::where('role', 'siswa')->count(), // default
            'deskripsi'      => $request->deskripsi,
            'cover'          => $coverName,
            'vidio'          => $videoName,
            'tgl_pembuatan'  => now(),
        ]);

        return redirect()->route('admin.kursus')->with('success', 'Kursus berhasil ditambahkan.');
    }

    public function detailKursus($id)
    {
        $kursus = \App\Models\Kursus::with([
            'instruktur',
            'tujuan',
            'materi.subMateri'
        ])->findOrFail($id);

        return view('instruktur.kursus.kursus-detail', [
            'kursus' => $kursus,
            'mode' => 'admin'
        ]);
    }

     public function editKursus($id)
    {
        $kursus = Kursus::findOrFail($id);
        $instruktur = User::where('role', 'instruktur')->get(); // Jika ingin dropdown instruktur
        return view('admin.kursus.edit', compact('kursus', 'instruktur'));
    }

    public function updateKursus(Request $request, $id)
    {
        $request->validate([
            'judul_kursus' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'harga_kursus' => 'required|numeric|min:0',
            'status' => 'required|in:aktif,nonaktif',
            'jumlah_siswa' => 'nullable|integer|min:0',
            'deskripsi' => 'nullable|string',
            'cover_kursus' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'vidio_kursus' => 'nullable|mimetypes:video/mp4,video/avi,video/mpeg,video/quicktime|max:10240',
        ]);

        $kursus = Kursus::findOrFail($id);
        $kursus->judul_kursus = $request->judul_kursus;
        $kursus->kategori = $request->kategori;
        $kursus->harga_kursus = $request->harga_kursus;
        $kursus->status = $request->status;
        $kursus->jumlah_siswa = $request->jumlah_siswa ?? 0;
        $kursus->deskripsi = $request->deskripsi;

        if ($request->hasFile('cover_kursus')) {
            $coverPath = $request->file('cover_kursus')->store('uploads/covers', 'public');
            $kursus->cover = basename($coverPath);
        }

        if ($request->hasFile('vidio_kursus')) {
            $videoPath = $request->file('vidio_kursus')->store('uploads/videos', 'public');
            $kursus->vidio = basename($videoPath);
        }

        $kursus->save();

        return redirect()->route('admin.kursus')->with('success', 'Kursus berhasil diperbarui!');
    }

    public function destroyKursus($id)
    {
        $kursus = Kursus::findOrFail($id);

        // Hapus file cover jika ada
        if ($kursus->cover && File::exists(public_path('uploads/covers/' . $kursus->cover))) {
            File::delete(public_path('uploads/covers/' . $kursus->cover));
        }

        // Hapus file video jika ada
        if ($kursus->vidio && File::exists(public_path('uploads/videos/' . $kursus->vidio))) {
            File::delete(public_path('uploads/videos/' . $kursus->vidio));
        }

        // Hapus data kursus dari database
        $kursus->delete();

        return redirect()->route('admin.kursus')->with('success', 'Kursus berhasil dihapus.');
    }
}
