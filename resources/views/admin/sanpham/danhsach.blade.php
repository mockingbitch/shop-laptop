@extends('admin.layout')
@section('content')
<div class="col-12">
    <div class="card my-4">
      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
          <h6 class="text-white text-capitalize ps-3">Danh sách sản phẩm <button class="btn btn-light" style="float: right"><a href="{{route('them.sanpham')}}">Thêm mới</a></button></h6>
          <span style="color: green">{{$msg ?? ''}}</span>
        </div>
        <div class="button-add">
          
        </div>
      </div>
      <div class="card-body px-0 pb-2">
        <div class="table-responsive p-0">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tên sản phẩm</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Mô tả</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Giá</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Số lượng</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Danh mục</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Thương hiệu</th>

                {{-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Employed</th> --}}
                <th class="text-secondary opacity-7"></th>
              </tr>
            </thead>
            <tbody>
              @foreach($tatcasanpham as $sanpham)
              <tr>
                <td>
                  <div class="d-flex px-2 py-1">
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="mb-0 text-sm">{{$sanpham->ten}}</h6>
                    </div>
                  </div>
                </td>
                <td>
                  <p class="text-xs font-weight-bold mb-0">{{$sanpham->mota}}</p>
                </td>
                <td class="align-middle text-center text-sm">
                  <p class="text-xs font-weight-bold mb-0">{{$sanpham->gia}}</p>
                </td>
                <td class="align-middle text-center text-sm">
                  <p class="text-xs font-weight-bold mb-0">{{$sanpham->soluong}}</p>
                </td>
                <td class="align-middle text-center text-sm">
                  <p class="text-xs font-weight-bold mb-0">{{$sanpham->danhmuc->ten}}</p>
                </td>
                <td class="align-middle text-center text-sm">
                  <p class="text-xs font-weight-bold mb-0">{{$sanpham->thuonghieu->ten}}</p>
                </td>
                <td class="align-middle text-center text-sm">
                  <img width="100px" src="{{asset('hinhanh/sanpham/'.$sanpham->hinhanh)}}" alt="">
                </td>
                <td class="align-middle">
                  <a href="{{route('sua.sanpham', ['id' => $sanpham->id])}}" class="text-secondary font-weight-bold text-xs mx-3" data-toggle="tooltip" data-original-title="Edit user">
                    Sửa
                  </a>
                  <a onclick="return confirm('Xoá?')" href="{{route('xoa.sanpham', ['id' => $sanpham->id])}}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                    Xoá
                  </a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection