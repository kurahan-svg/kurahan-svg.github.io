<?php

namespace App\Http\Controllers;
use App\Models\perkakas;
use App\Models\Alatberat;
use App\Models\Proyek;
use App\Models\Material;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function Guest()
    {
        return view('auth.guest');
    }
    public function Gproyek()
    {
        $proyeks = Proyek::all();
        return view('auth.gproyek',['proyeks' => $proyeks]);
    }
    public function Gmaterial()
    {
        $materials = Material::all();
        return view('auth.gmaterial', ['materials' => $materials]);
    }
    public function Galatberat()
    {
        $Alatberat = Alatberat::all();
        return view('auth.galatberat', ['Alatberat' => $Alatberat]);
    }
    public function Gperkakas()
    {
        $Perkakas = Perkakas::all();
        return view('auth.gperkakas', ['Perkakas' => $Perkakas]);
    }
}
