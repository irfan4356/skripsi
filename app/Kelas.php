<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelass';
    protected $fillable =[
        'nama_kelas','walikelas'
    ];
    
    public function siswa(){
        return $this->hasMany(Siswa::class);
    }
}
