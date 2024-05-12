<!-- admin.order.index.blade.php -->

@extends('admin.admin')

@section('main')
<div class="container">
    <div class="header">
        <h1>Danh Sách Đơn Hàng</h1>
    </div>
    <a href="{{ route('order.create') }}" class="btn btn-success">Thêm</a>
    <hr>

    <!-- Hiển thị thông báo -->
    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif

    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>User ID</th>
                <th>Order Date</th>
                <th>Status</th>
                <th>Address</th>
                <th>Created_at</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->user_id }}</td>
                <td>{{ $order->order_date }}</td>
                <td>{{ $order->status }}</td>
                <td>{{ $order->address }}</td>
                <td>{{ $order->created_at }}</td>
                <td>
                    <form action="{{ route('order.destroy', $order->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('order.edit', $order->id) }}" class="btn btn-sm btn-primary"><i class="bi bi-pencil-fill"></i> Edit</a>
                        <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash3-fill"></i> Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination-container">
        {{ $orders->links() }}
    </div>
</div>
@stop
