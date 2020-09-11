<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\{Pegawai,User,pangkat};
use PDF;
use Excel;
use App\Exports\PegawaiExport;
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
                ->leftJoin('Users as a','a.id','=','Pegawais.user_id')
                ->where('a.role','Pegawai')->orderBy('Pegawais.id','ASC')
                ->get();

                $cek_pangkat = pangkat::first();
                return view('admin.pegawai.index', compact('pegawai','cek_pangkat'));
            } else {
                return redirect('home');
            }
        } else {
            return redirect('home');
        }
    }

    public function index_kadis()
    {
        if (auth()->check()) {
            if (auth::user()->role == "Admin") {
                $kadis = Pegawai::selectRaw('Pegawais.*,a.role')
                ->leftJoin('Users as a','a.id','=','Pegawais.user_id')
                ->where('a.role','Kadis')->orderBy('Pegawais.id','ASC')
                ->get();
                $cek_kadis = User::where('role','Kadis')->first();
                return view('admin.pegawai.index_kadis', compact('kadis','cek_kadis'));
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

    public function create_kadis()
    {
        if (auth()->check()) {
            if (auth::user()->role == "Admin") {
                $cek_kadis = User::where('role','Kadis')->first();
                if ($cek_kadis == NULL) {
                    return view('admin.pegawai.create_kadis');
                } else {
                    return redirect('index-kadis');
                }
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
                $user->nip = $request->nip;
                $user->name = $request->name;
                $user->email = $request->email;
                $user->role = $request->role;
                $user->status = 'Aktif';
                $user->password = bcrypt('12345678');

                if ($user->save()) {
                
                    $pegawai = New Pegawai;
                    $pegawai->user_id = $user->id;
                    $pegawai->nip = $user->nip;
                    $pegawai->tipepns = $request->tipepns;
                    $pegawai->nama = $user->name;
                    $pegawai->kedudukanpns = $request->kedudukanpns;
                    $pegawai->save();

                    if ($request->role == 'Pegawai') {
                        return redirect()->route('pegawai.index');
                    } elseif ($request->role == 'Kadis') {
                        return redirect('index-kadis');
                    }
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
                $show = user::find($id);
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
                ->leftJoin('Users as a','a.id','=','Pegawais.user_id')
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

                $user = User::where('id',$pegawai->user_id)->first();
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

    public function delete(Request $request)
    {
        if (Auth::check()) {
            if (Auth::user()->role == "Admin" && auth::user()->status == "Aktif") {
                $user_id = $request->input('user_id');
                
                User::destroy($user_id);
                return back();
            }
        } else {
            return redirect('home');
        }
    }

    public function resetpw(Request $request)
    {
        if (Auth::check()) {
            if (Auth::user()->role == "Admin" && auth::user()->status == "Aktif") {
                $resetpw = User::find($request->user_id);
                $resetpw->update([
                    'password' => bcrypt(12345678),
                ]);

                return $resetpw;
            }
        } else {
            return redirect('home');
        }
    }

    // Laporan Pegawai
    public function laporanP()
    {
        if (Auth::check()) {
            if (Auth::user()->role == 'Admin') {
                $pegawai = User::with('pegawai')->get();
                return view('admin.laporan.pegawai', compact('pegawai'));
            }
        }
    }

    public function getPDF()
    {
        if (Auth::check()) {
            if (Auth::user()->role == 'Admin') {
                $pegawai = User::with('pegawai')->get();

                $pdf = PDF::loadView('admin.laporan.pegawaiPDF',['pegawai' => $pegawai]);
                $pdf->setPaper('A4', 'landscape');
                return $pdf->download('pegawaiPDF.pdf');
            }
        }
    }

    public function getEXCEL()
    {
        if (Auth::check()) {
            if (Auth::user()->role == 'Admin') {
                $pegawai = 'pegawai_'.date('Y-m-d_H-i-s').'.xlsx';
                    return Excel::download(new PegawaiExport, $pegawai);
            }
        }
    }
}