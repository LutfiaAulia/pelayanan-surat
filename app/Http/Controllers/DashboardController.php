<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahPengajuan = Pengajuan::count();
        $jumlahDiproses = Pengajuan::where('status_pengajuan', 'Diproses')->count();
        $jumlahDitolak = Pengajuan::where('status_pengajuan', 'Ditolak')->count();
        $jumlahSelesai = Pengajuan::where('status_pengajuan', 'Selesai')->count();
        
        return view('index', compact('jumlahPengajuan', 'jumlahDiproses', 'jumlahDitolak', 'jumlahSelesai'));
    }
}
