<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswaa';

    protected $fillable = ['nama_siswa','nisn','jk','tmp_lahir','tgl_lahir','alamat','foto','agama','email','kelas_id'];

    public function kelas(){
        return $this->belongsTo(Kelas::class);
    }
    public function mapel(){
        return $this->belongsToMany(Mapel::class)->withPivot(['nilai'])->withTimestamps();

    }
}
