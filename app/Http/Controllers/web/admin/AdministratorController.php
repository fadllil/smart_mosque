<?php

namespace App\Http\Controllers\web\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdministratorController extends Controller
{
    public function index(){
        $list_data = User::where('role', 'administrator')->get();
        return view('admin.pengguna.administrator.index', compact('list_data'));
    }

    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'role' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('warning', $validator->errors()->first());
        }

        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        unset($data['_token']);
        User::create($data);
        return redirect('administrator')->with('succes','Berhasil Menambah Data administrator');
    }
}
