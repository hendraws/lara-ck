@extends('layouts.app-admin')
@section('title', 'Pembuatan Ujian CAT')
@section('css')
    <link href="{{ asset('vendors/DataTables/datatables.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection
@section('js')
    <script src="{{ asset('vendors/DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
@endsection
@section('button-title')
@endsection
@section('content')
    <div class="card card-accent-primary border-primary shadow-sm table-responsive">
        <form method="POST" action="{{ action('UjianController@store') }}" enctype='multipart/form-data' b>
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label for="nama_program" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-md-10">
                        <input id="nama_mapel" type="text" class="form-control @error('nama_mapel') is-invalid @enderror" name="nama_mapel"
                        value="{{ old('nama_mapel') }}" required autocomplete="nama_mapel" autofocus placeholder="Judul">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama_program" class="col-sm-2 col-form-label">Program Akademik</label>
                    <div class="col-md-10">
                        <select class="form-control select" name="program_akademik_id" >
                            <option readonly selected value="">Pilih Program Akademik</option>
                            {{-- @foreach($programAkademik as $val)
                            <option value="{{ $val->id }}" >{{ $val->nama_program }}</option>
                            @endforeach --}}
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama_program" class="col-sm-2 col-form-label">Kelas</label>
                    <div class="col-md-10">
                        <select class="form-control select" name="program_akademik_id" >
                            <option readonly selected value="">Pilih Kelas</option>
                            {{-- @foreach($programAkademik as $val)
                            <option value="{{ $val->id }}" >{{ $val->nama_program }}</option>
                            @endforeach --}}
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama_program" class="col-sm-2 col-form-label">Waktu Mulai</label>
                    <div class="col-md-10">
                        <input id="nama_mapel" type="text" class="form-control @error('nama_mapel') is-invalid @enderror" name="nama_mapel"
                        value="{{ old('nama_mapel') }}" required  autofocus placeholder="Waktu Mulai">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama_program" class="col-sm-2 col-form-label">Waktu Selesai</label>
                    <div class="col-md-10">
                        <input id="nama_mapel" type="text" class="form-control @error('nama_mapel') is-invalid @enderror" name="nama_mapel"
                        value="{{ old('nama_mapel') }}" required  autofocus placeholder="Waktu Selesai">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-brand btn-square btn-primary col">Simpan</button>
                </div>
            </div>
        </form>
    </div>
@endsection
