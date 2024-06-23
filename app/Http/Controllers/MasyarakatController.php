<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use App\Models\Pengajuan;
use App\Models\SKTM;
use App\Models\SKU;
use App\Models\POT;

class MasyarakatController extends Controller
{
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

    public function editSKTM($id_pengajuan)
    {
        $sktm = SKTM::with('pengajuan')->where('id_pengajuan', $id_pengajuan)->first();
        return view('Masyarakat.Edit Pengajuan.editsktm', compact('sktm'));
    }

    public function editSKU($id_pengajuan)
    {
        $sku = SKU::with('pengajuan')->where('id_pengajuan', $id_pengajuan)->first();
        return view('Masyarakat.Edit Pengajuan.editsku', compact('sku'));
    }

    public function editSurpeng($id_pengajuan)
    {
        $surpeng = POT::with('pengajuan')->where('id_pengajuan', $id_pengajuan)->first();
        return view('Masyarakat.Edit Pengajuan.editsurpeng', compact('surpeng'));
    }

    public function updateSktm(Request $request, $id_pengajuan)
    {
        // Validasi data input dari form
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|digits:16',
            'tgl_lahir' => 'required|string',
            'agama' => 'required|string|max:50',
            'pekerjaan' => 'required|string|max:255',
            'alamat' => 'required|string|max:500',
            'alasan' => 'required|string|max:500',
            'filektp' => 'nullable|file|mimes:jpg,jpeg,png|max:500',
            'filekk' => 'nullable|file|mimes:jpg,jpeg,png|max:500',
        ]);

        // Ambil data SKTM berdasarkan $id_pengajuan
        $sktm = SKTM::findOrFail($id_pengajuan);

        // Isi model SKTM dengan data yang sudah divalidasi
        $sktm->fill($validatedData);

        // Proses upload dan simpan file jika ada perubahan
        if ($request->hasFile('filektp')) {
            if ($sktm->filektp) {
                Storage::delete('public/filektp/' . $sktm->filektp);
            }
            $filektpPath = $request->file('filektp')->store('public/filektp');
            $sktm->filektp = basename($filektpPath);
        }

        if ($request->hasFile('filekk')) {
            if ($sktm->filekk) {
                Storage::delete('public/filekk/' . $sktm->filekk);
            }
            $filekkPath = $request->file('filekk')->store('public/filekk');
            $sktm->filekk = basename($filekkPath);
        }

        // Simpan perubahan data SKTM
        $sktm->save();

        // Redirect kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Data SKTM berhasil diperbarui.');
    }

    public function updateSku(Request $request, $id_pengajuan)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|digits:16',
            'tgl_lahir' => 'required|string',
            'agama' => 'required|string|max:50',
            'status' => 'required|string|max:50',
            'pekerjaan' => 'required|string|max:255',
            'alamat' => 'required|string|max:500',
            'usaha' => 'required|string|max:255',
            'alasan' => 'required|string|max:500',
            'filektp' => 'nullable|file|mimes:jpg,jpeg,png|max:2000',
            'fotousaha' => 'nullable|file|mimes:jpg,jpeg,png|max:2000',
        ]);

        $sku = SKU::findOrFail($id_pengajuan); // Make sure to pass 'id' as a hidden input in your form

        $sku->fill($validatedData);

        if ($request->hasFile('filektp')) {
            if ($sku->filektp) {
                Storage::delete('public/filektp/' . $sku->filektp);
            }
            $filektpPath = $request->file('filektp')->store('public/filektp');
            $sku->filektp = basename($filektpPath);
        }

        if ($request->hasFile('fotousaha')) {
            if ($sku->fotousaha) {
                Storage::delete('public/fotousaha/' . $sku->fotousaha);
            }
            $fotousahaPath = $request->file('fotousaha')->store('public/fotousaha');
            $sku->fotousaha = basename($fotousahaPath);
        }

        $sku->save();

        return redirect()->back()->with('success', 'Data berhasil diperbarui.');
    }

    public function updatePot(Request $request, $id_pengajuan)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|digits:16',
            'tgl_lahir' => 'required|string',
            'agama' => 'required|string|max:50',
            'pekerjaan' => 'required|string|max:255',
            'alamat' => 'required|string|max:500',
            'penghasilan' => 'required|string|max:255',
            'alasan' => 'required|string|max:500',
            'filekk' => 'nullable|file|mimes:jpg,jpeg,png|max:500',
        ]);

        $surpeng = POT::findOrFail($id_pengajuan); // Make sure to pass 'id' as a hidden input in your form

        $surpeng->fill($validatedData);

        if ($request->hasFile('filekk')) {
            if ($surpeng->filekk) {
                Storage::delete('public/filekk/' . $surpeng->filekk);
            }
            $filekkPath = $request->file('filekk')->store('public/filekk');
            $surpeng->filekk = basename($filekkPath);
        }

        $surpeng->save();

        return redirect()->back()->with('success', 'Data berhasil diperbarui.');
    }

    public function destroySKTM($id_pengajuan)
    {
        SKTM::where('id_pengajuan', $id_pengajuan)->delete();
        Pengajuan::where('id_pengajuan', $id_pengajuan)->delete();
        return redirect()->route('listpeng')->with('success', 'Data berhasil dihapus');
    }

    public function destroySKU($id_pengajuan)
    {
        SKU::where('id_pengajuan', $id_pengajuan)->delete();
        Pengajuan::where('id_pengajuan', $id_pengajuan)->delete();
        return redirect()->route('listpeng')->with('success', 'Data berhasil dihapus');
    }

    public function destroyPOT($id_pengajuan)
    {
        POT::where('id_pengajuan', $id_pengajuan)->delete();
        Pengajuan::where('id_pengajuan', $id_pengajuan)->delete();
        return redirect()->route('listpeng')->with('success', 'Data berhasil dihapus');
    }
}
