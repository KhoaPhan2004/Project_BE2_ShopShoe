@extends('admin.admin')

@section('main')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Chi Tiết Sản Phẩm</h4>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-3 font-weight-bold">ID:</div>
                            <div class="col-md-9">{{ $product->id }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3 font-weight-bold">Tên sản phẩm:</div>
                            <div class="col-md-9">{{ $product->product_name }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3 font-weight-bold">Mô tả:</div>
                            <div class="col-md-9">{{ $product->description }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3 font-weight-bold">Giá:</div>
                            <div class="col-md-9">{{ $product->price }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3 font-weight-bold">Thương hiệu:</div>
                            <div class="col-md-9">{{ $product->brand->brand_name }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3 font-weight-bold">Xuất xứ:</div>
                            <div class="col-md-9">{{ $product->origin->origin_name }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3 font-weight-bold">Kích thước:</div>
                            <div class="col-md-9">{{ $product->size }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3 font-weight-bold">Hình ảnh:</div>
                            <div class="col-md-9">
                                @if($product->image_url)
                                <img src="{{ asset('images/' . $product->image_url) }}" alt="Product Image" style="max-width: 100px;" class="img-fluid rounded" style="max-width: 150px;">
                                @else
                                    <span class="text-muted">No Image</span>
                                @endif
                            </div>
                        </div>
                        <div class="text-center">
                            <a href="{{ route('product.index') }}" class="btn btn-primary">Quay lại</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
