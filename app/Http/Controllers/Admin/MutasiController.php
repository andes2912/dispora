<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\pangkat;
use App\mutasi;
use Carbon\carbon;
use Auth;

class MutasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mutasi = mutasi::all();
        return view('admin.mutasi.index', compact('mutasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pegawai = pangkat::all();
        return view('admin.mutasi.create', compact('pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mutasi = new mutasi;
        $mutasi->id_pangkat = $request->id_pangkat;
        $mutasi->nip = $request->nip;
        $mutasi->nama = $request->nama;
        $mutasi->no_surat = $request->no_surat;
        $mutasi->perihal = $request->perihal;
        $mutasi->tgl_mutasi = Carbon::parse($request->tgl_mutasi)->format('d-m-Y');
        $mutasi->tgl_masuk = Carbon::parse($request->tgl_masuk)->format('d-m-Y');
        $mutasi->jabatan_lama = $request->jabatan_lama;
        $mutasi->jabatan_baru = $request->jabatan_baru;

        if ($mutasi->save()) {
            $pangkat = pangkat::where('id', $mutasi->id_pangkat)->first();
            $pangkat->jabatan = $mutasi->jabatan_baru;
            $pangkat->Save();
        }
        return redirect('mutasi');
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

    // Select Nama Pegawai
    public function select_nama_mutasi(Request $request)
    {
        $nama_mutasi = pangkat::SelectRaw('pangkats.nip,pangkats.id_user,pangkats.nama')
            ->where('pangkats.nip', $request->nip)
            ->get();

            $select = '';
            $select .= '
                        <select class="form-control" name="nama">
                        ';
                        foreach ($nama_mutasi as $mutasi) {
            $select .= '<option value="'.$mutasi->nama.'">'.$mutasi->nama.'</option>';
                        }'
                        </select>';
            return $select;
    }

    // Select Nama Jabatan
    public function select_jabatan_mutasi(Request $request)
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
    public function select_id_mutasi(Request $request)
    {
        $id_mutasi = pangkat::SelectRaw('pangkats.nip,pangkats.id')
        ->where('nip', $request->nip)
        ->get();

        $select = '';
        $select .= '
                    <select class="form-control" name="id_pangkat">
                    ';
                    foreach ($id_mutasi as $mutasi) {
        $select .= '<option value="'.$mutasi->id.'">'.$mutasi->id.'</option>';
                    }'
                    </select>';
        return $select;
    }

}
