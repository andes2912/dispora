<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;
use App\User;
use Auth;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->check()) {
            if (auth::user()->role == "Admin") {
                $pegawai = Pegawai::selectRaw('Pegawais.*,a.role')
                ->leftJoin('Users as a','a.id','=','Pegawais.id_user')
                ->where('a.role','Pegawai')->orderBy('Pegawais.id','ASC')
                ->get();
                return view('admin.pegawai.index', compact('pegawai'));
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
            if (auth::user()->role == "Admin") {
                return view('admin.pegawai.create');
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
            if (auth::user()->role == "Admin") {
                $user = New User;
                $user->name = $request->name;
                $user->email = $request->email;
                $user->role = 'Pegawai';
                $user->status = 'Aktif';
                $user->password = bcrypt('12345678');

                if ($user->save()) {

                    $foto = $request->file('foto');
                    $fotos = time()."_".$foto->getClientoriginalName();
                    
                    // Folder Penyimpanan
                    $tujuan_upload = 'foto_pegawai';
                    $foto->move($tujuan_upload, $fotos);

                    $pegawai = New Pegawai;
                    $pegawai->id_user = $user->id;
                    $pegawai->nip = $request->nip;
                    $pegawai->tipepns = $request->tipepns;
                    $pegawai->nip = $request->nip;
                    $pegawai->nama = $user->name;
                    $pegawai->ttl = $request->ttl;
                    $pegawai->tempatlahir = $request->tempatlahir;
                    $pegawai->kelamin = $request->kelamin;
                    $pegawai->agama = $request->agama;
                    $pegawai->statusnikah = $request->statusnikah;
                    $pegawai->kedudukanpns = $request->kedudukanpns;
                    $pegawai->goldarah = $request->goldarah;
                    $pegawai->alamat = $request->alamat;
                    $pegawai->nonpwp = $request->nonpwp;
                    $pegawai->nik = $request->nik;
                    $pegawai->foto = $fotos;
                    $pegawai->save();

                    return redirect()->route('pegawai.index');
                }
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
        if (auth()->user()) {
            if (auth::user()->role == "Admin") {
                $show = pegawai::find($id);
                return view('admin.pegawai.show', compact('show'));
            } else {
                return redirect('home');
            }
        }else {
            return redirect('home');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (auth()->check()) {
            if (auth::user()->role == "Admin") {
                $edit = Pegawai::selectRaw('Pegawais.*,a.email')
                ->leftJoin('Users as a','a.id','=','Pegawais.id_user')
                ->find($id);
                return view('admin.pegawai.edit', compact('edit'));
            } else {
                return redirect('home');
            }
        } else {
            return redirect('home');
        }
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
        if (auth()->check()) {
            if (auth::user()->role == "Admin") {
                $pegawai = Pegawai::find($id);
                $pegawai->nip = $request->nip;
                $pegawai->nama = $request->nama;
                $pegawai->tipepns = $request->tipepns;
                $pegawai->nip = $request->nip;
                $pegawai->ttl = $request->ttl;
                $pegawai->tempatlahir = $request->tempatlahir;
                $pegawai->kelamin = $request->kelamin;
                $pegawai->agama = $request->agama;
                $pegawai->statusnikah = $request->statusnikah;
                $pegawai->kedudukanpns = $request->kedudukanpns;
                $pegawai->goldarah = $request->goldarah;
                $pegawai->alamat = $request->alamat;
                $pegawai->nonpwp = $request->nonpwp;
                $pegawai->nik = $request->nik;
                $pegawai->save();

                $user = User::where('id',$pegawai->id_user)->first();
                $user->email = $request->email;
                $user->name = $pegawai->nama;
                $user->save();

                return redirect()->route('pegawai.index');
            } else {
                return redirect('home');
            }
        } else {
            return redirect('home');
        }
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
