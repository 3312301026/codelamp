<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register'); // View untuk form pendaftaran siswa
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nomor_hp' => 'required|string|max:20',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'nomor_hp' => $request->nomor_hp,
            'email' => $request->email,
            'role' => 'siswa',
            'password' => Hash::make($request->password),
            'email_verified_at' => now(),
        ]);

        auth()->login($user);

        return redirect()->route('siswa.dashboard');
    }
}
