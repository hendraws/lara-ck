<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use App\Models\Ujian;
use App\Models\UjianSoal;
use Illuminate\Http\Request;
use App\Models\UjianMataPelajaran;

class UjianSoalController extends Controller
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
    public function create(Request $request)
    {
        $ujianMapel = UjianMataPelajaran::find($request->ujianmapel);
        $listSoal = Soal::with('getJawabanBenar')
            ->where('mata_pelajaran_id', $ujianMapel->mata_pelajaran_id)
            ->paginate(25)
            ->withQueryString();

        return view('admin.ujian_soal.create', compact('ujianMapel', 'listSoal'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $ujianMapel = UjianMataPelajaran::find($request->ujian_mapel_id);
        // dd($ujianMapel->getSoal);
        $ujianMapel->getSoal()->sync($request->soal_id);
        dd($ujianMapel, $request->ujian_mapel_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UjianSoal  $ujianSoal
     * @return \Illuminate\Http\Response
     */
    public function show(UjianSoal $ujianSoal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UjianSoal  $ujianSoal
     * @return \Illuminate\Http\Response
     */
    public function edit(UjianSoal $ujianSoal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UjianSoal  $ujianSoal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UjianSoal $ujianSoal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UjianSoal  $ujianSoal
     * @return \Illuminate\Http\Response
     */
    public function destroy(UjianSoal $ujianSoal)
    {
        //
    }
}
