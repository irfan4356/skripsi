<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Guru;
use App\Jadwal;
use App\Mapel;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index(){
        $kelas = Kelas::OrderBy('nama_kelas', 'asc')->get();
        $kelas2 = Kelas::all();
        $guru = Guru::OrderBy('id', 'asc')->get();
        $mapel = Mapel::all();
        return view('jadwal.index', compact(['kelas', 'guru','mapel','kelas2']));
    }

}
