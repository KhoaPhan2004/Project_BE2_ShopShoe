<div class="container">
    @extends('admin.admin')
    @section('main')


    <div class="header">
        <h1>Thương Hiệu</h1>
    </div>
    <link href="{{ asset('css/brand.css') }}" rel="stylesheet">

    <a href="{{ route('brand.create') }}" class="btn btn-success">Thêm</a>
    <hr>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Created_at</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach($brands as $brand)
            <tr>
                <td>{{$brand -> id}}</td>
                <td>{{$brand -> brand_name}}</td>
                <td>{{$brand -> created_at}}</td>

                <!-- <td>{{$brand -> status == 0 ? 'tam an' : 'Hien thi'}}</td> -->
                <td>
                    <form action="{{ route('brand.destroy', $brand->id)}}" method="post">
                        @csrf @method('DELETE')
                        <a href="{{ route('brand.edit',$brand->id) }}" class="btn btn-sm btn-primary">Sua</a>
                        <button class="btn btn-sm btn-danger">Xoa</button>

                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination-container">
    @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        {{$brands->links()}}
    </div>
    @stop()
</div>