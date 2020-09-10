<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Pegawai,User,cuti,cuti_taken,cuti_count,Absen};
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->check()) {
            // Admin
            if (auth::user()->role == "Admin" && Auth::user()->status == 'Aktif') {
                // Total Pegawai
                $total = User::whereIn('role',['Pegawai','Kadis','Admin'])->count();

                // Pegawai Laki
                $laki = Pegawai::where('kelamin','Laki-laki')->count();

                // Pegawai Perempuan
                $ladies = Pegawai::where('kelamin','Perempuan')->count();

                // Pegawai Aktif
                $aktif = User::where('status','Aktif')->whereIn('role',['Kadis','Pegawai','Admin'])->count();

                // Masuk
                $hadir = Absen::where('status','Hadir')->count();

                // Izin
                $izin = Absen::where('status','Izin')->count();

                 // Sakit
                 $Sakit = Absen::where('status','Sakit')->count();

                return view('admin.home', compact('total','laki','ladies','aktif','hadir','izin','Sakit'));
            // End Admin

            // Pegawai
            } elseif(auth::user()->role == "Pegawai") {
                // Cuti Diambil
                $cuti_taken = cuti::selectRaw('cutis.id,cutis.user_id')
                    ->leftJoin('cuti_takens as a','a.cuti_id','=','cutis.id')
                    ->where('user_id',auth::user()->id)
                    ->count();
                // Sisa Cuti
                $sisa_cuti = cuti::selectRaw('cutis.id,cutis.user_id,a.sisa')
                    ->leftJoin('cuti_counts as a','a.cuti_id','=','cutis.id')
                    ->where('user_id',auth::user()->id)
                    ->first();
                
                // Absen
                $tidak_hadir = Absen::selectRaw('absens.id,abses.user_id,a.user_id')
                    ->leftJoin('pegawais as a','a.id','=','absens.user_id')
                    ->where('a.user_id',auth::user()->id)
                    ->whereIn('status',['Izin','Sakit'])
                    ->count();
                
                return view('pegawai.home', compact('cuti_taken','sisa_cuti','tidak_hadir'));
            // End Pegawai

            // Kadis
            } elseif(auth::user()->role == "Kadis") {
                 // Total Pegawai
                 $total = User::whereIn('role',['Pegawai','Kadis','Admin'])->count();

                 // Pegawai Laki
                 $laki = Pegawai::where('kelamin','Laki-laki')->count();
 
                 // Pegawai Perempuan
                 $ladies = Pegawai::where('kelamin','Perempuan')->count();
 
                 // Pegawai Aktif
                 $aktif = User::where('status','Aktif')->whereIn('role',['Kadis','Pegawai','Admin'])->count();

                 // Masuk
                $hadir = Absen::where('status','Hadir')->count();

                // Izin
                $izin = Absen::where('status','Izin')->count();

                 // Sakit
                 $Sakit = Absen::where('status','Sakit')->count();

                return view('kadis.home',compact('total','laki','ladies','aktif','hadir','izin','Sakit'));
            }
        }
    }
}
