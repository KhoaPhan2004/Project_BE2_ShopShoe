<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoes Shop</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('image/logo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js" integrity="sha512-XXX" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .search {
            width: ;
        }
    </style>
</head>

<body>
    <!-- header -->
    <section>
        <header>
            <nav>
                <div class="logo">
                    <h1>Shoe<span>s</span></h1>
                </div>

                <ul>
                    <li><a href="{{ route('home.index') }}">Home</a></li>
                    <li><a href="#Products">Products</a></li>
                    <div class="dropdown">
                        <button class="dropbtn">Brands <i class="bi bi-caret-down-fill"></i></button>
                        <div class="dropdown-content">
                            @foreach($brands as $brand)
                            @if(isset($brand->id))
                            <a href="{{ route('brand.products', $brand->id) }}">{{ $brand->brand_name }}</a>
                            @endif
                            @endforeach


                        </div>
                    </div>

                    <li><a href="#About">About</a></li>
                    <li><a href="#Review">Review</a></li>
                    <li><a href="{{ route('order.history') }}">My order</a></li>
                </ul>
                <div class="row justify-content-center">
                    <form id="searchForm" class="d-flex">
                        <input class="form-control me-2" type="search" name="keyword" placeholder="Search by name or brand" aria-label="Search">
                        <button class="btn btn-outline-primary" type="submit">Tìm</button>
                    </form>
                </div>

                <div class="icons">
                    <i class="fa-solid fa-heart"></i>
                    <a href="{{ route('cart.view') }}"><i class="fa-solid fa-cart-shopping"></i>
                    </a>
                    <div class="dropdown-icon">
                        <i class="fa-solid fa-user"></i>
                        <div class="dropdown-content-icon">
                            @guest
                            <a href="{{ route('login') }}"><i class="bi bi-person-circle"></i> Login</a>
                            @else
                            <a href="{{ route('logout') }}"><i class="bi bi-box-arrow-in-right"></i> Logout</a>
                            @endguest
                        </div>
                    </div>
                </div>


            </nav>
        </header>


        <div class="container">
            @yield('main')

        </div>



        <!--Footer-->
        <footer>
            <div class="footer_main">
                <div class="tag">
                    <h1>Contact</h1>
                    <a href="#"><i class="fa-solid fa-house"></i>52/3 đường làng tăng Phú, Tăng Nhơn Phú A, Thành Phố Thủ Đức, TP Hồ Chí Minh</a>
                    <a href="#"><i class="fa-solid fa-phone"></i>+84 42779848</a>
                    <a href="#"><i class="fa-solid fa-envelope"></i>huynhvietcanh2004@gmail.com</a>
                </div>

                <div class="tag">
                    <h1>Get Help</h1>
                    <a href="#" class="center">FAQ</a>
                    <a href="#" class="center">Shipping</a>
                    <a href="#" class="center">Returns</a>
                    <a href="#" class="center">Payment Options</a>
                </div>

                <div class="tag">
                    <h1>Our Stores</h1>
                    <a href="#" class="center">Sri Lanka</a>
                    <a href="#" class="center">USA</a>
                    <a href="#" class="center">India</a>
                    <a href="#" class="center">Japan</a>
                </div>

                <div class="tag">
                    <h1>Follw Us</h1>
                    <div class="social_link">
                        <a href="https://www.facebook.com/viet.canh.2206"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#"><i class="fa-brands fa-twitter"></i></a>
                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                    </div>
                </div>

                <div class="tag">
                    <h1>Newsletter</h1>
                    <div class="search_bar">
                        <input type="text" placeholder="You email id here">
                        <button type="submit">Subscribe</button>
                    </div>
                </div>

            </div>
        </footer>


</body>

</html>