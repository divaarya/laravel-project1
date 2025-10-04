<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        return view('beranda', ['title' => "beranda"]);
    }

    public function profil()
    {
        $data = [
            'nama' => ' Arya Diva ',   
            'kelas' => 'XI PPLG 2',   
            'sekolah' => 'SMK Yakuza'
        ];
        return view('profil', ['title' => "profil"], $data);
    }

}
