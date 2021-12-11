<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Hello, world!</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('vendors/bootstrap-4/css/bootstrap.min.css') }}">
    <style>
        .bagianTitle {
            min-height: 15vh;
        }

        .bagianBody {
            min-height: 85vh;
        }

    </style>
</head>

<body>
    <div class="container-fluid" style="min-height:100vh;">
        <div class="row">
            <div class="col-md-12 border bagianTitle">
                <div class="row py-2" style="height:100%">
                    <div class="col-md-3 align-self-center">
                        <div class="row align-self-center">
                            <div class="col-12">
                                <img src="{{ asset('images/kino.png') }}" alt="Rumah Private Kino" width="40%">
                            </div>
                            <div class="col-6 ">
                                Nama
                            </div>
                            <div class="col-6 ">
                                : {{ ucfirst($ujianSiswa->getSiswa->name) }}
                            </div>
                            <div class="col-6 ">
                                Program Akademik
                            </div>
                            <div class="col-6 ">
                                :
                                {{ ucfirst(optional(optional($ujianSiswa->getSiswa)->getProgramAkademik)->nama_program) }}
                            </div>
                            <div class="col-6 ">
                                Ujian
                            </div>
                            <div class="col-6 ">
                                :
                                {{ ucfirst(optional(optional($ujianSiswa->getSiswa)->getProgramAkademik)->nama_program) }}
                            </div>

                        </div>
                    </div>
                    <div class="col-md-9 align-self-center">
                        <div class="row">
                            <div class="col-md-9 align-self-center px-5">
                                <div class="progress ">
                                    <div class="progress-bar progress-bar-striped " role="progressbar"
                                        aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 5%"> 5
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 align-self-center text-center">
                                <h1>00:00</h1>
                                <a href="" class="btn btn-warning col-12">Selesai Ujian</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 border bagianBody">
                <div class="row p-2">
                    @for ($i = 1; $i <= count($ujian->getSoal); $i++)
                        <div class="col-md-3 col-3">
                            <a href="javascript:void(0)" class="badge badge-secondary w-100 p-1">No.
                                {{ $i }}</a>
                        </div>
                    @endfor
                </div>
            </div>

            <div class="col-md-9 border bagianBody">
                <form action="#">
                    <div class="row">
                        <div class="col-12">
                            @include('ujian.list_soal')
                            <div class="col-12">
                                <a href="" class="btn btn-info">Simpan & Lanjutkan</a>
                                <a href="" class="btn btn-info">Ragu</a>
                                <a href="" class="btn btn-info">Kosongkan Pilihan</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>

    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap-4/popper.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap-4/js/bootstrap.min.js') }}"></script>
    <script>

    </script>

</body>

</html>
