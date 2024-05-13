<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Title Page</title>

    <!-- Bootstrap CSS -->
    <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"> -->
      <link href="{{ asset('css/register.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.3/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body>
    <div class="register py-5">
        <div class="container py-5">
            <div class="row justify-content-center py-5">
                <div class="col-md-5 p-3">
                    <div class="card " style="border: 1px solid black;">
                        <h3 class="card-header text-center" style=" margin-bottom:20px;">Đăng Ký</h3>
                        <div class="card-body">
                            <form method="POST" role="form" enctype="multipart/form-data">
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
                                <div class="form-group mb-3">
                                    <label for="image_url">Vui Lòng Chọn Hình Ảnh:</label>
                                    <input type="file" name="image_url" id="image_url" class="form-control">
                                    <!-- @if ($errors->has('image_url')) -->
                                    <span class="text-danger">{{ $errors->first('image_url') }}</span>
                                    <!-- @endif -->
                                </div>
                                <div class="form-group mb-2">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> Ghi Nhớ Đăng Nhập
                                        </label>
                                    </div>
                                </div>
                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn-green btn-primary btn-block">Đăng Ký</button>
                                </div>
                                <div class="account py-2">
                                    Bạn đã có tài khoản?
                                    <a href="{{route('login') }} " style="text-decoration: none;">Đăng nhập</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

