<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\{User,Pegawai};
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show = Pegawai::with('pangkat')->findOrFail($id);
        return view('pegawai.bio.show', compact('show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('pegawai.bio.edit');
        
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
        $foto = $request->file('foto');
        if ($foto) {
            $fotos = time()."_".$foto->getClientoriginalName();
            // Folder Penyimpanan
            $tujuan_upload = 'foto_pegawai';
            $foto->move($tujuan_upload, $fotos);
        }

        $pegawai = Pegawai::findOrFail($id);
        $pegawai->tipepns = $request->tipepns;
        $pegawai->ttl = $request->ttl;
        $pegawai->tempatlahir = $request->tempatlahir;
        $pegawai->kelamin = $request->kelamin;
        $pegawai->agama = $request->agama;
        $pegawai->statusnikah = $request->statusnikah;
        $pegawai->kedudukanpns = $request->kedudukanpns;
        $pegawai->goldarah = $request->goldarah;
        $pegawai->noaskes = $request->noaskes;
        $pegawai->notaspen = $request->notaspen;
        $pegawai->nonpwp = $request->nonpwp;
        $pegawai->alamat = $request->alamat;
        $pegawai->nokarsuskaris = $request->nokarsuskaris;
        $pegawai->nik = $request->nik;
        if ($foto) {
            $pegawai->foto = $fotos;
        }
        $pegawai->save();

        return redirect('akun/' .$id.'');
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

    public function change_password(Request $request)
    {
        $pass = user::where('id', Auth::user()->id)->first();
        $pass->password = bcrypt($request->password);
        $pass->save();
        
        return back();
    }
}
