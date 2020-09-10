<?php

namespace App\Http\Controllers\Kadis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;

class LaporanController extends Controller
{
    // laporan
    public function laporan_kadis()
    {
        if (Auth::check()) {
            if (Auth::user()->role == 'Kadis') {
                $pegawai = User::with('pegawai','pangkat')->get();
                return view('kadis.laporan.index', compact('pegawai'));
            }
        }
        
    }

    // Filter Laporan
    public function filter_laporan(Request $request)
    {
        if (Auth::check()) {
            if (Auth::user()->role == 'Kadis') {
                $pegawai = User::selectRaw('Users.*,a.jabatan')
                ->leftJoin('pangkats as a','a.user_id','=','Users.id')
                ->where('a.jabatan', $request->jabatan)
                ->get();

                $return = "";
                foreach ($pegawai as $item) {
                    $return .= "<tr>
                            <td> ".$item->nip."</td>
                            <td> ".$item->name."</td>
                            <td> ".$item->pegawai->kelamin."</td>
                            <td> ".$item->pangkat->jabatan."</td>
                            <td> ".$item->pegawai->agama."</td>
                            ";
                    $return .= "</td>
                            </tr>";
                }
                return $return;
            }
        }
    }
}
