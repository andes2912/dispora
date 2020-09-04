<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role','status','nip'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function pangkat()
    {
        return $this->hasOne('App\pangkat', 'user_id');
    }

    public function pegawai()
    {
        return $this->hasOne('App\Pegawai','user_id');
    }

    public function cuti()
    {
        return $this->hasOne('App\cuti','user_id');
    }

    public function absen()
    {
        return $this->hasOne('App\Absen','user_id');
    }
}
