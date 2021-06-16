<?php

namespace App\Http\Controllers;

use Auth;
use App\Guru;
use App\Kelas;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use PDF;
use App\Exports\GuruExport;
use App\Imports\GuruImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;


class GuruController extends Controller
{
    public function index()
    {
        $data_guruu = \App\Guru::all();
      return view('guru.index',['data_guruu' => $data_guruu]);
    }
    public function tambahData(Request $request){
        
      Guru::create($request->all());
      return back();
    }
    public function update(Request $request,$id){
      $guru = Guru::find($id);
      $guru->update($request->all());
      return back();
    }
    public function hapus($id){
      $guru = Guru::find($id);
      $guru->delete();
      return back();
    }
    public function profile($id){
      $guru = \App\Guru::find($id);
      return view('guru.profile',['guruu'=>$guru]);
    }
}
