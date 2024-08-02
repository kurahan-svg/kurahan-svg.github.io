<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use Illuminate\Http\Request;

class ProyekController extends Controller
{
    public function Proyek()
    {
        $proyeks = Proyek::all();
        return view('auth.proyek', ['proyeks' => $proyeks]);
    }
}
