@extends('admin.admin')
@section('main')

<h1>Chinh Sua Nguon Ngoc</h1>
<hr>

<form action="{{ route('origin.update',$origin->id)}}" method="POST" role="form">
@csrf @method('PUT')
    <div class="col-md-9">
        <div class="form-group">
            <label for="">Ten Origin</label>
            <input type="text" class="form-control" value="{{$origin->origin_name}}" name="origin_name" id="" placeholder="Nhap ...">
        </div>
    </div>



<div class="col-md-3">
<button type="submit"  class="btn btn-primary ">Submit</button>

</div>
</form>


@stop()