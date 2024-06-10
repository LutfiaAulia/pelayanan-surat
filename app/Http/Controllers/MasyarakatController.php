<?php

namespace App\Http\Controllers;

use App\Models\Peng;
use App\Models\Pengajuan;
use App\Models\SKTM;
use App\Models\SKU;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class MasyarakatController extends Controller
{
    function formsktm()
    {
        return view('Masyarakat.Pengajuan Surat.sktm');
    }

    function editsktm()
    {
        return view('Masyarakat.listpeng');
    }

    function formsku()
    {
        return view('Masyarakat.Pengajuan Surat.sku');
    }

    function formpeng()
    {
        return view('Masyarakat.Pengajuan Surat.surpeng');
    }

    function ajusktm(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'nik' => 'required',
            'alasan' => 'required',
            'ktp' => 'required',
            'kk' => 'required',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $pengajuan = Pengajuan::create([
            'id_user' => auth()->user()->id,
            'status_pengajuan' => 'Mengajukan',
            'tanggal_pengajuan' => now(),
        ]);

        $data['nama'] = $request->nama;
        $data['nik'] = $request->nik;
        $data['alasan'] = $request->alasan;
        $data['filektp'] = $request->ktp;
        $data['filekk'] = $request->kk;
        $data['id_pengajuan'] = $pengajuan->id_pengajuan;

        SKTM::create($data);

        return redirect()->route('masyarakat.sktm')->with('success', 'Surat berhasil diajukan');
    }

    function ajusku(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'nik' => 'required',
            'alasan' => 'required',
            'filektp' => 'required',
            'fotousaha' => 'required',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $pengajuan = Pengajuan::create([
            'id_user' => auth()->user()->id,
            'status_pengajuan' => 'Mengajukan',
            'tanggal_pengajuan' => now(),
        ]);

        $data['nama'] = $request->nama;
        $data['nik'] = $request->nik;
        $data['alasan'] = $request->alasan;
        $data['filektp'] = $request->filektp;
        $data['fotousaha'] = $request->fotousaha;
        $data['id_pengajuan'] = $pengajuan->id_pengajuan;


        SKU::create($data);

        return redirect()->route('masyarakat.sku')->with('success', 'Surat berhasil diajukan');
    }

    function ajupeng(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'nik' => 'required',
            'penghasilan' => 'required',
            'alasan' => 'required',
            'filekk' => 'required',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $pengajuan = Pengajuan::create([
            'id_user' => auth()->user()->id,
            'status_pengajuan' => 'Mengajukan',
            'tanggal_pengajuan' => now(),
        ]);

        $data['nama'] = $request->nama;
        $data['nik'] = $request->nik;
        $data['penghasilan'] = $request->penghasilan;
        $data['alasan'] = $request->alasan;
        $data['filekk'] = $request->filekk;
        $data['id_pengajuan'] = $pengajuan->id_pengajuan;


        Peng::create($data);

        return redirect()->route('masyarakat.peng')->with('success', 'Surat berhasil diajukan');
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
            'nkk' => 'required|string|nkk|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'password' => 'nullable|string|min:8',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;

        if ($request->hasFile('profile_picture')) {
            if ($user->profile_picture) {
                Storage::disk('public')->delete($user->profile_picture);
            }

            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $path;
        }

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->route('profile.show', $user->id)->with('success', 'Profil berhasil diperbarui');
    }
}
