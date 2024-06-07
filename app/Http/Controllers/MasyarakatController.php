<?php

namespace App\Http\Controllers;

use App\Models\Peng;
use App\Models\SKTM;
use App\Models\SKU;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MasyarakatController extends Controller
{
    function index(){

    }

    function formsktm(){
        return view('Masyarakat.Pengajuan Surat.sktm');
    }

    function formsku(){
        return view('Masyarakat.Pengajuan Surat.sku');
    }

    function formpeng(){
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

        $data['nama'] = $request->nama;
        $data['nik'] = $request->nik;
        $data['alasan'] = $request->alasan;
        $data['ktp'] = $request->ktp;
        $data['kk'] = $request->kk;


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

        $data['nama'] = $request->nama;
        $data['nik'] = $request->nik;
        $data['alasan'] = $request->alasan;
        $data['filektp'] = $request->filektp;
        $data['fotousaha'] = $request->fotousaha;


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

        $data['nama'] = $request->nama;
        $data['nik'] = $request->nik;
        $data['penghasilan'] = $request->penghasilan;
        $data['alasan'] = $request->alasan;
        $data['filekk'] = $request->filekk;


        Peng::create($data);

        return redirect()->route('masyarakat.peng')->with('success', 'Surat berhasil diajukan');
    
    }
}
