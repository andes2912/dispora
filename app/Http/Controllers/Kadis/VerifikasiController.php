<?php

namespace App\Http\Controllers\Kadis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\{cuti,mutasi};
use Auth;

class VerifikasiController extends Controller
{
    // Index Cuti
    public function index()
    {
        if (Auth::check()) {
            if (Auth::user()->role == "Kadis" && auth::user()->status == "Aktif") {
                $cuti = cuti::where('id_approval',Auth::user()->id)->orderBy('id','DESC')->get();
                return view('kadis.verifikasi.cuti.index', compact('cuti'));
            }
        } else {
            return redirect('home');
        }
    }

    // Approve Cuti
    public function cuti_approve(Request $request)
    {
        if (Auth::check()) {
            if (Auth::user()->role == "Kadis" && auth::user()->status == "Aktif") {
                $approve = cuti::find($request->id);
                $approve->update([
                    'status_approval' => 'Approve'
                ]);
                return $approve;
            }
        } else {
            return redirect('home');
        }
    }

    // Reject Cuti
    public function cuti_reject(Request $request)
    {
        if (Auth::check()) {
            if (Auth::user()->role == "Kadis" && auth::user()->status == "Aktif") {
                $reject = cuti::find($request->id);
                $reject->update([
                    'status_approval' => 'Reject'
                ]);
                return $reject;
            }
        } else {
            return redirect('home');
        }
    }

    // Index Mutasi
    public function mutasi()
    {
        if (Auth::check()) {
            if (Auth::user()->role == "Kadis" && auth::user()->status == "Aktif") {
                $mutasi = mutasi::all();
                return view('kadis.verifikasi.mutasi.index', \compact('mutasi'));
            }
        } else {
            return redirect('home');
        }
    }

    // Approve Mutasi
    public function mutasi_approve(Request $request)
    {
        if (Auth::check()) {
            if (Auth::user()->role == "Kadis" && auth::user()->status == "Aktif") {
                $approve = mutasi::find($request->id);
                $approve->update([
                    'status' => 1
                ]);
                return $approve;
            }
        } else {
            return redirect('home');
        }
    }

    // Approve Mutasi
    public function mutasi_reject(Request $request)
    {
        if (Auth::check()) {
            if (Auth::user()->role == "Kadis" && auth::user()->status == "Aktif") {
                $reject = mutasi::find($request->id);
                $reject->update([
                    'status' => 2
                ]);
                return $reject;
            }
        } else {
            return redirect('home');
        }
    }
}
