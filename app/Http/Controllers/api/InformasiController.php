<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Utils\Response;
use App\Models\Informasi;
use App\Models\JamaahMasjid;
use App\Models\Masjid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InformasiController extends Controller
{
    public function index($id){
        $informasi = Informasi::where('id_masjid', $id)->latest()->get();
        if (!$informasi){
            return Response::failure('Informasi tidak ditemukan', 404);
        }
        return  Response::success('data informasi imam', $informasi);
    }

    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'id_masjid' => 'required',
            'judul' => 'required',
            'isi' => 'required',
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

        Informasi::create($request->all());
        return Response::success('Berhasil menambah data', null);
    }

    public function update(Request $request){
        $informasi = Informasi::where('id', $request->id)->first();
        if (!$informasi){
            return Response::failure('Data informasi tidak ditemukan', 404);
        }
        $data = $request->all();
        unset($data['id']);
        $informasi->update($data);
        return Response::success('Data informasi berhasil diubah', null);
    }

    public function delete($id){
        $informasi = Informasi::where('id', $id)->first();
        if (!$informasi){
            return Response::failure('Data informasi tidak ditemukan', 404);
        }
        $informasi->delete();
        return Response::success('Data informasi berhasil dihapus', null);
    }

    public function informasi(){
        $data = Informasi::select('informasi.*', 'masjid.nama')
            ->join('masjid', 'masjid.id', '=', 'informasi.id_masjid')
            ->latest()->get();
        if (!$data){
            return Response::failure('Data informasi tidak ditemukan', 404);
        }
        return  Response::success('data informasi imam', $data);
    }

    public function informasiJamaah($id){
        $masjid = JamaahMasjid::where('id_user', $id)->get();

        if (!$masjid){
            return Response::failure('masjid tidak ditemukan', 404);
        }
        $data = Informasi::select('informasi.*', 'masjid.nama')
            ->join('jamaah_masjid', 'jamaah_masjid.id_masjid', '=', 'informasi.id_masjid')
            ->join('masjid', 'masjid.id', '=', 'informasi.id_masjid')
            ->join('users', 'users.id', '=', 'jamaah_masjid.id_user')
            ->latest()
            ->get();

        return  Response::success('data informasi imam', $data);
    }
}
