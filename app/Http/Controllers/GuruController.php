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
        
      $user = new User;
      $user->role = 'guru';
      $user->name = $request->nama_guru;
      $user->email = $request->email;
      $user->password = bcrypt('12345678');
      $user->remember_token = str::random(60);
      $user->save();

      $request->request->add(['user_id'=> $user->id]);
      Guru::create($request->all());
      return back()->withInfo('Data Berhasil Ditambahkan');
    }
    public function update(Request $request,$id){
      $guru = Guru::find($id);
      $guru->update($request->all());
      if($request->hasFile('avatar')){

        $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
        $siswa->avatar = $request->file('avatar')->getClientOriginalName();
        $siswa->save();
    }
      return back();
    }
    public function hapus($id){
      $guru = Guru::find($id);
      $guru->delete();
      return back();
    }
    public function profile($id){
      $guru = \App\Guru::find($id);
      return view('guru.profile',compact(['guru']));
    }
}
