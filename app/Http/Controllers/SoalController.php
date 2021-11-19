<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use Illuminate\Http\Request;
use App\Models\MataPelajaran;
use App\Models\SoalPilihanGanda;
use Illuminate\Support\Facades\DB;

class SoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = MataPelajaran::get();
        return view('admin.soal.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $mapel = MataPelajaran::find($request->mpi);
        return view('admin.soal.create_soal', compact('mapel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            // dd($request);
            for($i=1; $i <= count($request->pertanyaan); $i++ ){
                $dataSoal['mata_pelajaran_id'] = $request->mapel_id;
                $dataSoal['pertanyaan'] = $request->pertanyaan[$i];
                $dataSoal['pertanyaan'] = $request->pertanyaan[$i];
                $dataSoal['jawaban_benar'] = $request->jawaban_benar;
                $dataSoal['created_by'] = auth()->user()->id;
                $soal =  Soal::create($dataSoal);

                foreach($request->jawaban[$i] as $k => $v){
                    $dataJawaban['soal_id'] = $soal->id;
                    $dataJawaban['pilihan'] = $k;
                    $dataJawaban['jawaban'] = $v;
                    $dataJawaban['bobot_nilai'] = $request->bobot[$i][$k];
                    $dataJawaban['benar'] = $request->jawaban_benar == $k ? 'Y' : 'N';
                    SoalPilihanGanda::create($dataJawaban);
                    // dd($request->bobot[$i][$k], $dataJawaban);
                }
                // dd($request);
            }
            // $mapel['created_by'] = auth()->user()->id;
            // MataPelajaran::create($mapel);
        } catch (\Exception $e) {
            DB::rollback();
            toastr()->error($e->getMessage(), 'Error');
            return back();
        } catch (\Throwable $e) {
            DB::rollback();
            toastr()->error($e->getMessage(), 'Error');
            throw $e;
        }

        DB::commit();
        toastr()->success('Data telah ditambahkan', 'Berhasil');
        return redirect(action('SoalController@show', $request->mapel_id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $mapel = MataPelajaran::find($id);
        if($request->ajax()){
            $data = Soal::where('mata_pelajaran_id', $id)->get();
            return view('admin.soal.soal_table', compact('data'));
        }
        return view('admin.soal.soal_index', compact('mapel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function edit(Soal $soal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Soal $soal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Soal $soal)
    {
        //
    }

    public function listMapel(Request $request)
    {

        $data = MataPelajaran::get();

        return view('admin.soal.index', compact('data'));
    }
}
