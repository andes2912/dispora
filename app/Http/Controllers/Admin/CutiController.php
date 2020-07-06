<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\cuti;
use App\cuti_taken;
use App\User;
use Carbon\carbon;
use Auth;

class CutiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cuti = cuti::all();
        return view('admin.cuti.index', compact('cuti'));
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
        $cuti = cuti::selectRaw('cutis.id,cutis.nip,cutis.status_approval,cutis.reason,cutis.status_approval,cutis.reason_approval,a.nama')
        ->leftJoin('Pegawais as a','a.nip','=','cutis.nip')
        ->findOrFail($id);
        $date_cuti = cuti_taken::where('id_cuti', $id)->get();
        return view('admin.cuti.view', compact('cuti','date_cuti'));
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
        $cuti = cuti::findOrFail($id);
        $cuti->status_approval  = $request->status_approval;
        $cuti->date_approval    = Carbon::parse($request->date_approval)->format('d-m-Y');
        $cuti->reason_approval  = $request->reason_approval;
        $cuti->save();

        return redirect('cuti');
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
