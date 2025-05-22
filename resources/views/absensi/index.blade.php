<h3>Absen Masuk</h3>
<form method="POST" action="/absensi/masuk">
    @csrf
    <select name="karyawan_id">
        @foreach($karyawan as $k)
            <option value="{{ $k->id }}">{{ $k->nama }}</option>
        @endforeach
    </select>
    <button type="submit">Absen Masuk</button>
</form>

<h3>Absen Pulang</h3>
<form method="POST" action="/absensi/pulang">
    @csrf
    <select name="karyawan_id">
        @foreach($karyawan as $k)
            <option value="{{ $k->id }}">{{ $k->nama }}</option>
        @endforeach
    </select>
    <button type="submit">Absen Pulang</button>
</form>