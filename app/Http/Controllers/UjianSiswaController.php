<?php

namespace App\Http\Controllers;

use App\Models\Ujian;
use App\Models\UjianSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cookie;

class UjianSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\UjianSiswa  $ujianSiswa
     * @return \Illuminate\Http\Response
     */
    public function show(UjianSiswa $ujianSiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UjianSiswa  $ujianSiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(UjianSiswa $ujianSiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UjianSiswa  $ujianSiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UjianSiswa $ujianSiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UjianSiswa  $ujianSiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(UjianSiswa $ujianSiswa)
    {
        //
    }

    public function ruangUjian(Request $request)
    {
        if ($request->session()->has('ujian_id')) {
            $pengaturanUjian = Ujian::find($request->session()->get('ujian_id'));
            return view('siswa.ujian.data_profile', compact('pengaturanUjian'));
        };
        return view('siswa.ujian.index');
    }

    public function ujianSiswa(Request $request)
    {

        // $request->session()->put('key', 'value');
        // $request->session()->forget('key');
        // $request->session()->put('ujian', auth()->user()->id );
        // session(['key' => 'value']);

        $pengaturanUjian = Ujian::where('token', $request->token)
            ->whereDate('waktu_mulai', '<=', Carbon::now('Asia/Jakarta'))
            ->whereDate('waktu_selesai', '>=', Carbon::now('Asia/Jakarta'))
            ->first();


        if (empty($pengaturanUjian)) {
            toastr()->error('Silahkan periksa inputan token kembali ', 'Error');
            return back();
        }

        $cekUjian = UjianSiswa::where('user_id', auth()->user()->id)->where('ujian_id', $pengaturanUjian->id)->first();
        $request->session()->put('ujian_id', $pengaturanUjian->id);
        $request->session()->put('ujian_user_id', auth()->user()->id);

        if (!empty($pengaturanUjian) && !empty($cekUjian)) {
            return view('siswa.ujian.data_profile', compact('pengaturanUjian'));
        }

        UjianSiswa::create([
            'user_id' => auth()->user()->id,
            'ujian_id' => $pengaturanUjian->id,
            'waktu_berjalan' => $pengaturanUjian->durasi,
            'status' => 'belum-ujian',
        ]);

        return view('siswa.ujian.data_profile', compact('pengaturanUjian'));
    }
}
