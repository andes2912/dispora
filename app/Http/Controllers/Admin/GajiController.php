<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\gaji;
use App\Pegawai;
use Auth;

class GajiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gaji = gaji::all();
        return view('admin.gaji.index', compact('gaji'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pegawai = Pegawai::where('id_gaji', null)->get();
        return view('admin.gaji.create', compact('pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gaji = new gaji;
        $gaji->id = $request->id;
        $gaji->id_user = $request->id_user;
        $gaji->nip = $request->nip;
        $gaji->nama = $request->nama;
        $gaji->gaji = $request->gaji;
        $gaji->tunjangan = $request->tunjangan;
        $gaji->golongan = $request->golongan;
        $gaji->kelas = $request->kelas;
        $gaji->kedudukan = $request->kedudukan;

        if ($gaji->save()) {
           $pegawai = Pegawai::where('nip',$gaji->nip)->first();
           $pegawai->id_gaji = $gaji->id;
           $pegawai->Save();        
        }
        
        return redirect('gaji');
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
        $gaji = gaji::findOrFail($id);
        return view('admin.gaji.edit', compact('gaji'));
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
        $gaji_update = gaji::findOrFail($id);
        $gaji_update->nip = $request->nip;
        $gaji_update->nama = $request->nama;
        $gaji_update->gaji = $request->gaji;
        $gaji_update->tunjangan = $request->tunjangan;
        $gaji_update->golongan = $request->golongan;
        $gaji_update->kelas = $request->kelas;
        $gaji_update->kedudukan = $request->kedudukan;
        $gaji_update->Save();

        return redirect('gaji');
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
    public function select_nama_gaji(Request $request)
    {
        $nama_gaji = pegawai::SelectRaw('pegawais.nip,pegawais.id_user,a.name')
            ->leftJoin('Users as a','a.id','=','pegawais.id_user')
            ->where('role','pegawai')
            ->where('pegawais.nip', $request->nip)
            ->get();

            $select = '';
            $select .= '
                        <select class="form-control" name="nama">
                        ';
                        foreach ($nama_gaji as $gaji) {
            $select .= '<option value="'.$gaji->name.'">'.$gaji->name.'</option>';
                        }'
                        </select>';
            return $select;
    }

    // Select ID Pegawai
    public function select_id_gaji(Request $request)
    {
        $nama_gaji = pegawai::SelectRaw('pegawais.nip,pegawais.id_user,a.name')
            ->leftJoin('Users as a','a.id','=','pegawais.id_user')
            ->where('role','pegawai')
            ->where('pegawais.nip', $request->nip)
            ->get();

            $select = '';
            $select .= '
                        <select class="form-control" name="id_user">
                        ';
                        foreach ($nama_gaji as $gaji) {
            $select .= '<option value="'.$gaji->id_user.'">'.$gaji->id_user.'</option>';
                        }'
                        </select>';
            return $select;
    }
}
