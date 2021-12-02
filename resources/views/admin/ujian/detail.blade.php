@extends('layouts.app-admin')
@section('title', 'Ujian CAT')
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
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    </script>
@endsection
@section('button-title')
    <a class="btn btn-sm btn-secondary ml-2 float-right" href="{{ action('UjianController@index') }}" data-toggle="tooltip"
        data-placement="top" title="Kembali">Kembali</a>
@endsection
@section('content')
    <div class="card card-accent-primary border-primary shadow-sm table-responsive">
        <div class="card-header">

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Judul</label>
                        <div class="col-md-8">
                            <input id="waktu_selesai" type="text" class="form-control" value="{{ $ujian->judul }}"
                                autocomplete="off" readonly>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Token</label>
                        <div class="col-md-8">
                            <input id="waktu_selesai" type="text" class="form-control" value="{{ $ujian->token }}"
                                autocomplete="off" readonly>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Program Akademik</label>
                        <div class="col-md-8">
                            <input id="waktu_selesai" type="text" class="form-control"
                                value="{{ $ujian->getProgramAkademik->nama_program }}" autocomplete="off" readonly>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Kelas</label>
                        <div class="col-md-8">
                            <input id="waktu_selesai" type="text" class="form-control"
                                value="{{ $ujian->getKelas->nama_kelas }}" autocomplete="off" readonly>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Waktu Mulai</label>
                        <div class="col-md-8">
                            <input id="waktu_selesai" type="text" class="form-control"
                                value="{{ $ujian->waktu_mulai }}" autocomplete="off" readonly>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Waktu Selesai</label>
                        <div class="col-md-8">
                            <input id="waktu_selesai" type="text" class="form-control"
                                value="{{ $ujian->waktu_selesai }}" autocomplete="off" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
                <h5>Mata Pelajaran</h5>
                @foreach ($ujian->getMataPelajaran as $matapelajaran)

                    <!-- Accordion card -->
                    <div class="card">

                        <!-- Card header -->
                        <div class="card-header" role="tab" id="headingOne1">
                            <a data-toggle="collapse" data-parent="#accordionEx"
                                href="#collapseOne1-{{ $matapelajaran->id }}" aria-expanded="false"
                                aria-controls="collapseOne1" class="collapsed">
                                <h5 class="mb-0">
                                    {{ $matapelajaran->getMataPelajaran->nama_mapel }}
                                </h5>
                            </a>
                        </div>

                        <!-- Card body -->
                        <div id="collapseOne1-{{ $matapelajaran->id }}" class="collapse" role="tabpanel"
                            aria-labelledby="headingOne1" data-parent="#accordionEx" style="">
                            <div class="card-body">
                                <ol>
                                    @foreach ($matapelajaran->getSoal as $soal)
                                        <li>{!! $soal->getSoal->pertanyaan !!} <br>
                                            <span style="display : inline-flex">
                                                @if(!empty(optional(optional($soal->getSoal)->getJawabanBenar)->pilihan))
                                                Jawaban Benar : {{ optional(optional($soal->getSoal)->getJawabanBenar)->pilihan }}.{!! optional(optional($soal->getSoal)->getJawabanBenar)->jawaban !!}
                                                @else
                                                Benar Semua
                                                @endif
                                            </span>
                                        </li>
                                    @endforeach
                                </ol>
                            </div>
                        </div>

                    </div>
                    <!-- Accordion card -->
                @endforeach
            </div>
        </div>
    </div>

@endsection
