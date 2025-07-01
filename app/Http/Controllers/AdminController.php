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
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function listKursus()
    {
        $kursus = Kursus::all();
        return view('admin.kursus', compact('kursus'));
    }
}
