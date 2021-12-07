<?php

namespace App\Http\Controllers\web\admin_masjid;

use App\Http\Controllers\Controller;
use App\Models\AdminMasjid;
use App\Models\Imam;
use App\Models\JadwalImam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class JadwalImamController extends Controller
{
    public function index(){
        $masjid = AdminMasjid::where('id_user', Auth::user()->id)->first();
        $data = JadwalImam::where('id_masjid', $masjid->id_masjid)->with('detailImam')->get();
        return view('admin-masjid.jadwal_imam.index', compact('data'));
    }

    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'hari' => 'required'

        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('warning', $validator->errors()->first());
        }

        $masjid = AdminMasjid::where('id_user', Auth::user()->id)->first();
        JadwalImam::create([
            'id_masjid' => $masjid->id_masjid,
            'hari' => $request->hari
        ]);

        return redirect()->back()->with('succes', 'Berhasil menambah data jadwal imam');
    }

    public function update($id, Request $request){
        unset($request['_token']);
        JadwalImam::where('id', $id)->update($request->all());
        return redirect()->back()->with('succes', 'Berhasil merubah data jadwal imam');
    }

    public function delete($id){
        JadwalImam::where('id', $id)->delete();
        return redirect()->back()->with('succes', 'Berhasil menghapus data jadwal imam');
    }

    public function jadwalCreate(Request $request){
        $validator = Validator::make($request->all(), [
            'id_jadwal_imam' => 'required',
            'jadwal' => 'required',
            'nama' => 'required',

        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('warning', $validator->errors()->first());
        }

        Imam::create($request->all());
        return redirect()->back()->with('succes', 'Berhasil menambah data jadwal imam');
    }

    public function jadwalUpdate($id, Request $request){
        unset($request['_token']);
        Imam::where('id', $id)->update($request->all());
        return redirect()->back()->with('succes', 'Berhasil merubah data jadwal imam');
    }

    public function jadwalDelete($id){
        Imam::where('id', $id)->delete();
        return redirect()->back()->with('succes', 'Berhasil menghapus data jadwal imam');
    }
}
