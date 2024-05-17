<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nike - Just Do It</title>
    <link href="{{ asset('css/style_show.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('image/logo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }

    img {
        max-width: 100px;
        height: auto;
    }
</style>
<body>

    <section>
        <header>
            <nav>
                <div class="logo">
                    <h1>Shoe<span>s</span></h1>
                </div>

                <ul>
                    <li><a href="#Home">Home</a></li>
                    <li><a href="#Products">Products</a></li>
                    <div class="dropdown">
                        <button class="dropbtn">Brands <i class="bi bi-caret-down-fill"></i></button>
                        <div class="dropdown-content">
                           
                        </div>
                    </div>

                    <li><a href="#About">About</a></li>
                    <li><a href="#Review">Review</a></li>
                    <li><a href="#Servises">Servises</a></li>
                </ul>

                <div class="icons">
                    <i class="fa-solid fa-heart"></i>
                    <i class="fa-solid fa-cart-shopping"></i>
                    <div class="dropdown-icon">
                        <i class="fa-solid fa-user"></i>
                        <div class="dropdown-content-icon">
                            <a href="{{ route('login') }}"><i class="bi bi-person-circle"></i>
                                Login</a>
                            <a href="#"><i class="bi bi-box-arrow-in-right"></i>Logout</a>
                        </div>
                    </div>

                </div>

            </nav>
        </header>
        <div class="container mt-5 pt-5">
  <div class="row justify-content-center">
    <div class="col-lg-6">
      <form action="{{ route('search') }}" method="GET" class="d-flex">
        <input class="form-control me-2" type="search" name="keyword" placeholder="Search by name or brand" aria-label="Search">
        <button class="btn btn-outline-primary" type="submit">Search</button>
      </form>
    </div>
  </div>
</div>
        
    </section>

    <!--Chi tiết đơn hàng-->
    
    <div class="about" id="About">
        <h1><span>Chi tiết đơn hàng</span></h1>
        <table>
    <thead>
        <tr>
            <th>Tên sản phẩm</th>
            <th>Mô tả</th>
            <th>Hình ảnh</th>
            <th>Số lượng</th>
            <th>Địa chỉ người nhận</th>
            <th>Tình trạng</th>
            <th>Giá</th>
            <th>Tổng tiền</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orderDetails as $orderDetail)
        <tr>
            <td>{{ $orderDetail->product_name }}</td>
            <td>{{ $orderDetail->description }}</td>
            <td><img src="{{ asset('images/' . $orderDetail->image_url) }}" alt="Product Image"></td>
            <td>{{ $orderDetail->quantity }}</td>
            <td>{{ $orderDetail->address }}</td>
            <td>{{ $orderDetail->status }}</td>
            <td>{{ $orderDetail->price }}</td>
            <td>{{ $orderDetail->total_amount }}</td>
            <td>
                @if ($orderDetail->status != 'cancelled')
                <form action="{{ route('order.delete', $orderDetail->order_id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn hủy đơn hàng này?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit"><i class="fa-solid fa-plus"></i></button>
                    <button type="submit"><i class="fa-solid fa-trash"></i></button>
                    <button type="submit"><i class="fa-solid fa-pen-to-square"></i></button>
                </form>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

    </div>
    <!--Footer-->

    <footer>
        <div class="footer_main">
            <div class="tag">
                <h1>Contact</h1>
                <a href="#"><i class="fa-solid fa-house"></i>123/Colombo/Sri Lanka</a>
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
                    <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
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