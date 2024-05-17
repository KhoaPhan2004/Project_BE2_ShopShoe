@extends('admin.admin')

@section('main')
<div class="container">
    <div class="header">
        <h1>Tạo Đơn Hàng</h1>
    </div>
    <hr>

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <form action="{{ route('order.store')}}" method="POST" role="form">
                @csrf
                <div class="form-group">
                    <label for="user_id">User ID</label>
                    <input type="number" class="form-control" name="user_id" id="user_id" placeholder="Enter User ID" required>
                </div>
                <div class="form-group">
                    <label for="order_date">Order Date</label>
                    <input type="datetime-local" class="form-control" name="order_date" id="order_date" required>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <input type="text" class="form-control" name="status" id="status" placeholder="Enter Status" required>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" name="address" id="address" placeholder="Enter Address" required>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    @if(session()->has('success'))
    <div class="row mt-3">
        <div class="col-md-8 offset-md-2">
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        </div>
    </div>
    @endif
</div>
@stop
