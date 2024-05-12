<!-- admin.order.edit.blade.php -->

@extends('admin.admin')

@section('main')
<div class="container">
    <div class="header">
        <h1>Chỉnh Sửa Đơn Hàng</h1>
    </div>
    <hr>
    <link href="{{ asset('css/order.css') }}" rel="stylesheet">

    <form action="{{ route('order.update', $order->id) }}" method="POST" role="form">
        @csrf
        @method('PUT')
        <div class="col-md-12">
            <div class="form-group">
                <label for="user_id">User ID</label>
                <input type="number" class="form-control" value="{{ $order->user_id }}" name="user_id" id="user_id" placeholder="Enter User ID">
            </div>
            <div class="form-group">
                <label for="order_date">Order Date</label>
                <input type="datetime-local" class="form-control" value="{{ $order->order_date }}" name="order_date" id="order_date">
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <input type="text" class="form-control" value="{{ $order->status }}" name="status" id="status" placeholder="Enter Status">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" value="{{ $order->address }}" name="address" id="address" placeholder="Enter Address">
            </div>
        </div>

        <div class="button-edit">
            <button type="submit" class="btn-edit btn-primary">Edit</button>
        </div>
    </form>
</div>
@stop
