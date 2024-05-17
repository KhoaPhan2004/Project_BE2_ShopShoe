@extends('admin.admin')
@section('main')


<h1>danh sách quyền</h1>
<a href="{{ route('admin.role.create') }}" class="btn btn-success">Thêm</a>
<hr>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" rel="stylesheet">
<link href="{{ asset('css/admin_product.css') }}" rel="stylesheet">

<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th></th>

        </tr>
    </thead>
    <tbody>
       @foreach($data as $model)
        <tr>
            <td>{{$model->id}}</td>
            <td>{{$model->name}}</td>
            <td>
                <a href="{{route('admin.role.edit',$model->id)}}" class="btn btn-xs btn-primary">Sửa</a>
                <a href="" class="btn btn-xs btn-primary">Xóa</a>
            </td>
        </tr>
       @endforeach
    </tbody>
</table>
<div class="panel-footer">
    {{$data->links()}}
</div>


@stop()