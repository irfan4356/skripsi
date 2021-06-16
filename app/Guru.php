<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'guruu';

    protected $fillable = ['nama_guru','nip','user_id','avatar','jk','telp','tmp_lahir','tgl_lahir','foto','agama','email'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
