<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelas;
use App\Guru;
use App\Siswa;
use App\Mapel;

class MapelController extends Controller
{
    public function index()
    {
        $mapell = \App\Mapel::all();
      return view('mapel.index', compact (['mapell']));
    }
    public function tambahData(Request $request)
    {
      Mapel::create($request->all());
      return back();
    }
  public function hapus($id)
    {
      $mapel = Mapel::find($id);
      $mapel->delete();
      return back();
    }
    public function update(Request $request,$id){
      //dd($request->all());
      $mapel = Mapel::find($id);
      $mapel->update($request->all());
      return back();
    }
}
   
