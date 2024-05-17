@extends('admin.admin')
@section('main')

<h1>Edit user</h1>
<hr>

<form action="{{route('admin.user.update',$user->id)}}" method="POST" role="form" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="col-lg-9">
        <div class="form-group">
            <label for="">Name</label>
            <input type="name" class="form-control" name="name" value="{{$user->name}}">
            @error('name') <small> {{$message}} </small> @enderror
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" class="form-control" name="email" value="{{$user->email}}">
            @error('email') <small> {{$message}} </small> @enderror

        </div>
        <div class="form-group">
            <label for="">Address</label>
            <input type="address" class="form-control" name="address" value="{{$user->address}}">
            @error('address') <small> {{$message}} </small> @enderror

        </div>
        
        <div class="form-group">
            <label for="">password</label>
            <input type="password" class="form-control" name="password" value="">
            @error('password') <small> {{$message}} </small> @enderror

        </div>
        
    </div>

    <div class="col-lg-3">
    <div class="form-group">
        <label for="">Roles</label>
        @foreach($roles as $role)
        <?php $checked = in_array($role->name,$role_assignments) ? 'checked' : ''; ?>
        <div class="checkbox">
            <label for="">
                <input type="checkbox" {{$checked}} name="role[]" value="{{$role->id}}">
                {{$role->name}}
            </label>
            @endforeach
        </div>
        </div>
        <button type="submit" class="btn btn-primary">sua user</button>
    </div>
</form>

@stop()