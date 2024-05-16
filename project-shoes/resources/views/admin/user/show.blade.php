@extends('admin.admin')

@section('main')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Chi Tiết Người Dùng</h4>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-3 font-weight-bold">ID:</div>
                            <div class="col-md-9">{{ $user->id }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3 font-weight-bold">Tên:</div>
                            <div class="col-md-9">{{ $user->name }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3 font-weight-bold">Email:</div>
                            <div class="col-md-9">{{ $user->email }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3 font-weight-bold">Địa chỉ:</div>
                            <div class="col-md-9">{{ $user->address }}</div>
                        </div>
                        <!-- <div class="row mb-3">
                            <div class="col-md-3 font-weight-bold">Số điện thoại:</div>
                            <div class="col-md-9">{{ $user->phone_number }}</div>
                        </div> -->
                        <div class="row mb-3">
                            <div class="col-md-3 font-weight-bold">Hình ảnh:</div>
                            <div class="col-md-9">
                                @if($user->image_url)
                                    <img src="data:image/jpeg;base64,{{ base64_encode($user->image_url) }}" alt="Avatar" class="img-fluid rounded" style="max-width: 150px;">
                                @else
                                    <span class="text-muted">No Image</span>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3 font-weight-bold">Vai trò:</div>
                            <div class="col-md-9">{{ $user->role }}</div>
                        </div>
                        <div class="text-center">
                            <a href="{{ route('user.index') }}" class="btn btn-primary">Quay lại</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
