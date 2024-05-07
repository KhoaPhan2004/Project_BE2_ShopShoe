<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thay Đổi Mật Khẩu</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../css/bootstrap.css">

    <!-- Tập tin CSS tùy chỉnh của bạn -->
    <link rel="stylesheet" href="../../css/login.css">

    <!-- HTML5 Shim và Respond.js hỗ trợ IE8 các phần tử HTML5 và truy vấn phương tiện -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.3/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <div class="change-password py-5">
        <div class="container py-5">
            <div class="row justify-content-center py-5">
                <div class="col-md-5 p-3">
                    <div class="card " style="border: 1px solid black;">
                        <h3 class="card-header text-center" style="margin-bottom:20px;">Thay Đổi Mật Khẩu</h3>
                        <div class="card-body">
                            @if(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif
                            <form method="POST" action="{{ route('admin.changePassword') }}">
                                @csrf

                                <div class="form-group mb-3">
                                    <input type="email" placeholder="Email" id="email" class="form-control" name="email" required autofocus>
                                    <span class="text-danger"></span>
                                    @error('email')
                                    <small class="help-block">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" placeholder="Mật Khẩu Cũ" id="old_password" class="form-control" name="old_password" required>
                                    <span class="text-danger"></span>
                                    @error('old_password')
                                    <small class="help-block">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" placeholder="Mật Khẩu Mới" id="password" class="form-control" name="password" required>
                                    <span class="text-danger"></span>
                                    @error('password')
                                    <small class="help-block">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" placeholder="Xác Nhận Mật Khẩu Mới" id="confirm_password" class="form-control" name="confirm_password" required>
                                    <span class="text-danger"></span>
                                    @error('confirm_password')
                                    <small class="help-block">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn btn-primary btn-block">Thay Đổi Mật Khẩu</button>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>