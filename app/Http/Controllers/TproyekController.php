<?php

namespace App\Http\Controllers;
use App\Models\Proyek;
use Illuminate\Http\Request;

class TproyekController extends Controller
{
    public function Tproyek()
    {
        return view('auth.Tproyek');
    }
    public function add(Request $request)
    {
        $proyek = new Proyek;

        $proyek->nama_proyek = $request->nama_proyek;
        $proyek->lokasi = $request->lokasi;
        $proyek->tanggal_mulai = $request->tanggal_mulai;
        if ($request->has('tanggal_selesai')) {
            $proyek->tanggal_selesai = $request->tanggal_selesai;
        }

        $proyek->save();

        return redirect()->route('proyek')->with('success', 'Proyek berhasil dibuat');
    }
    public function edit($id_proyek)
{
    $proyek = Proyek::find($id_proyek);

    if (!$proyek) {
        return redirect()->route('Eproyek')->with('error', 'Proyek tidak ditemukan');
    }

    return view('auth.Eproyek', compact('proyek'));
}

public function update(Request $request, $id_proyek)
{
    $proyek = Proyek::find($id_proyek);

    if (!$proyek) {
        return redirect()->route('proyek')->with('error', 'Proyek not found');
    }

    $proyek->nama_proyek = $request->nama_proyek;
    $proyek->lokasi = $request->lokasi;
    $proyek->tanggal_mulai = $request->tanggal_mulai;
    $proyek->tanggal_selesai = $request->tanggal_selesai;

    $proyek->save();

    return redirect()->route('proyek')->with('success', 'Pembaruan berhasil');
}
public function delete($id_proyek)
{
    $proyek = Proyek::find($id_proyek);

    if (!$proyek) {
        return redirect()->route('proyek')->with('error', 'Proyek not found');
    }

    $proyek->delete();

    return redirect()->route('proyek')->with('success', 'Data Berhasil dihapus');
}
public function cari(Request $request)
{
    $query = $request->get('search');
    $proyeks = Proyek::where('nama_proyek', 'LIKE', "%{$query}%")->get();

    return view('auth.proyek', compact('proyeks'));
}
}
