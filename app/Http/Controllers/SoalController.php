<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use Illuminate\Http\Request;
use App\Models\MataPelajaran;
use App\Models\SoalPilihanGanda;
use App\Models\Texteditor;
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
        // dd($request->all());
        // DB::beginTransaction();
        try {
            for ($i = 1; $i <= count($request->pertanyaan); $i++) {
                $contentSoal = $request->pertanyaan[$i];
                $contents = new \DomDocument();
                $contents->loadHtml($contentSoal, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
                $imageFileSoal = $contents->getElementsByTagName('img');

                foreach ($imageFileSoal as $k => $img) {
                    $dataSoal = $img->getAttribute('src');

                    list($type, $dataSoal) = explode(';', $dataSoal);
                    list(, $dataSoal)      = explode(',', $dataSoal);

                    $imgeData = base64_decode($dataSoal);
                    $image_name = "/upload/soal/" . time() . $k . '.png';
                    $path = public_path() . $image_name;
                    file_put_contents($path, $imgeData);

                    $img->removeAttribute('src');
                    $img->setAttribute('src', $image_name);
                }

                $contentSoal = $contents->saveHTML();

                // dd($contentSoal,  $request->mapel_id);
                $input['mata_pelajaran_id'] = 1;
                $input['pertanyaan'] = $contentSoal;
                $input['jawaban_benar'] = $request->jawaban_benar;
                $input['created_by'] = auth()->user()->id;
                $soal =  Soal::create($input);

                foreach ($request->jawaban[$i] as $k => $v) {
                    unset($dom, $contentjawaban);
                    $contentjawaban = $v;
                    $dom = new \DomDocument();
                    $dom->loadHtml($contentjawaban, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
                    $imageFile = $dom->getElementsByTagName('img');


                    foreach ($imageFile as $item => $image) {
                        $data = $image->getAttribute('src');

                        list($type, $data) = explode(';', $data);
                        list(, $data)      = explode(',', $data);

                        $imgeData = base64_decode($data);
                        $image_name = "/upload/jawaban/".$k. '-'. time() . $item . '.png';
                        $path = public_path() . $image_name;
                        file_put_contents($path, $imgeData);

                        $image->removeAttribute('src');
                        $image->setAttribute('src', $image_name);
                    }

                    $contentjawaban = $dom->saveHTML();

                    $dataJawaban['soal_id'] = $soal->id;
                    $dataJawaban['pilihan'] = $k;
                    $dataJawaban['jawaban'] = $contentjawaban;
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
            // DB::rollback();
            toastr()->error($e->getMessage(), 'Error');
            dd($e->getMessage());
            return back();
        } catch (\Throwable $e) {
            // DB::rollback();
            dd($e->getMessage());
            toastr()->error($e->getMessage(), 'Error');
            throw $e;
        }

        // DB::commit();
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
        if ($request->ajax()) {
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
