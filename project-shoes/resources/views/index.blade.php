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
                            @foreach($brands as $id => $brand)
                            <a href="#">{{ $brand }}</a>
                            @endforeach
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

        <div class="main" id="Home">
            <div class="main_content">
                <div class="main_text">
                    <h1>NIKE<br><span>Collection</span></h1>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                        been the industry's standard dummy text ever since the 1500s, when an unknown printer took
                        a galley of type and scrambled it to make a type specimen book. It has survived not only
                        five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
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
                <a href="#">SHOP NOW</a>
                <i class="fa-solid fa-chevron-right"></i>
            </div>
        </div>

    </section>


    <!--Products-->

    <div class="products" id="Products">
        <h1>Products</h1>

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
                    <p>{{ $product->description }}</p>
                    <h3>${{ $product->price }}</h3>
                    <a href="{{route('cart.add',$product->id) }}" class="btn">Add To Cart</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>




    <!--About-->

    <div class="about" id="About">

        <h1>Web<span>About</span></h1>

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
                    Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical
                    Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at
                    Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a
                    Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the
                    undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum"
                    (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics,
                    very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes
                    from a line in section 1.10.32. The standard chunk of Lorem Ipsum used since the 1500s is reproduced below
                    for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also
                    reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.
                </p>
            </div>

        </div>

        <a href="#" class="about_btn">Shop Now</a>

        <script>
            function functio(small) {
                var full = document.getElementById("imagebox")
                full.src = small.src
            }
        </script>

    </div>



    <!--Review-->

    <div class="review" id="Review">
        <h1>Customer's<span>review</span></h1>

        <div class="review_box">
            <div class="review_card">
                <div class="card_top">
                    <div class="profile">

                        <div class="profile_image">
                            <img src="image/girl_dp1.jpg">
                        </div>

                        <div class="name">
                            <strong>Ranidi Lochana</strong>

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
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Debitis, amet nesciunt voluptatem cum
                        architecto ipsum vero nulla voluptatibus dolorum modi assumenda eum? Aliquid inventore velit ipsa
                        repellat numquam atque dolores!
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
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Debitis, amet nesciunt voluptatem cum
                        architecto ipsum vero nulla voluptatibus dolorum modi assumenda eum? Aliquid inventore velit ipsa
                        repellat numquam atque dolores!
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
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Debitis, amet nesciunt voluptatem cum
                        architecto ipsum vero nulla voluptatibus dolorum modi assumenda eum? Aliquid inventore velit ipsa
                        repellat numquam atque dolores!
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
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Debitis, amet nesciunt voluptatem cum
                        architecto ipsum vero nulla voluptatibus dolorum modi assumenda eum? Aliquid inventore velit ipsa
                        repellat numquam atque dolores!
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
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Debitis, amet nesciunt voluptatem cum
                        architecto ipsum vero nulla voluptatibus dolorum modi assumenda eum? Aliquid inventore velit ipsa
                        repellat numquam atque dolores!
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
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Debitis, amet nesciunt voluptatem cum
                        architecto ipsum vero nulla voluptatibus dolorum modi assumenda eum? Aliquid inventore velit ipsa
                        repellat numquam atque dolores!
                    </p>
                </div>
            </div>

        </div>

    </div>


    <!--Services-->

    <div class="services" id="Servises">
        <h1>our<span>services</span></h1>

        <div class="services_cards">
            <div class="services_box">
                <i class="fa-solid fa-truck-fast"></i>
                <h3>Fast Delivery</h3>
                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                </p>
            </div>

            <div class="services_box">
                <i class="fa-solid fa-rotate-left"></i>
                <h3>10 Days Replacement</h3>
                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                </p>
            </div>

            <div class="services_box">
                <i class="fa-solid fa-headset"></i>
                <h3>24 x 7 Support</h3>
                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                </p>
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
                    <a href="#"><img src="image/facebook.png"></a>
                    <a href="#"><img src="image/twitter.png"></a>
                </div>

            </form>

        </div>

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