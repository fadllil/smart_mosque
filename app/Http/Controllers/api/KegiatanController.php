<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Utils\Response;
use App\Models\Kegiatan;
use App\Models\Masjid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KegiatanController extends Controller
{
    public function index($id){
        $kegiatan = Kegiatan::where('id_masjid', $id)->latest()->get();
        if (!$kegiatan){
            return Response::failure('Kegiatan tidak ditemukan', 404);
        }
        return  Response::success('data kegiatan', $kegiatan);
    }

    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'id_masjid' => 'required',
            'nama' => 'required',
            'jenis' => 'required',
            'waktu' => 'required',
            'tanggal' => 'required',
        ]);
        if ($validator->fails()) {
            return Response::failure($validator->errors()->first(), 417);
        }

        $masjid = Masjid::where('id', $request->id_masjid)->first();
        if (!$masjid){
            return Response::failure('Masjid tidak ditemukan', 404);
        }

        Kegiatan::create($request->all());
        return Response::success('Berhasil menambah data', null);
    }

    public function update(Request $request){
        $kegiatan = Kegiatan::where('id', $request->id)->first();
        if (!$kegiatan){
            return Response::failure('Data kegiatan tidak ditemukan', 404);
        }
        $data = $request->all();
        unset($data['id']);
        $kegiatan->update($data);
        return Response::success('Data kegiatan berhasil diubah', null);
    }

    public function delete($id){
        $kegiatan = Kegiatan::where('id', $id)->first();
        if (!$kegiatan){
            return Response::failure('Data kegiatan tidak ditemukan', 404);
        }
        $kegiatan->delete();
        return Response::success('Data kegiatan berhasil dihapus', null);
    }
}
