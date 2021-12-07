<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Utils\Response;
use App\Models\Imam;
use App\Models\JadwalImam;
use App\Models\Masjid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JadwalImamController extends Controller
{
    public function index($id){
        $jadwal_imam = JadwalImam::where('id_masjid', $id)->with('detailImam')->get();
        if (!$jadwal_imam){
            return Response::failure('Jadwal imam tidak ditemukan', 404);
        }
        return  Response::success('data jadwal imam', $jadwal_imam);
    }

    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'id_masjid' => 'required',
            'hari' => 'required',
        ]);
        if ($validator->fails()) {
            return Response::failure($validator->errors()->first(), 417);
        }

        $masjid = Masjid::where('id', $request->id_masjid)->first();
        if (!$masjid){
            return Response::failure('Masjid tidak ditemukan', 404);
        }

        JadwalImam::create($request->all());
        return Response::success('Berhasil menambah data', null);
    }

    public function update(Request $request){
        $jadwal = JadwalImam::where('id', $request->id)->first();
        if (!$jadwal){
            return Response::failure('Data jadwal imam tidak ditemukan', 404);
        }
        $data = $request->all();
        unset($data['id']);
        $jadwal->update($data);
        return Response::success('Data jadwal imam berhasil diubah', null);
    }

    public function delete($id){
        $jadwal = JadwalImam::where('id', $id)->first();
        if (!$jadwal){
            return Response::failure('Data jadwal imam tidak ditemukan', 404);
        }
        $jadwal->delete();
        return Response::success('Data jadwal imam berhasil dihapus', null);
    }

    public function detail($id){
        $detail = Imam::where('id_jadwal_imam', $id)->get();
        if (!$detail){
            return Response::failure('Detail jadwal imam tidak ditemukan', 404);
        }
        return  Response::success('data detail jadwal imam', $detail);
    }

    public function createDetail(Request $request){
        $validator = Validator::make($request->all(), [
            'id_jadwal_imam' => 'required',
            'jadwal' => 'required',
            'nama' => 'required',
        ]);
        if ($validator->fails()) {
            return Response::failure($validator->errors()->first(), 417);
        }

        $jadwal = JadwalImam::where('id', $request->id_jadwal_imam)->first();
        if (!$jadwal){
            return Response::failure('Jadwal Imam tidak ditemukan', 404);
        }

        Imam::create($request->all());
        return Response::success('Berhasil menambah data', null);
    }

    public function updateDetail(Request $request){
        $jadwal = Imam::where('id', $request->id)->first();
        if (!$jadwal){
            return Response::failure('Data jadwal imam tidak ditemukan', 404);
        }
        $data = $request->all();
        unset($data['id']);
        $jadwal->update($data);
        return Response::success('Data jadwal imam berhasil diubah', null);
    }

    public function deleteDetail($id){
        $jadwal = Imam::where('id', $id)->first();
        if (!$jadwal){
            return Response::failure('Data jadwal imam tidak ditemukan', 404);
        }
        $jadwal->delete();
        return Response::success('Data jadwal imam berhasil dihapus', null);
    }
}
