<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\JamaahMasjid;
use App\Http\Utils\Response;
use Illuminate\Http\Request;

class JamaahController extends Controller
{
    public function index($id){
        $jamaah = JamaahMasjid::where('id_masjid', $id)->with('user', 'jamaah')->get();
        if (!$jamaah){
            return Response::failure('Jamaah tidak ditemukan', 404);
        }
        return  Response::success('data jamaah', $jamaah);
    }
}
