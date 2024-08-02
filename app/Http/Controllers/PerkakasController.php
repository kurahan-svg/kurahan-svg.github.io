<?php

namespace App\Http\Controllers;
use App\Models\perkakas;
use App\Models\Proyek;
use Illuminate\Http\Request;

class PerkakasController extends Controller
{
    public function perkakas()
    {
        $Perkakas = Perkakas::all();
        return view('auth.Perkakas', ['Perkakas' => $Perkakas]);
    }
    public function Tperkakas()
    {
        $proyeks = Proyek::all();
        return view('auth.Tperkakas', ['proyeks' => $proyeks]);
    }
    public function add(Request $request)
    {
        $Perkakas = new Perkakas;
        $Perkakas->perkakas = $request->perkakas;
        $Perkakas->jumlah = $request->jumlah;
        $Perkakas->harga = $request->harga;
        $Perkakas->kondisi = $request->kondisi;
        $Perkakas->nama_proyek = $request->nama_proyek_hidden;
        $Perkakas->id_proyek = $request->id_proyek;

        $Perkakas->save();

        return redirect()->route('perkakas')->with('success', 'Perkakas Berhasil ditambahkan');
    }
    public function edit($id_material)
{
    $Perkakas = Perkakas::find($id_material);
    $proyeks = Proyek::all();

    if (!$Perkakas) {
        return redirect()->route('Eperkakas')->with('error', 'Material tidak ditemukan');
    }

    return view('auth.Eperkakas', compact('Perkakas','proyeks'));
}

public function update(Request $request, $id_perkakas)
{
    $Perkakas = Perkakas::find($id_perkakas);
    $proyeks = Proyek::all();
    if (!$Perkakas) {
        return redirect()->route('perkakas')->with('error', 'Perkakas not found');
    }

        $Perkakas->perkakas = $request->perkakas;
        $Perkakas->jumlah = $request->jumlah;
        $Perkakas->harga = $request->harga;
        $Perkakas->kondisi = $request->kondisi;
        $Perkakas->nama_proyek = $request->nama_proyek_hidden;
        $Perkakas->id_proyek = $request->id_proyek;

        $Perkakas->save();

    return redirect()->route('perkakas')->with('success', 'Pembaruan berhasil');
}
public function delete($id_perkakas)
{
    $Perkakas = Perkakas::find($id_perkakas);

    if (!$Perkakas) {
        return redirect()->route('perkakas')->with('error', 'Perkakas not found');
    }

    $Perkakas->delete();

    return redirect()->route('perkakas')->with('success', 'Perkakas berhasil dihapus');
}
public function index(Request $request)
{
    $query = $request->get('search');
    $Perkakas = Perkakas::where('nama_proyek', 'LIKE', "%{$query}%")->get();

    return view('auth.Perkakas', compact('Perkakas'));
}

}
