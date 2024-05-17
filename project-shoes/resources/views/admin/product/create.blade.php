<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .btn {
            margin: 50px 0 0 100px;
            background-color: greenyellow;
        }
    </style>
</head>

<body>

</body>

</html>
@extends('admin.admin')
@section('main')

<h1>Add Product</h1>
<hr>

<form action="{{ route('admin.product.store')}}" method="POST" role="form" enctype="multipart/form-data">
    @csrf
    <div class="col-lg-9">
        <div class="form-group">

            <label for="product_name">Name</label>
            <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Nhập tên sản phẩm...">
            @if(session('error'))
            <div id="error-message" style="color:red;">{{ session('error') }}</div>
            @endif

            <label for="">Description</label>
            <textarea class="form-control" name="description" id="description" placeholder="Enter description..."></textarea>






            <label for="image_url">Vui Lòng Chọn Hình Ảnh:</label>
            <input type="file" name="file_upload" id="image_url" class="form-control">
            @if ($errors->has('image_url'))
            <span class="text-danger">{{ $errors->first('image_url') }}</span>
            @endif








        </div>

    </div>



    <div class="col-lg-3">
        <label for="">Price</label>
        <input type="number" class="form-control" name="price" id="" placeholder="Nhap ...">
        <label for="">Brand_id</label>
        <select name="brand_id" class="form-control">
            <option value="">Vui lòng chọn Brand id</option>

            @foreach($brands as $brand)
            <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
            @endforeach
            <option value="">select on</option>

        </select>
        <label for="">Origin_id</label>
        <select name="origin_id" class="form-control">
            <option value="">Vui lòng chọn Origin id</option>

            @foreach($origins as $origin)
            <option value="{{$origin->id}}">{{$origin->origin_name}}</option>
            @endforeach
            <option value="">select on</option>

        </select>
        <label for="">Size</label>
        <input type="number" class="form-control" name="size" id="" placeholder="Nhap ...">
        <button type="submit" class="btn">Thêm Sản Phẩm</button>

    </div>


</form>


@stop()