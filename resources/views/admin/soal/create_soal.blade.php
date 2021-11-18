@extends('layouts.app-admin')
@section('title', 'Tambah Soal Mapel ' . $mapel->nama_mapel)
@section('css')
    <link href="{{ asset('vendors/DataTables/datatables.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection
@section('js')
    <script src="{{ asset('vendors/DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('input[type=file]').attr("disabled", true);
            $(document).on('click', '.check-input', function() {
                var type = $(this).data('type');
                var no = $(this).data('number');
                var pilihan = $(this).data('pilihan');
                if (type == 'textarea') {
                    $('#' + type + '-' + pilihan + '-' + no).attr("disabled", false)
                    $('#file-' + pilihan + '-' + no).attr("disabled", true)
                }
                if (type == 'file') {
                    $('#' + type + '-' + pilihan + '-' + no).attr("disabled", false)
                    $('#textarea-' + pilihan + '-' + no).attr("disabled", true)
                }
                console.log('#' + type + '-' + pilihan + '-' + no);
            })
        });
    </script>
@endsection
@section('button-title')
@endsection
@section('content')
    <div class="card card-accent-primary border-primary shadow-sm table-responsive">
        <form method="POST" action="{{ action('SoalController@store') }}">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label for="nama_program" class="col-sm-2 col-form-label">Pertanyaan</label>
                    <div class="col-md-10">
                        <div class="form-check">
                            <input class="form-check-input check-input" type="radio" name="radioPertanyaan[1]"
                                value="option1" checked data-type="textarea" data-number="1" data-pilihan="p">
                            <textarea class="form-control" id="textarea-p-1" rows="1" name="pertanyaan[1]"></textarea>
                        </div>
                        <div class="form-check mt-1">
                            <input class="form-check-input check-input" type="radio" name="radioPertanyaan[1]"
                                value="option2" data-type="file" data-number="1" data-pilihan="p">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="file-p-1" name="pertanyaan[1]">
                                <label class="custom-file-label" for="file-1" ">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class=" form-group row">
                                    <label class="col-sm-2 col-form-label">Pilihan A</label>
                                    <div class="col-md-10">
                                        <div class="form-check">
                                            <input class="form-check-input check-input" type="radio" name="radioJawabanA[1]"
                                                value="option1" checked data-type="textarea" data-number="1"
                                                data-pilihan="a">
                                            <textarea class="form-control" id="textarea-a-1" rows="1"
                                                name="jawaban_a[1]"></textarea>
                                        </div>
                                        <div class="form-check mt-1">
                                            <input class="form-check-input check-input" type="radio" name="radioJawabanA[1]"
                                                value="option2" data-type="file" data-number="1" data-pilihan="a">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="file-a-1"
                                                    name="jawaban_a[1]">
                                                <label class="custom-file-label" for="file-a-1">Choose file</label>
                                            </div>
                                        </div>
                                        <div class="form-check mt-1">
                                            <div class="form-group row">
                                                <label for="bobot" class="col-sm-2 col-form-label">Bobot Jawaban</label>
                                                <div class="col-sm-4">
                                                    <input type="number" class="form-control" name="bobot_a[1]">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Pilihan B</label>
                                <div class="col-md-10">
                                    <div class="form-check">
                                        <input class="form-check-input check-input" type="radio" name="radioJawabanB[1]"
                                            value="option1" checked data-type="textarea" data-number="1" data-pilihan="b">
                                        <textarea class="form-control" id="textarea-b-1" rows="1"
                                            name="jawaban_b[1]"></textarea>
                                    </div>
                                    <div class="form-check mt-1">
                                        <input class="form-check-input check-input" type="radio" name="radioJawabanB[1]"
                                            value="option2" data-type="file" data-number="1" data-pilihan="b">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="file-b-1" name="jawaban_b[1]">
                                            <label class="custom-file-label" for="file-b-1">Choose file</label>
                                        </div>
                                    </div>
                                    <div class="form-check mt-1">
                                        <div class="form-group row">
                                            <label for="bobot" class="col-sm-2 col-form-label">Bobot Jawaban</label>
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control" name="bobot_b[1]">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Pilihan C</label>
                                <div class="col-md-10">
                                    <div class="form-check">
                                        <input class="form-check-input check-input" type="radio" name="radioJawabanC[1]"
                                            value="option1" checked data-type="textarea" data-number="1" data-pilihan="c">
                                        <textarea class="form-control" id="textarea-c-1" rows="1"
                                            name="jawaban_c[1]"></textarea>
                                    </div>
                                    <div class="form-check mt-1">
                                        <input class="form-check-input check-input" type="radio" name="radioJawabanC[1]"
                                            value="option2" data-type="file" data-number="1" data-pilihan="c">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="file-c-1" name="jawaban_c[1]">
                                            <label class="custom-file-label" for="file-c-1">Choose file</label>
                                        </div>
                                    </div>
                                    <div class="form-check mt-1">
                                        <div class="form-group row">
                                            <label for="bobot" class="col-sm-2 col-form-label">Bobot Jawaban</label>
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control" name="bobot_c[1]">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Pilihan D</label>
                                <div class="col-md-10">
                                    <div class="form-check">
                                        <input class="form-check-input check-input" type="radio" name="radioJawabanD[1]"
                                            value="option1" checked data-type="textarea" data-number="1" data-pilihan="d">
                                        <textarea class="form-control" id="textarea-d-1" rows="1"
                                            name="jawaban_d[1]"></textarea>
                                    </div>
                                    <div class="form-check mt-1">
                                        <input class="form-check-input check-input" type="radio" name="radioJawabanD[1]"
                                            value="option2" data-type="file" data-number="1" data-pilihan="d">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="file-d-1" name="jawaban_d[1]">
                                            <label class="custom-file-label" for="file-d-1">Choose file</label>
                                        </div>
                                    </div>
                                    <div class="form-check mt-1">
                                        <div class="form-group row">
                                            <label for="bobot" class="col-sm-2 col-form-label">Bobot Jawaban</label>
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control" name="bobot_d[1]">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Pilihan E</label>
                                <div class="col-md-10">
                                    <div class="form-check">
                                        <input class="form-check-input check-input" type="radio" name="radioJawabanE[1]"
                                            value="option1" checked data-type="textarea" data-number="1" data-pilihan="e">
                                        <textarea class="form-control" id="textarea-e-1" rows="1"
                                            name="jawaban_e[1]"></textarea>
                                    </div>
                                    <div class="form-check mt-1">
                                        <input class="form-check-input check-input" type="radio" name="radioJawabanE[1]"
                                            value="option2" data-type="file" data-number="1" data-pilihan="e">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="file-e-1" name="jawaban_e[1]">
                                            <label class="custom-file-label" for="file-e-1">Choose file</label>
                                        </div>
                                    </div>
                                    <div class="form-check mt-1">
                                        <div class="form-group row">
                                            <label for="bobot" class="col-sm-2 col-form-label">Bobot Jawaban</label>
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control" name="bobot_e[1]">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Jawaban Benar</label>
                                <div class="col-md-10">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jawaban_benar"
                                            id="A" value="Y">
                                        <label class="form-check-label" for="A">A</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jawaban_benar"
                                            id="B" value="Y">
                                        <label class="form-check-label" for="B">B</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jawaban_benar"
                                            id="C" value="Y">
                                        <label class="form-check-label" for="C">C</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jawaban_benar"
                                            id="D" value="Y">
                                        <label class="form-check-label" for="D">D</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jawaban_benar"
                                            id="E" value="Y">
                                        <label class="form-check-label" for="E">E</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jawaban_benar"
                                            id="All" value="Y">
                                        <label class="form-check-label" for="All">Benar Semua</label>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="mapel_id" value="{{ $mapel->id }}">
                            <div class="modal-footer">
                                <button class="btn btn-brand btn-square btn-primary col">Simpan</button>
                            </div>
                        </div>
        </form>
    </div>

@endsection
