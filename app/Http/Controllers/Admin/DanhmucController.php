<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Danhmuc;
use Session;

class DanhmucController extends Controller
{
    public function danhsach()
    {
        $tatcadanhmuc = Danhmuc::all();
        $msg = Session::get('msg');

        return view('admin.danhmuc.danhsach', [
            'tatcadanhmuc' => $tatcadanhmuc,
            'msg' => $msg
        ]);
    }

    public function viewThem()
    {
        return view('admin.danhmuc.themmoi');
    }

    public function them(Request $request)
    {
        try {
            $data = [
                'ten' => $request->ten,
                'mota' => $request->mota,
                'trangthai' => $request->trangthai
            ];
            $danhmuc = Danhmuc::create($data);
    
            return view('admin.danhmuc.themmoi')->with('msg', 'Thêm mới thành công');
        } catch (\Throwable $th) {
            return view('admin.danhmuc.themmoi')->with('msg', 'Thêm mới thất bại');
        }
    }

    public function show(int $id)
    {
        try {
            $danhmuc = Danhmuc::find($id);

            return view('admin.danhmuc.sua')->with('danhmuc', $danhmuc);
        } catch (\Throwable $th) {
            return view('admin.danhmuc.danhsach');
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
            Danhmuc::where('id', $id)->update($data);
            
            return redirect()->route('danhsach.danhmuc')->with('msg', 'Cập nhật thành công');
        } catch (\Throwable $th) {
            return view('admin.danhmuc.sua')->with('msg', 'Cập nhật thất bại');
        }
    }

    public function xoa(int $id)
    {
        try {
            Danhmuc::where('id', $id)->delete();
            
            return redirect()->route('danhsach.danhmuc')->with('msg', 'Xoá thành công');
        } catch (\Throwable $th) {
            return view('admin.danhmuc.danhsach')->with('msg', 'Xoá thất bại');
        }
    }
}
