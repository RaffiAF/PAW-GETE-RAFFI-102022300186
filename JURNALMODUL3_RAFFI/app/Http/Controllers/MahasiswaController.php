<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        // ==================2==================
        // - Buat object mahasiswa dengan data dummy (nama, nim, email, jurusan, fakultas, foto)
        // - Kirim object tersebut ke view 'profil'

        $mahasiswa = (object) [
            'nama' => 'Raffi Akbar Firdaus',
            'nim' => '102022300186',
            'email' => 'firdaus.raffi04@gmail.com',
            'jurusan' => 'S1 Sistem Informasi',
            'fakultas' => 'Fakultas Rekayasa Industri',
            'foto' => '/images/pp.jpg',
        ];

        return view('profil', ['mahasiswa' => $mahasiswa]);
    }
}
