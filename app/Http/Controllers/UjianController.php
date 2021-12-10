<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Ujian;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\ProgramAkademik;
use Illuminate\Support\Facades\DB;

class UjianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Ujian::withCount('getMataPelajaran')->withCount('getSoal')->paginate(50);
            return view('admin.ujian.table', compact('data'));
        }
        return view('admin.ujian.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request->ajax()){
            if($request->has('program_akademik_id')){
                $kelas = Kelas::where('program_akademik_id', $request->program_akademik_id)->pluck('nama_kelas','id');
                return response()->json($kelas);
            }
        }
        $programAkademik = ProgramAkademik::pluck('nama_program', 'id');
        return view('admin.ujian.create', compact('programAkademik'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputUjian = $request->validate([
            'judul' => 'required|string|max:255',
            'program_akademik_id' => 'required',
            'kelas_id' => 'required',
            'durasi' => 'required',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
        ]);

        DB::beginTransaction();
        try {
            do {
                $token = strtoupper(Str::random(6));
             } while ( Ujian::where( 'token', $token )->exists() );

            $inputUjian['created_by'] = auth()->user()->id;
            $inputUjian['token'] = $token;

            Ujian::create($inputUjian);
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
        return redirect(action('UjianController@index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ujian  $ujian
     * @return \Illuminate\Http\Response
     */
    public function show(Ujian $ujian)
    {

        return view('admin.ujian.detail', compact('ujian'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ujian  $ujian
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Ujian $ujian)
    {
        if($request->ajax()){
            if($request->has('program_akademik_id')){
                $kelas = Kelas::where('program_akademik_id', $request->program_akademik_id)->pluck('nama_kelas','id');
                return response()->json($kelas);
            }
        }
        $programAkademik = ProgramAkademik::pluck('nama_program', 'id');
        return view('admin.ujian.edit', compact('programAkademik', 'ujian'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ujian  $ujian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ujian $ujian)
    {

        $inputUjian = $request->validate([
            'judul' => 'required|string|max:255',
            'program_akademik_id' => 'required',
            'kelas_id' => 'required',
            'durasi' => 'required',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
        ]);

        DB::beginTransaction();
        try {

            $inputUjian['updated_by'] = auth()->user()->id;
            $ujian->update($inputUjian);


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
        toastr()->success('Data telah diubah', 'Berhasil');

        return redirect(action('UjianController@index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ujian  $ujian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ujian $ujian)
    {
        $ujian->delete();
    	$result['code'] = '200';
    	return response()->json($result);
    }


}
