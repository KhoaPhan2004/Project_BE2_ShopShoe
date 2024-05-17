@extends('admin.admin')
@section('main')

<h1>Edit Product</h1>
<hr>

<form action="{{ route('admin.product.update', $product->id) }}" method="POST" role="form" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="col-lg-9">
        <div class="form-group">
            <label for="product_name">Name</label>
            <input type="text" class="form-control" name="product_name" id="product_name" value="{{ $product->product_name }}">

            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="description">{{ $product->description }}</textarea>

            <label for="">Hình ảnh hiện có</label><br>
            @if ($product->image_url)
            <img src="{{ asset('images/' . $product->image_url) }}" alt="Hình ảnh sản phẩm  đang có hiện tại" style="max-width: 100px;"><br>
            @else
            <span class="text-danger">Không có hình nào cả</span><br>
            @endif

            <label for="image_url">Thêm Hình Mới</label>
            <input type="file" name="file_upload" id="image_url" class="form-control">
            @if ($errors->has('image_url'))
            <span class="text-danger">{{ $errors->first('image_url') }}</span>
            @endif
        </div>
    </div>


    <div class="col-lg-3">
        <label for="price">Price</label>
        <input type="number" class="form-control" name="price" id="price" value="{{ $product->price }}">



        <label for="brand_id">Brand ID</label>
        <select name="brand_id" class="form-control">
            <option value="">Please select Brand ID</option>
            @foreach($brands as $brand)
            <option value="{{ $brand->id }}" {{ $product->brand_id == $brand->id ? 'selected' : '' }}>{{ $brand->brand_name }}</option>
            @endforeach
        </select>

        <label for="origin_id">Origin ID</label>
        <select name="origin_id" class="form-control">
            <option value="">Please select Origin ID</option>
            @foreach($origins as $origin)
            <option value="{{ $origin->id }}" {{ $product->origin_id == $origin->id ? 'selected' : '' }}>{{ $origin->origin_name }}</option>
            @endforeach
        </select>

        <label for="size">Size</label>
        <input type="number" class="form-control" name="size" id="size" value="{{ $product->size }}">

        <button type="submit" class="btn btn-primary">Update Product</button>
    </div>
</form>

@stop()