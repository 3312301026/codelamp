<?php

namespace App\Http\Controllers;

use App\Models\SubMateri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SubMateriController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'materi_id' => 'required|exists:materis,id',
            'judul' => 'required|string|max:255',
            'video' => 'nullable|mimes:mp4|max:51200', // Maks 50MB
        ]);

        $videoPath = $request->hasFile('video')
            ? $request->file('video')->store('videos/submateri', 'public')
            : null;

        SubMateri::create([
            'materi_id' => $request->materi_id,
            'judul' => $request->judul,
            'video' => $videoPath,
        ]);

        return back()->with('success', 'Sub Materi berhasil ditambahkan.');
    }

    public function update(Request $request, SubMateri $submateri)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'video' => 'nullable|mimes:mp4|max:51200',
        ]);

        if ($request->hasFile('video')) {
            if ($submateri->video && Storage::disk('public')->exists($submateri->video)) {
                Storage::disk('public')->delete($submateri->video);
            }
            $submateri->video = $request->file('video')->store('videos/submateri', 'public');
        }

        $submateri->judul = $request->judul;
        $submateri->save();

        return back()->with('success', 'Sub Materi berhasil diperbarui.');
    }

    public function destroy(SubMateri $submateri)
    {
        if ($submateri->video && Storage::disk('public')->exists($submateri->video)) {
            Storage::disk('public')->delete($submateri->video);
        }

        $submateri->delete();
        return back()->with('success', 'Sub Materi berhasil dihapus.');
    }
}
