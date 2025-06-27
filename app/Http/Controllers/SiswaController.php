<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{
    public function gantiSandi()
    {
        $user = Auth::user(); // Akan bernilai null jika belum login
        return view('Siswa.ganti_sandi', compact('user'));
    }
}
