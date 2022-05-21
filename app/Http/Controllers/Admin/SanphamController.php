<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sanpham;
use App\Models\Danhmuc;
use App\Models\Thuonghieu;
use Session;

class SanphamController extends Controller
{
    public function danhsach()
    {
        $tatcasanpham = Sanpham::all();
        $msg = Session::get('msg');

        return view('admin.sanpham.danhsach', [
            'tatcasanpham' => $tatcasanpham,
            'msg' => $msg
        ]);
    }

    public function viewThem()
    {
        $tatcadanhmuc = Danhmuc::all();
        $tatcathuonghieu = Thuonghieu::all();

        return view('admin.sanpham.themmoi', [
            'tatcadanhmuc' => $tatcadanhmuc,
            'tatcathuonghieu' => $tatcathuonghieu
        ]);
    }

    public function them(Request $request)
    {
        try {
            $file = $request['hinhanh'];
            $hinhanh = uniqid('',true) . $file->getClientOriginalName(); //xử lý ảnh
            $file->move('hinhanh/sanpham',$hinhanh); //lưu ảnh vào folder public/hinhanh/sanpham

            $data = [
                'ten' => $request->ten,
                'mota' => $request->mota,
                'chitiet' => $request->chitiet,
                'gia' => $request->gia,
                'soluong' => $request->soluong,
                'danhmuc_id' => $request->danhmuc_id,
                'thuonghieu_id' => $request->thuonghieu_id,
                'hinhanh' => $hinhanh
            ];
            $sanpham = Sanpham::create($data);
    
            return redirect()->route('danhsach.sanpham')->with('msg', 'Thêm mới thành công');
        } catch (\Throwable $th) {
            return redirect()->route('danhsach.sanpham')->with('msg', 'Thêm mới thất bại');
        }
    }

    public function show(int $id)
    {
        try {
            $sanpham = Sanpham::find($id);
            $tatcadanhmuc = Danhmuc::all();
            $tatcathuonghieu = Thuonghieu::all();

            return view('admin.sanpham.sua', [
                'sanpham' => $sanpham,
                'tatcadanhmuc' => $tatcadanhmuc,
                'tatcathuonghieu' => $tatcathuonghieu
            ]);
        } catch (\Throwable $th) {
            return view('admin.sanpham.danhsach');
        }
    }

    public function sua(int $id, Request $request)
    {
        try {
            $file = $request['hinhanh'];
            $hinhanh = uniqid('',true) . $file->getClientOriginalName(); //xử lý ảnh
            $file->move('hinhanh/sanpham',$hinhanh); //lưu ảnh vào folder public/hinhanh/sanpham

            $data = [
                'ten' => $request->ten,
                'mota' => $request->mota,
                'chitiet' => $request->chitiet,
                'gia' => $request->gia,
                'soluong' => $request->soluong,
                'danhmuc_id' => $request->danhmuc_id,
                'thuonghieu_id' => $request->thuonghieu_id,
                'hinhanh' => $hinhanh
            ];
            Sanpham::where('id', $id)->update($data);
            
            return redirect()->route('danhsach.sanpham')->with('msg', 'Cập nhật thành công');
        } catch (\Throwable $th) {
            return redirect()->route('danhsach.sanpham')->with('msg', 'Cập nhật thất bại');
        }
    }

    public function xoa(int $id)
    {
        try {
            Sanpham::where('id', $id)->delete();
            
            return redirect()->route('danhsach.sanpham')->with('msg', 'Xoá thành công');
        } catch (\Throwable $th) {
            return view('admin.sanpham.danhsach')->with('msg', 'Xoá thất bại');
        }
    }
}
