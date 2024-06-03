<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index(){
        return view('index');
    }

    function admin(){
        return view('index');
    }

    function walinagari(){
        return view('index');
    }

    function masyarakat(){
        return view('index');
    }

    function tambahAdmin(){
        return view('AdminWali.Kelola Akun.tambahAdmin'); 
    }

    function editAdmin(){
        return view('AdminWali.Kelola Akun.editAdmin'); 
    }

    function tambahMas(){
        return view('AdminWali.Kelola Akun.tambahMas'); 
    }

    function editMas(){
        return view('AdminWali.Kelola Akun.editMas'); 
    }

    function tambahWali(){
        return view('AdminWali.Kelola Akun.tambahWali'); 
    }

    function editWali(){
        return view('AdminWali.Kelola Akun.editWali'); 
    }

    //Verifikasi
    function verifikasisktm(){
        return view('AdminWali.List Pengajuan.verifikasisktm'); 
    }

    function verifikasisku(){
        return view('AdminWali.List Pengajuan.verifikasisku'); 
    }

    function verifikasisurpeng(){
        return view('AdminWali.List Pengajuan.verifikasisurpeng'); 
    }

    //Generate
    function generatesktm(){
        return view('AdminWali.List Pengajuan.generatesktm'); 
    }

    function generatesku(){
        return view('AdminWali.List Pengajuan.generatesku'); 
    }

    function generatesurpeng(){
        return view('AdminWali.List Pengajuan.generatesurpeng'); 
    }

}
