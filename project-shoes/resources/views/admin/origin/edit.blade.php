<div class="container">
    @extends('admin.admin')
    @section('main')

    <div class="header">
        <h1>Chỉnh Sửa Nguồn Gốc</h1>

    </div>
    <hr>
    <link href="{{ asset('css/origin.css') }}" rel="stylesheet">

    <form action="{{ route('admin.origin.update',$origin->id)}}" method="POST" role="form">
        @csrf @method('PUT')
        <div class="col-md-12">
            <div class="form-group">
                <label for="">Tên Origin</label>
                <input type="text" class="form-control" value="{{$origin->origin_name}}" name="origin_name" id="" placeholder="Nhap ...">

            </div>
        </div>


        <div class="button-edit">
            <button type="submit" class="btn-edit btn-primary ">Edit</button>

        </div>

    </form>


    @stop()
</div>