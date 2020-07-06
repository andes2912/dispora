<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\pensiun;
use App\pangkat;
use App\gaji;
use App\User;

class PensiunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pensiun = pensiun::all();
        return view('admin.pensiun.index', compact('pensiun'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pegawai = pangkat::all();
        return view('admin.pensiun.create', compact('pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pensiun = new pensiun;
        $pensiun->id_pangkat = $request->id_pangkat;
        $pensiun->nip = $request->nip;
        $pensiun->nama = $request->nama;
        $pensiun->date_pensiun = $request->date_pensiun;
        $pensiun->golongan = $request->golongan;
        $pensiun->kelas = $request->kelas;
        $pensiun->kedudukan = $request->kedudukan;
        $pensiun->gaji = $request->gaji;
        $pensiun->tunjangan = $request->tunjangan;

        if ($pensiun->save()) {
            $user = User::where('nip', $pensiun->nip)->first();
            $user->status = 'Pensiun';
            $user->save();
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

    // Select ID
    public function select_id_pensiun(Request $request)
    {
        $id_pangkat = pangkat::SelectRaw('pangkats.nip,pangkats.id')
            ->where('pangkats.nip', $request->nip)
            ->get();

            $select = '';
            $select .= '
                        <select class="form-control" name="id_pangkat">
                        ';
                        foreach ($id_pangkat as $pangkat) {
            $select .= '<option value="'.$pangkat->id.'">'.$pangkat->id.'</option>';
                        }'
                        </select>';
            return $select;
    }

    // Select Nama
    public function select_nama_pensiun(Request $request)
    {
        $nama_pangkat = pangkat::SelectRaw('pangkats.nip,pangkats.nama')
            ->where('pangkats.nip', $request->nip)
            ->get();

            $select = '';
            $select .= '
                        <select class="form-control" name="nama">
                        ';
                        foreach ($nama_pangkat as $pangkat) {
            $select .= '<option value="'.$pangkat->nama.'">'.$pangkat->nama.'</option>';
                        }'
                        </select>';
            return $select;
    }

    // Select Golongan
    public function select_golongan_pensiun(Request $request)
    {
        $golongan_pangkat = pangkat::SelectRaw('pangkats.nip,pangkats.golongan')
            ->where('pangkats.nip', $request->nip)
            ->get();

            $select = '';
            $select .= '
                        <select class="form-control" name="golongan">
                        ';
                        foreach ($golongan_pangkat as $pangkat) {
            $select .= '<option value="'.$pangkat->golongan.'">'.$pangkat->golongan.'</option>';
                        }'
                        </select>';
            return $select;
    }

    // Select Kelas
    public function select_kelas_pensiun(Request $request)
    {
        $kelas_pangkat = pangkat::SelectRaw('pangkats.nip,pangkats.kelas')
            ->where('pangkats.nip', $request->nip)
            ->get();

            $select = '';
            $select .= '
                        <select class="form-control" name="kelas">
                        ';
                        foreach ($kelas_pangkat as $pangkat) {
            $select .= '<option value="'.$pangkat->kelas.'">'.$pangkat->kelas.'</option>';
                        }'
                        </select>';
            return $select;
    }

    // Select Kedudukan
    public function select_kedudukan_pensiun(Request $request)
    {
        $kedudukan_pangkat = pangkat::SelectRaw('pangkats.nip,pangkats.kedudukan')
            ->where('pangkats.nip', $request->nip)
            ->get();

            $select = '';
            $select .= '
                        <select class="form-control" name="kedudukan">
                        ';
                        foreach ($kedudukan_pangkat as $pangkat) {
            $select .= '<option value="'.$pangkat->kedudukan.'">'.$pangkat->kedudukan.'</option>';
                        }'
                        </select>';
            return $select;
    }

    // Select Gaji
    public function select_gaji_pensiun(Request $request)
    {
        $gaji_pensiun = gaji::SelectRaw('gajis.nip,gajis.gaji')
            ->where('gajis.nip', $request->nip)
            ->get();

            $select = '';
            $select .= '
                        <select class="form-control" name="gaji">
                        ';
                        foreach ($gaji_pensiun as $pensiun) {
            $select .= '<option value="'.$pensiun->gaji.'">'.$pensiun->gaji.'</option>';
                        }'
                        </select>';
            return $select;
    }

    // Select Tnjangan
    public function select_tunjangan_pensiun(Request $request)
    {
        $tunjangan_pensiun = gaji::SelectRaw('gajis.nip,gajis.tunjangan')
            ->where('gajis.nip', $request->nip)
            ->get();

            $select = '';
            $select .= '
                        <select class="form-control" name="tunjangan">
                        ';
                        foreach ($tunjangan_pensiun as $pensiun) {
            $select .= '<option value="'.$pensiun->tunjangan.'">'.$pensiun->tunjangan.'</option>';
                        }'
                        </select>';
            return $select;
    }
}
