@extends('admin.admin')
@section('main')


<h1>Sản Phẩm</h1>
<a href="{{ route('admin.product.create') }}" class="btn btn-success">Thêm</a>
<hr>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" rel="stylesheet">
<link href="{{ asset('css/admin_product.css') }}" rel="stylesheet">

<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>description</th>
            <th>
                <div class="d-flex ">
                    <div class="dropdown">
                        <span class="mr-2">price</span>
                        <i class="bi bi-caret-down-fill dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('admin.products.sort', 'desc') }}">Giảm dần</a>
                            <a class="dropdown-item" href="{{ route('admin.products.sort', 'asc') }}">Tăng dần</a>
                        </div>

                    </div>
                </div>
            </th>



            <th>image </th>
            <th>brand_id</th>
            <th>origin_id</th>
            <th>size</th>
            <th>Action</th>

        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{$product -> id}}</td>
            <td>{{$product -> product_name}}</td>
            <td>{{$product -> description}}</td>
            <td>{{ number_format($product->price) }} VND</td>
            <td><img src="{{ asset('images/' . $product->image_url) }}" alt="Product Image" style="max-width: 100px;"></td>

            <td>{{$product -> brand_name}}</td>
            <td>{{$product -> origin_name}}</td>
            <td>{{$product -> size}}</td>

            <td>
                <form action="{{ route('admin.product.destroy', $product->id)}}" method="post">
                    @csrf @method('DELETE')
                    <a href="{{ route('admin.product.edit',$product->id) }}" class="btn btn-sm btn-primary">Sua</a>
                    <button class="btn btn-sm btn-danger">Xoa</button>

                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$products->links()}}

@stop()