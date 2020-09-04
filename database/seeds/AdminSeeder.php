<?php

use Illuminate\Database\Seeder;
use App\{User,pegawai};

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user = User::create([
            'name'      => 'Admin',
            'email'     => 'admin@dispora.com',
            'nip'       => '938112398290',
            'status'    => 'Aktif',
            'role'      => 'Admin',
            'password'  => bcrypt('12345678')
        ]);

        if ($user) {
            $pegawai = pegawai::Create([
                'user_id'   => $user->id,
                'nip'       => $user->nip,
                'tipepns'   => 'PNS',
                'nama'      => $user->name
            ]);
        }
    }
}
