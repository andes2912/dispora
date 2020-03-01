<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    protected $fillable = [
        'id_pegawai','nip','nama','tgl','jam_masuk','jam_keluar','status','keterangan'
    ];
}
