<div class="table-responsive">
    <table class="table mb-0" style="font-size: 13px;">
        <thead class="thead-dark">
            <tr class="text-center">
                <th scope="col" colspan="6">SOAL & Pilihan Jawaban</th>
                <th scope="col">aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $item)
                <tr class="text-center">
                    <td rowspan="2">{{ $loop->index() + 1 }}</td>
                    <td>{{ $item->pertanyaan }}</td>
                    <td rowspan="2">{{ $item->pertanyaan }}</td>
                </tr>
                <tr class="text-center">
                    <td>100</td>
                </tr>
            @empty
                <tr>
                    <td class="text-center text-bold bg-secondary" colspan="7">
                        <h5>TIDAK ADA DATA SOAL</h5>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>
