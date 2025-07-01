<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kursus;

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
}
