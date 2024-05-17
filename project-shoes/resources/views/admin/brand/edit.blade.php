<div class="container">
@extends('admin.admin')
@section('main')
<div class="header">
<h1>Chinh Sua Thuong Hieu</h1>

</div>
<hr>
<link href="{{ asset('css/brand.css') }}" rel="stylesheet">

<form action="{{ route('admin.brand.update',$brand->id)}}" method="POST" role="form">
    @csrf @method('PUT')
    <div class="col-md-9">
        <div class="form-group">
            <label for="">Tên Brand</label>
            <input type="text" class="form-control" value="{{$brand->brand_name}}" name="brand_name" id="" placeholder="Nhap ...">
            <label for=""> Created_at</label>
            <!-- <input type="text" class="form-control" value="{{ $brand->formatted_created_at }}" readonly> -->
            <input type="datetime-local" class="form-control" value="{{ $brand->created_at->format('Y-m-d\TH:i:s') }}" name="created_at">

        </div>
    </div>


    <div class="col-md-3">
        <button type="submit" class="btn btn-primary ">Submit</button>

    </div>
</form>


@stop()
</div>