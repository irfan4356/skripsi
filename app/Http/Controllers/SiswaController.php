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
    public function tambahData(Request $request)
    {
        $user = new \App\User;
        $user->role = 'siswa';
        $user->name = $request->nama_siswa;
        $user->email = $request->email;
        $user->password = bcrypt('12345678');
        $user->remember_token = str::random(60);
        $user->save();

        $request->request->add(['user_id'=> $user->id]);

        Siswa::create($request->all());
        return back();
    }
    public function update(Request $request,$id){
      //dd($request->all());
      $siswa = Siswa::find($id);
      $siswa->update($request->all());
      if($request->hasFile('avatar')){

        $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
        $siswa->avatar = $request->file('avatar')->getClientOriginalName();
        $siswa->save();
    }
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
      $siswa = \App\Siswa::find($id);
      $mapel = Mapel::find($id);
      $categories = [];
      $data =[];
      
      foreach($matapelajaran as $mp){
        if($siswa->mapel()->wherePivot('mapel_id',$mp->id)->first()){
            $categories[]= $mp->nama;
            $data[]= $siswa->mapel()->wherePivot('mapel_id',$mp->id)->first()->pivot->nilai;
        }
    }
      return view('siswa.profile',compact(['siswa','kelas','matapelajaran','categories','data','mapel']));
      
    }
    public function addnilai(Request $request, $idsiswa){

      $request->validate([
          'mapel' => 'required',
          'nilai' => 'required|max:3'
      ]);

      $siswa=\App\Siswa::find($idsiswa);

      if($siswa->mapel()->where('mapel_id',$request->mapel)->exists()){
          return redirect('siswa/'.$idsiswa.'/profile')->withError('Data sudah ada!!');
      }

      $siswa->mapel()->attach($request->mapel,['nilai' => $request->nilai]);
      // ['nilai'=>$request->nilai]);
      return redirect('siswa/'.$idsiswa.'/profile')->withInfo('Data sudah ditambah');
  }
  public function updatenilai(Request $request,$idsiswa){
    $siswa=\App\Siswa::find($idsiswa);
    $siswa->mapel()->updateExistingPivot($request->mapel,['nilai' => $request->nilai]);
    // dd($request->all());
    return redirect('siswa/'.$idsiswa.'/profile')->withInfo('Data sudah diupdate!');
  }
  public function deletenilai($idsiswa, $idmapel){
    $siswa = Siswa::find($idsiswa);
    $siswa->mapel()->detach($idmapel);
    return redirect()->back()->with('sukses','Data sudah dihapus');

  }
  public function profilsaya(){
    
    return view('siswa.profilsaya');
    
  }

  public function nilaisaya(){
    
    return view('siswa.nilaisaya');
    
  } 
}
