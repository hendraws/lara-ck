<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgramAkademik;

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
        return view('admin.dashboard');
    }

    public function cek()
    {
        $user = auth()->user();
        if($user->role('administrator')){

        }
        if($user->role('siswa')){

            $programAkademik = ProgramAkademik::pluck('nama_program', 'id');
            return view('siswa.home', compact('programAkademik'));
        }
        return redirect()->action([HomeController::class, 'index']);
    }
}
