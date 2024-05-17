@extends('user_header_footer')

@section('main')
<style>
    .container {
        margin-top: 100px;
    }

    .row-product {
        text-align: center;
        margin: 50px 0;
    }

    .name {
        text-align: center;
        color: violet;
        margin: 40px 0;
    }
</style>
<div class="container mt-2">
    <div class="name">
        <h1>Chi tiết sản phẩm </h1>

    </div>
    <div class="card shadow">
        <div class="card-header">
            <h1>{{ $product->product_name }}</h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('images/' . $product->image_url) }}" alt="{{ $product->product_name }}" class="img-fluid border">
                </div>
                <div class="col-md-6">
                    <h2>Brand: {{ $product->brand_name }}</h2>
                    <h4>Origin: {{ $product->origin_name }}</h4>
                    <p>Thông Tin: {{ $product->description }}</p>
                    <h3>Price: ${{ number_format($product->price, 2) }}</h3>
                    <h4>Size: {{ $product->size }}</h4>
                    <a href="{{ route('cart.add', $product->id) }}" class="btn btn-primary">Add To Cart</a>
                </div>
            </div>
        </div>
    </div>



    <div class="row-product shadow">
        <h1 class="mt-4 name">Sản phẩm khác</h1>
        <div class="row mt-2">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Giày Nike Air Winflo 11 Nam - Đen Đen</h3>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('images/' . $product->image_url) }}" alt="{{ $product->product_name }}" class="img-fluid">

                        <p>Giá: $2.000.000VND</p>
                        <a href="#" class="btn btn-primary">Chi tiết</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Giày Nike Air Winflo 11 Nam - Xám</h3>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('images/' . $product->image_url) }}" alt="{{ $product->product_name }}" class="img-fluid">
                        <p>Giá: $2.000.000VND</p>
                        <a href="#" class="btn btn-primary">Chi tiết</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Giày Nike Air Winflo 11 Nam - Đen Trắng</h3>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('images/' . $product->image_url) }}" alt="{{ $product->product_name }}" class="img-fluid">
                        <p>Giá: $2.000.000VND</p>
                        <a href="#" class="btn btn-primary">Chi tiết</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection