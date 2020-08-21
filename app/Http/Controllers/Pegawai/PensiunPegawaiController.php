<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\{user, pensiun};
use Auth;

class PensiunPegawaiController extends Controller
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
                $pensiun = pensiun::where('nip', Auth::user()->nip)->get();
                return view('pegawai.pensiun.index', compact('pensiun'));
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
                return view('pegawai.pensiun.create');
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
                $pensiun = new pensiun;
                $pensiun->pangkat_id = $request->pangkat_id;
                $pensiun->nip = $request->nip;
                $pensiun->nama = $request->nama;
                $pensiun->date_pensiun = $request->date_pensiun;
                $pensiun->golongan = $request->golongan;
                $pensiun->kelas = $request->kelas;
                $pensiun->kedudukan = $request->kedudukan;

                if ($pensiun->save()) {
                    $user = User::where('nip', $pensiun->nip)->first();
                    $user->status = 'Pensiun';
                    $user->save();
                    // dd($pensiun, $user);
                }

                return redirect('pensiun-pegawai');
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
