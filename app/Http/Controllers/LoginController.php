<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    function index(){
        return view('login');
    }

    function login(Request $request){
        $request->validate([
            'nkk/nip' => 'required',
            'password' => 'required'
        ],[
            'nkk/nip.required' => 'NKK/NIP Wajib Diisi',
            'password.required' => 'Password Wajib Diisi'
        ]);
    }

    public function auth(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($data)) {
            return redirect()->route('index');
        } else {
            return redirect()->route('login')->with('failed', 'Email atau Password Salah');
        }
    }
}
