<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = "pegawais";
    protected $guarded = [];

    public function pangkat()
    {
        return $this->belongsTo(pangkat::class);
    }

    public function User()
    {
        return $this->belongsTo('App\User','id');
    }
}
