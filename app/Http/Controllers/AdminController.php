<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Pengajuan;
use App\Models\SKTM;
use App\Models\SKU;
use App\Models\POT;

class AdminController extends Controller
{
    function index()
    {
        return view('index');
    }

    function listAdmin()
    {
        $admins = User::where('role', 'admin')->get();
        return view('AdminWali.Kelola Akun.admin', compact('admins'));
    }

    function listMas()
    {
        $masyarakats = User::where('role', 'masyarakat')->get();
        return view('AdminWali.Kelola Akun.masyarakat', compact('masyarakats'));
    }

    function listWali()
    {
        $walis = User::where('role', 'walinagari')->get();
        return view('AdminWali.Kelola Akun.wali', compact('walis'));
    }

    function masyarakat()
    {
        return view('index');
    }

    function tambahAdmin()
    {
        return view('AdminWali.Kelola Akun.tambahAdmin');
    }

    function tambahMas()
    {
        return view('AdminWali.Kelola Akun.tambahMas');
    }

    function tambahWali()
    {
        return view('AdminWali.Kelola Akun.tambahWali');
    }

    //Verifikasi
    function verifikasisktm()
    {
        return view('AdminWali.List Pengajuan.verifikasisktm');
    }

    function verifikasisku()
    {
        return view('AdminWali.List Pengajuan.verifikasisku');
    }

    function verifikasisurpeng()
    {
        return view('AdminWali.List Pengajuan.verifikasisurpeng');
    }

    //Generate
    function generatesktm()
    {
        return view('AdminWali.List Pengajuan.generatesktm');
    }

    function generatesku()
    {
        return view('AdminWali.List Pengajuan.generatesku');
    }

    function generatesurpeng()
    {
        return view('AdminWali.List Pengajuan.generatesurpeng');
    }

    public function inputAdmin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'nkkip' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['name'] = $request->name;
        $data['nkkip'] = $request->nkkip;
        $data['password'] = Hash::make($request->password);
        $data['role'] = 'admin';


        User::create($data);

        return redirect()->route('admin.listAdmin')->with('success', 'Data berhasil ditambahkan');
    }

    public function inputMas(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'nkkip' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['name'] = $request->name;
        $data['nkkip'] = $request->nkkip;
        $data['password'] = Hash::make($request->password);
        $data['role'] = 'masyarakat';


        User::create($data);

        // On successful save
        return redirect()->route('admin.listMas')->with('success', 'Data berhasil ditambahkan');
    }

    public function inputWali(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'nkkip' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['name'] = $request->name;
        $data['nkkip'] = $request->nkkip;
        $data['password'] = Hash::make($request->password);
        $data['role'] = 'walinagari';


        User::create($data);

        return redirect()->route('admin.listWali')->with('success', 'Data berhasil ditambahkan');
    }

    public function editAdmin(Request $request, $id)
    {
        $data = User::find($id);
        return view('AdminWali.Kelola Akun.editAdmin', compact('data'));
    }

    public function editMas(Request $request, $id)
    {
        $data = User::find($id);
        return view('AdminWali.Kelola Akun.editMas', compact('data'));
    }

    public function editWali(Request $request, $id)
    {
        $data = User::find($id);
        return view('AdminWali.Kelola Akun.editWali', compact('data'));
    }

    public function updateAdmin(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'nkkip' => 'required',
            'password' => 'nullable',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['name'] = $request->name;
        $data['nkkip'] = $request->nkkip;
        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        User::whereId($id)->update($data);
        return redirect()->route('admin.listAdmin')->with('success', 'Update akun admin berhasil');
    }

    public function updateMas(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'nkkip' => 'required',
            'password' => 'nullable',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['name'] = $request->name;
        $data['nkkip'] = $request->nkkip;
        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        User::whereId($id)->update($data);
        return redirect()->route('admin.listMas')->with('success', 'Update akun masyarakat berhasil');
    }

    public function updateWali(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'nkkip' => 'required',
            'password' => 'nullable',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['name'] = $request->name;
        $data['nkkip'] = $request->nkkip;
        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        User::whereId($id)->update($data);
        return redirect()->route('admin.listWali')->with('success', 'Update akun wali berhasil');
    }

    public function deleteAdmin($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('admin.listAdmin')->withErrors('User not found');
        }

        $user->delete();
        return redirect()->route('admin.listAdmin')->with('success', 'Hapus akun admin berhasil');
    }

    public function deleteMas($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('admin.listMas')->withErrors('User not found');
        }

        $user->delete();
        return redirect()->route('admin.listMas')->with('success', 'Hapus akun masyarakat berhasil');
    }

    public function deleteWali($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('admin.listWali')->withErrors('User not found');
        }

        $user->delete();
        return redirect()->route('admin.listWali')->with('success', 'Hapus akun wali berhasil');
    }

    public function listsku()
    {
        $list = SKU::with('pengajuan')
            ->whereHas('pengajuan', function($query) {})
            ->get();

        $list = $list->map(function($item) {
            return [
                'nama' => $item->nama,
                'nik' => $item->nik,
                'alasan' => $item->alasan,
                'id_pengajuan' => $item->pengajuan->id_pengajuan,
                'tanggal_pengajuan' => $item->pengajuan->tanggal_pengajuan,
                'status_pengajuan' => $item->pengajuan->status_pengajuan,
            ];
        });

        return view('AdminWali.List Pengajuan.listsku', compact('list'));
    }

    public function listsktm()
    {
        // Mengambil data dengan join
        $list = SKTM::with('pengajuan')
            ->whereHas('pengajuan', function($query) {})
            ->get();

        // Mengambil hanya kolom yang diperlukan
        $list = $list->map(function($item) {
            return [
                'nama' => $item->nama,
                'nik' => $item->nik,
                'alasan' => $item->alasan,
                'id_pengajuan' => $item->pengajuan->id_pengajuan,
                'tanggal_pengajuan' => $item->pengajuan->tanggal_pengajuan,
                'status_pengajuan' => $item->pengajuan->status_pengajuan,
            ];
        });

        return view('AdminWali.List Pengajuan.listsktm', compact('list'));
    }

    public function listpot()
    {
        // Mengambil data dengan join
        $list = POT::with('pengajuan')
            ->whereHas('pengajuan', function($query) {})
            ->get();

        // Mengambil hanya kolom yang diperlukan
        $list = $list->map(function($item) {
            return [
                'nama' => $item->nama,
                'nik' => $item->nik,
                'alasan' => $item->alasan,
                'id_pengajuan' => $item->pengajuan->id_pengajuan,
                'tanggal_pengajuan' => $item->pengajuan->tanggal_pengajuan,
                'status_pengajuan' => $item->pengajuan->status_pengajuan,
            ];
        });

        return view('AdminWali.List Pengajuan.listsurpeng', compact('list'));
    }

    public function verifsktm(Request $request, $id_pengajuan)
    {
        $data = SKTM::with('pengajuan')->where('id_pengajuan', $id_pengajuan)->firstOrFail();
        return view('AdminWali.List Pengajuan.verifikasisktm', compact('data'));
    }

    public function verifsku(Request $request, $id_pengajuan)
    {
        $data = SKU::with('pengajuan')->where('id_pengajuan', $id_pengajuan)->firstOrFail();
        return view('AdminWali.List Pengajuan.verifikasisku', compact('data'));
    }

    public function verifsurpeng(Request $request, $id_pengajuan)
    {
        $data = POT::with('pengajuan')->where('id_pengajuan', $id_pengajuan)->firstOrFail();
        return view('AdminWali.List Pengajuan.verifikasisurpeng', compact('data'));
    }

}
