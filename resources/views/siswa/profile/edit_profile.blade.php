
<div class="card card-accent-primary border-primary shadow-sm table-responsive">
    <form method="POST" action="{{ action('UjianController@store') }}" enctype='multipart/form-data' b>
        @csrf
        <div class="card-body">
            <div class="form-group row">
                <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                <div class="col-md-10">
                    <input id="judul" type="text" class="form-control @error('judul') is-invalid @enderror" name="judul"
                        value="{{ old('judul') }}" required autocomplete="judul" autofocus placeholder="Judul">
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
                <label for="durasi" class="col-sm-2 col-form-label">Durasi</label>
                <div class="col-md-6">
                    <input id="durasi" type="number"
                        class="form-control @error('durasi') is-invalid @enderror" name="durasi"
                         required autofocus placeholder="Durasi Ujian"
                        autocomplete="off">
                    </div>
                    <small class="form-text text-muted">* Menit.</small>
            </div>
            <div class="form-group row">
                <label for="waktu_mulai" class="col-sm-2 col-form-label">Waktu Mulai</label>
                <div class="col-md-10">
                    <input id="waktu_mulai" type="text"
                        class="form-control @error('waktu_mulai') is-invalid @enderror datetime" name="waktu_mulai"
                        value="{{ old('nama_mapel') }}" required autofocus placeholder="Waktu Mulai"
                        autocomplete="off" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="waktu_selesai" class="col-sm-2 col-form-label">Waktu Selesai</label>
                <div class="col-md-10">
                    <input id="waktu_selesai" type="text"
                        class="form-control @error('waktu_selesai') is-invalid @enderror datetime" name="waktu_selesai"
                        value="{{ old('waktu_selesai') }}" required autofocus placeholder="Waktu Selesai"
                        autocomplete="off" readonly>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-brand btn-square btn-primary col">Simpan</button>
            </div>
        </div>
    </form>
</div>
