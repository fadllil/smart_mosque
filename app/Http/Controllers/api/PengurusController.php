<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Utils\Response;
use App\Models\Masjid;
use App\Models\Pengurus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PengurusController extends Controller
{
    public function index($id){
        $pengurus = Pengurus::where('id_masjid', $id)->get();
        if (!$pengurus){
            return Response::failure('Pengurus tidak ditemukan', 404);
        }
        return  Response::success('data pengurus', $pengurus);
    }

    public function create(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'jabatan' => 'required',
            'alamat' => 'required'
        ]);
        if ($validator->fails()) {
            return Response::failure($validator->errors()->first(), 417);
        }

        $masjid = Masjid::where('id', $id)->first();
        if (!$masjid){
            return Response::failure('masjid tidak ditemukan', 404);
        }

        $data = $request->all();
        $data['id_masjid'] = $id;
        Pengurus::create($data);
        return Response::success('Data pengurus berhasil ditambah', null);

    }

    public function update(Request $request){
        $pengurus = Pengurus::where('id', $request->id)->first();
        if (!$pengurus){
            return Response::failure('data pengurus tidak ditemukan', 404);
        }
        $data = $request->all();
        unset($data['id']);
        $pengurus->update($data);
        return Response::success('Data pengurus berhasil diubah', null);
    }

    public function delete(Request $request){
        $pengurus = Pengurus::where('id', $request->id)->first();
        if (!$pengurus){
            return Response::failure('data pengurus tidak ditemukan', 404);
        }
        $pengurus->delete();
        return Response::success('Data pengurus berhasil dihapus', null);
    }
}
