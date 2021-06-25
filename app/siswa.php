<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswaa';

    protected $fillable = ['nama_siswa','nisn','jk','tmp_lahir','tgl_lahir','alamat','avatar','agama','email','kelas_id','user_id'];

    public function getAvatar(){
        if(!$this->avatar){
            return asset('adminlte/dist/img/avatar2.png');
        }
        return asset('images/'.$this->avatar);
    }

    public function kelas(){
        return $this->belongsTo(Kelas::class);
    }
    public function mapel(){
        return $this->belongsToMany(Mapel::class)->withPivot(['nilai'])->withTimestamps();

    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function test(){
        //nilai rata"
        $total = 0;
        $hitung = 0;
        foreach ($this->mapel as $mapel){
            $total += $mapel->pivot->nilai;
            $hitung++;
        }
        return round($total/$hitung);
    }
    
}
