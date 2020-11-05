<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\{mutasi,pangkat,User,pensiun};
use Auth;

class MutasiPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            if (Auth::user()->role == 'Pegawai' && Auth::user()->status == 'Aktif') {
                $mutasi = mutasi::where('nip',Auth::user()->nip)->orderBy('id','DESC')->get();
                $cek_mutasi = mutasi::where('nip',Auth::user()->nip)->orderBy('id','DESC')->first();
                return view('pegawai.mutasi.index', compact('mutasi','cek_mutasi'));
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
        if (Auth::check()) {
            if (Auth::user()->role == 'Pegawai' && Auth::user()->status == 'Aktif') {
                $cek_kadis = User::where('role','Kadis')->first();
                $cek_mutasi = mutasi::where('nip', Auth::user()->nip)->first();
                $cek_pensiun = pensiun::where('nip',Auth::user()->nip)->first();
                if (!$cek_mutasi && !$cek_pensiun) {
                    return view('pegawai.mutasi.create', compact('cek_kadis'));
                } else {
                    return redirect('home');
                }
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
        if (Auth::check()) {
            if (Auth::user()->role == 'Pegawai' && Auth::user()->status == 'Aktif') {
                $mutasi = new mutasi;
                $mutasi->pangkat_id = $request->pangkat_id;
                $mutasi->nip = Auth::user()->nip;
                $mutasi->nama = Auth::user()->name;
                $mutasi->no_surat = $request->no_surat;
                $mutasi->perihal = $request->perihal;
                $mutasi->tgl_mutasi = $request->tgl_mutasi;
                $mutasi->tgl_masuk = $request->tgl_masuk;
                $mutasi->jabatan_lama = $request->jabatan_lama;
                $mutasi->jabatan_baru = $request->jabatan_baru;
                $mutasi->status = '0';
                $mutasi->save();

                return redirect('mutasi-pegawai');
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

    // Select Nama Jabatan
    public function select_jabatan_mutasi_pegawai(Request $request)
    {
        $jabatan_mutasi = pangkat::SelectRaw('pangkats.nip,pangkats.jabatan')
        ->where('nip', $request->nip)
        ->get();

        $select = '';
        $select .= '
                    <select class="form-control" name="jabatan_lama">
                    ';
                    foreach ($jabatan_mutasi as $mutasi) {
        $select .= '<option value="'.$mutasi->jabatan.'">'.$mutasi->jabatan.'</option>';
                    }'
                    </select>';
        return $select;

    }

    // Select ID Pangkat
    public function select_id_mutasi_pegawai(Request $request)
    {
        $id_mutasi = pangkat::SelectRaw('pangkats.nip,pangkats.id')
        ->where('nip', $request->nip)
        ->get();

        $select = '';
        $select .= '
                    <select class="form-control" name="pangkat_id">
                    ';
                    foreach ($id_mutasi as $mutasi) {
        $select .= '<option value="'.$mutasi->id.'">'.$mutasi->id.'</option>';
                    }'
                    </select>';
        return $select;
    }
}
