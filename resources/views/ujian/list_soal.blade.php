<div class="row mt-5">
    <ol>
        @foreach ($ujian->getSoal as $listSoal)
        <div {{ !$loop->first ? 'style=display:none;' : '' }}>

            <div class="col-12">
                <li>{!! optional($listSoal->getSoal)->pertanyaan !!}</li>
            </div>
            <div class="col-12">
                <ol type='A'>
                    @foreach ($listSoal->getPilihanJawaban as $pilihanGanda)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="pilihan[{{ $pilihanGanda->soal_id }}]" id="pilihan-{{ $pilihanGanda->id }}">
                        <label class="form-check-label" for="pilihan-{{ $pilihanGanda->id }}">
                            <li class="ml-3">{!! $pilihanGanda->jawaban !!}</li>
                        </label>
                    </div>
                    @endforeach
                </ol>
            </div>
        </div>
        @endforeach
    </ol>
</div>
