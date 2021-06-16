<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Guru;
use App\Paket;
use App\Jadwal;
use App\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class KelasController extends Controller
{
    public function index()
    {
      $guru = Guru::all();
        $data_kelass = \App\Kelas::all();
      return view('kelas.index', compact (['data_kelass','data_guruu']));
    }
    public function tambahData(Request $request){
        Kelas::create($request->all());
        return back()->withInfo('Kelas sudah ditambahkan');
    }
    public function hapus($id){
        $kelas = Kelas::find($id);
        $kelas->delete();
        return back();
      }
      public function update(Request $request,$id){
        $request->validate([
          'nama_kelas' => 'required|unique:kelas,nama_kelas,'.$id,
          'walikelas' =>'required|unique:kelas,walikelas,'.$id,
          ]);

        $kelas = Kelas::find($id);
        $kelas->update($request->all());
        return back();
      }
      public function show($id)
    {
        $kelas = Kelas::paginate(5);
        $kelas2 = Kelas::find($id);
        return view('kelas.show',compact(['kelas','kelas2']));
    }
}
