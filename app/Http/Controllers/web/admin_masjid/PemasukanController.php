<?php

namespace App\Http\Controllers\web\admin_masjid;

use App\Http\Controllers\Controller;
use App\Models\AdminMasjid;
use App\Models\Keuangan;
use App\Models\Pemasukan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class PemasukanController extends Controller
{
    public function index(){
        return view('admin-masjid.keuangan.pemasukan.index');
    }

    public function datatable(Request $request){
        $masjid = AdminMasjid::where('id_user', Auth::user()->id)->first();
        if ($request->ajax()) {
            $data = Pemasukan::where('id_masjid', $masjid->id_masjid)->latest()->get();
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
            'nominal' => 'required',
            'keterangan' => 'required'

        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('warning', $validator->errors()->first());
        }

        $masjid = AdminMasjid::where('id_user', Auth::user()->id)->first();

        $keuangan = Keuangan::where('id_masjid', $masjid->id_masjid)->first();
        if ($keuangan){
            $saldo = $keuangan->saldo + $request->nominal;
            $keuangan->update(['saldo' => $saldo]);
        }else{
            Keuangan::create([
                'id_masjid' => $masjid->id,
                'saldo' => $request->nominal
            ]);
        }
        $data = $request->all();
        $data['id_masjid'] = $masjid->id_masjid;
        Pemasukan::create($data);

        return redirect()->back()->with('succes', 'Berhasil menambah data pemasukan');
    }

    public function edit($id, Request $request){
        unset($request['_token']);
        Pemasukan::where('id', $id)->update($request->all());
        return redirect()->back()->with('succes', 'Berhasil merubah data pemasukan');
    }
}
