<!-- admin.origin.create.blade.php -->

<div class="container">
    @extends('admin.admin')
    @section('main')

    <div class="header">
        <h1>Thêm Nguôn Gốc</h1>

    </div>
    <hr>
    <link href="{{ asset('css/origin.css') }}" rel="stylesheet">

    <form action="{{ route('admin.origin.store')}}" method="POST" role="form">

        @csrf
        <div class="col-md-12">
            <div class="form-group">
                <label for="">Tên Nguồn Ngốc</label>
                <input type="text" class="form-control" name="origin_name" id="" placeholder="Nhap ...">
            </div>

        </div>

        <div class="button-add">
            <button type="submit" class="btn-add btn-primary ">Submit</button>
        </div>

    </form>

    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif
    @stop()
</div>
