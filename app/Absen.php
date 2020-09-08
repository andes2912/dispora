<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    protected $fillable = [
        'user_id','nip','nama','tgl','jam_masuk','jam_keluar','status','keterangan'
    ];

    public function User()
    {
        return $this->belongsTo('App\User','id');
    }
}
