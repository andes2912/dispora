<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\{user, pensiun};

class PensiunPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pegawai.pensiun.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pegawai.pensiun.create');
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
            // dd($pensiun, $user);
        }

        return redirect()->route('pensiun-pegawi');
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
