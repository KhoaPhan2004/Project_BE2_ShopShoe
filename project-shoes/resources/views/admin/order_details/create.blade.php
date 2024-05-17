<!-- admin.order.create.blade.php -->

@extends('admin.admin')

@section('main')
<div class="container">
    <div class="header">
        <h1>Thêm </h1>
    </div>
    <hr>

    <form action="{{ route('order_details.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="order_id">Order ID:</label>
            <input type="text" class="form-control" id="order_id" name="order_id" required>
        </div>
        <div class="form-group">
    <label for="product_id">Product:</label>
    <select class="form-control" id="product_id" name="product_id" required>
        @foreach($products as $product)
            <option value="{{ $product->id }}">{{$product->name}}</option>
        @endforeach
    </select>
</div>
        <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input type="text" class="form-control" id="quantity" name="quantity" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif
</div>
@stop
