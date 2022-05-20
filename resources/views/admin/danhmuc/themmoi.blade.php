@extends('admin.layout')
@section('content')
<style>
    input {
        border: 1px solid black !important;
    }
</style>
<div class="col-12">
    <div class="card my-4">
        {{$msg ?? ''}}
        <form id="quickForm" action="" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="menu">Tên danh mục</label>
                    <input type="text" name="ten" class="form-control" id="menu"
                           placeholder="Nhập tên danh mục">
                </div>
                <div class="form-group">
                    <label>Mô tả ngắn</label>
                    <input type="text" name="mota" class="form-control" id="menu"
                           placeholder="Mô tả">
                </div>
                <div class="form-group">
                    <label>Trạng thái</label>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="active" name="trangthai"
                               checked="" value="1">
                        <label for="active" class="custom-control-label">Hiển thị</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="deactive" name="trangthai"
                               checked="" value="0">
                        <label for="no_active" class="custom-control-label">Ẩn</label>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" name="add" class="btn btn-primary">Thêm</button>
            </div>
        </form>
    </div>
  </div>
@endsection