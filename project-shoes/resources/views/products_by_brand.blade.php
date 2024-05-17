@extends('user_header_footer')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nike - Just Do It</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('image/logo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <section>
        @section('main')

        <div class="main" id="Home">
            <div class="main_content">
                <div class="main_text">
                    <h1>NIKE<br><span>Collection</span></h1>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                        been the industry's standard dummy text ever since the 1500s, when an unknown printer took
                        a galley of type and scrambled it to make a type specimen book. It has survived not only
                        five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                    </p>
                </div>
                <div class="main_image">
                    <img src="{{ asset('image/shoes.png') }}">
                </div>
            </div>
            <div class="button">
                <a href="#">SHOP NOW</a>
                <i class="fa-solid fa-chevron-right"></i>
            </div>
        </div>
    </section>
    <div class="name-brand">
        <h1>Giày <span>{{ $brand->brand_name }} Chính Hãng</span></h1>
    </div>
    <div class="products" id="Products">
        <div class="box">
            @foreach($products as $product)
            <div class="card">
                <div class="small_card">
                    <i class="fa-solid fa-heart"></i>
                    <i class="fa-solid fa-share"></i>
                </div>
                <div class="image">
                    <img src="{{ asset('images/' . $product->image_url) }}">
                </div>
                <div class="products_text">
                    <h2>{{ $product->product_name }}</h2>
                    <h3>${{ number_format($product->price, 2) }}</h3>
                    <a href="{{ route('home.show', $product->id) }}" class="btn">Xem Chi Tiết</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="about" id="About">
        <h1>Web<span>About</span></h1>
        <div class="about_main">
            <div class="about_image">
                <div class="about_small_image">
                    <img src="{{ asset('image/red_shoes1.png') }}" onclick="functio(this)">
                    <img src="{{ asset('image/red_shoes2.png') }}" onclick="functio(this)">
                    <img src="{{ asset('image/red_shoes3.png') }}" onclick="functio(this)">
                    <img src="{{ asset('image/red_shoes4.png') }}" onclick="functio(this)">
                </div>
                <div class="image_contaner">
                    <img src="{{ asset('image/red_shoes1.png') }}" id="imagebox">
                </div>
            </div>
            <div class="about_text">
                <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical
                    Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at
                    Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a
                    Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the
                    undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum"
                    (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics,
                    very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes
                    from a line in section 1.10.32. The standard chunk of Lorem Ipsum used since the 1500s is reproduced below
                    for those interested. Sections 1.10.32 and 1.10.33
                    from "de Finibus Bonorum et Malorum" by Cicero are also
                    reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.
                </p>
            </div>
        </div>
        <a href="#" class="about_btn">Shop Now</a>
        <script>
            function functio(small) {
                var full = document.getElementById("imagebox");
                full.src = small.src;
            }
        </script>

    </div>
    <div class="review" id="Review">
        <h1>customers say about shoes!<span>review</span></h1>
        <h1>#FEEDBACK</h1>
        <div class="review_box">
            <div class="review_card">
                <div class="card_top">
                    <div class="profile">
                        <div class="profile_image">
                            <img src="{{ asset('image/canh.jpg') }}">
                        </div>
                        <div class="name">
                            <strong>Viết Cảnh</strong>
                            <div class="like">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star-half-stroke"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="comment">
                    <p>Đẹp quá đê!!<br>mua ngay thôi<br>Đẹp quá đê!!<br>mua ngay thôi</p>
                </div>
            </div>
            <div class="review_card">
                <div class="card_top">
                    <div class="profile">
                        <div class="profile_image">
                            <img src="{{ asset('image/man_dp1.jpg') }}">
                        </div>
                        <div class="name">
                            <strong>Sayuru Tharanga</strong>
                            <div class="like">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star-half-stroke"></i>
                                <i class="fa-regular fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="comment">
                    <p>Shoes.vn bán hàng chính hãng, giá rất
                        ok, tôi đã mua một đôi giày chạy bộ của
                        Nike đi rất êm và thích<br>Nike đi rất êm và thích.
                    </p>
                </div>
            </div>
            <div class="review_card">
                <div class="card_top">
                    <div class="profile">
                        <div class="profile_image">
                            <img src="{{ asset('image/man_dp2.jpg') }}">
                        </div>
                        <div class="name">
                            <strong>Senuda Dilwan</strong>
                            <div class="like">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star-half-stroke"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="comment">
                    <p>Tôi đã mua cho cả 2 vợ chồng giày của
                        Shoes.vn và thật sự nó vô cùng chất
                        lượng. Hàng đảm bảo chính hãng 100% và
                        chính sách bảo hành rất yên tâm ạ. Cảm
                        ơn Myshoes.vn!
                    </p>
                </div>
            </div>
        </div>
        <div class="review_box">
            <div class="review_card">
                <div class="card_top">
                    <div class="profile">
                        <div class="profile_image">
                            <img src="{{ asset('image/gir_dp3.jpg') }}">
                        </div>
                        <div class="name">
                            <strong>Kaveesha Vidurangi</strong>
                            <div class="like">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star-half-stroke"></i>
                                <i class="fa-regular fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="comment">
                    <p>Mua hàng của Shoes.vn thì rất yên tâm rồi
                        mình mua luôn 2 đôi vì nhiều mẫu đẹp
                        quá!<br>Sẽ ủng hộ shop thường xuyên.
                    </p>
                </div>
            </div>
            <div class="review_card">
                <div class="card_top">
                    <div class="profile">
                        <div class="profile_image">
                            <img src="{{ asset('image/gir_dp2.jpg') }}">
                        </div>
                        <div class="name">
                            <strong>John Deo</strong>
                            <div class="like">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star-half-stroke"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="comment">
                    <p>Tìm một đôi giày ưng ý không hề dễ dàng,
                        nhưng từ khi biết đến Shoes.vn thì hoàn
                        toàn tin tưởng, nhiều mẫu đẹp và đã chọn
                        được một em Adidas ưng ý!
                    </p>
                </div>
            </div>
            <div class="review_card">
                <div class="card_top">
                    <div class="profile">
                        <div class="profile_image">
                            <img src="{{ asset('image/man_dp3.jpg') }}">
                        </div>
                        <div class="name">
                            <strong>Charith Aruna</strong>
                            <div class="like">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star-half-stroke"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="comment">
                    <p>Mới mua combo chăm sóc giày của
                        Shoes sử dụng rất tốt, vệ sinh giày siêu
                        sạch, xịt nano rất hiệu quả khi đi trời mưa.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="services" id="Servises">
        <h1>our<span>services</span></h1>
        <div class="services_cards">
            <div class="services_box">
                <i class="fa-solid fa-truck-fast"></i>
                <h3>Fast Delivery</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
            </div>
            <div class="services_box">
                <i class="fa-solid fa-rotate-left"></i>
                <h3>10 Days Replacement</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
            </div>
            <div class="services_box">
                <i class="fa-solid fa-headset"></i>
                <h3>24 x 7 Support</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
            </div>
        </div>
    </div>
    <div class="login_form">
        <div class="left">
            <img src="{{ asset('image/logshoes.png') }}">
        </div>
        <div class="right">
            <h1>Welcome Back!</h1>
            <form action="#" method="post">
                @csrf
                <p>User Name</p>
                <div class="user">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" name="user" placeholder="User Name" class="username">
                </div>
                <p class="passworg_tag">Password</p>
                <div class="password">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" name="password" placeholder="Password">
                </div>
                <p class="forget">Forget Password ?</p>
                <button type="submit">Login</button>
                <div class="loging_icon">
                    <a href="#"><img src="{{ asset('image/google.png') }}"></a>
                    <a href="#"><img src="{{ asset('image/facebook.png') }}"></a>
                    <a href="#"><img src="{{ asset('image/twitter.png') }}"></a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
@stop()