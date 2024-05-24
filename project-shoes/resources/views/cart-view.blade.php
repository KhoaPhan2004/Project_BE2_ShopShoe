@extends('user_header_footer')

@section('main')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Shop Item - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <style>
       body{
        margin-top: 100px;
       }
    </style>
</head>

<body>
    @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Thông báo</h4>
        <p>{{session::get('success')}}</p>
    </div>
    @endif
    @if(Session::has('warning'))
    <div class="alert alert-warning" role="alert">
        <h4 class="alert-heading">Thông báo</h4>
        <p>{{session::get('warning')}}</p>
    </div>
    @endif
    <!-- Product section-->
    <section class="py-5">
        <div class="container px-2 px-lg-2 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                
                    <div id="shopping-cart">
                        <h2>Shopping Cart</h2>
                        <div class="float-end">
                            @if($cart->totalQuantity>0)
                            <a class="btn btn-outline-dark mt-auto" onclick="return confirm('Bạn có chắc muốn xóa tất cả không ???')" href="{{route('cart.clear')}}">Xóa tất Cả</a>
                            @endif
                        </div>
                        <table class="table" cellpadding="10" cellspacing="1">
                            <tbody>
                                <tr>
                                    <th style="text-align:left;">STT</th>
                                    <th style="text-align:left;">ID</th>
                                    <th style="text-align:left;">Name</th>
                                    <th style="text-align:left;">Image</th>
                                    <th style="text-align:right;" width="5%">Quantity</th>
                                    <th style="text-align:right;" width="10%">Price<br>( in $)</th>
                                    <th style="text-align:right;" width="10%">Total<br>( in $)</th>
                                    <th style="text-align:center;" width="5%">Remove</th>
                                </tr>
                                @foreach($cart->items as $item)

                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->name}}</td>
                                    <td><img src="{{ asset('images/' . $item->image) }}" width="80"></td>
                                    <td style="text-align:right;">
                                        <form action="{{route('cart.update',$item->id)}}" method="get" style="display: flex;">
                                            <input type="number" name="quantity" style="width: 60px; text-align: center" value="{{$item->quantity}}">
                                            <button class="btn btn-outline-dark mt-auto">update</button>
                                        </form>
                                    </td>
                                    <td style="text-align:right;">{{$item->price}}</td>
                                    <td style="text-align:right;">{{$item->quantity*$item->price}}</td>
                                    <td style="text-align:center;"><a onclick="return confirm('Bạn có chắc muốn xóa ???')" href="{{ route('cart.delete',$item->id) }}" class=""><i class="bi bi-trash"></i></a></td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4" align="right">Total:</td>
                                    <td align="right">{{$cart->totalQuantity}}</td>
                                    <td align="right" colspan="2"><strong>{{number_format($cart->totalPrice)}}</strong></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="float-end">
                            <a class="btn btn-outline-dark mt-auto" href="{{route('home.index')}}">Continue shopping</a>
                            @if($cart->totalQuantity>0)

                            <a class="btn btn-outline-dark mt-auto" href="{{route('order.checkout')}}">order</a>
                            @else
                            <hr>
                            <div class="alert alert-success" role="alert">
                                <h4 class="alert-heading">Giỏ hàng rỗng</h4>
                                <p>Vui lòng tiếp tục mua hàng</p>
                            </div>
                            @endif
                        </div>
                    </div>
                
            </div>
        </div>
    </section>


    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>
@endsection