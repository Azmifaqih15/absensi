<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\Karyawan;
use Carbon\Carbon;

class AbsensiController extends Controller
{
    public function index()
    {
        $karyawan = Karyawan::all();
        return view('absensi.index', compact('karyawan'));
    }

    public function absenMasuk(Request $request)
    {
        Absensi::create([
            'karyawan_id' => $request->karyawan_id,
            'tanggal' => Carbon::today(),
            'jam_masuk' => Carbon::now()->format('H:i:s'),
        ]);

        return back()->with('success', 'Absen masuk berhasil!');
    }

    public function absenPulang(Request $request)
    {
        $absen = Absensi::where('karyawan_id', $request->karyawan_id)
                        ->where('tanggal', Carbon::today())
                        ->first();

        if ($absen) {
            $absen->update(['jam_pulang' => Carbon::now()->format('H:i:s')]);
        }

        return back()->with('success', 'Absen pulang berhasil!');
    }
}
