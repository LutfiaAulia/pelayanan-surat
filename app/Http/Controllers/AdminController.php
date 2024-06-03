<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; // Add this line
use Illuminate\Support\Facades\Hash; // Add this line
use App\Models\User;

class AdminController extends Controller
{
    function index(){
        return view('index');
    }

    function listAdmin(){
        $admins = User::where('role', 'admin')->get();
        return view('AdminWali.Kelola Akun.admin', compact('admins'));
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

    public function inputAdmin(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'nkkip' => 'required',
            'password' => 'required',
        ]);
        
        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['name'] = $request->name;
        $data['nkkip'] = $request->nkkip;
        $data['password'] = Hash::make($request->password);
        $data['role'] = 'admin';


        User::create($data);

        return redirect()->route('admin.listAdmin');
    }

    public function editAdmin(Request $request,$id){
        $data = User::find($id);
        return view('AdminWali.Kelola Akun.editAdmin',compact('data'));
    }
}
