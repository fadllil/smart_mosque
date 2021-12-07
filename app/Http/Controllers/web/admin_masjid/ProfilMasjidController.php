<?php

namespace App\Http\Controllers\web\admin_masjid;

use App\Http\Controllers\Controller;
use App\Models\AdminMasjid;
use App\Models\Masjid;
use App\Models\ProfilMasjid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilMasjidController extends Controller
{
    public function index(){
        $admin = AdminMasjid::where('id_user', Auth::user()->id)->first();
        $masjid = Masjid::where('id', $admin->id_masjid)->with('profilMasjid')->first();
        return view('admin-masjid.profil-masjid.index', compact('masjid'));
    }

    public function update(Request $request){
        $admin = AdminMasjid::where('id_user', Auth::user()->id)->first();
        Masjid::where('id', $admin->id_masjid)->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat
        ]);
        $data = $request->all();
        $profil_masjid = ProfilMasjid::where('id_masjid', $admin->id_masjid)->first();
        if ($profil_masjid){
            $profil_masjid->update($data);
        }else{
            $data['id_masjid'] = $admin->id_masjid;
            ProfilMasjid::create($data);
        }
        return redirect()->back()->with('succes', 'Berhasil merubah profil masjid');
    }
}
