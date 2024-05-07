@extends('admin.admin')
@section('main')

<h1>Them Brand</h1>
<hr>

<form action="{{ route('brand.store')}}" method="POST" role="form">
    @csrf
    <div class="col-md-9">
        <div class="form-group">
            <label for="">Ten Brand</label>
            <input type="text" class="form-control" name="brand_name" id="" placeholder="Nhap ...">
            <label for="">Created_at</label>
            <!-- <input type="datetime-local" class="form-control" name="created_at" id="created_at"> -->
            <input type="date" class="form-control" name="created_at" id="created_at">

        </div>

    </div>



    <div class="col-md-4">
        <button type="submit" class="btn btn-primary ">Submit</button>

    </div>
</form>


@stop()