<!-- admin.order.create.blade.php -->

@extends('admin.admin')

@section('main')
<div class="container">
    <div class="header">
        <h1>Create New Order</h1>
    </div>
    <hr>

    <form action="{{ route('order.store')}}" method="POST" role="form">
        @csrf
        <div class="col-md-12">
            <div class="form-group">
                <label for="user_id">User ID</label>
                <input type="number" class="form-control" name="user_id" id="user_id" placeholder="Enter User ID">
            </div>
            <div class="form-group">
                <label for="order_date">Order Date</label>
                <input type="datetime-local" class="form-control" name="order_date" id="order_date">
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <input type="text" class="form-control" name="status" id="status" placeholder="Enter Status">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" name="address" id="address" placeholder="Enter Address">
            </div>
        </div>

        <div class="button-add">
            <button type="submit" class="btn-add btn-primary">Submit</button>
        </div>
    </form>

    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif
</div>
@stop
