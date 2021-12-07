<?php

namespace App\Http\Controllers\web\admin;

use App\Http\Controllers\Controller;
use App\Models\AdminMasjid;
use App\Models\Masjid;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class AdminMasjidController extends Controller
{
    public function index(){
        $data = AdminMasjid::get();
        $masjid = Masjid::get();
        return view('admin.pengguna.admin-masjid.index', compact('masjid'));
    }

    public function detail($id){
        $data = AdminMasjid::where('id', $id)->with('user')->with('masjid')->first();
        return view('admin.pengguna.admin-masjid.detail', compact('data'));
    }

    public function datatable(Request $request){
        if ($request->ajax()) {
            $data = AdminMasjid::with('user')->with('masjid')->latest()->get();
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

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'role' => 'required',
            'id_masjid' => 'required'

        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('warning', $validator->errors()->first());
        }

//        dd($request->toArray());
        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
//        dd($user->toArray());
        AdminMasjid::create([
            'id_user' => $user->id,
            'id_masjid' => $request->id_masjid
        ]);

        return redirect()->back()->with('succes', 'Berhasil menambah data admin masjid');
    }
}
