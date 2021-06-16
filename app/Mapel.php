<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $table = 'mapell';

    protected $fillable=['kode','nama','semester'];

    public function siswa(){
        return $this->belongsToMany(Siswa::class);
    }
}
