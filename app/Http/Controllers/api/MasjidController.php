<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Utils\Response;
use App\Models\JamaahMasjid;
use App\Models\Masjid;
use App\Models\ProfilMasjid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MasjidController extends Controller
{
    public function index(){
        $masjid = Masjid::with('profilMasjid')->get();
        if (!$masjid){
            return Response::failure('Masjid tidak ditemukan', 404);
        }
        return  Response::success('data masjid', $masjid);
    }

    public function diikuti($id){
        $masjid = Masjid::select('masjid.*')
            ->join('jamaah_masjid', 'jamaah_masjid.id_masjid', '=', 'masjid.id')
            ->join('users', 'users.id', '=', 'jamaah_masjid.id_user')
            ->where('users.id', $id)
            ->with('profilMasjid')->get();
        if (!$masjid){
            return Response::failure('Masjid tidak ditemukan', 404);
        }
        return  Response::success('data masjid', $masjid);
    }

    public function detail(Request $request, $id){
        $masjid = Masjid::where('id', $id)
            ->with('profilMasjid')->first();
        $follow = JamaahMasjid::where(['id_masjid' => $id, 'id_user' => $request->auth->id])->first();
        if (!$follow){
            $masjid['follow'] = false;
        }else{
            $masjid['follow'] = true;
        }
        if (!$masjid){
            return Response::failure('Masjid tidak ditemukan', 404);
        }
        return  Response::success('data masjid', $masjid);
    }

    public function ikuti(Request $request){
        $validator = Validator::make($request->all(), [
            'id_masjid' => 'required',
            'id_user' => 'required',
        ]);
        if ($validator->fails()) {
            return Response::failure($validator->errors()->first(), 417);
        }

        $masjid = Masjid::where('id', $request->id_masjid)->first();
        if (!$masjid){
            return Response::failure('Masjid tidak ditemukan', 404);
        }

        JamaahMasjid::create($request->all());
        return Response::success('Berhasil menambah data', null);
    }

    public function update(Request $request){
        $masjid = Masjid::where('id', $request->id)->first();
        if (!$masjid){
            return Response::failure('Data masjid tidak ditemukan', 404);
        }
        $profil_masjid = ProfilMasjid::where('id_masjid', $request->id)->first();

        $data = $request->all();
        unset($data['id']);
        $masjid->update($data);
        if ($profil_masjid){
            $profil_masjid->update($data);
        }else{
            $data['id_masjid'] = $request->id;
            ProfilMasjid::create($data);
        }
        return Response::success('Data Masjid berhasil diubah', null);
    }
}
