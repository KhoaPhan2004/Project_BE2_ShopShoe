@extends('admin.admin')

@section('main')
<div class="container">
    <div class="header">
        <h1>Danh Sách Chi Tiết Đơn Hàng</h1>
    </div>
    <a href="{{ route('order_details.create') }}" class="btn btn-success">Thêm</a>
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
                <th>Order ID</th>
                <th>Product ID</th>
                <th>Quantity</th>
                <th>Created_at</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orderDetails as $orderDetail)
            <tr>
                <td>{{ $orderDetail->id }}</td>
                <td>{{ $orderDetail->order_id }}</td>
                <td>{{ $orderDetail->product_id }}</td>
                <td>{{ $orderDetail->quantity }}</td>
                <td>{{ $orderDetail->created_at }}</td>
                <td>
                    <form action="{{ route('order_details.destroy', $orderDetail->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('order_details.edit', $orderDetail->id) }}" class="btn btn-sm btn-primary"><i class="bi bi-pencil-fill"></i> Edit</a>
                        <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash3-fill"></i> Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination-container">
        {{ $orderDetails->links() }}
    </div>
</div>
@stop

