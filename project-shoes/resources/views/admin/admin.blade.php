<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Title Page</title>

    <!-- Bootstrap CSS -->
    <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> -->

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .navbar-left {
            font-size: 20px;
            background: linear-gradient(to right, #00d2ff, #3a7bd5);
            padding: 20px;
            height: 100vh;
        }

        h1 {
            font-size: 50px;
            color: red;
            text-align: center;
            line-height: 100px;
        }

        .navbar-left ul {
            list-style-type: none;
            padding-left: 0;
        }

        .navbar-left ul li {
            margin-bottom: 10px;
        }

        .navbar-left ul li a {
            color: white;
            text-decoration: none;
        }

        .main-content {
            padding: 20px;
            height: 100vh;
            overflow-y: scroll;
        }

        body {
            background-color: #f5f5f5;
        }
    </style>
</head>

<body>
    <?php

use Illuminate\Support\Facades\Auth;

 $user = Auth::user();  ?>
    <div class="container-fluid">
        <div class="row">
            <!-- Navbar bên trái -->
            <div class="col-lg-3 navbar-left">
                <h1>Admin</h1>
                <ul class="nav flex-column">
                @if($user->can('admin.admin.index'))
                    <li class="nav-item mb-2"> <a href="{{ route('admin.admin.index') }}">Home</a>
                    </li>
                    @endif
                    @if($user->can('admin.brand.index'))
                    <li class="nav-item mb-2"> <a href="{{ route('admin.brand.index') }}">Brand</a>
                    </li>
                    @endif
                    @if($user->can('admin.user.index'))
                    <li class="nav-item mb-2"> <a href="{{ route('admin.user.index') }}">User</a>
                    </li>
                    @endif
                    @if($user->can('admin.origin.index'))
                    <li class="nav-item mb-2"> <a href="{{ route('admin.origin.index') }}">Origins</a>
                    </li>
                    @endif
                    @if($user->can('admin.product.index'))
                    <li class="nav-item mb-2"> <a href="{{ route('admin.product.index') }}">Product</a>
                    </li>
                    @endif
                    @if($user->can('admin.role.index'))
                    <li class="nav-item mb-2"> <a href="{{ route('admin.role.index') }}">Roles</a>
                    </li>
                    @endif
                    @if($user->can('admin.admin.statistics'))
                    <li class="nav-item mb-2"><a href="{{ route('admin.admin.statistics') }}">Thống Kê</a></li>
                    @endif
                    <li class="nav-item mb-2"><a href="#" class="nav-link text-white">Setting</a></li>
                    <li class="nav-item mb-2"><a href="{{ route('admin.singout') }}" class="nav-link text-white">SingOut</a></li>

                </ul>

            </div>

            <div class="col-lg-9 main-content">
                @yield('main')
            </div>
        </div>
    </div>
    @yield('js')
</body>

</html>