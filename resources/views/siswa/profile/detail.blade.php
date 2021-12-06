
        <div class="row">
            <div class="col-12 d-flex align-items-stretch flex-column">
                <div class="card bg-light d-flex flex-fill">
                    <div class="card-header text-muted border-bottom-0">
                       {{ optional($user->getProgramAkademik)->nama_program }}
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-7">
                                <h2 class="lead"><b>{{ $user->nama }}</b></h2>
                                <p class="text-muted"><b>Motto: </b> {{ $user->motto }}
                                </p>
                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                    <li class=""><span class="fa-li"><i
                                                class="fas fa-lg fa-building"></i></span> Address: {{ $user->alamat}}</li>
                                    <li class=""><span class="fa-li"><i
                                                class="fas fa-lg fa-phone"></i></span> Phone : {{ $user->phone }}</li>
                                </ul>
                            </div>
                            <div class="col-5 text-center">
                                <img src="{{ Storage::url($user->foto)  }}" alt="user-avatar" class="img-circle img-fluid img-thumbnail"  width="200" height="200">
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
