<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<div class="container">
    <div class="row">
        @if ($products->isEmpty())
        <div class="col-12">
            <p>Không tìm thấy kết quả phù hợp.</p>
        </div>
        @else
        @foreach($products as $product)

        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="box">

                <div class="card mb-4">

                    <div class="card-body">
                        <div class="small_card">
                            <i class="fa-solid fa-heart"></i>
                            <i class="fa-solid fa-share"></i>
                        </div>
                        <div class="image">
                            <img src="{{ asset('images/' . $product->image_url) }}" class="img-fluid">
                        </div>
                        <div class="products_text">
                            <h2>{{ $product->product_name }}</h2>
                            <h3>${{ $product->price }}</h3>
                            <a href="{{ route('home.show', $product->id) }}" class="btn">Xem Chi Tiết</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endforeach
        @endif
    </div>
</div>