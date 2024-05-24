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
    @section('main')

    <section>

        <div class="main" id="Home">
            <div class="main_content">
                <div class="main_text">
                    <h1>NIKE<br><span>Bộ Sưu Tập</span></h1>
                    <p>
                        Chào mừng đến với Shoes - thiên đường dành cho những người yêu thích giày!

                        Shoes tự hào là một trong những cửa hàng giày uy tín và đáng tin cậy nhất, mang đến cho khách hàng những sản phẩm giày chất lượng và phong cách thời trang đẳng cấp. Với nhiều năm kinh nghiệm trong lĩnh vực kinh doanh giày dép, chúng tôi hiểu rằng mỗi bước đi của bạn đều quan trọng, và vì thế, chúng tôi luôn nỗ lực để mang đến những đôi giày hoàn hảo nhất.
                    </p>
                </div>
                <div class="main_image">
                    <img src="image/shoes.png ">
                </div>
            </div>
            <!-- <div class="social_icon">
                <i class="fa-brands fa-facebook-f"></i>
                <i class="fa-brands fa-twitter"></i>
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-linkedin-in"></i>
            </div> -->
            <div class="button">
                <a href="#">Mua Ngay Bây Giờ</a>
                <i class="fa-solid fa-chevron-right"></i>
            </div>
        </div>

    </section>


    <!--Products-->

    <div class="products" id="Products">
        <h1>Sản Phẩm</h1>

        <div class="box">
            <!-- resources/views/index.blade.php -->

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
                    <!-- <p>{{ $product->description }}</p> -->
                    <h3>${{ $product->price }}</h3>
                    <a href="{{ route('home.show', $product->id) }}" class="btn">Xem Chi Tiết</a>
                </div>
            </div>
            @endforeach

        </div>
    </div>




    <!--About-->

    <div class="about" id="About">

        <h1>Thông Tin về <span>Shoes</span></h1>

        <div class="about_main">
            <div class="about_image">
                <div class="about_small_image">
                    <img src="image/red_shoes1.png" onclick="functio(this)">
                    <img src="image/red_shoes2.png" onclick="functio(this)">
                    <img src="image/red_shoes3.png" onclick="functio(this)">
                    <img src="image/red_shoes4.png" onclick="functio(this)">
                </div>

                <div class="image_contaner">
                    <img src="image/red_shoes1.png" id="imagebox">
                </div>

            </div>

            <div class="about_text">
                <p>
                    Chào mừng đến với Shoes - thiên đường dành cho những người yêu thích giày!

                    Shoes tự hào là một trong những cửa hàng giày uy tín và đáng tin cậy nhất, mang đến cho khách hàng những sản phẩm giày chất lượng và phong cách thời trang đẳng cấp. Với nhiều năm kinh nghiệm trong lĩnh vực kinh doanh giày dép, chúng tôi hiểu rằng mỗi bước đi của bạn đều quan trọng, và vì thế, chúng tôi luôn nỗ lực để mang đến những đôi giày hoàn hảo nhất.

                    Tại Shoes, bạn sẽ tìm thấy một bộ sưu tập giày đa dạng, từ giày thể thao năng động, giày công sở thanh lịch đến giày thời trang cá tính. Chúng tôi cung cấp các sản phẩm từ những thương hiệu nổi tiếng và được ưa chuộng trên toàn thế giới, đảm bảo chất lượng và độ bền cao. Bất kể bạn là ai, làm gì hay sở thích cá nhân của bạn là gì, Shoes đều có đôi giày phù hợp dành cho bạn.

                    Chúng tôi hiểu rằng giày không chỉ là một món đồ thời trang mà còn là người bạn đồng hành quan trọng trong cuộc sống hàng ngày. Vì vậy, Shoes cam kết mang đến cho bạn những sản phẩm chất lượng nhất với giá cả hợp lý. Đội ngũ nhân viên của chúng tôi luôn sẵn sàng tư vấn và hỗ trợ bạn chọn lựa đôi giày phù hợp nhất, mang lại trải nghiệm mua sắm tuyệt vời và đáng nhớ.

                    Shoes không ngừng cải tiến và phát triển hệ thống cửa hàng cũng như kênh mua sắm trực tuyến, giúp bạn dễ dàng tiếp cận và lựa chọn sản phẩm một cách nhanh chóng và tiện lợi. Bạn có thể ghé thăm cửa hàng của chúng tôi để trực tiếp thử giày và cảm nhận sự thoải mái, hoặc mua sắm online với dịch vụ giao hàng nhanh chóng và chính xác.

                    Hãy đến với Shoes và trải nghiệm sự khác biệt! Chúng tôi hân hạnh được đồng hành cùng bạn trên mọi bước đường.

                    Shoes - Nâng niu từng bước chân của bạn.
                </p>
            </div>

        </div>

        <a href="#" class="about_btn">Mua Ngay</a>

        <script>
            function functio(small) {
                var full = document.getElementById("imagebox")
                full.src = small.src
            }
        </script>

    </div>



    <!--Review-->

    <div class="review" id="Review">
        <h1>Những Nhận Xét Từ Khách Hàng<span>Shoes</span></h1>
        <h1>
            #FEEDBACK
        </h1>
        <div class="review_box">
            <div class="review_card">
                <div class="card_top">
                    <div class="profile">

                        <div class="profile_image">
                            <img src="image/canh.jpg">
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
                    <p>
                        Đẹp quá đê!! <br>
                        mua ngay thôi <br>
                        Đẹp quá đê!! <br>
                        mua ngay thôi <br>
                    </p>
                </div>
            </div>

            <div class="review_card">
                <div class="card_top">
                    <div class="profile">

                        <div class="profile_image">
                            <img src="image/man_dp1.jpg">
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
                    <p>
                        Shoes.vn bán hàng chính hãng, giá rất
                        ok, tôi đã mua một đôi giày chạy bộ của
                        Nike đi rất êm và thích <br>
                        Nike đi rất êm và thích.
                    </p>
                </div>
            </div>

            <div class="review_card">
                <div class="card_top">
                    <div class="profile">

                        <div class="profile_image">
                            <img src="image/man_dp2.jpg">
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
                    <p>
                        Tôi đã mua cho cả 2 vợ chồng giày của
                        Shoes.vn và thật sự nó vô cùng chất
                        lượng. Hàng đảm bảo chính hãng 100% và
                        chính sách bảo hành rất yên tâm ạ. Cảm
                        on Myshoes.vn!
                    </p>
                </div>
            </div>

        </div>

        <div class="review_box">
            <div class="review_card">
                <div class="card_top">
                    <div class="profile">

                        <div class="profile_image">
                            <img src="image/gir_dp3.jpg">
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
                    <p>
                        Mua hàng của Shoes.vn thì rất yên tâm rồi
                        mình mua luôn 2 đôi vì nhiều mẫu đẹp
                        quá! <br>
                        Sẽ ủng hộ shop thường xuyên.
                    </p>
                </div>
            </div>

            <div class="review_card">
                <div class="card_top">
                    <div class="profile">

                        <div class="profile_image">
                            <img src="image/gir_dp2.jpg">
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
                    <p>
                        Tìm một đôi giày ưng ý không hề dễ dàng,
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
                            <img src="image/man_dp3.jpg">
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
                    <p>
                        Mới mua combo chăm sóc giày của
                        Shoes sử dụng rất tốt, vệ sinh giày siêu
                        sạch, xịt nano rất hiệu quả khi đi trời mưa.
                    </p>
                </div>
            </div>

        </div>


    </div>


    <!--Services-->

    <div class="services" id="Servises">
        <h1>Dịch Vụ<span>Của Chúng Tôi</span></h1>

        <div class="services_cards">
            <div class="services_box">
                <i class="fa-solid fa-truck-fast"></i>
                <h3>Chuyển Phát Nhanh</h3>
                <p>
                    Shoes tự hào cung cấp dịch vụ chuyển phát nhanh chóng và chính xác, đảm bảo mỗi đơn hàng đến tay bạn trong thời gian sớm nhất. </p>
            </div>

            <div class="services_box">
                <i class="fa-solid fa-rotate-left"></i>
                <h3>Hoàn Trả Trong 10 Ngày</h3>
                <p>
                    Shoes cam kết chính sách hoàn trả sản phẩm trong vòng 10 ngày để đảm bảo sự hài lòng tuyệt đối của khách hàng.
                </p>
            </div>

            <div class="services_box">
                <i class="fa-solid fa-headset"></i>
                <h3>Hỗ Trợ 24/7</h3>
                <p>
                    Shoes cung cấp dịch vụ hỗ trợ khách hàng 24/7, luôn sẵn sàng giải đáp mọi thắc mắc và nhu cầu của bạn. </p>
            </div>
        </div>

    </div>



    <!--Login Form-->

    <div class="login_form">
        <div class="left">
            <img src="image/logshoes.png">
        </div>

        <div class="right">
            <h1>Welcome Back!</h1>

            <form action="#" method="post">
                <p>User Name</p>
                <div class="user">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" name="user" placeholder="User Name" class="username">
                </div>

                <p class="passworg_tag">Password</p>
                <div class="password">
                    <i class="fa-solid fa-lock"></i>
                    <input type="text" name="password" placeholder="Password">
                </div>

                <p class="forget">Forget Password ?</p>

                <button type="submit">Login</button>
                <div class="loging_icon">
                    <a href="#"><img src="image/google.png"></a>
                    <a href="https://www.facebook.com/viet.canh.2206"><img src="image/facebook.png"></a>
                    <a href="#"><img src="image/twitter.png"></a>
                </div>

            </form>

        </div>

    </div>



    <!--Footer-->


    <script>
        document.getElementById("searchForm").addEventListener("submit", function(event) {
            event.preventDefault();

            var keyword = document.querySelector('input[name="keyword"]').value;

            var xhr = new XMLHttpRequest();
            xhr.open("GET", "/search?keyword=" + keyword, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {

                    document.getElementById("Products").innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        });
    </script>

</body>

</html>

@stop()