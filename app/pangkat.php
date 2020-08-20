<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pangkat extends Model
{
    protected $table = "pangkats";
    
    protected $guarded = [];

    public function User()
    {
        return $this->hasOne('App\User', 'id');
    }

    public function Pegawai()
    {
        return $this->hasOne(Pegawai::class);
    }
}
