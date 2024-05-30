<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'nkkip' => 'required',
            'password' => 'required'
        ], [
            'nkkip.required' => 'NKK/NIP Wajib Diisi',
            'password.required' => 'Password Wajib Diisi',
        ]);

        $data = [
            'nkkip' => $request->nkkip,
            'password' => $request->password
        ];

        if (Auth::attempt($data)) {
            $user = Auth::user();
            if ($user->role == 'admin') {
                return redirect('dashboard/admin');
            } elseif ($user->role == 'walinagari') {
                return redirect('dashboard/walinagari');
            } elseif ($user->role == 'masyarakat') {
                return redirect('dashboard/masyarakat');
            }
        } else {
            return redirect()->back()->withErrors(['nkkip' => 'NKK/NIP atau Password Salah'])->withInput();
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect('');
    }
}
