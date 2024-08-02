<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material; // Import the Material model

class MaterialController extends Controller
{
    public function Material()
    {
        $materials = Material::all();
        return view('auth.material', ['materials' => $materials]);
    }
}
