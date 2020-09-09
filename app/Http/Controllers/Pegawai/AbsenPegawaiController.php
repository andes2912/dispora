<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\{Pegawai,Absen};
use Carbon\carbon;
use Auth;

class AbsenPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected function rule() {
        $null = Auth::user()->pegawai->ttl == null || Auth::user()->pegawai->tempatlahir == null || Auth::user()->pegawai->kelamin == null || Auth::user()->pegawai->agama == null || Auth::user()->pegawai->nonpwp == null || Auth::user()->pegawai->nik == null || Auth::user()->pegawai->alamat == null || Auth::user()->pegawai->foto == null || Auth::user()->status == 'Pensiun';
    }
    public function index()
    {
        if (auth()->check()) {
            if (auth::user()->role == "Pegawai" && Auth::user()->status == 'Aktif') {
                $cek = Pegawai::where('user_id',auth::user()->id)->first();
                $cekabsen = Absen::where('user_id',$cek->id)->first();
                $absen = Absen::where('user_id',$cek->id)->get();
                $date = Carbon::now()->format('d-m-Y');
                $jam = Carbon::now()->format('h:i:s');
                $dates = '04:30:0';
                return view('pegawai.absen.index', compact('absen','cekabsen','date','dates','jam'));
            } else {
                return redirect('home');
            }
        } else {
            return redirect('home');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->check()) {
            if (auth::user()->role == "Pegawai" && Auth::user()->status == 'Aktif') {
                return view('pegawai.absen.create');
            } else {
                return redirect('home');
            }
        } else {
            return redirect('home');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (auth()->check()) {
            if (auth::user()->role == "Pegawai" && Auth::user()->status == 'Aktif') {
                $absen = New Absen;
                $absen->user_id = Auth::user()->id;
                $absen->nip = Auth::user()->nip;
                $absen->nama = Auth::user()->name;
                $absen->tgl = carbon::now()->format('d-m-Y');
                $absen->jam_masuk = carbon::now()->format('h:i:s');
                $absen->status = $request->status;
                $absen->keterangan = $request->keterangan;
                $absen->save();

                return redirect('absensi');
            }
        }else {
            return redirect('home');
        }
    }

    public function keluar(Request $request)
    {
        if (auth()->check()) {
            if (auth::user()->role == "Pegawai" && Auth::user()->status == 'Aktif') {
                $keluar = Absen::find($request->id);
                $keluar->update([
                    'jam_keluar' => Carbon::now()->format('h:i:s'),
                ]);

                return $keluar;
            } else {
                return redirect('home');
            }
        } else {
            return redirect('home');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
