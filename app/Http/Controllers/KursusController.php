<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kursus;
use Illuminate\Support\Facades\File;

class KursusController extends Controller
{
    /**
     * Menampilkan daftar semua kursus.
     */
    public function index()
    {
        $kursus = Kursus::all();
        return view('instruktur.kursus', compact('kursus'));
    }

    /**
     * Menampilkan form tambah kursus.
     */
    public function create()
    {
        return view('instruktur.kursus.kursus-tambah');
    }

    /**
     * Menyimpan data kursus baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'instruktur' => 'required|string|max:255',
            'judul_kursus' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'harga_kursus' => 'required|numeric',
            'status' => 'required|in:aktif,nonaktif',
            'jumlah_siswa' => 'nullable|integer|min:0',
            'deskripsi' => 'nullable|string',
            'cover_kursus' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'vidio_kursus' => 'nullable|mimetypes:video/mp4,video/avi,video/mpeg,video/quicktime|max:100000', // max size dalam KB
        ]);

        // Upload file cover jika ada
        $coverName = null;
        if ($request->hasFile('cover_kursus')) {
            $cover = $request->file('cover_kursus');
            $coverName = time() . '_cover.' . $cover->getClientOriginalExtension();
            $cover->move(public_path('uploads/covers'), $coverName);
        }

        // Upload file video jika ada
        $videoName = null;
        if ($request->hasFile('vidio_kursus')) {
            $video = $request->file('vidio_kursus');
            $videoName = time() . '_video.' . $video->getClientOriginalExtension();
            $video->move(public_path('uploads/videos'), $videoName);
        }

        // Simpan ke database
        Kursus::create([
            'tgl_pembuatan' => now()->toDateString(),
            'instruktur' => $request->instruktur,
            'judul_kursus' => $request->judul_kursus,
            'kategori' => $request->kategori,
            'harga_kursus' => $request->harga_kursus,
            'status' => $request->status,
            'jumlah_siswa' => $request->jumlah_siswa ?? 0,
            'deskripsi' => $request->deskripsi,
            'cover' => $coverName,
            'vidio' => $videoName,
        ]);

        return redirect()->route('instruktur.kursus')->with('success', 'Kursus berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit kursus.
     */
    public function edit($id)
    {
        $kursus = Kursus::findOrFail($id);
        return view('instruktur.kursus.kursus-edit', compact('kursus'));
    }

    /**
     * Memperbarui data kursus yang ada.
     */
    public function update(Request $request, $id)
    {
        $kursus = Kursus::findOrFail($id);

        // Validasi input
        $request->validate([
            'instruktur' => 'required|string|max:255',
            'judul_kursus' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'harga_kursus' => 'required|numeric',
            'status' => 'required|in:aktif,nonaktif',
            'jumlah_siswa' => 'nullable|integer|min:0',
            'deskripsi' => 'nullable|string',
            'cover_kursus' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'vidio_kursus' => 'nullable|mimetypes:video/mp4,video/avi,video/mpeg,video/quicktime|max:100000',
        ]);

        // Handle cover baru jika diupload
        if ($request->hasFile('cover_kursus')) {
            if ($kursus->cover && file_exists(public_path('uploads/covers/' . $kursus->cover))) {
                File::delete(public_path('uploads/covers/' . $kursus->cover));
            }
            $cover = $request->file('cover_kursus');
            $coverName = time() . '_cover.' . $cover->getClientOriginalExtension();
            $cover->move(public_path('uploads/covers'), $coverName);
            $kursus->cover = $coverName;
        }

        // Handle video baru jika diupload
        if ($request->hasFile('vidio_kursus')) {
            if ($kursus->vidio && file_exists(public_path('uploads/videos/' . $kursus->vidio))) {
                File::delete(public_path('uploads/videos/' . $kursus->vidio));
            }
            $video = $request->file('vidio_kursus');
            $videoName = time() . '_video.' . $video->getClientOriginalExtension();
            $video->move(public_path('uploads/videos'), $videoName);
            $kursus->vidio = $videoName;
        }

        // Update field lainnya
        $kursus->update([
            'instruktur' => $request->instruktur,
            'judul_kursus' => $request->judul_kursus,
            'kategori' => $request->kategori,
            'harga_kursus' => $request->harga_kursus,
            'status' => $request->status,
            'jumlah_siswa' => $request->jumlah_siswa ?? 0,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('instruktur.kursus')->with('success', 'Kursus berhasil diperbarui.');
    }

        /**
     * Menghapus data kursus.
     */
    public function destroy($id)
    {
        $kursus = Kursus::findOrFail($id);

        // Hapus file cover jika ada
        if ($kursus->cover && file_exists(public_path('uploads/covers/' . $kursus->cover))) {
            File::delete(public_path('uploads/covers/' . $kursus->cover));
        }

        // Hapus file video jika ada
        if ($kursus->vidio && file_exists(public_path('uploads/videos/' . $kursus->vidio))) {
            File::delete(public_path('uploads/videos/' . $kursus->vidio));
        }

        // Hapus data dari database
        $kursus->delete();

        return redirect()->route('instruktur.kursus')->with('success', 'Kursus berhasil dihapus.');

        
    }

        /**
     * Menampilkan detail dari satu kursus.
     */
    public function show($id)
    {
        $kursus = Kursus::findOrFail($id);
        return view('instruktur.kursus.kursus-detail', compact('kursus'));
    }
}
