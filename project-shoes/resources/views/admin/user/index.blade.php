@extends('admin.admin')
@section('main')


<h1>danh sách user</h1>
<a href="{{ route('admin.user.create') }}" class="btn btn-success">Thêm</a>
<hr>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" rel="stylesheet">
<link href="{{ asset('css/admin_product.css') }}" rel="stylesheet">

<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>email</th>
            <th>phone</th>

        </tr>
    </thead>
    <tbody>
       @foreach($data as $model)
        <tr>
            <td>{{$model->id}}</td>
            <td>{{$model->name}}</td>
            <td>{{$model->email}}</td>
            <td>{{$model->phone}}</td>
            <td>
            <a href="{{route('admin.user.show',$model->id)}}" class="btn btn-xs btn-primary">Roles</a>
                <a href="{{route('admin.user.edit',$model->id)}}" class="btn btn-xs btn-primary">Sửa</a>
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