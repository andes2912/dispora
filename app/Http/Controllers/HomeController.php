<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Pegawai,User};
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
            if (auth::user()->role == "Admin") {
                // Total Pegawai
                $total = User::whereIn('role',['Pegawai','Kadis'])->count();

                // Pegawai Laki
                $laki = Pegawai::where('kelamin','Laki-laki')->count();

                // Pegawai Perempuan
                $ladies = Pegawai::where('kelamin','Perempuan')->count();

                // Pegawai Aktif
                $aktif = User::where('status','Aktif')->whereIn('role',['Kadis','Pegawai'])->count();

                return view('admin.home', compact('total','laki','ladies','aktif'));
            } elseif(auth::user()->role == "Pegawai") {
                return view('pegawai.home');
            } elseif(auth::user()->role == "Kadis") {
                return view('kadis.home');
            }
        }
    }
}
