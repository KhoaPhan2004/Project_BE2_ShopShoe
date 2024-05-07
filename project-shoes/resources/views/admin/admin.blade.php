<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Title Page</title>

    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Custom CSS */
        .navbar-left {
            font-size: 20px;
            background: linear-gradient(to right, #00d2ff, #3a7bd5);           
             padding: 20px;
            height: 100vh; 
        }

    h1{
        font-size: 50px;
        color: red;
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
    <div class="container-fluid">
        <div class="row">    
            <!-- Navbar bên trái -->
            <div class="col-lg-3 navbar-left">
                <h1>Admin</h1>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"> <a href="{{ route('admin.index') }}">Home</a>
                    </li>
                    <li class="nav-item mb-2"> <a href="{{ route('brand.index') }}">Brand</a>
                    </li>
                    <li class="nav-item mb-2"> <a href="{{ route('origin.index') }}">Origins</a>
                    </li>
                    <li class="nav-item mb-2"> <a href="{{ route('product.index') }}">Product</a>
                    </li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link text-white">Thống Kê</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link text-white">Setting</a></li>

                </ul>
                
            </div>

            <div class="col-lg-9 main-content">
                @yield('main')
            </div>
        </div>
    </div>
</body>

</html>
