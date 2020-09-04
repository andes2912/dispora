<?php

namespace App\Exports;
use App\User;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class PegawaiExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('admin.laporan.pegawaiEXCEL', [
            'pegawai' => User::with('pegawai')->get()
        ]);
    }
}
