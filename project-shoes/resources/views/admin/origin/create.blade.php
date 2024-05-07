@extends('admin.admin')
@section('main')

<h1>Them Origins</h1>
<hr>

<form action="{{ route('origin.store')}}" method="POST" role="form">
@csrf
    <div class="col-md-9">
        <div class="form-group">
            <label for="">Tên Nguồn Ngốc</label>
            <input type="text" class="form-control" name="origin_name" id="" placeholder="Nhap ...">
        </div>
      
    </div>



<div class="col-md-4">
<button type="submit"  class="btn btn-primary ">Submit</button>

</div>
</form>


@stop()