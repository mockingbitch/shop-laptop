@extends('admin.layout')
@section('content')
<style>
    .form-control {
        border: 1px solid #d2d6da !important;
    }
</style>
<div class="col-12">
    <div class="card my-4">
        <span style="color: green; font-weight: bold">{{$msg ?? ''}}</span>
        <form id="quickForm" action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="menu">Tên sản phẩm</label>
                    <input type="text" name="ten" class="form-control" id="menu"
                           placeholder="Nhập tên sản phẩm">
                </div>
                <div class="form-group">
                    <label>Mô tả ngắn</label>
                    <input type="text" name="mota" class="form-control" id="menu"
                           placeholder="Mô tả">
                </div>
                <div class="form-group">
                    <label>Chi tiết sản phẩm</label>
                    <input type="text" name="chitiet" class="form-control" id="menu"
                           placeholder="Chi tiết">
                </div>
                <div class="form-group">
                    <label>Giá sản phẩm</label>
                    <input type="number" name="gia" class="form-control" id="menu"
                           placeholder="Giá sản phẩm">
                </div>
                <div class="form-group">
                    <label>Số lượng sản phẩm</label>
                    <input type="number" name="soluong" class="form-control" id="menu"
                           placeholder="Số lượng">
                </div>
                <div class="form-group">
                    <label>Danh mục</label>
                    <select class="form-control" name="danhmuc_id">
                        @foreach($tatcadanhmuc as $danhmuc)
                            <option value="{{$danhmuc->id}}">{{$danhmuc->ten}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Thương hiệu</label>
                    <select class="form-control" name="thuonghieu_id" id="">
                        @foreach($tatcathuonghieu as $thuonghieu)
                            <option value="{{$thuonghieu->id}}">{{$thuonghieu->ten}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Hình ảnh</label>
                    <input type="file" name="hinhanh" class="form-control" id="menu"
                           placeholder="Hình ảnh">
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" name="add" class="btn btn-primary">Thêm</button>
                <button type="button" name="back" class="btn btn-danger"><a href="{{route('danhsach.danhmuc')}}">Trở về</a></button>
            </div>
        </form>
    </div>
  </div>
@endsection