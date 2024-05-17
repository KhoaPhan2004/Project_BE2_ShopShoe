<div class="container">
    @extends('admin.admin')
    @section('main')

    <div class="header">
        <h1>Danh Sách Nguồn Ngốc</h1>

    </div>
    <a href="{{ route('admin.origin.create') }}" class="btn btn-success">Thêm</a>
    <hr>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" rel="stylesheet">

    <!-- hiển thị thông báo  -->
    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif
    <link href="{{ asset('css/origin.css') }}" rel="stylesheet">

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
            @foreach($origins as $origin)
            <tr>
                <td>{{$origin -> id}}</td>
                <td>{{$origin -> origin_name}}</td>
                <td>{{$origin -> created_at}}</td>

                <td>
                    <form action="{{ route('admin.origin.destroy', $origin->id)}}" method="post">
                        @csrf @method('DELETE')
                        <a href="{{ route('admin.origin.edit',$origin->id) }}" class="btn btn-sm btn-primary"><i class="bi bi-pencil-fill"></i>
                        Edit</a>
                        <button class="btn btn-sm btn-danger "><i class="bi bi-trash3-fill"></i>
                            Delete</button>

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
        {{$origins->links()}}
    </div>

    @stop()
</div>