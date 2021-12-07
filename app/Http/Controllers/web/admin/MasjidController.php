<?php

namespace App\Http\Controllers\web\admin;

use App\Http\Controllers\Controller;
use App\Models\Masjid;
use App\Models\ProfilMasjid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class MasjidController extends Controller
{
    public function index(){
        $data = Masjid::latest()->get();
        return view('admin.masjid.index');
    }

    public function datatable(Request $request){
        if ($request->ajax()) {
            $data = Masjid::latest()->get();
//            dd($data->toArray());
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    if ($row->status == 'Diverifikasi'){
                        $btn = '<a href="#" class="btn btn-outline-danger btn-sm" onclick="hapus('.$row->id.')" data-toggle="modal" data-target="#hapus" style="width: 80px">
                                                <i class="icon icon-trash text-danger"> Hapus</i></a>';
                    }else{
                        $btn = '<a href="/admin/masjid/verifikasi/'.$row->id.'" class="btn btn-outline-success btn-sm" style="width: 95px">
                                                <i class="icon icon-check"> Verifikasi</i></a>' .
                            '<a href="#" class="btn btn-outline-danger btn-sm" onclick="hapus('.$row->id.')" data-toggle="modal" data-target="#hapus" style="width: 80px">
                                                <i class="icon icon-trash text-danger"> Hapus</i></a>';
                    }

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'alamat' => 'required',
            'status' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('warning', $validator->errors()->first());
        }

        $masjid = Masjid::create($request->all());
        ProfilMasjid::create([
            'id_masjid' => $masjid->id
        ]);
        return redirect()->back()->with('succes', 'Berhasil menambah data masjid');
    }

    public function verifikasi($id){
        $data = Masjid::where('id', $id)->first();
        $data->update([
            'status' => 'Diverifikasi'
        ]);
        return redirect()->back()->with('sucess', 'Berhasil merubah status masjid');
    }
}
