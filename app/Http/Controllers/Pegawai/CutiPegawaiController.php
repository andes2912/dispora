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
        $cuti = cuti::where('id_user',auth::user()->id)
        ->get();
        return view('pegawai.cuti.index', compact('cuti'));
    }


    public function create()
    {
        $pegawai = pegawai::where('id_user',auth::user()->id)->first();
        $approval = User::where('role','Admin')->get();
        return view('pegawai.cuti.create', compact('pegawai','approval'));
    }


    public function store(Request $request)
    {
        $cuti = new cuti;
        $cuti->id = $request->id;
        $cuti->id_user = auth::user()->id;
        $cuti->nip = $request->nip;
        $cuti->nama = Auth::user()->name;
        $cuti->date = Carbon::parse($cuti->date)->format('d-m-Y');
        $cuti->status_approval = 'Proses';
        $cuti->reason = $request->reason;
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
                $cuti_update = cuti_count::where('id_pegawai',auth::user()->id)->first();
                $cuti_update->taken = $count->count();
                $cuti_update->sisa =  $cuti_update->sisa - $cuti_update->taken;
                $cuti_update->batas = 6;
                $cuti_update->Save();
            }
        }

        return back();
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
