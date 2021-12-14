<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Utils\Response;
use App\Models\Keuangan;
use App\Models\Masjid;
use App\Models\Pemasukan;
use App\Models\PemasukanDetail;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Exception;

class KeuanganController extends Controller
{
    public function getPemasukan($id){
        $pemasukan = Pemasukan::where('id_masjid', $id)->with('detailPemasukan')->latest()->get();
        if (!$pemasukan){
            return Response::failure('Pemasukan tidak ditemukan', 404);
        }
        return  Response::success('data pemasukan', $pemasukan);
    }

    public function getPengeluaran($id){
        $pengeluaran = Pengeluaran::where('id_masjid', $id)->latest()->get();
        if (!$pengeluaran){
            return Response::failure('Pengeluaran tidak ditemukan', 404);
        }
        return  Response::success('data pengeluaran', $pengeluaran);
    }

    public function createPemasukan(Request $request){
        $validator = Validator::make($request->all(), [
            'id_masjid' => 'required',
            'nama' => 'required',
            'keterangan' => 'required',
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
            $pemasukan = Pemasukan::create([
                'id_masjid' => $request->id_masjid,
                'nama' => $request->nama,
                'keterangan' => $request->keterangan,
                'jenis' => $request->jenis
            ]);

            $nominal = 0;
            if ($request->jenis == 'Infak'){
                $pemasukan->update(['nominal' => $request->nominal]);
                $nominal = $request->nominal;
            }else{

                foreach ($request->donatur as $key => $id_user){
                    $an = $request->an[$key];
                    $nominal_donatur = $request->nominal_donatur[$key];
                    $nominal += $nominal_donatur;
                    PemasukanDetail::create([
                        'id_pemasukan' => $pemasukan->id,
                        'id_user' => $id_user,
                        'an' => $an,
                        'nominal' => $nominal_donatur
                    ]);
                    $pemasukan->update(['nominal' => $nominal]);
                }
            }

            $keuangan = Keuangan::where('id_masjid', $request->id_masjid)->first();

            if ($keuangan){
                $keuangan->update([
                    'saldo' => $keuangan->saldo + $nominal,
                ]);
            }else{
                Keuangan::create([
                    'id_masjid' => $request->id_masjid,
                    'saldo' => $nominal
                ]);
            }
            DB::commit();
            return Response::success('Berhasil menambah data pemasukan', null);
        }catch (Exception $e){
            return Response::failure('Data tidak ditemukan', 400);
        }
    }

    public function createPengeluaran(Request $request){
        $validator = Validator::make($request->all(), [
            'id_masjid' => 'required',
            'nama' => 'required',
            'nominal' => 'required',
            'keterangan' => 'required',
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
            Pengeluaran::create($request->all());
            $keuangan = Keuangan::where('id_masjid', $request->id_masjid)->first();
            if ($keuangan){
                $keuangan->update([
                    'saldo' => $keuangan->saldo - $request->nominal,
                ]);
            }else{
                Keuangan::create([
                    'id_masjid' => $request->id_masjid,
                    'saldo' => 0 - $request->nominal
                ]);
            }
            DB::commit();
            return Response::success('Berhasil menambah data pengeluaran', null);
        }catch (Exception $e){
            return Response::failure('Data tidak ditemukan', 400);
        }
    }

    public function updatePemasukan(Request $request){
        $pemasukan = Pemasukan::where('id', $request->id)->first();
        if (!$pemasukan){
            return Response::failure('Data pemasukan tidak ditemukan', 404);
        }

        try {
            DB::beginTransaction();
            $data = $request->all();
            unset($data['id']);
            $keuangan = Keuangan::where('id_masjid', $pemasukan->id_masjid)->first();
            $keuangan->update([
                'saldo' => $keuangan->saldo - $pemasukan->nominal
            ]);
            $pemasukan->update($data);
            $keuangan->update([
                'saldo' => $keuangan->saldo + $data['nominal']
            ]);
            DB::commit();
            return Response::success('Data pemasukan berhasil diubah', null);
        }catch (Exception $e){
            return Response::failure('Data tidak ditemukan', 400);
        }
    }

    public function updatePengeluaran(Request $request){
        $pengeluaran = Pengeluaran::where('id', $request->id)->first();
        if (!$pengeluaran){
            return Response::failure('Data pengeluaran tidak ditemukan', 404);
        }

        try {
            DB::beginTransaction();
            $data = $request->all();
            unset($data['id']);

            $keuangan = Keuangan::where('id_masjid', $pengeluaran->id_masjid)->first();
            $keuangan->update([
                'saldo' => $keuangan->saldo + $pengeluaran->nominal
            ]);
            $pengeluaran->update($data);
            $keuangan->update([
                'saldo' => $keuangan->saldo - $data['nominal']
            ]);
            DB::commit();
            return Response::success('Data pengeluaran berhasil diubah', null);
        }catch (Exception $e){
            return Response::failure('Data tidak ditemukan', 400);
        }
    }
}
