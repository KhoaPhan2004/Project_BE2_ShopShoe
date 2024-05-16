@extends('admin.admin')

@section('main')
<div class="container mt-5">
    <h1>Chỉnh Sửa Người Dùng</h1>
    <hr>
    <div class="row">
        <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-lg-7">
                <div class="form-group">
                    <label for="name">Tên:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                </div>
                <div class="form-group">
                    <label for="address">Địa chỉ:</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ $user->address }}" required>
                </div>
                <div class="form-group">
                    <label for="password">Mật khẩu (để trống nếu không muốn thay đổi):</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
            </div>
            <div class="col-lg-5">
              

                <div class="form-group">
                    <label for="image_url">Hình ảnh hiện tại:</label><br>
                    @if($user->image_url)
                    <img src="data:image/jpeg;base64,{{ base64_encode($user->image_url) }}" alt="Avatar" style="max-width: 100px;">
                    @else
                    <span>No Image</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="image_url">Chọn hình ảnh mới (nếu muốn thay đổi):</label>
                    <input type="file" class="form-control" id="image_url" name="image_url">
                </div>
                <button type="submit" class="btn btn-primary">Cập Nhật</button>
            </div>

        </form>
    </div>

</div>
@stop