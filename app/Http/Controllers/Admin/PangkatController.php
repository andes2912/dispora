<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\{Pegawai,pangkat};
use Auth;

class PangkatController extends Controller
{

    public function index()
    {
        if (Auth::check()) {
            if (Auth::user()->role == "Admin" && auth::user()->status == "Aktif") {
                $pangkat = pangkat::all();
                return view('admin.pangkat.index', compact('pangkat'));
            }
        } else {
            return redirect('home');
        }
        
    }


    public function create()
    {
        if (Auth::check()) {
            if (Auth::user()->role == "Admin" && auth::user()->status == "Aktif") {
                $pegawai = Pegawai::where('pangkat_id', null)->get();
                return view('admin.pangkat.create', compact('pegawai'));
            }
        } else {
            return redirect('home');
        }
        
    }


    public function store(Request $request)
    {
        if (Auth::check()) {
            if (Auth::user()->role == "Admin" && auth::user()->status == "Aktif") {
                $pangkat = new pangkat;
                $pangkat->id = $request->id;
                $pangkat->user_id = $request->user_id;
                $pangkat->nip = $request->nip;
                $pangkat->nama = $request->nama;
                $pangkat->jabatan = $request->jabatan;
                $pangkat->kelas = $request->kelas;
                $pangkat->golongan = $request->golongan;
                $pangkat->kedudukan = $request->kedudukan;
                
                if ($pangkat->save()) {
                    $pegawai = pegawai::where('nip', $pangkat->nip)->first();
                    $pegawai->pangkat_id = $pangkat->id;
                    $pegawai->save();
                }

                return redirect()->route('pangkat.index');
            }
        } else {
            return redirect('home');
        }
        
    }   


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        if (Auth::check()) {
            if (Auth::user()->role == "Admin" && auth::user()->status == "Aktif") {
                $edit = pangkat::findOrFail($id);
                return view('admin.pangkat.edit', compact('edit'));
            }
        } else {
            return redirect('home');
        }
        
    }


    public function update(Request $request, $id)
    {
        if (Auth::check()) {
            if (Auth::user()->role == "Admin" && auth::user()->status == "Aktif") {
                $pangkat = pangkat::findOrFail($id);
                $pangkat->kelas = $request->kelas;
                $pangkat->golongan = $request->golongan;
                $pangkat->kedudukan = $request->kedudukan;
                $pangkat->Save();

                return redirect('pangkat');
            }
        } else {
            return redirect('home');
        }
        
    }


    public function destroy($id)
    {
        //
    }

    // Select ID Pegawai
    public function select_id_pegawai(Request $request)
    {
        $id_pegawai = pegawai::SelectRaw('pegawais.nip,pegawais.user_id,a.name')
            ->leftJoin('Users as a','a.id','=','pegawais.user_id')
            ->where('pegawais.nip', $request->nip)
            ->get();

            $select = '';
            $select .= '
                        <select class="form-control" name="user_id">
                        ';
                        foreach ($id_pegawai as $pegawai) {
            $select .= '<option value="'.$pegawai->user_id.'">'.$pegawai->user_id.'</option>';
                        }'
                        </select>';
            return $select;
    }

    // Select Nama Pegawai
    public function select_nama_pangkat(Request $request)
    {
        $nama_pangkat = pegawai::SelectRaw('pegawais.nip,pegawais.user_id,a.name')
            ->leftJoin('Users as a','a.id','=','pegawais.user_id')
            ->where('pegawais.nip', $request->nip)
            ->get();

            $select = '';
            $select .= '
                        <select class="form-control" name="nama">
                        ';
                        foreach ($nama_pangkat as $pangkat) {
            $select .= '<option value="'.$pangkat->name.'">'.$pangkat->name.'</option>';
                        }'
                        </select>';
            return $select;
    }
}
