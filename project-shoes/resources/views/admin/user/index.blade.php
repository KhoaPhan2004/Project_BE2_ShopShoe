@extends('admin.admin')

@section('main')
    <div class="container mt-5">
        <h1>Người Dùng</h1>
        <a href="{{ route('user.create') }}" class="btn btn-success">Thêm</a>
        <hr>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" rel="stylesheet">
        <link href="{{ asset('css/admin_product.css') }}" rel="stylesheet">

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Địa chỉ</th>
                    <!-- <th>Số điện thoại</th> -->
                    <th>Hình ảnh</th>
                    <th>Vai trò</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->address }}</td>
                    <!-- <td>{{ $user->phone_number }}</td> -->
                    <td>
                        @if ($user->image_url)
                            <img src="data:image/jpeg;base64,{{ base64_encode($user->image_url) }}" alt="Avatar" style="max-width: 100px;">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <form action="{{ route('user.destroy', $user->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-primary">Sửa</a>
                            <a href="{{ route('user.show', $user->id) }}" class="btn btn-sm btn-info">Hiển Thị</a>
                            <button class="btn btn-sm btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
    </div>
@stop
