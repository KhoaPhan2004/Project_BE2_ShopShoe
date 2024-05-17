@extends('admin.admin')

@section('main')
<div class="container">
    <div class="header">
        <h1>Chỉnh Sửa Chi Tiết Đơn Hàng</h1>
    </div>
    <hr>

    <!-- Hiển thị thông báo -->
    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif

    <!-- Form chỉnh sửa chi tiết đơn hàng -->
    <form action="{{ route('order_details.update', $orderDetail->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="order_id">Order ID:</label>
            <input type="text" class="form-control" id="order_id" name="order_id" value="{{ $orderDetail->order_id }}" readonly>
        </div>
        <div class="form-group">
            <label for="product_id">Product ID:</label>
            <input type="text" class="form-control" id="product_id" name="product_id" value="{{ $orderDetail->product_id }}" readonly>
        </div>
        <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $orderDetail->quantity }}">
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>
        <a href="{{ route('order_details.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@stop
