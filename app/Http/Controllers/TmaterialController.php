<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material; // Import the Tmaterial model
use App\Models\Proyek; // Import the Proyek model

class TmaterialController extends Controller
{
    public function Tmaterial()
    {
        $proyeks = Proyek::all();
        return view('auth.Tmaterial', ['proyeks' => $proyeks]);
    }
    public function add(Request $request)
    {
        $material = new Material;
        $material->material = $request->material;
        $material->jumlah_awal = $request->jumlah_awal;
        $material->harga = $request->harga;
        $material->jumlah_akhir = $request->jumlah_awal;
        $material->nama_proyek = $request->nama_proyek_hidden;
        $material->id_proyek = $request->id_proyek;

        $material->save();

        return redirect()->route('material')->with('success', 'Material Berhasil ditambahkan');
    }
    public function fetchProjectId(Request $request)
    {
        $projectName = $request->projectName;
        $project = Proyek::where('nama_proyek', $projectName)->first();
        if ($project) {
            return response()->json(['id_proyek' => $project->id_proyek]);
        } else {
            return response()->json(['id_proyek' => null]);
        }
}
public function edit($id_material)
{
    $material = Material::find($id_material);
    $proyeks = Proyek::all();

    if (!$material) {
        return redirect()->route('Ematerial')->with('error', 'Material tidak ditemukan');
    }

    return view('auth.Ematerial', compact('material','proyeks'));
}

public function update(Request $request, $id_material)
{
    $material = Material::find($id_material);
    $proyeks = Proyek::all();
    if (!$material) {
        return redirect()->route('material')->with('error', 'Material not found');
    }

        $material->material = $request->material;
        $material->jumlah_awal = $request->jumlah_awal;
        $material->harga = $request->harga;
        $material->jumlah_akhir = $request->jumlah_akhir;
        $material->nama_proyek = $request->nama_proyek_hidden;
        $material->id_proyek = $request->id_proyek;

    $material->save();

    return redirect()->route('material')->with('success', 'Pembaruan berhasil');
}
public function delete($id_material)
{
    $material = Material::find($id_material);

    if (!$material) {
        return redirect()->route('material')->with('error', 'Material not found');
    }

    $material->delete();

    return redirect()->route('material')->with('success', 'Material berhasil dihapus');
}
public function cari(Request $request)
{
    $query = $request->get('search');
    $materials = material::where('nama_proyek', 'LIKE', "%{$query}%")->get();

    return view('auth.material', compact('materials'));
}
}
