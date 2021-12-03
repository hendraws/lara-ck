@extends('layouts.app-siswa')
@section('title', 'Mata Pelajaran')
@section('content')

    @if (auth()->user()->is_active == 'N')
        <div class="alert alert-info alert-dismissible">
            <h5><i class="fas fa-bullhorn"></i> Pemberitahuan !</h5>
            <h3>Hallo {{ auth()->user()->name }}</h3>
            Silahkan menghubungi admin untuk mengaktifkan akun anda.
        </div>
    @elseif (empty(auth()->user()->tanggal_lahir))
        <h5>Silahkan Lengkapi Profile Anda Terlebih Tahulu</h5>
        @include('siswa.profile.edit_profile')
    @else

        <div class="row">
            <div class="col-12 d-flex align-items-stretch flex-column">
                <div class="card bg-light d-flex flex-fill">
                    <div class="card-header text-muted border-bottom-0">
                        Nama Program Akademik
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-7">
                                <h2 class="lead"><b>Nicole Pearson</b></h2>
                                <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic Artist / Coffee
                                    Lover
                                </p>
                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                    <li class="small"><span class="fa-li"><i
                                                class="fas fa-lg fa-building"></i></span> Address: Demo Street 123, Demo
                                        City
                                        04312, NJ</li>
                                    <li class="small"><span class="fa-li"><i
                                                class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li>
                                </ul>
                            </div>
                            <div class="col-5 text-center">
                                <img src="../../dist/img/user1-128x128.jpg" alt="user-avatar" class="img-circle img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        </a>
                        <a href="#" class="btn btn-sm btn-warning">
                            <i class="fas fa-chalkboard-teacher"></i></i> Ujian
                        </a>
                        <a href="#" class="btn btn-sm btn-primary">
                            <i class="fas fa-user"></i> Riwayat Ujian
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection
