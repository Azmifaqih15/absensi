<a href="/karyawan/create">Tambah Karyawan</a>
<table>
    <tr>
        <th>Nama</th><th>NIP</th><th>Jabatan</th><th>Aksi</th>
    </tr>
    @foreach($data as $d)
    <tr>
        <td>{{ $d->nama }}</td>
        <td>{{ $d->nip }}</td>
        <td>{{ $d->jabatan }}</td>
        <td>
            <a href="/karyawan/{{ $d->id }}/edit">Edit</a>
            <form action="/karyawan/{{ $d->id }}" method="POST" style="display:inline;">
                @csrf @method('DELETE')
                <button type="submit">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>