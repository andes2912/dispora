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
            if (auth::user()->role == "Admin") {
                return view('admin.home');
            } elseif(auth::user()->role == "Pegawai") {
                return view('pegawai.home');
            } else {
                return redirect('home');
            }
        }
    }
}
