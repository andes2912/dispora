<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $guarded = [];

    public function User()
    {
        return $this->belongsTo('App\User', 'id_user');
    }
}
