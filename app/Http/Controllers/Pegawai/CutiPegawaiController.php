<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\cuti;
use App\cuti_taken;
use App\cuti_count;
use App\User;
use App\pegawai;
use Carbon\carbon;
use Auth;

class CutiPegawaiController extends Controller
{

    public function index()
    {
        if (Auth::check()) {
            if (Auth::user()->auth::user()->role == 'Pegawai') {
                $cuti = cuti::where('user_id',auth::user()->id)
                ->get();
                return view('pegawai.cuti.index', compact('cuti'));
            }
        } else {
            return redirect('home');
        }
    }


    public function create()
    {
        if (Auth::check()) {
            if (Auth::user()->auth::user()->role == 'Pegawai') {
                $pegawai = pegawai::where('user_id',auth::user()->id)->first();
                $approval = User::where('role','Kadis')->get();
                $cek_kadis = User::where('role','Kadis')->first();
                $cek = cuti::where('user_id',Auth::user()->id)->first();
                if (@$cek->status_approval !== 'Proses') {
                    return view('pegawai.cuti.create', compact('pegawai','approval','cek','cek_kadis'));
                } else {
                    return redirect('cuti-pegawai');
                }
            }
        } else {
            return redirect('home');
        }
        
        
    }


    public function store(Request $request)
    {
        if (Auth::check()) {
            if (Auth::user()->auth::user()->role == 'Pegawai') {
                $cuti = new cuti;
                $cuti->id = $request->id;
                $cuti->user_id = auth::user()->id;
                $cuti->nip = $request->nip;
                $cuti->nama = Auth::user()->name;
                $cuti->date = Carbon::parse($cuti->date)->format('d-m-Y');
                $cuti->reason = $request->reason;
                $cuti->status_approval = 'Proses';
                $cuti->id_approval = $request->id_approval;
                $cuti->nama_approval = $request->nama_approval;
        
                if ($cuti->Save()) {
                    foreach ($request->add_date as $value) {
                        $cuti_date = new cuti_taken;
                        $cuti_date->id_cuti         = $cuti->id;
                        $cuti_date->nip             = $cuti->nip;
                        $cuti_date->date_leave      = $value['date_leave'];
                        $cuti_date->save();
                    }
                }
                
                $cek_cuti_count = cuti_count::where('nip',auth::user()->nip)->first();
                $count = cuti_taken::where('id_cuti', $cuti->id)->get();
                if ($cuti_date->save()) {
                    if ($cek_cuti_count == null) {
                        $cuti_count = new cuti_count;
                        $cuti_count->nip = auth::user()->nip;
                        $cuti_count->id_cuti = $cuti->id;
                        $cuti_count->nip = $cuti->nip;
                        $cuti_count->batas = 6;
                        $cuti_count->taken = $count->count();
                        $cuti_count->sisa = $cuti_count->batas - $cuti_count->taken;
                        // dd($cuti,$cuti_date,$cuti_count);
                        $cuti_count->Save();
                    } else {
                        $cuti_update = cuti_count::where('nip',auth::user()->nip)->first();
                        $cuti_update->taken = $count->count();
                        $cuti_update->sisa =  $cuti_update->sisa - $cuti_update->taken;
                        $cuti_update->batas = 6;
                        $cuti_update->Save();
                    }
                }
        
                return redirect('cuti-pegawai');
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
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    // Nama Approval
    public function nama_approval_cuti(Request $request)
    {
        $nama_approval = User::select('id','name')
            ->where('id', $request->id)
            ->get();

            $select = '';
            $select .= '
                        <select class="form-control" name="nama_approval">
                        ';
                        foreach ($nama_approval as $approval) {
            $select .= '<option value="'.$approval->name.'">'.$approval->name.'</option>';
                        }'
                        </select>';
            return $select;
    }
}
