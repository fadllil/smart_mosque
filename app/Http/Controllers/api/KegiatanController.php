<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Utils\Response;
use App\Models\Kegiatan;
use App\Models\KegiatanIuran;
use Exception;
use App\Models\KegiatanAnggota;
use App\Models\KegiatanDetailAnggota;
use App\Models\Masjid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class KegiatanController extends Controller
{
    public function index($id, Request $request){
        $kegiatan = Kegiatan::where(['id_masjid' => $id, 'status' => $request->status])->with('anggota', 'iuran')->latest()->get();
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
            'status_iuran' => 'required',
        ]);
        if ($validator->fails()) {
            return Response::failure($validator->errors()->first(), 417);
        }

        $masjid = Masjid::where('id', $request->id_masjid)->first();
        if (!$masjid){
            return Response::failure('Masjid tidak ditemukan', 404);
        }

        try {
            DB::beginTransaction();
            $kegiatan = Kegiatan::create([
                'id_masjid' => $request->id_masjid,
                'nama' => $request->nama,
                'jenis' => $request->jenis,
                'status_iuran' => $request->status_iuran,
                'waktu' => $request->waktu,
                'tanggal' => $request->tanggal,
                'status' => 'Belum Terlaksana',
            ]);
            if ($request->status_anggota){
                if ($request->status_anggota == 'Panitia'){
                    $kegiatan_anggota = KegiatanAnggota::create([
                        'id_kegiatan' => $kegiatan->id,
                        'status' => $request->status_anggota,
                    ]);
                    if ($request->id_user){
                        foreach ($request->id_user as $key => $id_user){
                            $keterangan = $request->keterangan[$key];
                            KegiatanDetailAnggota::create([
                                'id_kegiatan_anggota' => $kegiatan_anggota->id,
                                'id_user' => $id_user,
                                'keterangan' => $keterangan
                            ]);
                        }
                    }
                }else{
                    KegiatanAnggota::create([
                        'id_kegiatan' => $kegiatan->id,
                        'status' => $request->status_anggota
                    ]);
                }
            }

            if ($request->status_iuran != 'Tidak Ada'){
                foreach ($request->donatur as $key => $id_user){
                    $nominal = $request->nominal[$key];
                    $keterangan_iuran = $request->ket_iuran[$key];
                    KegiatanIuran::create([
                        'id_kegiatan' => $kegiatan->id,
                        'id_user' => $id_user,
                        'nominal' => $nominal,
                        'keterangan' => $keterangan_iuran
                    ]);
                }
            }
            DB::commit();
            return Response::success('Berhasil menambah data', null);
        } catch (Exception $e){
            DB::rollBack();
            return Response::failure('Data tidak ditemukan', 400);
        }
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

    public function detailAnggota($id){
        $data = KegiatanAnggota::where([
            'id_kegiatan' => $id
        ])->with('detailAnggota.user')->latest()->first();
        if (!$data){
            return Response::failure('Data detail anggota tidak ditemukan', 404);
        }
        return  Response::success('data detail anggota', $data);
    }

    public function detailIuran($id){
        $data = KegiatanIuran::where([
            'id_kegiatan' => $id
        ])->with('user')->latest()->get();
        if (!$data){
            return Response::failure('Data detail iuran tidak ditemukan', 404);
        }
        return  Response::success('data detail iuran', $data);
    }
}
