<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasyarakatController extends Controller
{
    function index(){

    }

    function formsktm(){
        return view('Masyarakat.Pengajuan Surat.sktm');
    }

    function ajusktm(Request $request){
        dd($request->all());
    }
}
