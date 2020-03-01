<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $fillable = [
        'id_user','nip','tipepns','nipbaru','nama','ttl','tempatlahir','kelamin','agama','statusnikah','kedudukanpns','goldarah','alamat','nokarpeg','noaskes','notaspen','nonpwp','nokarsuskaris','nik','foto'
    ];
}
