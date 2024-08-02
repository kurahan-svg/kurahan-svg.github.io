<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Baris ini di-import

class LogoutController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function Logout(Request $request)
    {
        Auth::Logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return view('auth.login');
    }
}
