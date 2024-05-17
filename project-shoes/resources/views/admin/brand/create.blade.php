<div class="container">
    @extends('admin.admin')
    @section('main')

    <div class="header">
        <h1>Add Brand</h1>
    </div>
    <hr>
    <link href="{{ asset('css/brand.css') }}" rel="stylesheet">

    <form action="{{ route('admin.brand.store')}}" method="POST" role="form">
        @csrf
        <div class="col-md-5">
            <div class="form-group">
                <label for="">Add Brand</label>
                <input type="text" class="form-control" name="brand_name" id="" placeholder="Nhap ...">


            </div>

        </div>


        <div class="col-md-7">
            <label for="">Created_at</label>
            <!-- <input type="datetime-local" class="form-control" name="created_at" id="created_at"> -->
            <input type="date" class="form-control" name="created_at" id="created_at">
        </div>
        <button type="submit" class="btn-add btn-primary ">Submit</button>
    </form>

    
    @stop()
</div>