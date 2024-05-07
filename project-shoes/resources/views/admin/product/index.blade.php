@extends('admin.admin')
@section('main')


<h1>Sản Phẩm</h1>
<a href="{{ route('product.create') }}" class="btn btn-success">Thêm</a>
<hr>
<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>description</th>
            <th>price</th>
            <th>image</th>
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
                <form action="{{ route('product.destroy', $product->id)}}" method="post">
                    @csrf @method('DELETE')
                    <a href="{{ route('product.edit',$product->id) }}" class="btn btn-sm btn-primary">Sua</a>
                    <button class="btn btn-sm btn-danger">Xoa</button>

                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$products->links()}}

@stop()