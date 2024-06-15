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
            'alasan' => 'required',
            'filektp' => 'required|mimes:jpg,jpeg,png|max:512',
            'filekk' => 'required|mimes:jpg,jpeg,png|max:512',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $pengajuan = Pengajuan::create([
            'id_user' => auth()->user()->id,
            'status_pengajuan' => 'Mengajukan',
            'tanggal_pengajuan' => now(),
        ]);

        $filekk = $request->file('filekk');
        $filektp = $request->file('filektp');
        $filename = date('Y-m-d') . '_' . $filekk->getClientOriginalName();
        $filenamektp = date('Y-m-d') . '_' . $filektp->getClientOriginalName();
        $path = 'filekk/' . $filename;
        $pathktp = 'filektp/' . $filenamektp;

        Storage::disk('public')->put($path, file_get_contents($filekk));
        Storage::disk('public')->put($pathktp, file_get_contents($filektp));

        $data['nama'] = $request->nama;
        $data['nik'] = $request->nik;
        $data['alasan'] = $request->alasan;
        $data['filekk'] = $filename;
        $data['filektp'] = $filenamektp;
        $data['id_pengajuan'] = $pengajuan->id_pengajuan;

        SKTM::create($data);

        return redirect()->route('masyarakat.sktm')->with('success', 'Surat berhasil diajukan');
    }

    function ajusku(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:16',
            'alasan' => 'required',
            'filektp' => 'required|mimes:jpg,jpeg,png|max:2048',
            'fotousaha' => 'required|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $pengajuan = Pengajuan::create([
            'id_user' => auth()->user()->id,
            'status_pengajuan' => 'Mengajukan',
            'tanggal_pengajuan' => now(),
        ]);

        $filektp = $request->file('filektp');
        $fotousaha = $request->file('fotousaha');
        $filenamektp = date('Y-m-d') . '_' . $filektp->getClientOriginalName();
        $filenameusaha = date('Y-m-d') . '_' . $fotousaha->getClientOriginalName();
        $pathktp = 'filektp/' . $filenamektp;
        $pathusaha = 'fotousaha/' . $filenameusaha;

        Storage::disk('public')->put($pathktp, file_get_contents($filektp));
        Storage::disk('public')->put($pathusaha, file_get_contents($fotousaha));

        $data['nama'] = $request->nama;
        $data['nik'] = $request->nik;
        $data['alasan'] = $request->alasan;
        $data['filektp'] = $filenamektp;
        $data['fotousaha'] = $filenameusaha;
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
        $path = 'filekk/' . $filename;

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

    // public function listpeng()
    // {
    //     $pengajuans = Pengajuan::all();
    //     return view('masyarakat.listpeng', compact('pengajuans'));
    // }

    public function listpeng()
    {
        $pengajuans = Pengajuan::with(['suratSktm', 'suratSku', 'suratPot'])->get();

        $pengajuans = $pengajuans->map(function ($pengajuan) {
            return [
                'id_pengajuan' => $pengajuan->id_pengajuan,
                'tanggal_pengajuan' => $pengajuan->tanggal_pengajuan,
                'status_pengajuan' => $pengajuan->status_pengajuan,
                'created_at' => $pengajuan->created_at,
                'jenis_surat' => $pengajuan->suratSktm ? 'SKTM' : ($pengajuan->suratSku ? 'SKU' : ($pengajuan->suratPot ? 'POT' : null))
            ];
        });

        dd($pengajuans);

        return view('masyarakat.listpeng', compact('pengajuans'));
    }

    public function verifsktm(Request $request)
    {
        $data = $request->only(['nama_pengaju', 'ttl', 'agama', 'nik', 'nomorsurat']);
        return view('AdminWali.List Pengajuan.generatesktm', compact('data'));
    }

    public function verifsku(Request $request)
    {
        $data = $request->only(['nama', 'nik', 'alasan']);
        return view('AdminWali.List Pengajuan.generatesku', compact('data'));
    }

    public function verifpot(Request $request)
    {
        $data = $request->only(['nama', 'nik', 'alasan', 'penghasilan']);
        return view('AdminWali.List Pengajuan.generatesurpeng', compact('data'));
    }
}
