<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $guarded = [];

    // public function User()
    // {
    //     return $this->belongsTo('App\User', 'id_user');
    // }

    public function pangkat()
    {
        return $this->hasOne('App\pangkat','id_user');
    }

    public function user()
    {
        return $this->hasOne('App\User','id');
    }
}
