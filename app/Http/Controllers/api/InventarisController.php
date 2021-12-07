<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Utils\Response;
use App\Models\Inventaris;
use App\Models\Masjid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InventarisController extends Controller
{
    public function index($id){
        $inventaris = Inventaris::where('id_masjid', $id)->latest()->get();
        if (!$inventaris){
            return Response::failure('Inventaris tidak ditemukan', 404);
        }
        return  Response::success('data inventaris', $inventaris);
    }

    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'id_masjid' => 'required',
            'nama' => 'required',
            'jumlah' => 'required',
            'keterangan' => 'required',
        ]);
        if ($validator->fails()) {
            return Response::failure($validator->errors()->first(), 417);
        }

        $masjid = Masjid::where('id', $request->id_masjid)->first();
        if (!$masjid){
            return Response::failure('Masjid tidak ditemukan', 404);
        }

        Inventaris::create($request->all());
        return Response::success('Berhasil menambah data', null);
    }

    public function update(Request $request){
        $inventaris = Inventaris::where('id', $request->id)->first();
        if (!$inventaris){
            return Response::failure('Data inventaris tidak ditemukan', 404);
        }
        $data = $request->all();
        unset($data['id']);
        $inventaris->update($data);
        return Response::success('Data inventaris berhasil diubah', null);
    }

    public function delete($id){
        $inventaris = Inventaris::where('id', $id)->first();
        if (!$inventaris){
            return Response::failure('Data informasi tidak ditemukan', 404);
        }
        $inventaris->delete();
        return Response::success('Data informasi berhasil dihapus', null);
    }
}
