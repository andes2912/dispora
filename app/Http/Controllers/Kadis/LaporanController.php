<?php

namespace App\Http\Controllers\Kadis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use PDF;

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
            if (Auth::user()->role == 'Kadis' || Auth::user()->role == 'Admin') {
                $pegawai = User::selectRaw('Users.*,a.jabatan,a.golongan')
                ->leftJoin('pangkats as a','a.user_id','=','Users.id')
                ->where('a.jabatan', $request->jabatan)
                ->orWhere('a.golongan', $request->golongan)
                ->orWhere('Users.status', $request->status)
                ->get();

                $return = "";
                $no=1;
                foreach ($pegawai as $item) {
                    $return .= "<tr>
                            <td> ".$no."</td>
                            <td> ".$item->nip."</td>
                            <td> ".$item->name."</td>
                            <td> ".$item->pegawai->kelamin."</td>
                            <td> ".$item->pangkat->jabatan."</td>
                            <td> ".$item->pegawai->agama."</td>
                          
                            ";
                    $return .= "</td>
                            </tr>";
                    $no++;
                }
                return $return;
            }
        }
    }

    // Download
    public function down_laporan(Request $request)
    {
        if (Auth::check()) {
            if (Auth::user()->role == 'Kadis' || Auth::user()->role == 'Admin') {
                $pegawai = User::selectRaw('Users.*,a.jabatan,a.golongan')
                ->leftJoin('pangkats as a','a.user_id','=','Users.id')
                ->where('a.jabatan', $request->jabatan)
                ->orWhere('a.golongan', $request->golongan)
                ->get();

                $pdf = PDF::loadView('admin.laporan.pegawaiPDF',['pegawai' => $pegawai]);
                $pdf->setPaper('A4', 'landscape');
                    return $pdf->download('pegawaiPDF.pdf');
            }
        }
    }
}