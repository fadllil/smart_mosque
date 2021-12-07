<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Utils\Response;
use App\Models\AdminMasjid;
use App\Models\Jamaah;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfilController extends Controller
{
    public function index($id){
        $user = User::where('id', $id)->with('adminMasjid')->first();
        if (!$user){
            return Response::failure('User tidak ditemukan', 404);
        }
        return  Response::success('data user', $user);
    }

    public function update(Request $request){
        $user = User::where('id', $request->id)->first();
        if (!$user){
            return Response::failure('Data kegiatan tidak ditemukan', 404);
        }
        try {
            DB::beginTransaction();
            $user->update([
                'nama' => $request->nama,
                'email' => $request->email
            ]);
            AdminMasjid::where('id_user', $request->id)->update([
                'jabatan' => $request->jabatan,
                'no_hp' => $request->no_hp,
                'alamat' => $request->alamat
            ]);
            DB::commit();
            return Response::success('Berhasil merubah data pengguna', null);
        }catch (Exception $e){
            return Response::failure('Data tidak ditemukan', 400);
        }
    }

    public function jamaah($id){
        $user = User::where('id', $id)->with('jamaah')->first();
        if (!$user){
            return Response::failure('User tidak ditemukan', 404);
        }
        return  Response::success('data user', $user);
    }

    public function updateJamaah(Request $request){
        $user = User::where('id', $request->id)->first();
        if (!$user){
            return Response::failure('Data kegiatan tidak ditemukan', 404);
        }
        try {
            DB::beginTransaction();
            $user->update([
                'nama' => $request->nama,
                'email' => $request->email
            ]);
            Jamaah::where('id_user', $request->id)->update([
                'no_hp' => $request->no_hp,
                'alamat' => $request->alamat
            ]);
            DB::commit();
            return Response::success('Berhasil merubah data pengguna', null);
        }catch (Exception $e){
            return Response::failure('Data tidak ditemukan', 400);
        }
    }
}
