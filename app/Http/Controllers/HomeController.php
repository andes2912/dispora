<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
            if (auth::user()->role == "Admin" && Auth::user()->status == "Aktif") {
                return view('admin.home');
            } elseif(auth::user()->role == "Pegawai" && Auth::user()->status == "Aktif") {
                return view('pegawai.home');
            } elseif(auth::user()->role == "Admin" || auth::user()->role == "Pegawai" && auth::user()->status == "Pensiun") {
                return redirect('login');
            }
        }
    }
}
