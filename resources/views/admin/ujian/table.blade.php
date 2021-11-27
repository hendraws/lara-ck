<div class="table-responsive">
	<table class="table" style="font-size: 13px;">
		<thead class="thead-dark">
			<tr class="text-center">
				<th scope="col">Token</th>
				<th scope="col">Judul</th>
				<th scope="col">Program Akademik</th>
				<th scope="col">Kelas</th>
				<th scope="col">Waktu Mulai</th>
				<th scope="col">Waktu Selesai</th>
				<th scope="col">Jumlah Mapel</th>
				<th scope="col">Jumlah Soal</th>
				<th scope="col">aksi</th>
			</tr>
		</thead>
		<tbody>
			@forelse ($data as $item)
            <tr>
                <td>{{ $item->token }}</td>
                <td>{{ $item->judul }}</td>
                <td>{{ optional($item->getProgramAkademik)->nama_program }}</td>
                <td>{{ optional($item->getKelas)->nama_kelas }}</td>
                <td>{{ $item->waktu_mulai }}</td>
                <td>{{ $item->waktu_selesai }}</td>
                <td>{{ 0 }}</td>
                <td>{{ 0 }}</td>
                <td class="text-center">
                    <a class="btn btn-xs btn-primary" href="{{ action('UjianMataPelajaranController@index') }}?ujian={{ $item->id }}"  data-target="ModalForm" data-url="{{ action('MataPelajaranController@edit', $item) }}"  data-toggle="tooltip" data-placement="top" title="Pengaturan" data-id="{{ $item->id }}" >Pengaturan Mapel & Soal</a>
                    <a class="btn btn-xs btn-info modal-button" href="Javascript:void(0)"  data-target="ModalForm" data-url="{{ action('MataPelajaranController@edit', $item) }}"  data-toggle="tooltip" data-placement="top" title="Detail" data-id="{{ $item->id }}" >Detail</a>
                    <a class="btn btn-xs btn-warning modal-button" href="Javascript:void(0)"  data-target="ModalForm" data-url="{{ action('MataPelajaranController@edit', $item) }}"  data-toggle="tooltip" data-placement="top" title="Edit" data-id="{{ $item->id }}" >Edit</a>
                    <a href="Javascript:void(0)" class="btn btn-xs btn-danger hapus" data-id="{{ $item->id }}">Hapus</a>
                </td>
            </tr>
			@empty
			<tr>
				<td class="text-center text-bold bg-secondary" colspan="9"><h5>TIDAK ADA DATA</h5></td>
			</tr>
			@endforelse
		</tbody>
	</table>

</div>
<div class="card-body p-2 border-top">
	<div class="row justify-content-between align-items-center">
		<div class="col-auto ml-auto">
			{!! $data->appends(request()->except('_token'))->links() !!}
		</div>
	</div>
</div>
