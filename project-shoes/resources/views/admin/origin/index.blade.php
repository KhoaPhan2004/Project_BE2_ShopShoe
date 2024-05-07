@extends('admin.admin')
@section('main')


<h1>Nguồn Ngốc</h1>
<a href="{{ route('origin.create') }}" class="btn btn-success">Thêm</a>
<hr>
<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Action</th>

            <!-- <th>status</th> -->

        </tr>
    </thead>
    <tbody>
        @foreach($origins as $origin)
        <tr>
            <td>{{$origin -> id}}</td>
            <td>{{$origin -> origin_name}}</td>
            <td>
                <form action="{{ route('origin.destroy', $origin->id)}}" method="post">
                    @csrf @method('DELETE')
                    <a href="{{ route('origin.edit',$origin->id) }}" class="btn btn-sm btn-primary">Sua</a>
                    <button class="btn btn-sm btn-danger">Xoa</button>

                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop()