<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Title Page</title>

    <!-- Bootstrap CSS -->
    <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"> -->

    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.3/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body>

    <div class="login py-5">
        <div class="container py-5">
            <div class="row justify-content-center py-5">
                
                <div class="col-md-5 p-3">
                <h1>Login Admin</h1>

                    <div class="card " style="border: 1px solid black;">
                        <h3 class="card-header text-center" style=" margin-bottom:20px;">Đăng Nhập</h3>
                        <div class="card-body">
                            
                            <form method="POST" action="{{ route('admin.login') }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Email" id="email" class="form-control" name="email" required autofocus>
                                    <span class="text-danger"></span>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" placeholder="Password" id="password" class="form-control" name="password" required>
                                    <span class="text-danger"></span>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> Ghi Nhớ Đăng Nhập
                                        </label>
                                    </div>
                                </div>
                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn-green btn-block">Đăng Nhập</button>
                                </div>
                                <div class="forgetpassword py-2">
                                    <a href="" style="text-decoration: none;">Bạn quên mật khẩu?</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="container">
            <div class="row text-center">

                <div class="anaccount">Bạn không có tài khoản <a href="{{route('register') }} " style="text-decoration: none;">Đăng Ký</a>
                </div>
            </div>
        </div>
    </footer>


    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>