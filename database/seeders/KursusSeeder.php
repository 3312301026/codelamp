<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use App\Models\Kursus;
use App\Models\TujuanKursus;
use App\Models\MateriKursus;
use App\Models\SubMateri;
use App\Models\User;

class KursusSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil semua instruktur dari tabel users yang memiliki role = 'instruktur'
        $instrukturs = User::where('role', 'instruktur')->get();

        if ($instrukturs->isEmpty()) {
            $this->command->warn('Tidak ada user dengan role "instruktur" ditemukan. Seeder dibatalkan.');
            return;
        }

        $kursusList = [
            [
                'judul_kursus' => 'Bahasa Inggris Sehari-hari untuk Percakapan',
                'tgl_pembuatan' => Carbon::now(),
                'kategori' => 'Bahasa',
                'harga_kursus' => 240000,
                'status' => 'aktif',
                'cover' => 'gambar3.jpg',
                'vidio' => 'video1.mp4',
                'deskripsi' => 'Pelajari percakapan Bahasa Inggris sehari-hari dengan mudah.',
                'jumlah_siswa' => 36,
                'tujuan' => [
                    'Meningkatkan kemampuan berbicara dan memahami bahasa Inggris dalam konteks sehari-hari.',
                    'Meningkatkan kepercayaan diri dalam berbicara bahasa Inggris.',
                    'Memahami tata bahasa dasar dan memperluas kosakata.',
                ],
                'materi' => [
                    [
                        'judul' => 'Pengantar Pembelajaran',
                        'deskripsi' => 'Dasar penting sebelum memulai kursus',
                        'sub_materi' => ['Perkenalan Kursus', 'Cara Belajar Efektif', 'Mengenal Fitur Platform'],
                    ],
                    [
                        'judul' => 'Pengenalan Bahasa',
                        'deskripsi' => 'Dasar-dasar bahasa Inggris',
                        'sub_materi' => ['Abjad dan Pelafalan', 'Salam dan Perkenalan Diri', 'Kata Ganti Orang'],
                    ],
                    [
                        'judul' => 'Percakapan Dasar',
                        'deskripsi' => 'Latihan berbicara dengan topik sehari-hari',
                        'sub_materi' => ['Memesan Makanan', 'Bertanya Arah', 'Berbelanja'],
                    ],
                ],
            ],
            [
                'judul_kursus' => 'Pemrograman Web Dasar',
                'tgl_pembuatan' => Carbon::now()->subDays(2),
                'kategori' => 'Teknologi',
                'harga_kursus' => 180000,
                'status' => 'aktif',
                'cover' => 'gambar2.jpg',
                'vidio' => 'video2.mp4',
                'deskripsi' => 'Dasar-dasar HTML, CSS dan JavaScript untuk pemula.',
                'jumlah_siswa' => 42,
                'tujuan' => [
                    'Menguasai struktur dasar HTML dan CSS.',
                    'Membuat halaman web sederhana.',
                    'Memahami dasar JavaScript untuk interaktivitas.',
                ],
                'materi' => [
                    [
                        'judul' => 'Pengenalan Web',
                        'deskripsi' => 'Apa itu web dan cara kerjanya',
                        'sub_materi' => ['Sejarah dan Struktur Web', 'Apa itu Browser dan Server'],
                    ],
                    [
                        'judul' => 'Dasar HTML',
                        'deskripsi' => 'Membangun struktur halaman',
                        'sub_materi' => ['Elemen dan Tag Dasar', 'Form dan Input', 'Hyperlink dan Gambar'],
                    ],
                    [
                        'judul' => 'CSS Dasar',
                        'deskripsi' => 'Menata tampilan halaman',
                        'sub_materi' => ['Selektor dan Properti', 'Box Model', 'Layout dengan Flexbox'],
                    ],
                ],
            ],
            [
                'judul_kursus' => 'Desain Grafis dengan Canva',
                'tgl_pembuatan' => Carbon::now()->subDays(1),
                'kategori' => 'Desain',
                'harga_kursus' => 120000,
                'status' => 'aktif',
                'cover' => 'gambar4.jpg',
                'vidio' => 'video3.mp4',
                'deskripsi' => 'Panduan lengkap membuat desain menarik menggunakan Canva.',
                'jumlah_siswa' => 29,
                'tujuan' => [
                    'Memahami dasar-dasar desain visual.',
                    'Menggunakan fitur-fitur utama Canva.',
                    'Membuat desain profesional tanpa pengalaman desain.',
                ],
                'materi' => [
                    [
                        'judul' => 'Pengenalan Canva',
                        'deskripsi' => 'Apa itu Canva dan mengapa populer',
                        'sub_materi' => ['Membuat Akun Canva', 'Navigasi Dasar', 'Template dan Elemen'],
                    ],
                    [
                        'judul' => 'Desain Sosial Media',
                        'deskripsi' => 'Membuat konten Instagram dan Facebook',
                        'sub_materi' => ['Post Instagram', 'Story Instagram', 'Thumbnail YouTube'],
                    ],
                    [
                        'judul' => 'Proyek Akhir',
                        'deskripsi' => 'Latihan mandiri membuat desain promosi',
                        'sub_materi' => ['Desain Poster', 'Flyer Event', 'Banner Online'],
                    ],
                ],
            ],
        ];

        foreach ($kursusList as $index => $data) {
            // Ambil instruktur secara bergilir dan gunakan kolom 'name'
            $instruktur = $instrukturs[$index % $instrukturs->count()];
            $instrukturName = $instruktur->name;

            // Simpan kursus
            $kursusModel = Kursus::create([
                'tgl_pembuatan' => $data['tgl_pembuatan'],
                'instruktur_id' => $instruktur->id, // sesuaikan dengan kolom relasional
                'judul_kursus' => $data['judul_kursus'],
                'kategori' => $data['kategori'],
                'harga_kursus' => $data['harga_kursus'],
                'status' => $data['status'],
                'cover' => $data['cover'],
                'vidio' => $data['vidio'],
                'deskripsi' => $data['deskripsi'],
                'jumlah_siswa' => $data['jumlah_siswa'],
            ]);


            // Tambahkan tujuan kursus
            foreach ($data['tujuan'] as $tujuan) {
                TujuanKursus::create([
                    'kursus_id' => $kursusModel->id,
                    'deskripsi' => $tujuan,
                ]);
            }

            // Tambahkan materi dan submateri
            foreach ($data['materi'] as $materiIndex => $materi) {
                $materiModel = MateriKursus::create([
                    'kursus_id' => $kursusModel->id,
                    'judul' => $materi['judul'],
                    'deskripsi' => $materi['deskripsi'],
                    'urutan' => $materiIndex + 1,
                ]);

                foreach ($materi['sub_materi'] as $subIndex => $subjudul) {
                    SubMateri::create([
                        'materi_kursus_id' => $materiModel->id,
                        'judul' => $subjudul,
                        'urutan' => $subIndex + 1,
                    ]);
                }
            }
        }
    }
}
