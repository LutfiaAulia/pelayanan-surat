<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class MasyarakatController extends Controller
{
    function editsktm()
    {
        return view('Masyarakat.listpeng');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('masyarakat.profile', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nkkip' => 'required|string|max:255',
            'password' => 'nullable|string|min:8',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->nkkip = $request->nkkip;

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        if ($request->hasFile('profile_picture')) {
            if ($user->profile_picture) {
                Storage::disk('public')->delete($user->profile_picture);
            }

            $file = $request->file('profile_picture');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->move(public_path('img'), $filename);

            $user->profile_picture = 'img/' . $filename;
        }

        $user->save();

        return redirect()->route('Masyarakat.profile', $id)->with('success', 'Profil berhasil diperbarui');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('masyarakat.profile', compact('user'));
    }
}
