<?php

namespace App\Http\Controllers;

use Auth;
use App\Siswa;
use App\Kelas;
use App\Mapel;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use PDF;
use App\Exports\SiswaExport;
use App\Imports\SiswaImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class SiswaController extends Controller
{
    public function index()
    {
        $kelass = \App\Kelas::all();
        $data_siswaa = \App\Siswa::all();
      return view('siswa.index', compact(['data_siswaa','kelass']));
    }
    public function tambahData(Request $request){

        Siswa::create($request->all());
        return back();
    }
    public function update(Request $request,$id){
      //dd($request->all());
      $siswa = Siswa::find($id);
      $siswa->update($request->all());
      return back();
    }
    public function hapus($id){
      $siswa = Siswa::find($id);
      $siswa->delete();
      return back();
    }
    public function profile($id){
      $kelass = Kelas::all();
      $matapelajaran = Mapel::all(); 
      $siswaa = \App\Siswa::find($id);
      $mapel = Mapel::find($id);
      
      return view('siswa.profile',compact(['siswaa','mapell','kelas']));
      
    }
    public function nilai($id){
      $siswaa = \App\Siswa::find($id); 

      return view('siswa.nilai',compact(['siswaa','nilai']));
    }
    
}
