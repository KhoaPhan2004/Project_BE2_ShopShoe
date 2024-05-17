@extends('admin.admin')
@section('main')

<h1>Create user</h1>
<hr>

<form action="{{route('admin.user.store')}}" method="POST" role="form" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="">Name</label>
        <input type="name" class="form-control" name="name" placeholder="Input name">
        @error('name') <small> {{$message}} </small> @enderror
    </div>
    <div class="form-group">
        <label for="">Email</label>
        <input type="email" class="form-control" name="email" placeholder="Input email">
        @error('email') <small> {{$message}} </small> @enderror

    </div>
    <div class="form-group">
        <label for="">Address</label>
        <input type="address" class="form-control" name="address" placeholder="Input address">
        @error('address') <small> {{$message}} </small> @enderror

    </div>
    <div class="form-group">
        <label for="">Password</label>
        <input type="password" class="form-control" name="password" placeholder="Input password">
        @error('password') <small> {{$message}} </small> @enderror

    </div>
    <div class="form-group">
        <label for="">Confirm Password</label>
        <input type="password" class="form-control" name="confirm_password" placeholder="Input password">
        @error('confirm_password') <small> {{$message}} </small> @enderror

    </div>
    <div class="d-grid mx-auto">
        <button type="submit" class="btn-green btn-primary btn-block">tạo</button>
    </div>
</form>

@stop()