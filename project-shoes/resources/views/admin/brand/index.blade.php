<div class="container">
    @extends('admin.admin')
    @section('main')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" rel="stylesheet">

    <div class="header">
        <h1>Thương Hiệu</h1>
    </div>
    <link href="{{ asset('css/brand.css') }}" rel="stylesheet">
    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif

    <a href="{{ route('admin.brand.create') }}" class="btn btn-success">Thêm</a>
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
                    <form action="{{ route('admin.brand.destroy', $brand->id)}}" method="post">
                        @csrf @method('DELETE')
                        <a href="{{ route('admin.brand.edit',$brand->id) }}" class="btn btn-sm btn-primary"> <i class="bi bi-pencil-fill"></i>
                            Sua</a>
                        <button class="btn btn-sm btn-danger"><i class="bi bi-trash3-fill"></i>Xoa</button>

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