@extends('admin.layout')
@section('content')
<div class="col-12">
    <div class="card my-4">
      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
          <h6 class="text-white text-capitalize ps-3">Authors table</h6>
          <span style="color: green">{{$msg ?? ''}}</span>
        </div>
      </div>
      <div class="card-body px-0 pb-2">
        <div class="table-responsive p-0">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tên danh mục</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Mô tả</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Trạng Thái</th>
                {{-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Employed</th> --}}
                <th class="text-secondary opacity-7"></th>
              </tr>
            </thead>
            <tbody>
              @foreach($tatcadanhmuc as $danhmuc)
              <tr>
                <td>
                  <div class="d-flex px-2 py-1">
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="mb-0 text-sm">{{$danhmuc->ten}}</h6>
                    </div>
                  </div>
                </td>
                <td>
                  <p class="text-xs font-weight-bold mb-0">{{$danhmuc->mota}}</p>
                </td>
                <td class="align-middle text-center text-sm">
                    @if($danhmuc->trangthai == 0)
                        <span>Ẩn</span>
                    @else
                      <span>Hiển thị</span>
                    @endif
                </td>
                <td class="align-middle">
                  <a href="{{route('sua.danhmuc', ['id' => $danhmuc->id])}}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                    Sửa
                  </a>
                  <a onclick="return confirm('Xoá?')" href="{{route('xoa.danhmuc', ['id' => $danhmuc->id])}}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
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