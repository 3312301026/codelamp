<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kursus;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use App\Models\MateriKursus;
use App\Models\SubMateri;
use App\Models\TujuanKursus;


class KursusController extends Controller
{
    public function index()
    {
        $kursus = Kursus::all();
        return view('instruktur.kursus', compact('kursus'));
    }

    public function create()
    {
        return view('instruktur.kursus.kursus-tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_kursus' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'harga_kursus' => 'required|numeric',
            'status' => 'required|in:aktif,nonaktif',
            'jumlah_siswa' => 'nullable|integer|min:0',
            'deskripsi' => 'nullable|string',
            'cover_kursus' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'vidio_kursus' => 'nullable|mimetypes:video/mp4,video/avi,video/mpeg,video/quicktime|max:100000',
        ]);

        $coverName = null;
        if ($request->hasFile('cover_kursus')) {
            $cover = $request->file('cover_kursus');
            $coverName = time() . '_cover.' . $cover->getClientOriginalExtension();
            $cover->move(public_path('uploads/covers'), $coverName);
        }

        $videoName = null;
        if ($request->hasFile('vidio_kursus')) {
            $video = $request->file('vidio_kursus');
            $videoName = time() . '_video.' . $video->getClientOriginalExtension();
            $video->move(public_path('uploads/videos'), $videoName);
        }

        Kursus::create([
            'instruktur_id' => Auth::user()->id,
            'tgl_pembuatan' => now()->toDateString(),
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

    public function edit($id)
    {
        $kursus = Kursus::findOrFail($id);
        return view('instruktur.kursus.kursus-edit', compact('kursus'));
    }

    public function update(Request $request, $id)
    {
        $kursus = Kursus::findOrFail($id);

        $request->validate([
            'judul_kursus' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'harga_kursus' => 'required|numeric',
            'status' => 'required|in:aktif,nonaktif',
            'jumlah_siswa' => 'nullable|integer|min:0',
            'deskripsi' => 'nullable|string',
            'cover_kursus' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'vidio_kursus' => 'nullable|mimetypes:video/mp4,video/avi,video/mpeg,video/quicktime|max:100000',
        ]);

        if ($request->hasFile('cover_kursus')) {
            if ($kursus->cover && file_exists(public_path('uploads/covers/' . $kursus->cover))) {
                File::delete(public_path('uploads/covers/' . $kursus->cover));
            }
            $cover = $request->file('cover_kursus');
            $coverName = time() . '_cover.' . $cover->getClientOriginalExtension();
            $cover->move(public_path('uploads/covers'), $coverName);
            $kursus->cover = $coverName;
        }

        if ($request->hasFile('vidio_kursus')) {
            if ($kursus->vidio && file_exists(public_path('uploads/videos/' . $kursus->vidio))) {
                File::delete(public_path('uploads/videos/' . $kursus->vidio));
            }
            $video = $request->file('vidio_kursus');
            $videoName = time() . '_video.' . $video->getClientOriginalExtension();
            $video->move(public_path('uploads/videos'), $videoName);
            $kursus->vidio = $videoName;
        }

        $kursus->update([
            'judul_kursus' => $request->judul_kursus,
            'kategori' => $request->kategori,
            'harga_kursus' => $request->harga_kursus,
            'status' => $request->status,
            'jumlah_siswa' => $request->jumlah_siswa ?? 0,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('instruktur.kursus')->with('success', 'Kursus berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kursus = Kursus::findOrFail($id);

        if ($kursus->cover && file_exists(public_path('uploads/covers/' . $kursus->cover))) {
            File::delete(public_path('uploads/covers/' . $kursus->cover));
        }

        if ($kursus->vidio && file_exists(public_path('uploads/videos/' . $kursus->vidio))) {
            File::delete(public_path('uploads/videos/' . $kursus->vidio));
        }

        $kursus->delete();

        return redirect()->route('instruktur.kursus')->with('success', 'Kursus berhasil dihapus.');
    }

    public function show($id)
    {
        $kursus = Kursus::with([
            'instruktur',
            'tujuan',
            'materi.subMateri' // nested eager loading
        ])->findOrFail($id);

        return view('instruktur.kursus.kursus-detail', compact('kursus'));
    }


    public function createMateri($id)
    {
        $kursus = Kursus::findOrFail($id);
        return view('instruktur.kursus.materi-tambah', compact('kursus'));
    }

    public function storeMateri(Request $request)
    {
        $request->validate([
            'kursus_id' => 'required|exists:kursus,id',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'sub_materi.*' => 'nullable|string|max:255',
            'tujuan.*' => 'nullable|string|max:255',
        ]);

        // Simpan Materi Utama
        $materi = MateriKursus::create([
            'kursus_id' => $request->kursus_id,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);

        // Simpan Sub Materi jika ada
        if ($request->has('sub_materi')) {
            foreach ($request->sub_materi as $judulSub) {
                if (!empty($judulSub)) {
                    SubMateri::create([
                        'materi_kursus_id' => $materi->id,
                        'judul' => $judulSub,
                    ]);
                }
            }
        }

        // Simpan Tujuan Kursus jika ada
        if ($request->has('tujuan')) {
            foreach ($request->tujuan as $deskripsi) {
                if (!empty($deskripsi)) {
                    TujuanKursus::create([
                        'kursus_id' => $request->kursus_id,
                        'deskripsi' => $deskripsi,
                    ]);
                }
            }
        }

        return redirect()
            ->route('instruktur.kursus.show', $request->kursus_id)
            ->with('success', 'Materi dan data terkait berhasil ditambahkan.');
    }
}
