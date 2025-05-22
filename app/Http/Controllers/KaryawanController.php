<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\Absensi;
use Carbon\Carbon;

class KaryawanController extends Controller
{
    public function index()
    {
        $data = Karyawan::all();
        return view('karyawan.index', compact('data'));
    }

    public function create()
    {
        return view('karyawan.create');
    }

    public function store(Request $request)
    {
        Karyawan::create($request->all());
        return redirect('/karyawan');
    }

    public function edit(Karyawan $karyawan)
    {
        return view('karyawan.edit', compact('karyawan'));
    }

    public function update(Request $request, Karyawan $karyawan)
    {
        $karyawan->update($request->all());
        return redirect('/karyawan');
    }

    public function destroy(Karyawan $karyawan)
    {
        $karyawan->delete();
        return redirect('/karyawan');
    }
}
