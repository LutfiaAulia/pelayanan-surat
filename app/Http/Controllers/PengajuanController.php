<?php

namespace App\Http\Controllers;

use App\Models\POT;
use App\Models\Pengajuan;
use App\Models\SKTM;
use App\Models\SKU;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PengajuanController extends Controller
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

    public function ajusktm(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:16',
            'alasan' => 'required|string',
            'filektp' => 'required|file|mimes:jpg,jpeg,png|max:512',
            'filekk' => 'required|file|mimes:jpg,jpeg,png|max:512',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->all();
        $data['id_user'] = auth()->user()->id;
        $data['status_pengajuan'] = 'Mengajukan';

        // Handle file upload
        if ($request->hasFile('filektp')) {
            $data['filektp'] = $request->file('filektp')->store('ktp');
        }

        if ($request->hasFile('filekk')) {
            $data['filekk'] = $request->file('filekk')->store('kk');
        }

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
            'filekk' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $pengajuan = Pengajuan::create([
            'id_user' => auth()->user()->id,
            'status_pengajuan' => 'Mengajukan',
            'tanggal_pengajuan' => now(),
        ]);

        $filekk = $request->file('filekk');
        $filename = date('Y-m-d') . '_' . $filekk->getClientOriginalName();
        $path = 'filekk/'.$filename;

        Storage::disk('public')->put($path, file_get_contents($filekk));

        $data['nama'] = $request->nama;
        $data['nik'] = $request->nik;
        $data['penghasilan'] = $request->penghasilan;
        $data['alasan'] = $request->alasan;
        $data['filekk'] = $filename;
        $data['id_pengajuan'] = $pengajuan->id_pengajuan;


        POT::create($data);

        return redirect()->route('masyarakat.peng')->with('success', 'Surat berhasil diajukan');
    }

    public function listPengajuan()
    {
        $pengajuans = Pengajuan::all();
        
        return view('Masyarakat.listpeng', compact('pengajuans'));
    }

    // public function listPengajuan()
    // {
    //     // Fetch all Pengajuan records with related SuratSktm
    //     $pengajuans = Pengajuan::with('suratSktm', 'suratPot', 'suratSku')->get();
        
    //     // Pass the data to the view
    //     return view('Masyarakat.listpeng', compact('pengajuans'));
    // }
}
