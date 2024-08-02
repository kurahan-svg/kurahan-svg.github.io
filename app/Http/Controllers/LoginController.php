<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function login_proses(Request $request)
    {
        $request->validate([
            'username'     => 'required',
            'password'  => 'required',
        ]);

        $data = [
            'username'     => $request->username,
            'password'  => $request->password
        ];

        $remember = $request->has('remember') ? true : false;

        if (Auth::attempt($data)) {
            return redirect()->route('home')->with('Success','Login berhasil!');
        } else {
            return redirect()->route('login')->with('Gagal', 'username atau Password Salah');
        }
    }

}
