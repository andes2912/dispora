<?php

namespace App\Http\Controllers\Kadis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\cuti;
use App\mutasi;
use Auth;

class VerifikasiController extends Controller
{
    // Index Cuti
    public function index()
    {
        $cuti = cuti::where('id_approval',Auth::user()->id)->orderBy('id','DESC')->get();
        return view('kadis.verifikasi.cuti.index', compact('cuti'));
    }

    // Approve Cuti
    public function cuti_approve(Request $request)
    {
        $approve = cuti::find($request->id);
        $approve->update([
            'status_approval' => 'Approve'
        ]);
        return $approve;
    }

    // Reject Cuti
    public function cuti_reject(Request $request)
    {
        $reject = cuti::find($request->id);
        $reject->update([
            'status_approval' => 'Reject'
        ]);
        return $reject;
    }

    // Index Mutasi
    public function mutasi()
    {
        $mutasi = mutasi::all();
        return view('kadis.verifikasi.mutasi.index', \compact('mutasi'));
    }

    // Approve Mutasi
    public function mutasi_approve(Request $request)
    {
        $approve = mutasi::find($request->id);
        $approve->update([
            'status' => 1
        ]);
        return $approve;
    }

    // Approve Mutasi
    public function mutasi_reject(Request $request)
    {
        $reject = mutasi::find($request->id);
        $reject->update([
            'status' => 2
        ]);
        return $reject;
    }
}
