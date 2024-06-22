<?php

namespace App\Http\Controllers;

use App\Models\POT;
use App\Models\Pengajuan;
use App\Models\SKTM;
use App\Models\SKU;
use App\Models\SuratKeluar;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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
            'tempat_lahir' => 'required|string|max:255', 
            'tgl_lahir' => 'required|date', 
            'agama' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
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
        $data['tempat_lahir'] = $request->tempat_lahir;
        $data['tgl_lahir'] = date('Y-m-d', strtotime($request->tgl_lahir));
        $data['agama'] = $request->agama;
        $data['pekerjaan'] = $request->pekerjaan;
        $data['alamat'] = $request->alamat;
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
            'tgl_lahir' => 'required|string|max:255',
            'agama' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'usaha' => 'required|string|max:255',
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
        $data['tgl_lahir'] = $request->tgl_lahir;
        $data['agama'] = $request->agama;
        $data['status'] = $request->status;
        $data['pekerjaan'] = $request->pekerjaan;
        $data['alamat'] = $request->alamat;
        $data['usaha'] = $request->usaha;
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
            'tempat_lahir' => 'required|string|max:255', 
            'tgl_lahir' => 'required|date', 
            'agama' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
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
        $data['tempat_lahir'] = $request->tempat_lahir;
        $data['tgl_lahir'] = date('Y-m-d', strtotime($request->tgl_lahir));
        $data['agama'] = $request->agama;
        $data['pekerjaan'] = $request->pekerjaan;
        $data['alamat'] = $request->alamat;
        $data['penghasilan'] = $request->penghasilan;
        $data['alasan'] = $request->alasan;
        $data['filekk'] = $filename;
        $data['id_pengajuan'] = $pengajuan->id_pengajuan;


        POT::create($data);

        return redirect()->route('masyarakat.peng')->with('success', 'Surat berhasil diajukan');
    }

    public function listpengajuan()
    {
        $userId = auth()->id();

        $skuList = SKU::with('pengajuan')
            ->whereHas('pengajuan', function ($query) use ($userId) {
                $query->where('id_user', $userId);
            })
            ->get()
            ->map(function ($item) {
                return $item->pengajuan ? [
                    'nama' => $item->nama,
                    'nik' => $item->nik,
                    'alasan' => $item->alasan,
                    'id_pengajuan' => $item->pengajuan->id_pengajuan,
                    'tanggal_pengajuan' => $item->pengajuan->tanggal_pengajuan,
                    'status_pengajuan' => $item->pengajuan->status_pengajuan,
                    'jenis_surat' => 'SKU',
                ] : null;
            })->filter();

        $sktmList = SKTM::with('pengajuan')
            ->whereHas('pengajuan', function ($query) use ($userId) {
                $query->where('id_user', $userId);
            })
            ->get()
            ->map(function ($item) {
                return $item->pengajuan ? [
                    'nama' => $item->nama,
                    'nik' => $item->nik,
                    'alasan' => $item->alasan,
                    'id_pengajuan' => $item->pengajuan->id_pengajuan,
                    'tanggal_pengajuan' => $item->pengajuan->tanggal_pengajuan,
                    'status_pengajuan' => $item->pengajuan->status_pengajuan,
                    'jenis_surat' => 'SKTM',
                ] : null;
            })->filter();

        $potList = POT::with('pengajuan')
            ->whereHas('pengajuan', function ($query) use ($userId) {
                $query->where('id_user', $userId);
            })
            ->get()
            ->map(function ($item) {
                return $item->pengajuan ? [
                    'nama' => $item->nama,
                    'nik' => $item->nik,
                    'alasan' => $item->alasan,
                    'id_pengajuan' => $item->pengajuan->id_pengajuan,
                    'tanggal_pengajuan' => $item->pengajuan->tanggal_pengajuan,
                    'status_pengajuan' => $item->pengajuan->status_pengajuan,
                    'jenis_surat' => 'POT',
                ] : null;
            })->filter();

        $list = $skuList->merge($sktmList)->merge($potList);

        return view('Masyarakat.listpeng', compact('list'));
    }

    public function verifsktm(Request $request, $id_pengajuan)
    {

        // Mendapatkan ID admin yang sedang login
        $adminId = Auth::user()->id;

        // Mencari record pengajuan
        $pengajuan = Pengajuan::findOrFail($id_pengajuan);

        // Memperbarui record pengajuan
        $pengajuan->status_pengajuan = 'diproses';
        $pengajuan->id_admin = $adminId;
        $pengajuan->save();

        // Membuat nomor_surat
        $jenisSurat = 'SKTM'; // Untuk Surat Keterangan Usaha
        $currentYear = Carbon::now()->year;
        $currentMonthNumeric = Carbon::now()->month;
        $currentMonthRoman = monthToRoman($currentMonthNumeric);

        // Mengambil surat_keluar terakhir untuk jenis_surat tertentu
        $lastSuratKeluar = SuratKeluar::whereYear('created_at', $currentYear)
            ->where('nomor_surat', 'LIKE', '%/' . $jenisSurat . '/%')
            ->orderBy('id_keluar', 'desc')
            ->first();

        $nextNumber = $lastSuratKeluar ? intval(explode('-', $lastSuratKeluar->nomor_surat)[1]) + 1 : 1;
        $nomorSurat = 'B-' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT) . '/' . $jenisSurat . '/' . $currentMonthRoman . '/' . $currentYear;

        // Membuat record baru di surat_keluar
        SuratKeluar::create([
            'id_pengajuan' => $pengajuan->id_pengajuan,
            'nomor_surat' => $nomorSurat, // Sertakan nomor_surat di sini
            'tanggal_kirim' => now(),
            'file_surat' => '', // Sesuaikan jika perlu berisi path file
        ]);

        $sktm = SKTM::where('id_pengajuan', $id_pengajuan)->firstOrFail();
        $data = [
            'id_pengajuan' => $sktm->id_pengajuan,
            'nama' => $sktm->nama,
            'nik' => $sktm->nik,
            'tempat_lahir' => $sktm->tempat_lahir,
            'tgl_lahir' => $sktm->tgl_lahir,
            'agama' => $sktm->agama,
            'pekerjaan' => $sktm->pekerjaan,
            'alamat' => $sktm->alamat,
            'alasan' => $sktm->alasan,
            'nomor_surat' => $nomorSurat
        ];

        return view('AdminWali.List Pengajuan.generatesktm', compact('data'));
    }

    public function verifsku(Request $request, $id_pengajuan)
    {
        $adminId = Auth::user()->id;

        $pengajuan = Pengajuan::findOrFail($id_pengajuan);

        $pengajuan->status_pengajuan = 'diproses';
        $pengajuan->id_admin = $adminId;
        $pengajuan->save();

        $jenisSurat = 'SKU';
        $currentYear = Carbon::now()->year;
        $currentMonthNumeric = Carbon::now()->month;
        $currentMonthRoman = monthToRoman($currentMonthNumeric);

        $lastSuratKeluar = SuratKeluar::whereYear('created_at', $currentYear)
            ->where('nomor_surat', 'LIKE', '%/' . $jenisSurat . '/%')
            ->orderBy('id_keluar', 'desc')
            ->first();

        $nextNumber = $lastSuratKeluar ? intval(explode('-', $lastSuratKeluar->nomor_surat)[1]) + 1 : 1;
        $nomorSurat = 'B-' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT) . '/' . $jenisSurat . '/' . $currentMonthRoman . '/' . $currentYear;

        Log::info('Nomor Surat: ' . $nomorSurat);

        SuratKeluar::create([
            'id_pengajuan' => $pengajuan->id_pengajuan,
            'nomor_surat' => $nomorSurat,
            'tanggal_kirim' => now(),
            'file_surat' => '',
        ]);

        $sku = SKU::where('id_pengajuan', $id_pengajuan)->firstOrFail();
        $data = [
            'id_pengajuan' => $sku->id_pengajuan,
            'nama' => $sku->nama,
            'nik' => $sku->nik,
            'tgl_lahir' => $sku->tgl_lahir,
            'agama' => $sku->agama,
            'status' => $sku->status,
            'pekerjaan' => $sku->pekerjaan,
            'alamat' => $sku->alamat,
            'usaha' => $sku->usaha,
            'alasan' => $sku->alasan,
            'nomor_surat' => $nomorSurat,
        ];

        return view('AdminWali.List Pengajuan.generatesku', compact('data'));
    }

    // public function generateSkuSurat(Request $request, $id_pengajuan)
    // {
    //     $sku = SKU::where('id_pengajuan', $id_pengajuan)->firstOrFail();
    //     $nomorSurat = $request->input('nomor_surat');

    //     SuratKeluar::create([
    //         'id_pengajuan' => $sku->id_pengajuan,
    //         'nomor_surat' => $nomorSurat,
    //         'tanggal_kirim' => now(),
    //         'file_surat' => '', // Update if necessary
    //     ]);

    //     $data = [
    //         'nama' => $sku->nama,
    //         'nik' => $sku->nik,
    //         'tgl_lahir' => $sku->tgl_lahir,
    //         'agama' => $sku->agama,
    //         'status' => $sku->status,
    //         'pekerjaan' => $sku->pekerjaan,
    //         'alamat' => $sku->alamat,
    //         'usaha' => $sku->usaha,
    //         'nomor_surat' => $nomorSurat,
    //     ];

    //     $pdf = PDF::loadView('surat_keterangan_usaha', $data);
    //     return $pdf->download('surat_keterangan_usaha.pdf');
    // }

    public function verifpot(Request $request, $id_pengajuan)
    {
        // Mendapatkan ID admin yang sedang login
        $adminId = Auth::user()->id;

        // Mencari record pengajuan
        $pengajuan = Pengajuan::findOrFail($id_pengajuan);

        // Memperbarui record pengajuan
        $pengajuan->status_pengajuan = 'diproses';
        $pengajuan->id_admin = $adminId;
        $pengajuan->save();

        // Membuat nomor_surat
        $jenisSurat = 'SPH'; // Untuk Surat Keterangan Usaha
        $currentYear = Carbon::now()->year;
        $currentMonthNumeric = Carbon::now()->month;
        $currentMonthRoman = monthToRoman($currentMonthNumeric);

        // Mengambil surat_keluar terakhir untuk jenis_surat tertentu
        $lastSuratKeluar = SuratKeluar::whereYear('created_at', $currentYear)
            ->where('nomor_surat', 'LIKE', '%/' . $jenisSurat . '/%')
            ->orderBy('id_keluar', 'desc')
            ->first();

        $nextNumber = $lastSuratKeluar ? intval(explode('-', $lastSuratKeluar->nomor_surat)[1]) + 1 : 1;
        $nomorSurat = 'B-' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT) . '/' . $jenisSurat . '/' . $currentMonthRoman . '/' . $currentYear;

        // Membuat record baru di surat_keluar
        SuratKeluar::create([
            'id_pengajuan' => $pengajuan->id_pengajuan,
            'nomor_surat' => $nomorSurat, // Sertakan nomor_surat di sini
            'tanggal_kirim' => now(),
            'file_surat' => '', // Sesuaikan jika perlu berisi path file
        ]);

        $pot = POT::where('id_pengajuan', $id_pengajuan)->firstOrFail();
        $data = [
            'id_pengajuan' => $pot->id_pengajuan,
            'nama' => $pot->nama,
            'nik' => $pot->nik,
            'tempat_lahir' => $pot->tempat_lahir,
            'tgl_lahir' => $pot->tgl_lahir,
            'agama' => $pot->agama,
            'pekerjaan' => $pot->pekerjaan,
            'alamat' => $pot->alamat,
            'penghasilan' => $pot->penghasilan,
            'alasan' => $pot->alasan,
            'nomor_surat' => $nomorSurat,
        ];

        return view('AdminWali.List Pengajuan.generatesurpeng', compact('data'));
    }

    public function tolakPengajuanSktm(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_pengajuan' => 'required|exists:pengajuan,id_pengajuan',
            'alasan_penolakan' => 'required|string|max:255',
        ]);

        if ($validator->fails()) return redirect()->back()->withErrors($validator);

        $pengajuan = Pengajuan::find($request->id_pengajuan);
        $pengajuan->status_pengajuan = 'Ditolak';
        $pengajuan->alasan_penolakan = $request->alasan_penolakan;
        $pengajuan->id_admin = auth()->user()->id;
        $pengajuan->save();

        return redirect()->route('admin.listsktm')->with('success', 'Pengajuan berhasil ditolak.');
    }

    public function tolakPengajuanSku(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_pengajuan' => 'required|exists:pengajuan,id_pengajuan',
            'alasan_penolakan' => 'required|string|max:255',
        ]);

        if ($validator->fails()) return redirect()->back()->withErrors($validator);

        $pengajuan = Pengajuan::find($request->id_pengajuan);
        $pengajuan->status_pengajuan = 'Ditolak';
        $pengajuan->alasan_penolakan = $request->alasan_penolakan;
        $pengajuan->id_admin = auth()->user()->id;
        $pengajuan->save();

        return redirect()->route('admin.listsku')->with('success', 'Pengajuan berhasil ditolak.');
    }

    public function tolakPengajuanPot(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_pengajuan' => 'required|exists:pengajuan,id_pengajuan',
            'alasan_penolakan' => 'required|string|max:255',
        ]);

        if ($validator->fails()) return redirect()->back()->withErrors($validator);

        $pengajuan = Pengajuan::find($request->id_pengajuan);
        $pengajuan->status_pengajuan = 'Ditolak';
        $pengajuan->alasan_penolakan = $request->alasan_penolakan;
        $pengajuan->id_admin = auth()->user()->id;
        $pengajuan->save();

        return redirect()->route('admin.listpot')->with('success', 'Pengajuan berhasil ditolak.');
    }
}

function monthToRoman($month)
{
    $romanMonths = [
        1 => 'I',
        2 => 'II',
        3 => 'III',
        4 => 'IV',
        5 => 'V',
        6 => 'VI',
        7 => 'VII',
        8 => 'VIII',
        9 => 'IX',
        10 => 'X',
        11 => 'XI',
        12 => 'XII'
    ];

    return $romanMonths[intval($month)];
}
