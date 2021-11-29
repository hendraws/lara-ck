@extends('layouts.app-admin')
@section('title', 'Pengaturan Soal Ujian CAT')
@section('css')
    <style>
        .mh {
            height: 200px;
        }

        td p {
            display: inline;
        }

        .check {
            transform: scale(2);
        }

    </style>
@endsection
@section('js')
    <script>
        $('p img').attr('class', 'img-fluid img-thumbnail mh').removeAttr('style');
    </script>
@endsection
@section('button-title')
@endsection
@section('content')
    <div class="card card-accent-primary border-primary shadow-sm table-responsive">
        <form method="POST" action="{{ action('UjianSoalController@store') }}">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" width="10%" class="text-center"></th>
                                    <th scope="col" width="10%" class="text-center">No</th>
                                    <th scope="col" width="50%">Soal</th>
                                    <th scope="col">Jawaban</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($listSoal as $item)
                                    <tr>
                                        <th class="text-center align-middle">
                                            <input type="checkbox" class="form-check-input check" name="soal_id[]"
                                                value="{{ $item->id }}">
                                        </th>
                                        <td class="text-center align-middle">
                                            {{ $loop->index + 1 }}
                                        </td>
                                        {{-- {{ dd($item->getJawabanBenar) }} --}}
                                        <td class="align-middle">{!! $item->pertanyaan !!}</td>
                                        <td class="align-middle">{{ $item->getJawabanBenar->pilihan }}.
                                            {!! $item->getJawabanBenar->jawaban !!}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <input type="hidden" name="ujian_mapel_id" value="{{ $ujianMapel->id }}">
                    <input type="hidden" name="ujian_id" value="{{ $ujianMapel->ujian_id }}">
                    <div class="col-12">
                        <div class="d-flex">
                            <div class="ml-auto">
                                {{ $listSoal->links() }}
                            </div>
                        </div>
                    </div>
                    <div class="col-12">

                        <div class="modal-footer">
                            <button class="btn btn-brand btn-square btn-primary col">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
