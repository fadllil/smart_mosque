<?php

namespace App\Http\Controllers\web\admin_masjid;

use App\Http\Controllers\Controller;
use App\Models\AdminMasjid;
use App\Models\Informasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class InformasiController extends Controller
{
    public function index(){
        $masjid = AdminMasjid::where('id_user', Auth::user()->id)->first();
        $data = Informasi::where('id_masjid', $masjid->id_masjid)->latest()->get();
        return view('admin-masjid.informasi.index', compact('data'));
    }

    public function datatable(Request $request){
        $masjid = AdminMasjid::where('id_user', Auth::user()->id)->first();
        if ($request->ajax()) {
            $data = Informasi::where('id_masjid', $masjid->id_masjid)->latest()->get();
//            dd($data->toArray());
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="#" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#edit'.$row->id.'" style="width: 80px">
                                            <i class="icon icon-edit text-primary"> Edit</i></a>' .
                        '<a href="#" class="btn btn-outline-danger btn-sm" onclick="hapus('.$row->id.')" data-toggle="modal" data-target="#hapus" style="width: 80px">
                                            <i class="icon icon-trash text-danger"> Hapus</i></a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'isi' => 'required',
            'waktu' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required',

        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('warning', $validator->errors()->first());
        }

        $masjid = AdminMasjid::where('id_user', Auth::user()->id)->first();
        $data = $request->all();
        $data['id_masjid'] = $masjid->id_masjid;
        Informasi::create($data);

        return redirect()->back()->with('succes', 'Berhasil menambah data informasi');
    }

    public function update($id, Request $request){
        unset($request['_token']);
        Informasi::where('id', $id)->update($request->all());
        return redirect()->back()->with('succes', 'Berhasil merubah data informasi');
    }

    public function delete($id){
        Informasi::where('id', $id)->delete();
        return redirect()->back()->with('succes', 'Berhasil mengahapus data informasi');
    }
}
