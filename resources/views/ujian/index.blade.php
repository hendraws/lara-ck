<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Hello, world!</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('vendors/bootstrap-4/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/countdowntimer/jquery.countdownTimer.css') }}">
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
                                <div id="countdowntimer"><span id="timer"><span></div>
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
                            <a href="javascript:void(0)" class="badge badge-secondary w-100 p-1 nomor-urutan"
                                data-no="{{ $i }}">No.
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
    <script src="{{ asset('vendors/countdowntimer/jquery.countdownTimer.min.js') }}"></script>
    <script>
        var semuaJawaban = JSON.parse(localStorage.getItem("semuaJawaban")) ?? [];
        // console.log(semuaJawaban);
        let urutanTerkahir = 1;
        let urutanSekarang = 1;
        var storedNames = JSON.parse(localStorage.getItem("semuaJawaban"));
        let waktuBerjalan = "{{ $ujianSiswa->waktu_berjalan }}";
        $(document).on('click', '.nomor-urutan', function() {
            let nomorUrut = $(this).data('no');

            $('#list-' + urutanTerkahir).hide();
            $('#list-' + nomorUrut).show();

            urutanTerkahir = nomorUrut;
            urutanSekarang = nomorUrut;

            console.log();

        });

        $('.simpan').click(function() {

            var noSoal = $(this).data('soal');
            var urutan = $(this).data('urutan');
            var jawaban = $("input[type='radio'][name='pilihan[" + noSoal + "]']:checked").val();
            semuaJawaban[urutan] = {
                'soal': noSoal,
                'jawaban': jawaban
            };

            localStorage.setItem("semuaJawaban", JSON.stringify(semuaJawaban));
            var storedNames = JSON.parse(localStorage.getItem("semuaJawaban"));

            var jumlahJawaban = storedNames.length - 1;
            if(jumlahJawaban % 10 == 0){
                alert(jumlahJawaban);
            }
            console.log($('#timer').text())
            // console.log(storedNames, noSoal, jawaban, localStorage.getItem("semuaJawaban"), );

        });


        $.each(storedNames, function(noSoal, jawaban) {
            if (jawaban !== null) {
                console.log(jawaban.soal);
                $('.myCheckbox').prop('checked', true);
                $('#pilihan-' + jawaban.jawaban).prop("checked", true)
            }
        })

        $(function() {
            $("#timer").countdowntimer({
                minutes:waktuBerjalan,
                size: "lg",
                borderColor : "#ffffff",
                backgroundColor : "#ffffff",
                fontColor : "#FA0909",
                timeUp : timeisUp,
            });
        });

        function timeisUp() {
            alert('asdf');
        }
    </script>

</body>

</html>
