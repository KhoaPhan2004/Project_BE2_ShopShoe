@extends('admin.admin')

@section('main')
<div class="container mt-5">
    <div class="row">
        <h1>Thêm Người Dùng Mới</h1>
        <hr>

        <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-lg-7">
                <div class="form-group">
                    <label for="name">Tên:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="address">Địa chỉ:</label>
                    <input type="text" class="form-control" id="address" name="address" required>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="form-group">
                    <label for="password">Mật khẩu:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>

                <div class="form-group">
                    <label for="image_url">Hình ảnh:</label>
                    <input type="file" class="form-control" id="image_url" name="image_url" required>
                </div>
                <button type="submit" class="btn btn-primary">Thêm</button>
            </div>

           
        </form>
    </div>

</div>
@stop