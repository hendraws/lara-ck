@extends('layouts.app-admin')
@section('title', 'Pembuatan Ujian CAT')
@section('css')
    <link href="{{ asset('vendors/DataTables/datatables.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link href="{{ asset('vendors/datetimepicker/jquery.datetimepicker.min.css') }}" rel="stylesheet">
@endsection
@section('js')
    <script src="{{ asset('vendors/DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('vendors/datetimepicker/jquery.datetimepicker.full.min.js') }}"></script>
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $(document).ready(function() {

            $(document).on('change', '#programAkademik', function() {
                $.ajax({
                    url: "{{ url()->full() }}",
                    type: 'GET',
                    data: {
                        program_akademik_id: $(this).val(),
                    },
                    contentType: 'application/json; charset=utf-8',
                    success: function(response) {
                        $("#kelas").empty();
                        $.each(response, function(key, value) {
                            $("#kelas").append('<option value=' + key + '>' + value +
                                '</option>');
                        });
                    },
                    error: function() {
                        alert("error");
                    }
                });
            })

            $('.datetime').datetimepicker({
                step: 10,
                minTime:'06:00',
                maxTime:'22:00',
            });

        })
    </script>
@endsection
@section('button-title')
@endsection
@section('content')
    <div class="card card-accent-primary border-primary shadow-sm table-responsive">
        <form method="POST" action="{{ action('UjianController@store') }}" enctype='multipart/form-data' b>
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-md-10">
                        <input id="judul" type="text" class="form-control @error('judul') is-invalid @enderror"
                            name="judul" value="{{ old('judul') }}" required autocomplete="judul" autofocus
                            placeholder="Judul">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama_program" class="col-sm-2 col-form-label">Program Akademik</label>
                    <div class="col-md-10">
                        <select class="form-control select" name="program_akademik_id" id="programAkademik">
                            <option readonly selected value="">Pilih Program Akademik</option>
                            @foreach ($programAkademik as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama_program" class="col-sm-2 col-form-label">Kelas</label>
                    <div class="col-md-10">
                        <select class="form-control select" name="kelas_id" id="kelas">
                            {{-- <option readonly selected value="">Pilih Kelas</option>
                            @foreach ($kelas as $val)
                            <option value="{{ $val->id }}" >{{ $val->nama_program }}</option>
                            @endforeach --}}
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="waktu_mulai" class="col-sm-2 col-form-label">Waktu Mulai</label>
                    <div class="col-md-10">
                        <input id="waktu_mulai" type="text" class="form-control @error('waktu_mulai') is-invalid @enderror datetime"
                            name="waktu_mulai" value="{{ old('nama_mapel') }}" required autofocus
                            placeholder="Waktu Mulai" autocomplete="off" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="waktu_selesai" class="col-sm-2 col-form-label">Waktu Selesai</label>
                    <div class="col-md-10">
                        <input id="waktu_selesai" type="text" class="form-control @error('waktu_selesai') is-invalid @enderror datetime"
                            name="waktu_selesai" value="{{ old('waktu_selesai') }}" required autofocus
                            placeholder="Waktu Selesai" autocomplete="off" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-brand btn-square btn-primary col">Simpan</button>
                </div>
            </div>
        </form>
    </div>
@endsection
