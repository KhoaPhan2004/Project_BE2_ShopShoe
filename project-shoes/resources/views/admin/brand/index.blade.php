@extends('admin.admin')
@section('main')


<h1>Thương Hiệu</h1>
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
{{$brands->links()}}
@stop()