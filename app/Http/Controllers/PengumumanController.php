<?php

namespace App\Http\Controllers;

use App\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function index()
    {
        $pengumuman = Pengumuman::all();
        return view('pengumuman.index',compact(['pengumuman']));
    }

    public function store(Request $request)
    {
        $pengumuman = new Pengumuman;
        $pengumuman->judul=$request->judul;
        $pengumuman->isi=$request->isi;
        $pengumuman->save();

        return back()->withInfo('Pengumuman sudah dibuat');
        
    }
}
