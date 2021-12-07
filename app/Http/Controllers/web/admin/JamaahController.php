<?php

namespace App\Http\Controllers\web\admin;

use App\Http\Controllers\Controller;
use App\Models\Jamaah;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class JamaahController extends Controller
{
    public function index(){
        $data = Jamaah::get();
        return view('admin.pengguna.jamaah.index');
    }

    public function datatable(Request $request){
        if ($request->ajax()) {
            $data = Jamaah::with('user')->latest()->get();
//            dd($data->toArray());
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="/admin/admin_masjid/detail/'. $row->id .'" class="btn btn-outline-primary btn-sm" style="width: 80px">
                                            <i class="icon icon-details text-primary"> Detail</i></a>' .
                        '<a href="#" class="btn btn-outline-danger btn-sm" onclick="hapus('.$row->id.')" data-toggle="modal" data-target="#hapus" style="width: 80px">
                                            <i class="icon icon-trash text-danger"> Hapus</i></a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
