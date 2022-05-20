<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Thuonghieu;
use Session;

class ThuonghieuController extends Controller
{
    public function danhsach()
    {
        $tatcathuonghieu = Thuonghieu::all();
        $msg = Session::get('msg');

        return view('admin.thuonghieu.danhsach', [
            'tatcathuonghieu' => $tatcathuonghieu,
            'msg' => $msg
        ]);
    }

    public function viewThem()
    {
        return view('admin.thuonghieu.themmoi');
    }

    public function them(Request $request)
    {
        try {
            $data = [
                'ten' => $request->ten,
                'mota' => $request->mota,
                'trangthai' => $request->trangthai
            ];
            $thuonghieu = Thuonghieu::create($data);
    
            return view('admin.thuonghieu.themmoi')->with('msg', 'Thêm mới thành công');
        } catch (\Throwable $th) {
            return view('admin.thuonghieu.themmoi')->with('msg', 'Thêm mới thất bại');
        }
    }

    public function show(int $id)
    {
        try {
            $thuonghieu = Thuonghieu::find($id);

            return view('admin.thuonghieu.sua')->with('thuonghieu', $thuonghieu);
        } catch (\Throwable $th) {
            return view('admin.thuonghieu.danhsach');
        }
    }

    public function sua(int $id, Request $request)
    {
        try {
            $data = [
                'ten' => $request->ten,
                'mota' => $request->mota,
                'trangthai' => $request->trangthai
            ];
            Thuonghieu::where('id', $id)->update($data);
            
            return redirect()->route('danhsach.thuonghieu')->with('msg', 'Cập nhật thành công');
        } catch (\Throwable $th) {
            return view('admin.thuonghieu.sua')->with('msg', 'Cập nhật thất bại');
        }
    }

    public function xoa(int $id)
    {
        try {
            Thuonghieu::where('id', $id)->delete();
            
            return redirect()->route('danhsach.thuonghieu')->with('msg', 'Xoá thành công');
        } catch (\Throwable $th) {
            return view('admin.thuonghieu.danhsach')->with('msg', 'Xoá thất bại');
        }
    }
}
