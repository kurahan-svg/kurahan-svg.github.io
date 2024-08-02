<?php

namespace App\Http\Controllers;
use App\Models\Alatberat;
use App\Models\Proyek;
use Illuminate\Http\Request;

class AlatberatController extends Controller
{
    public function Alat()
    {
        $Alatberat = Alatberat::all();
        return view('auth.Alatberat', ['Alatberat' => $Alatberat]);
    }
    public function Talatberat()
    {
        $proyeks = Proyek::all();
        return view('auth.Talatberat', ['proyeks' => $proyeks]);
    }
    public function add(Request $request)
    {
        $Alatberat = new Alatberat;
        $Alatberat->alatberat = $request->alatberat;
        $Alatberat->jumlah = $request->jumlah;
        $Alatberat->usia = $request->usia;
        $Alatberat->harga = $request->harga;
        $Alatberat->kondisi = $request->kondisi;
        $Alatberat->penempatan = $request->penempatan;
        $Alatberat->nama_proyek = $request->nama_proyek_hidden;
        $Alatberat->id_proyek = $request->id_proyek;

        $Alatberat->save();

        return redirect()->route('alat')->with('success', 'Alat Berat Berhasil ditambahkan');
    }
    public function edit($id_alatberat)
{
    $Alatberat = Alatberat::find($id_alatberat);
    $proyeks = Proyek::all();

    if (!$Alatberat) {
        return redirect()->route('Ealatberat')->with('error', 'Alat berat tidak ditemukan');
    }

    return view('auth.Ealatberat', compact('Alatberat','proyeks'));
}
    public function update(Request $request, $id_alatberat)
{
    $Alatberat = AlatBerat::find($id_alatberat);
    $proyeks = Proyek::all();
    if (!$Alatberat) {
        return redirect()->route('alat')->with('error', 'Alat Berat not found');
    }

        $Alatberat->alatberat = $request->alatberat;
        $Alatberat->jumlah = $request->jumlah;
        $Alatberat->usia = $request->usia;
        $Alatberat->harga = $request->harga;
        $Alatberat->kondisi = $request->kondisi;
        $Alatberat->penempatan = $request->penempatan;
        $Alatberat->nama_proyek = $request->nama_proyek_hidden;
        $Alatberat->id_proyek = $request->id_proyek;

        $Alatberat->save();

    return redirect()->route('alat')->with('success', 'Pembaruan berhasil');
}
public function delete($id_alatberat)
{
    $Alatberat = Alatberat::find($id_alatberat);

    if (!$Alatberat) {
        return redirect()->route('auth.Alatberat')->with('error', 'Alat berat not found');
    }

    $Alatberat->delete();

    return redirect()->route('alat')->with('success', 'Alat berat berhasil dihapus');
}
public function cari(Request $request)
{
    $query = $request->get('search');
    $Alatberat = Alatberat::where('nama_proyek', 'LIKE', "%{$query}%")->get();

    return view('auth.Alatberat', compact('Alatberat'));
}
}
