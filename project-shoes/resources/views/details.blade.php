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
    .image_details:hover {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.9);
}


   
</style>
<div class="container mt-2">
    <div class="name">
        <h1>Chi tiết sản phẩm </h1>
    </div>
    <div class="card shadow">
        <div class="card-header">
            <h1> Sản Phẩm : {{ $product->product_name }}</h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 image_details">
                    <img src="{{ asset('images/' . $product->image_url) }}" alt="{{ $product->product_name }}" class="img-fluid border">
                </div>
                <div class="col-md-6">
                    <h2>Thương Hiệu: {{ $product->brand_name }}</h2>
                    <h4>Xuất Xứ: {{ $product->origin_name }}</h4>
                    <p>Thông Tin: {{ $product->description }}</p>
                    <h3>Giá: ${{ number_format($product->price, 2) }}</h3>
                    <h4>Size: {{ $product->size }}</h4>
                    <a href="{{ route('cart.add', $product->id) }}" class="btn btn-primary">Thêm Vào Giỏ Hàng</a>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('comments.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="comment">Comment</label>
            <textarea name="comment" id="comment" class="form-control" rows="4" required></textarea>
        </div>
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>

    @foreach($product->comments as $comment)
    <div class="mb-4">
        <h5>{{ $comment->user->name }} <small class="text-muted">{{ $comment->created_at->format('d M Y') }}</small></h5>
        <p>{{ $comment->comment }}</p>
        <div class="btn-group" role="group" aria-label="Comment Actions">
        <a href="{{ route('comment.edit', $comment->id) }}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
            <form action="{{ route('comment.destroy', $comment->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></button>
            </form>
        </div>
    </div>
    @endforeach



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