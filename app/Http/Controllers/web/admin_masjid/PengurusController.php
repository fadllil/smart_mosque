<?php

namespace App\Http\Controllers\web\admin_masjid;

use App\Http\Controllers\Controller;
use App\Models\AdminMasjid;
use App\Models\Masjid;
use App\Models\Pengurus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class PengurusController extends Controller
{
    public function index(){
        $masjid = AdminMasjid::where('id_user', Auth::user()->id)->first();
        $data = Pengurus::where('id_masjid', $masjid->id_masjid)->latest()->get();
        return view('admin-masjid.pengurus.index', compact('data'));
    }

    public function datatable(Request $request){
        $masjid = AdminMasjid::where('id_user', Auth::user()->id)->first();
        if ($request->ajax()) {
            $data = Pengurus::where('id_masjid', $masjid->id_masjid)->latest()->get();
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
            'nama' => 'required',
            'jabatan' => 'required',
            'alamat' => 'required',

        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('warning', $validator->errors()->first());
        }

        $masjid = AdminMasjid::where('id_user', Auth::user()->id)->first();
//        dd($masjid->toArray());

        $data = $request->all();
        $data['id_masjid'] = $masjid->id_masjid;
        Pengurus::create($data);
        return redirect()->back()->with('succes', 'Berhasil menambah data pengurus masjid');
    }

    public function update($id, Request $request){
//        dd($request->toArray());
        unset($request['_token']);
        Pengurus::where('id', $id)->update($request->all());
        return redirect()->back()->with('succes', 'Berhasil merubah data pengurus masjid');
    }

    public function delete($id){
        Pengurus::where('id', $id)->delete();
        return redirect()->back()->with('succes', 'Berhasil menghapus data pengurus masjid');
    }
}
